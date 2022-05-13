<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Circle extends CI_Controller{
        public function __construct(){
            parent::__construct();
            is_logged_in();
            $this->load->helper('text');
            $this->load->model('backend/Circle_model');
            $this->load->model('backend/Member_model'); 

        }
        public function index(){
            $data['user'] = $this->db->get_where('admins',['email'=>
            $this->session->userdata('email')])->row_array();
            
            $data['title'] = 'Circles';

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);

            $data['circle'] = $this->Circle_model->circles();
            $data['member'] = $this->Member_model->members();

            $this->load->view('backend/circle/index',$data);
            
            $this->load->view('templates/footer',$data);
        }
        public function circles(){
            $data['user'] = $this->db->get_where('admins',['email'=>
            $this->session->userdata('email')])->row_array();

            $data['title'] = 'circles';

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $data['circle'] = $this->Circle_model->circles();
            $data['member'] = $this->Member_model->members();
            $this->load->view('backend/circle/index',$data);

            $this->load->view('templates/footer',$data);
        }
        public function create(){
            $data['user'] = $this->db->get_where('admins',['email'=>$this->session->userdata('email')])->row_array();
            $data['title'] = 'create circle';

            $this->form_validation->set_rules('water','water','trim|required');
            $this->form_validation->set_rules('earth1', 'earth 1','required|trim');
            $this->form_validation->set_rules('earth2', 'earth 2','required|trim');
            $this->form_validation->set_rules('wind1', 'wind 1','required|trim');
            $this->form_validation->set_rules('wind2', 'wind 2','required|trim');
            $this->form_validation->set_rules('wind3', 'wind 3','required|trim');
            $this->form_validation->set_rules('wind4', 'wind 4','required|trim');

            if ($this->form_validation->run() == FALSE) :
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $data['member'] = $this->Member_model->members();
            $this->load->view('backend/circle/create',$data);

            $this->load->view('templates/footer',$data);
            else:
            $data = array(
                'water' => $this->input->post('water'),
                'earth1' => $this->input->post('earth1'),
                'earth2' => $this->input->post('earth2'),
                'wind1' => $this->input->post('wind1'),
                'wind2' => $this->input->post('wind2'),
                'wind3' => $this->input->post('wind3'),
                'wind4' => $this->input->post('wind4'),
                'close_date'=>'0000-00-00',
                'slug' => $this->generate_slug($this->input->post('water')+" "+rand()),
            );
            $this->db->set($data);
            $this->Circle_model->save($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success role=" alert">
                The circle has been added.</div>');
            return redirect('circles');
            endif;
        }
        public function edit($slug){
            $data['user'] = $this->db->get_where('admins',['email'=>
            $this->session->userdata('email')])->row_array();

            $data['circle'] = $this->Circle_model->circle($slug);
            $data['circ'] = $this->Circle_model->circ($slug);
            $data['title'] = strtolower($data['circ']->slug);

            if(empty($data['circ'])):
                return redirect('404');
            endif;

            $this->form_validation->set_rules('water','water','trim|required');
            $this->form_validation->set_rules('earth1', 'earth 1','required|trim');
            $this->form_validation->set_rules('earth2', 'earth 2','required|trim');
            $this->form_validation->set_rules('wind1', 'wind 1','required|trim');
            $this->form_validation->set_rules('wind2', 'wind 2','required|trim');
            $this->form_validation->set_rules('wind3', 'wind 3','required|trim');
            $this->form_validation->set_rules('wind4', 'wind 4','required|trim');

            if($this->form_validation->run() == FALSE):
                $data["list"] = $this->input->get("referred");
                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar',$data);
                $data['circles'] = $this->Circle_model->circles();
                $data['member'] = $this->Member_model->members();

                $this->load->view('backend/circle/edit',$data);

                $this->load->view('templates/footer',$data);
            else:
                $id=$this->input->post('id');
                $water=$this->input->post('water');
                $earth1=$this->input->post('earth1');
                $earth2=$this->input->post('earth2');
                $wind1=$this->input->post('wind1');
                $wind2=$this->input->post('wind2');
                $wind3=$this->input->post('wind3');
                $wind4=$this->input->post('wind4');
                $slug = $this->generate_slug($this->input->post('water')." ".rand());

                $this->db->set('water',$water);
                $this->db->set('earth1',$earth1);
                $this->db->set('earth2',$earth2);
                $this->db->set('wind1',$wind1);
                $this->db->set('wind2',$wind2);
                $this->db->set('wind3',$wind3);
                $this->db->set('wind4',$wind4);
                $this->db->where('circle_id',$id);

                $this->db->update("circles");
                $this->session->set_flashdata('message','<div class="alert alert-success role=" alert">
                    The circle has been updated.</div>');
                return redirect('circles');
            endif;
        }
        public function complete($slug){
            $data['user'] = $this->db->get_where('admins',['email'=>
            $this->session->userdata('email')])->row_array();

            $data['circle'] = $this->Circle_model->circle($slug);
            $data['circ'] = $this->Circle_model->circ($slug);

            if(empty($data['circ'])):
                return redirect('404');
            endif;

            if(empty($data['circle']->wind1) || empty($data['circle']->wind2) ||
            empty($data['circle']->wind3) || empty($data['circle']->wind4)):
                $this->session->set_flashdata('message','<div class="alert alert-danger role=" alert">
            	A wind appears to be empty.Fill out all the winds before completing the circle.</div>');
                return redirect('circles');
            endif;

            $id=$this->input->post('id');
            $water=$this->input->post('water');
            $this->db->set('water',$water);
            $this->db->set('close_date',date("Y-m-d H:i:s"));
            $this->db->where('circle_id',$id);
            
            $this->db->update("circles");  

            $data1 = array(
                'water' => $this->input->post('water1'),
                'earth1' => $this->input->post('earth1'),
                'earth2' => $this->input->post('earth2'),
                'close_date'=>'0000-00-00',
                'slug' => $this->generate_slug($this->input->post('water1')+" "+rand()),
            );
            $this->db->set($data1);
            $this->Circle_model->save($data1);

            $data2 = array(
                'water' => $this->input->post('water2'),
                'earth1' => $this->input->post('earth3'),
                'earth2' => $this->input->post('earth4'),
                'close_date'=>'0000-00-00',
                'slug' => $this->generate_slug($this->input->post('water2')+" "+rand()),
            );
            $this->db->set($data2);
            $this->Circle_model->save($data2);

            $this->session->set_flashdata('message','<div class="alert alert-success role=" alert">
            	New circles have been created.</div>');
            return redirect('circles');
        }
        public function delete($id){
            $data = $this->Circle_model->circle($id);
            if($this->Circle_model->delete($id)):
            $this->session->set_flashdata('message','<div class="alert alert-success role=" alert">
                The circle has been deleted.</div>');
            return redirect('circles');
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
