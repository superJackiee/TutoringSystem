<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
            parent::__construct();
             // Your own constructor code
     } 

     private $User = 'users';

    public function teachersList($id) 
	{  
		$this->db->select('users.id,users.username,users.avatar');
		$this->db->from('users');
		$this->db->join('booking_student','booking_student.teacher_id = users.id');
		$this->db->where("booking_student.student_id",$id);
		$this->db->where("booking_student.block","1");
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
   	}

	public function studentsList($id) 
	{  
		$this->db->select('users.id,users.username,users.avatar');
		$this->db->from('users');
		$this->db->join('booking_student','booking_student.student_id = users.id');
		$this->db->where("booking_student.teacher_id",$id);
		$this->db->where("booking_student.block","1");
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
    }

    public function PictureUrlById($id)
	{  
 		$this->db->select('id,avatar');
		$this->db->from($this->User);
		$this->db->where("id",$id);
		$this->db->limit(1);
  		$query = $this->db->get();
		$res = $query->row_array();
		if(!empty($res['avatar'])){
			return base_url($res['avatar']);
		}else{
			return base_url('uploads/profile/avatar_1522144273.png');
        }
    }

    public function PictureUrl()
	{  
 		$this->db->select('id,avatar');
		$this->db->from($this->User);
		$this->db->where("id",$this->session->userdata('id'));
		$this->db->limit(1);
  		$query = $this->db->get();
		$res = $query->row_array();
		if(!empty($res['avatar'])){
			return base_url($res['avatar']);
		}else{
			return base_url('uploads/profile/avatar_1522144273.png');
        }
   	}

    public function GetUserData()
	{  
 		$this->db->select('id,username,email,phone');
		$this->db->from($this->User);
		$this->db->where("id",$this->session->userdata('id'));
		$this->db->limit(1);
  		$query = $this->db->get();
 		if ($query) {
			 return $query->row_array();
		 } else {
			 return false;
		 }
	}

	public function GetName($id)
	{  
 		$this->db->select('id,username');
		$this->db->from($this->User);
		$this->db->where("id",$id);
		$this->db->limit(1);
  		$query = $this->db->get();
		$res = $query->row_array();
 		return $res['username'];
   	}
	
       

}