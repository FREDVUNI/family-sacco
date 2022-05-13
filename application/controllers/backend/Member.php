<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Member extends CI_Controller{
        public function __construct(){
            parent::__construct();
            is_logged_in();
            $this->load->helper('text');
            $this->load->model('backend/Member_model');
        }
        public function index(){
            $data['user'] = $this->db->get_where('admins',['email'=>
            $this->session->userdata('email')])->row_array();
            
            $data['title'] = 'members';

            $data['member'] = $this->Member_model->members();

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('backend/member/index',$data);
            
            $this->load->view('templates/footer',$data);
        }
        public function members(){
            $data['user'] = $this->db->get_where('admins',['email'=>
            $this->session->userdata('email')])->row_array();

            $data['title'] = 'members';

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $data['member'] = $this->Member_model->members();
            $this->load->view('backend/member/index',$data);

            $this->load->view('templates/footer',$data);
        }
        public function create(){
            $data['user'] = $this->db->get_where('admins',['email'=>$this->session->userdata('email')])->row_array();
            $data['title'] = 'create member';
            $data['members'] = $this->Member_model->members();

            $this->form_validation->set_rules('name','name','trim|required|is_unique[members.name]'
            ,array('is_unique' => 'This name already exists.'));
            $this->form_validation->set_rules('email','email','trim|required|valid_email|is_unique[members.email]'
            ,array('is_unique' => 'A member with this email already exists.'));
            $this->form_validation->set_rules('phone','Phone number','required|trim|is_unique[members.phone]',[
            'is_unique' =>'A member with this phone number already exists.',
            ]);
            $this->form_validation->set_rules('referred_by', 'referred_by','required|trim');


            if ($this->form_validation->run() == FALSE) :
                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar',$data);
                $this->load->view('backend/member/create',$data);

                $this->load->view('templates/footer',$data);
            else:
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'referred_by' => $this->input->post('referred_by'),
                'phone' => $this->input->post('phone'),
                'slug' => $this->generate_slug($this->input->post('name')),
            );
            $this->db->set($data);
            $this->Member_model->save($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success role=" alert">
                The member has been added.</div>');
            return redirect('members');
            endif;
        }
        public function edit($slug){
            $data['user'] = $this->db->get_where('admins',['email'=>
            $this->session->userdata('email')])->row_array();

            $data['member'] = $this->Member_model->member($slug);
            $data['title'] = strtolower($data['member']->name);
            if(empty($data['member'])):
                return redirect('404');
            endif;

            $this->form_validation->set_rules('name','name','trim|required');
            $this->form_validation->set_rules('email','email','trim|required|valid_email');
            $this->form_validation->set_rules('phone','Phone number','required|trim');
            $this->form_validation->set_rules('referred_by', 'referred_by','required|trim');

            if($this->form_validation->run() == FALSE):

                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar',$data);
                $data['members'] = $this->Member_model->members();
                $this->load->view('backend/member/edit',$data);

                $this->load->view('templates/footer',$data);
            else:
                $id=$this->input->post('id');
                $referred_by=$this->input->post('referred_by');
                $name=$this->input->post('name');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                $slug = $this->generate_slug($this->input->post('name'));

                $this->db->set('name',$name);
                $this->db->set('referred_by',$referred_by);
                $this->db->set('email',$email);
                $this->db->set('phone',$phone);
                $this->db->set('slug',$slug);
                $this->db->where('id',$id);

            $this->db->update("members");
            $this->session->set_flashdata('message','<div class="alert alert-success role=" alert">
                The member has been updated.</div>');
            return redirect('members');
            endif;
        }
        public function delete($id){
            $data = $this->Member_model->member($id);
            if($this->Member_model->delete($id)):
                $this->session->set_flashdata('message','<div class="alert alert-success role=" alert">
                    The member has been deleted.</div>');
                return redirect('members');
            endif;
        }
        public function generate_slug($slug, $separator = '-'){
            $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
            $special_cases = array( '&' => 'and', "'" => '');
            $slug = mb_strtolower( trim( $slug ), 'UTF-8' );
            $slug = str_replace( array_keys($special_cases), array_values( $special_cases), $slug );
            $slug = preg_replace( $accents_regex, '$1', htmlentities( $slug, ENT_QUOTES, 'UTF-8' ) );
            $slug = preg_replace("/[^a-z0-9]/u", "$separator", $slug);
            $slug = preg_replace("/[$separator]+/u", "$separator", $slug);
            return $slug;
        }
    } 
