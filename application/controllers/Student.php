<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Student_model');
        $this->load->model('Auth_model');
		$this->load->library('session');
		$this->load->helper('file');
    }
    
    // currency converting function for student view
    public function native_currency($country){
        if( $country == '' ){
            $country = 'United States';
        }
        $string = read_file('https://restcountries.eu/rest/v2/name/'.$country);
        $string = json_decode( $string );
        $currencies = $string[0]->currencies;
        $currencies = $currencies[0];
        $data['currencySymbol'] = $currencies->symbol;;
        $string = read_file('https://restcountries.eu/rest/v2/name/Pakistan');
        $studentCurrency = read_file('https://free.currconv.com/api/v7/convert?q=USD_'.$currencies->code.'&compact=ultra&apiKey=42af8904c81dd07008f4');
        $currencyRate = preg_split("/[:}]+/", $studentCurrency);
        $data['currencyRate'] = $currencyRate[1];
        return $data;
    }
    /**
     * Index Page
     */
    public function index()
    {
        if(is_author()) {
		  
        } else{
			redirect('login');
        }
        $data['mode'] = "student";
        $data['title'] = "dashboard";
        $id = $this->session->userdata('id');
        $data['post_count'] = count($this->post_model->get_posts_backend());
        $data['pending_post_count'] = count($this->post_model->get_pending_posts());
        $data['video_count'] = count($this->video_model->get_videos_backend());
        $data['pending_video_count'] = count($this->video_model->get_pending_videos());
        $data['teacher_sub'] = $this->Student_model->get_teacher($id);
        if ($data['teacher_sub']) {
            $data['user_detail'] = $this->Student_model->user_detail($data['teacher_sub'][0]['id']);
            $data['teacher_detail'] = $this->Student_model->teacher_detail($data['teacher_sub'][0]['id']);
        }
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('student/index', $data);
        $this->load->view('admin/includes/_footer');
    }
    public function teacher_detail()
    {
        $data['mode'] = "student";
        $data['title'] = "Book";
        $id = $this->input->get('id');
        $sid = $this->session->userdata('id');
        $data['user_detail'] = $this->Student_model->user_detail($id);
        $data['teacher_detail'] = $this->Student_model->teacher_detail($id);
        $data['basic_detail'] = $this->Student_model->basic_detail($id);
        $data['lesson']  = $this->Student_model->lesson_detail($id);
        $studentDetail = $this->Student_model->sdetail($sid);
        $data['availbility'] = $this->Student_model->get_availbility($id);
        if(isset($studentDetail[0]['live_country'])) {
            $data['studentCountry'] = $studentDetail[0]['live_country'];
        } else {
            $data['studentCountry'] = ""; 
        }
        $US = 'United States';
        if ($data['studentCountry'] !== $US) {
           $data['studentCurrency'] = $this->native_currency($data['studentCountry']);
        }
        $data['education'] = $this->Student_model->teacher_edu_info($id);
        $data['certificate'] = $this->Student_model->certificate_tech_coun($id);
        $data['work'] = $this->Student_model->teacher_work_info($id);
        $data['average_score'] = $this->Student_model->lesson_avg($id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('student/teacher_book', $data);
        $this->load->view('admin/includes/_footer'); 
    }
    public function profile(){
        $data['mode'] = "student";
        $data['title'] = "profile";
        $id = $this->session->userdata('id');
        $data['user_detail'] = $this->Student_model->user_detail($id);
        $data['sdetail'] = $this->Student_model->sdetail($id);
        if( $data['sdetail'] == null ){
            $data['not_found'] = true;
        }else{
            $data['not_found'] = false;
            $data['languages'] = unserialize($data['sdetail'][0]['speak_lang']);
        }
        $data['teacher_sub'] = $this->Student_model->get_teacher_profile($id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('student/profile',$data);
        $this->load->view('admin/includes/_footer');
    }

    public function lesson(){
        $data['mode'] = "student";
        $data['title'] = "lesson";
        $id = $this->session->userdata('id');        
        $data['user_detail'] = $this->Student_model->user_detail($id);
        $data['lesson'] = $this->Student_model->book_lesson($id);
        // $data['teacher_img'] = $this->Student_model->teacher_img($id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('student/lesson');
        $this->load->view('admin/includes/_footer');
    }
    public function teacher_fav(){
        $data['title'] = "Teacher";
        $id = $this->session->userdata('id');
        // echo $id;
        // exit();
        $data['teacher_sub'] = $this->Student_model->get_teacher($id);
        if(!empty($data['teacher_sub'])){
            $data['user_detail'] = $this->Student_model->user_detail($data['teacher_sub'][0]['id']);
            $data['teacher_detail'] = $this->Student_model->teacher_detail($data['teacher_sub'][0]['id']);
            $data['lesson']  = $this->Student_model->lesson_detail($data['teacher_sub'][0]['id']);
            $data['lesson_avg']  = $this->Student_model->lesson_avg($data['teacher_sub'][0]['id']);
        }
        $data['mode'] = "student";
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('student/teacher',$data);
        $this->load->view('admin/includes/_footer');
    }

    public function referral(){
        $data['mode'] = "student";
        $data['title'] = "Referral";
        $id = $this->session->userdata('id');
        $data['value'] = $this->Student_model->refer_detail($id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('student/referral',$data);
        $this->load->view('admin/includes/_footer');
    }

    public function refer_frnd(){
        $id = $this->session->userdata('id');
        $value = $this->Student_model->refer_detail($id);
        $email = $this->input->post('referred_email', true);
        if($value){
        if($value[0]['referred_email']  != $email){
            $data = array(
                'referred_email' => $email,
                'referrer_id' => $id,
            );	
           
            $refer = $this->Student_model->refer_frnd($data);
            if($refer){
                print "<script type=\"text/javascript\">alert('You refer your friend Successfully!');
                window.location.href='referral';</script>";
            } else {
                //error
                $this->session->set_flashdata('error', html_escape(trans("refer_frnd_error")));
                redirect($this->agent->referrer());
            } 
        }
        else{
          //  $new = $this->session->set_flashdata('error', trans("prev_refer_frnd"));
           // var_dump($value[0]['referred_email']  != $email  ,$new);
           print "<script type=\"text/javascript\">alert('You already refer to this email');
           window.location.href='referral';</script>";
        }
        }  
        else
        {
            $data = array(
                'referred_email' => $email,
                'referrer_id' => $id,
            );	
            $refer = $this->Student_model->refer_frnd($data);
            if($refer){
                $this->session->set_flashdata('error', trans("refer_frnd"));
                redirect($this->agent->referrer());
            } else {
                //error
                $this->session->set_flashdata('error', trans("refer_frnd_error"));
                redirect($this->agent->referrer());
            }
        } 
    }

    public function Buy(){
        $data['mode'] = "student";
        $data['title'] = "Buy Credit";
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('student/payment',$data);
        $this->load->view('admin/includes/_footer');
    }

    
    public function teacher_search()
    {
        $data['mode'] = "student";
        $data['title'] = "Search";
        $data['teacher_sub'] = $this->Student_model->teacher_search();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('student/teacher_search', $data);
        $this->load->view('admin/includes/_footer'); 
    }
     public function teacher_search_by_lang()
    {
	//	$lang= 
        //echo $_GET['lang'];die();
        $data['mode'] = "student";
		$lang= $_GET['lang'];
        $data['title'] = "Search";
        $data['teacher_sub'] = $this->Student_model->teacher_search_by_lang($lang);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('student/teacher_search', $data);
        $this->load->view('admin/includes/_footer'); 
    }

    public function edit_profile(){
        $data['mode'] = "student";
        $data['title'] = "profile";
        $id = $this->input->get('id');
        $data['language_list'] = $this->auth_model->languages();
        $data['country']  = $this->auth_model->country();
        $data['user_detail'] = $this->Student_model->user_detail($id);
        $data['sdetail'] = $this->Student_model->sdetail($id);
        if( $data['sdetail'] == null ){
            $data['not_found'] = true;
        }else{
            $data['not_found'] = false;
            $data['languages'] = unserialize($data['sdetail'][0]['speak_lang']);
        }
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('student/edit_profile', $data);
        $this->load->view('admin/includes/_footer');
    }

    public function add_user_detail(){
        $id= $this->input->post('user_id', true);
        $this->Auth_model->update_avtar_student($id);
        // serialize input post array of language
        $string = serialize( $this->input->post('speak_lang', true) );
        $data = array(
            'user_id' =>  $id,
            'birth_year' => $this->input->post('birth_year', true),
            'birth_month' => $this->input->post('birth_month', true),
            'birth_day' => $this->input->post('birth_day', true),
            'from_country' => $this->input->post('from_country', true),
            'live_country' => $this->input->post('live_country', true),
            'live_state' => $this->input->post('live_state', true),
            'time_zone' => $this->input->post('time_zone', true),
            'native_lang' => $this->input->post('native_lang', true),
            'speak_lang' => $string,
            'speak_lang3' => $this->input->post('speak_lang3', true),
            'speak_lang_level3' => $this->input->post('speak_lang_level3', true),
            'learning3' => $this->input->post('learning3', true),
            'primary3' => $this->input->post('primary3', true),
            'comm_tool' => $this->input->post('comm_tool', true),
            'comm_id' => $this->input->post('comm_id', true),
            'intro' => $this->input->post('intro', true),
        );	
        $user = $this->Student_model->student_info($data);
        $this->Auth_model->update_avtar($id);
        if($user) {
            redirect($this->agent->referrer());
        } else {
            //error
            $this->session->set_flashdata('error', trans("User Registration is not Added"));
            redirect($this->agent->referrer());
        }
    }
    public function complete_course(){
        $booking_id = $this->input->post("booking_id");
        $this->db->where("booking_id", $booking_id);
		$this->db->update('book', "book_status", "1");    
        
        $this->session->set_flashdata('success', 'Thanks for your response!');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function edit_user_detail()
    {
        $id= $this->input->post('user_id', true);
        $this->Auth_model->update_avtar_student($id);
        // serialize input post array of language
        $string = serialize( $this->input->post('speak_lang', true) );
        $data = array(
            'user_id' =>  $this->input->post('user_id', true),
            'birth_year' => $this->input->post('birth_year', true),
            'birth_month' => $this->input->post('birth_month', true),
            'birth_day' => $this->input->post('birth_day', true),
            'from_country' => $this->input->post('from_country', true),
            'live_country' => $this->input->post('live_country', true),
            'live_state' => $this->input->post('live_state', true),
            'time_zone' => $this->input->post('time_zone', true),
            'native_lang' => $this->input->post('native_lang', true),
            'speak_lang' => $string,
            'speak_lang_level' => $this->input->post('speak_lang_level', true),
            'learning' => $this->input->post('learning', true),
            'primary' => $this->input->post('primary', true),
            'comm_tool' => $this->input->post('comm_tool', true),
            'comm_id' => $this->input->post('comm_id', true),
            'intro' => $this->input->post('intro', true),
        );	
        // $string = serialize( $data['speak_lang'] );
        // $de = unserialize( $string );
        // var_dump($de);
        $user = $this->Student_model->edit_user_detail($id,$data);
        if($user) {
            redirect($this->agent->referrer());
        } else {
            //error
            $this->session->set_flashdata('error', trans("User Registration is not Added"));
            redirect($this->agent->referrer());
        }
    }

    public function book(){
        
        if(is_admin() or is_author()){
		  
        }else{
			redirect('login');
        }
        
        $data['title'] = "Book";
        
        $id = $this->session->userdata('id');
        $teacher_id= $this->input->get('id');
        $data['user_detail'] = $this->Student_model->user_detail($id);
        $data['lesson']  = $this->Student_model->lesson_detail($teacher_id);
        $data['events']  = $this->Student_model->events($teacher_id);
        $data['teacher_id'] = $teacher_id;
        $studentDetail = $this->Student_model->sdetail($id);
        $data['availbility'] = $this->Student_model->get_availbility($teacher_id);
        if( $studentDetail == null ){
            $data['not_found'] = true;
        }else{
            $data['not_found'] = false;
            $data['studentCountry'] = $studentDetail[0]['live_country'];
            $US = 'United States';
            if($data['studentCountry'] !== $US){
               $data['studentCurrency'] = $this->native_currency($data['studentCountry']);
            }        
        }
        $data['mode'] = "student";
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('student/book',$data);
        $this->load->view('admin/includes/_footer');
    }

    public function add_book(){
        $id = $this->session->userdata('id');
        $teacher_id = $this->input->post('teacher_id', true);     
        $lesson_id = $this->input->post('lesson_id', true);
        $local_price =  $this->input->post('price');
        if(!empty($lesson_id)){
        $data = array(
            'teacher_id' => $teacher_id,
            'lesson_id'  => $lesson_id,
            'student_id' =>  $id,
        );
        $user = $this->Student_model->add_book($data);
        $booking = array(
            'teacher_id' => $teacher_id,
            'student_id' =>  $id,
        );
        $this->session->set_userdata('teacher_id',$teacher_id);
        $this->db->insert('booking_student',$booking);
        // redirect(base_url('student/book?id='.$teacher_id.'&page=Book-Now&book_id='.$user.'&lesson_id='.$lesson_id));
        redirect(base_url('student/book?id='.$teacher_id.'&page=Select-Plan&book_id='.$user.'&lesson_id='.$lesson_id.'&local_price='.$local_price));
        }
        else{
            redirect($this->agent->referrer());
        }
    }
    public function update_book(){
        $book_id = $this->input->post('book_id', true);
        $lesson_id = $this->input->post('lesson_id');
        $duration = $this->input->post('duration',true);
        $stripe_data = ['book_id'=>$book_id,'lesson_id'=>$lesson_id,'duration'=>$duration];
        $from_to = $this->input->post('from_to');
        $explode = explode('T', $from_to);
        $date = date('Y-m-d', strtotime($this->input->post('date', true))); ;
        // die();
        $data = array(
            'event_id'  => $this->input->post('eventid', true),
            'date'  => $date,
            'from_time'  => $explode[0],
            'to_time'  => $explode[1],
            'duration' => $this->input->post('duration', true),
        );
        $user = $this->Student_model->update_book($book_id,$data);
        $this->session->set_userdata($stripe_data);
        // var_dump ($this->session->flashdata('lesson_price'));
        $this->session->set_flashdata('success', "Details Added successfully.");
        // redirect($this->agent->referrer());
        redirect('StripeController/index');
    }

    public function student_contact(){
        $data = array(
            'teacher_id' => $this->input->post('teacher_id'),
            'user_id' => $this->input->post('student_id'),
            'teacher_reason' => $this->input->post('teacher_reason'),
            'teachingplan' => $this->input->post('teachingplan'),
            'lesson_length' => $this->input->post('lesson_length'),
            'specific_area' => $this->input->post('specific_area'),
            'language_prof' => $this->input->post('language_prof'),
            'teacher_material' => $this->input->post('teacher_material'),
            'time_prefer' => $this->input->post('time_prefer'),
            'fsq' => $this->input->post('fsq'),   
        );
        $user = $this->Student_model->insert_st_contact($data);
        $this->session->set_flashdata('success', "Details Added successfully.");
        redirect($this->agent->referrer());
    }
}
