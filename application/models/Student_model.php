<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        //  //check auth
        // if(is_admin() or is_author()){
		  
        // }else{
		// 	redirect('login');
		// }
			
    }

    public function teacher_sub()
    {  
 		$this->db->select('*');
		$this->db->from('users');
		$this->db->where("role","teacher");
		$this->db->where("status","1");
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
    }

    public function user_detail($id){
    	$this->db->select('*');
		$this->db->from('users');
		$this->db->where("id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
    }
	
	public function basic_detail($id){
    	$this->db->select('*');
		$this->db->from('user_detail');
		$this->db->where("user_id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}
	
	public function lesson_add($data)
    {
        $this->db->insert('lesson', $data);
        return TRUE;
	}
    
	public function refer_frnd($data)
    {
		$id = $this->session->userdata('id');
        $refer = $this->db->insert('refer_student', $data);
      	if($refer){
			$last_id = $this->db->insert_id();
            $config = Array(
                'protocol' => 'mail',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'info@mylanguage.pro',
                'smtp_pass' => 'james786$',
                'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
            );
            $this->load->library('email');
            $this->email->initialize($config);
           $this->email->from('info@mylanguage.pro', 'My Language Pro');
           $this->email->to($data['referred_email']); 
           $this->email->subject('Refer to MyLanguagePro');
           $this->email->message('Your friend refer you to register to this link'.'  '. base_url('Auth/student_register/'.base64_encode(base64_encode($last_id))));  
		  return $this->email->send();
	   }
	   else{
			return false;
	   }
	}

	public function refer_detail($id){
    	$this->db->select('*');
		$this->db->from('refer_student');
		$this->db->where("referrer_id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}
	
	public function lesson_detail($id){
    	$this->db->select('*');
		$this->db->from('lesson');
		$this->db->where_not_in('lesson_type','2');
		$this->db->where("user_id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}

	public function trial_lesson($id){
    	$this->db->select('*');
		$this->db->from('lesson');
		$this->db->where('lesson_type','2');
		$this->db->where("user_id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}
	
	public function lesson_price($lesson_id){
	    $this->db->select('*');
		$this->db->from('lesson');
		$this->db->where('lesson_id',$lesson_id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}

	public function lesson_delete($id)
    {
            $this->db->where('lesson_id', $id);
            return $this->db->delete('lesson');
	}
	
	public function single_lesson_info($id){
		$this->db->select('*');
		$this->db->from('lesson');
		$this->db->where("lesson_id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}

	public function edit_single_les($id, $data){	
		$this->db->where('lesson_id', $id);
        return $this->db->update('lesson', $data);
	}

	public function available($id){
    	$this->db->select('*');
		$this->db->from('teacher_available');
		$this->db->where("user_id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}

	public function update_availibity_info($id, $data){
		$this->db->where('user_id', $id);
        return $this->db->update('teacher_available', $data);
	} 

	public function add_availbility($data){
		$this->db->insert('teacher_availibilty', $data);
        return TRUE;
	}
	
	public function check_availbility( $data ){
	    $id         = $data['teacher_id'];
	    $start_time = $data['start_time'];
	    $end_time   = $data['end_time'];
	    $day        = $data['day'];	    
	    $this->db->select('*');
		$this->db->from('teacher_availibilty');
		$this->db->where("teacher_id",$id);
		$this->db->where("start_time",$start_time);
		$this->db->where("end_time",$end_time);
		$this->db->where("day",$day);
		
   		$query = $this->db->get();
 		$r = $query->result_array();
 		return $counter = count( $r );
        
	}
	
	public function get_availbility( $id ){
	    $this->db->select('*');
		$this->db->from('teacher_availibilty');
		$this->db->where("teacher_id",$id);
	//	$this->db->order_by("id",'desc');		
   		$query = $this->db->get();
 		$r = $query->result_array();
        return $r; 
	}

	public function teacher_intro($data){
		$this->db->insert('teacher_inf', $data);
        return TRUE;
	}

	public function insert_st_contact($data){
		$this->db->insert('student_contact', $data);
        return TRUE;
	}


	public function teacher_detail($id){
		$this->db->select('*');
		$this->db->from('teacher_inf');
		$this->db->where("user_id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}

	public function teacher_intro_update($id, $data){
		$this->db->where('user_id', $id);
		$data = $this->db->update('teacher_inf', $data);
	}

	public function teacher_edu_info($id){
		$this->db->select('*');
		$this->db->from('teacher_education');
		$this->db->where("user_id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}

	public function teacher_cert_info($id){
		$this->db->select('*');
		$this->db->from('teacher_certificate');
		$this->db->where("user_id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}
	public function teacher_work_info($id){
		$this->db->select('*');
		$this->db->from('teacher_work');
		$this->db->where("user_id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}
	public function teacher_education($data){
		$this->db->insert('teacher_education', $data);
        return TRUE;
	}

	public function add_work($data){
		$this->db->insert('teacher_work', $data);
        return TRUE;
	}

	public function add_certificate($data){
		$this->db->insert('teacher_certificate', $data);
        return TRUE;
	}

	public function teacher_work_update($id, $data){
		$this->db->where('teach_id', $id);
        return $this->db->update('teacher_education', $data);
	}

	public function status_certificate_model($data){
		$this->db->insert('teacher', $data);
        return TRUE;
	}

	public function teacher_status($id){
		$this->db->select('*');
		$this->db->from('teacher');
		$this->db->where("user_id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}

	public function teacher_edu_delete($id)
    {
            $this->db->where('teach_id', $id);
            return $this->db->delete('teacher_education');
	}

	public function teacher_work_delete($id)
    {
            $this->db->where('id', $id);
            return $this->db->delete('teacher_work');
	}

	public function teacher_certi_delete($id)
    {
            $this->db->where('id', $id);
            return $this->db->delete('teacher_certificate');
	}


	public function certificate_tech_coun($id){
		$this->db->select('count(*)');
		$this->db->from('teacher_certificate');
		$this->db->where("user_id",$id);
		$query = $this->db->get();
		return $query->num_rows();
	}

	function lesson_avg($id){
	$query = $this->db->select('AVG(lesson_price) as average_score')->from('lesson')->where("user_id",$id)->where_not_in('lesson_id','1')->get();
	return $query->row()->average_score;
	}

	public function student_info($data){
	    $data['learning3'] = '0';
		$this->db->insert('student_detail', $data);
        return TRUE;
	}

	public function sdetail($id){
		$this->db->select('*');
		$this->db->from('student_detail');
		$this->db->where("user_id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}

	public function edit_user_detail($id, $data){
		$this->db->where('user_id', $id);
        return $this->db->update('student_detail', $data);
	}	

	public function add_book($data){
		$this->db->insert('book',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	public function events($id){
		$this->db->select('*');
		$this->db->from('events');
		$this->db->where("user_id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}

	public function update_book($book_id,$data){
		$this->db->where('booking_id', $book_id);
        return $this->db->update('book', $data);
	}

	public function book_lesson($id){
		$this->db->select('users.avatar,book.*,lesson.language_taught,lesson.lesson_time');
		$this->db->from('book');
		$this->db->join('users', 'users.id = book.teacher_id');
		$this->db->join('lesson', 'lesson.lesson_id = book.lesson_id');
// 		$this->db->join('events', 'events.id = book.event_id');
		$this->db->where("book.student_id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}

	public function book_teacher($id){
		$this->db->select('student_detail.comm_tool,student_detail.comm_id,users.avatar,users.username,book.*,lesson.language_taught,lesson.lesson_id,lesson.category,lesson.title,lesson.lesson_time');
		$this->db->from('book');
		$this->db->join('users', 'users.id = book.student_id');
		$this->db->join('student_detail', 'student_detail.user_id = book.student_id');
		$this->db->join('lesson', 'lesson.lesson_id = book.lesson_id');
		$this->db->where("book.teacher_id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}

	public function book_student($id){
		$this->db->select('users.avatar,users.username,book.*,events.start,events.from_time,lesson.language_taught,lesson.lesson_id,lesson.category,lesson.title,lesson.lesson_time');
		$this->db->from('book');
		$this->db->join('users', 'users.id = book.teacher_id');
		$this->db->join('teacher_inf', 'teacher_inf.user_id = book.teacher_id');
		$this->db->join('lesson', 'lesson.lesson_id = book.lesson_id');
		$this->db->join('events', 'events.id = book.event_id');
		$this->db->where("book.student_id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}

	public function get_student($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('book', 'book.student_id = users.id');
		$this->db->where("book.teacher_id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}

	public function get_lesson($id)
	{
		$this->db->select('*');
		$this->db->from('lesson');
		$this->db->join('book', 'book.lesson_id = lesson.lesson_id');
		$this->db->where("book.booking_id",$id);
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}

	public function get_teacher($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('book', 'book.teacher_id = users.id');
		$this->db->where("book.student_id",$id);
		$this->db->group_by("book.student_id");
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}

	public function get_teacher_profile($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('book', 'book.teacher_id = users.id');
		$this->db->where("book.student_id",$id);
		$this->db->group_by("book.student_id");
		$this->db->limit('4');
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}

	public function teacher_search(){
		$this->db->select('users.*,teacher_inf.*,AVG(lesson_price) as avg,COUNT(lesson_id) as count');
		$this->db->from('users');
		$this->db->join('teacher_inf', 'teacher_inf.user_id = users.id');
		$this->db->join('lesson', 'lesson.user_id = users.id');
		$this->db->where("users.role","teacher");
		
		$this->db->group_by("users.id");
   		$query = $this->db->get();
		//     echo $this->db->last_query();
		//    die();
 		$r=$query->result_array();
		return $r;
	}
	public function teacher_search_by_lang($lang){
		$this->db->select('users.*,teacher_inf.*,AVG(lesson_price) as avg,COUNT(lesson_id) as count');
		$this->db->from('users');
		$this->db->join('teacher_inf', 'teacher_inf.user_id = users.id');
		$this->db->join('lesson', 'lesson.user_id = users.id');
		$this->db->where("users.role","teacher");
		$this->db->where("teacher_inf.native_lang",$lang);
		//$this->db->group_by("users.id");

   		$query = $this->db->get();
		//    echo $this->db->last_query();
		//    die();
 		$r=$query->result_array();
		return $r;
	}

	public function get_lesson_update($book_id,$pay,$new){
		$data = array(     
            'payment_status' => '1',
            'book_status'=> '1',
			'amount' => $pay,
			'payment_time' =>now(),
		);	
		$this->db->where('booking_id', $book_id);
        return $this->db->update('book', $data);
	}

	public function student_transaction($id){
		$this->db->select('*');
		$this->db->from('book');
		$this->db->where("student_id",$id);
		$this->db->where("payment_status",'1');
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}

	public function teacher_transaction($id){
		$this->db->select('*');
		$this->db->from('book');
		$this->db->where("teacher_id",$id);
		$this->db->where("payment_status",'1');
   		$query = $this->db->get();
 		$r=$query->result_array();
		return $r;
	}
	public function sum_transaction($id){
		$query = $this->db->select_sum('amount', 'Amount');
		$query = $this->db->where("teacher_id",$id);
		$query = $this->db->where("payment_status",'1');
		$query = $this->db->get('book');
		$result = $query->result();
		return $result[0]->Amount;
	}

	 //ban user
	 public function ban_user($id)
	 {
		$data = array(
			'block' => '0',
		);
		$this->db->where('student_id', $id);
		return $this->db->update('booking_student', $data);
	 }
 
	 //remove user ban
	 public function remove_user_ban($id)
	 {
		$data = array(
			'block' => '1',
		);
		$this->db->where('student_id', $id);
		$new =  $this->db->update('booking_student', $data);
	 }
	 public function delete_slot($id){
	    $this->db->where('id', $id);
        return $this->db->delete('teacher_availibilty');
	 }
}
