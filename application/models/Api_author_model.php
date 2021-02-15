<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_author_model extends CI_Model {
	
	 public function __construct(){

        parent::__construct();

        $this->load->library('bcrypt');

    }
	
	//get user data DESC

    public function get_user($id){
		
		$this->db->where('users.id',$id);
        $query = $this->db->get('users');
        $data_result = $query->row();

		 return $data_result;
    }
	
	//email by get data 
	  public function get_user_by_email($email){

        $query = $this->db->get_where('users', array('email' => $email));

        return $query->row();

    }
}
?>