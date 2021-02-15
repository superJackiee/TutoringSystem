<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Home_model extends CI_Model {
   	public function __construct()
        {
                parent::__construct();
                 // Your own constructor code
         } 

    public function section_one($data){
            $this->db->insert('section', $data);
            return TRUE;
        }

    public function section(){
        $this->db->select('*');
        $this->db->from('section');
      //  $this->db->order_by("id", "ASC");
        $query = $this->db->get();
        $r=$query->result_array();
        return $r;
    }

    public function update_view($id){
        $this->db->select('*');
        $this->db->from('section');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $r=$query->result_array();
        return $r;
    }

    public function edit_section($id, $data){
		$this->db->where('id', $id);
        return $this->db->update('section', $data);
    } 
    
    public function teacher(){
        $this->db->select('*');
        $this->db->from('users');
       $this->db->where("role",'teacher');
        $query = $this->db->get();
        $r=$query->result_array();
        return $r;
    }

    public function total_teacher(){
        $this->db->where('role', 'teacher');
        $num_rows = $this->db->count_all_results('users');
        return $num_rows;
    }

    public function gallery(){
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where("category_id",'3');
        $query = $this->db->get();
        $r=$query->result_array();
        return $r;
    }
    
    //get slider images
     public function slider()
     {
        $this->db->select('*');
        $this->db->from('slider');
        $query = $this->db->get();
        return $query->result();
     }

    public function testimonial($data){
        $this->db->insert('testimonial', $data);
        return TRUE;
    }

    public function view_testimonial(){
        $this->db->select('*');
        $this->db->from('testimonial');
        $query = $this->db->get();
        $r=$query->result_array();
        return $r;
    }

    public function get_testimonial($id){
        $this->db->select('*');
        $this->db->from('testimonial');
        $this->db->where("id",$id);
        $query = $this->db->get();
        $r=$query->result_array();
        return $r;
    }

    public function delete_testimonial($id){
        $this->db->where('id', $id);
        return $this->db->delete('testimonial');
    }

    public function update_testimonial($id, $data){
		$this->db->where('id', $id);
        return $this->db->update('testimonial', $data);
    } 
        
}
