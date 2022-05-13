<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Circle_model extends CI_Model
{
    public function circles($id = FALSE){
        if ($id  === FALSE) :
            $query  = $this->db->get('circles');
            return $query->result_array();
        endif;
        $query =  $this->db->get_where('circles', array('circles.circle_id' => $id));
        return $query->row_array();
    }
    public function save(array $data){
        $insert = $this->db->insert("circles");
        return $insert?$this->db->insert_id():FALSE;
    }
    public function circ($slug){
        $this->db->from('circles');
        $this->db->where('circles.slug', $slug);
        $result = $this->db->get('');

        if ($result->num_rows() > 0) {
        return $result->row();
        }
    }
    public function circle($slug){
        $this->db->from('circles');
        $this->db->where('circles.slug', $slug);
        $result = $this->db->get('');

        if ($result->num_rows() > 0) {
            return $result->row();
        }
    }

    public function delete($id){
        $this->db->where('circle_id', $id);
        $this->db->delete('circles', array('circle_id' => $id));
        return TRUE;
    }
    //count the number of circles in the table circles
    public function countcircles(){
        $this->db->from('circles');
        return $count = $this->db->count_all_results();
    }
}
