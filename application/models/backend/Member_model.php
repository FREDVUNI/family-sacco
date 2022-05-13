<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member_model extends CI_Model
{
    public function members($id = FALSE){
        if ($id  === FALSE) :
            $query  = $this->db->get('members');
            return $query->result_array();
        endif;
        $query =  $this->db->get_where('members', array('members.id' => $id));
        return $query->row_array();
    }
    public function save(array $data){
        $insert = $this->db->insert("members");
        return $insert?$this->db->insert_id():FALSE;
    }
    public function member($slug){
        $this->db->from('members');
        $this->db->where('slug', $slug);
        $result = $this->db->get('');

        if ($result->num_rows() > 0) {
            return $result->row();
        }
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('members', array('id' => $id));
        return TRUE;
    }
    //count the number of members in the table members
    public function countmembers(){
        $this->db->from('members');
        return $count = $this->db->count_all_results();
    }
}
