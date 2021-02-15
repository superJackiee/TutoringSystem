<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Student_model');
        $this->load->model('Calendar_model');
        if(is_admin() or is_author()){
		  
        }else{
			redirect('login');
		}
			
    }
    /**
     * Index Page
     */
    public function index()
    {
        $data['title'] = "dashboard";
        $data['mode'] = "teacher";
        $data['teacher_sub'] = $this->Student_model->teacher_sub();
        $id = $this->session->userdata('id');
        $data['user_detail'] = $this->Student_model->user_detail($id);
        $data['post_count'] = count($this->post_model->get_posts_backend());
        $data['pending_post_count'] = count($this->post_model->get_pending_posts());
        $data['video_count'] = count($this->video_model->get_videos_backend());
        $data['book_teacher'] = $this->Student_model->book_teacher($id);
        $data['pending_video_count'] = count($this->video_model->get_pending_videos());
        $data['sum_transaction'] = $this->Student_model->sum_transaction($id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('teacher/index', $data);
        $this->load->view('admin/includes/_footer');
    }
    public function user(){
        $data['mode'] = "teacher";
        $data['title'] = "User";
        $id = $this->input->get('id');
        $data['user_detail'] = $this->Student_model->user_detail($id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('teacher/user');
        $this->load->view('admin/includes/_footer');
    }

    public function student()
    {
        $data['mode'] = "teacher";
        $data['title'] = 'student';
        $id = $this->session->userdata('id');
        $data['users'] = $this->auth_model->get_student($id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('auth/users', $data);
        $this->load->view('admin/includes/_footer');
    }

    public function calender(){
        $data['mode'] = "teacher";
        $data['title'] = "My Schedule";
        $id = $this->input->get('id');
        $data['user_detail'] = $this->Student_model->user_detail($id);
        $data2['availbility'] = $this->Student_model->get_availbility($id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('teacher/calender', $data2);
        $this->load->view('admin/includes/_footer');
    }

    public function profile(){
        $data['mode'] = "teacher";
        $data['title'] = "profile";
        $id = $this->input->get('id');
        $data['user_detail'] = $this->Student_model->user_detail($id);
        $data['teacher_detail'] = $this->Student_model->teacher_detail($id);
        $data['basic_detail'] = $this->Student_model->basic_detail($id);
        $data['lesson']  = $this->Student_model->lesson_detail($id);
        $data['education'] = $this->Student_model->teacher_edu_info($id);
        $data['certificate'] = $this->Student_model->certificate_tech_coun($id);
        $data['work'] = $this->Student_model->teacher_work_info($id);
        $data['average_score'] = $this->Student_model->lesson_avg($id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('teacher/profile');
        $this->load->view('admin/includes/_footer');
    }

    public function console(){
        $data['mode'] = "teacher";
        $data['title'] = "Teacher Detail";
        $id = $this->input->get('id');  
        $data['mode'] = "teacher";      
        $data['user_detail'] = $this->Student_model->user_detail($id);
        $data['basic_detail'] = $this->Student_model->basic_detail($id);
        $data['country']  = $this->auth_model->country();
        $data['lesson']  = $this->Student_model->lesson_detail($id);
        $data['trial_lesson']  = $this->Student_model->trial_lesson($id);
        $data['available'] = $this->Student_model->available($id);
        $data['teacher_detail'] = $this->Student_model->teacher_detail($id);
        $data['teacher_education'] = $this->Student_model->teacher_edu_info($id);
        $data['teacher_certificate'] = $this->Student_model->teacher_cert_info($id);
        $data['teacher_work'] = $this->Student_model->teacher_work_info($id);
        $data['teacher_status'] = $this->Student_model->teacher_status($id);
        $data['calander']= $this->Calendar_model->getEvents($id);        
        $data['availbility'] = $this->Student_model->get_availbility($id);        
        $data['id'] = $this->auth_model->user_exit($id);
        $this->load->view('admin/includes/_header',$data);
        $this->load->view('teacher/console',$data);
        $this->load->view('admin/includes/_footer');
        $this->load->view('teacher/_teacher_model');
    }

    public function lessons(){
        $data['mode'] = "teacher";
        $data['title'] = "Lessons";
        $id = $this->session->userdata('id');
        $data['book_teacher'] = $this->Student_model->book_teacher($id);
        $this->load->view('admin/includes/_header',$data);
        $this->load->view('teacher/Lessons/lessons',$data);
        $this->load->view('admin/includes/_footer');
    }

    public function accept_book(){
        $id = $this->input->get('id', true);
        $data = array(     
            'book_status' => '1',
        );	
        $user = $this->Student_model->update_book($id, $data);
        if($user) {
            redirect($this->agent->referrer());
        } else {
            //error
            $this->session->set_flashdata('error', trans("message_user_error"));
            redirect($this->agent->referrer());
        }
    }

    public function decline_book(){
        $id = $this->input->get('id', true);
        $data = array(     
            'book_status' => '0',
        );	
            $user = $this->Student_model->update_book($id, $data);
            if($user) {
                redirect($this->agent->referrer());
            } else {
                //error
                $this->session->set_flashdata('error', trans("message_user_error"));
                redirect($this->agent->referrer());
            }
    }

    public function Wallet(){
        $data['title'] = "Wallet";
        $id = $this->session->userdata('id');
        $data['user_detail'] = $this->Student_model->user_detail($id);
        $data['student_transaction'] = $this->Student_model->student_transaction($id);
        $data['teacher_transaction'] = $this->Student_model->teacher_transaction($id);
        $data['sum_transaction'] = $this->Student_model->sum_transaction($id);
        $data['mode'] = "teacher";
        $this->load->view('admin/includes/_header',$data);
        $this->load->view('teacher/Wallet');
        $this->load->view('admin/includes/_footer');
    }

    public function account(){
        $data['title'] = "Account";
        $id = $this->session->userdata('id');
        $data['user_detail'] = $this->Student_model->user_detail($id);
        $data['mode'] = "teacher";
        $this->load->view('admin/includes/_header',$data);
        $this->load->view('teacher/account');
        $this->load->view('admin/includes/_footer');
    }

    public function private_info(){
        $id = $this->input->post('user_id', true);
        $gender = $this->input->post('gender', true);
        if($gender){
        $this->db->where('id', $id);
        $this->db->update('users',array('gender' => $gender));
        }
        $data = array(     
            'first_name' => $this->input->post('first_name', true),
            'last_name' => $this->input->post('last_name', true),
            'birth_day' => $this->input->post('birth_day', true),
            'birth_month' => $this->input->post('birth_month', true),
            'birth_year' => $this->input->post('birth_year', true),
            'street_add' => $this->input->post('street_add', true),
        );	
            $user = $this->auth_model->update_user_Det($id, $data);
            if($user) {
                redirect($this->agent->referrer());
            } else {
                //error
                $this->session->set_flashdata('error', trans("message_user_error"));
                redirect($this->agent->referrer());
            }
    }

    public function comm_info(){
        $id = $this->input->post('user_id', true);
        $data = array(     
            'Communication_tool' => $this->input->post('Communication_tool', true),
            'Communication_id' => $this->input->post('Communication_id', true),
        );	
            $user = $this->auth_model->update_user_Det($id, $data);
            if($user) {
                redirect($this->agent->referrer());
            } else {
                //error
                $this->session->set_flashdata('error', trans("message_user_error"));
                redirect($this->agent->referrer());
            }

    }

    public function lesson_add(){
        if(isset($_POST['lesson_type'])){
            $data = array(     
                'title' => 'Trial Lesson',
                'description' => $this->input->post('description', true),
                'lesson_time' => '30',
                'lesson_price' => $this->input->post('lesson_price', true),
                'user_id' => $this->input->post('user_id', true),
                'lesson_type' => $this->input->post('lesson_type', true),
            );
        }
        else{
            $data = array(     
                'title' => $this->input->post('title', true),
                'description' => $this->input->post('description', true),
                'language_taught' => $this->input->post('language_taught', true),
                'st_level_to' => $this->input->post('st_level_to', true),
                'category' => $this->input->post('category', true),
                'lesson' => $this->input->post('lesson', true),
                //'lesson_time' => $this->input->post('lesson_time', true),
                'lesson_price' => $this->input->post('lesson_price', true),
                'lesson_package' => $this->input->post('lesson_package', true),
                'total_price' => $this->input->post('total_price', true),
                'status' => $this->input->post('status', true),
                'st_level_from' => $this->input->post('st_level_from', true),
                'user_id' => $this->input->post('user_id', true),
            );
        }
        $user = $this->Student_model->lesson_add($data);
        if($user) {
            redirect($this->agent->referrer());
        } else {
            //error
            $this->session->set_flashdata('error', trans("message_user_error"));
            redirect($this->agent->referrer());
        }
    }

    public function lesson_delete(){
        $id = $this->input->get('id', true);
        $user = $this->Student_model->lesson_delete($id);
        if($user) {
            redirect($this->agent->referrer());
        } else {
            //error
            $this->session->set_flashdata('error', trans("message_user_error"));
            redirect($this->agent->referrer());
        }
    }

    public function lesson_edit()
    {
        $data['title'] = "Edit Lesson";
        $id = $this->uri->segment(3);
        $data['single_ldata'] = $this->Student_model->single_lesson_info($id);   
        $data['mode'] = "teacher";  
        $this->load->view('admin/includes/_header',$data);
        $this->load->view('teacher/Edit-lesson',$data);
        $this->load->view('admin/includes/_footer');
    }

    public function lesson_update()
    {
        $lessonid = $this->input->post('lesson_id', true);
        $data = array(     
            'title' => $this->input->post('title', true),
            'description' => $this->input->post('description', true),
            'language_taught' => $this->input->post('language_taught', true),
            'st_level_to' => $this->input->post('st_level_to', true),
            'category' => $this->input->post('category', true),
            'lesson' => $this->input->post('lesson', true),
            // 'ind_grp' => $this->input->post('ind_grp', true),
            'lesson_price' => $this->input->post('lesson_price', true),
            'lesson_package' => $this->input->post('lesson_package', true),
            'total_price' => $this->input->post('total_price', true),
            'status' => $this->input->post('status', true),
            'st_level_from' => $this->input->post('st_level_from', true),
        );
        $this->Student_model->edit_single_les($lessonid,$data);
        redirect($this->agent->referrer());
    }

    public function availibity_info(){
        $id = $this->input->post('user_id', true);
        $data = array(     
            'sess_req' => $this->input->post('sess_req', true),
            'instant_booking' => $this->input->post('instant_booking', true),
            'auto_acc_book' => $this->input->post('auto_acc_book', true),
            'user_id' => $id ,
            
        );	
        $user = $this->Student_model->update_availibity_info($id, $data);
        if($user) {
            redirect($this->agent->referrer());
        } else {
            //error
            $this->session->set_flashdata('error', trans("message_user_error"));
            redirect($this->agent->referrer());
        }
    }

    public function add_availbility(){
        $id = $this->input->post('user_id', true);
        $data = array(     
            'sess_req' => $this->input->post('sess_req', true),
            'instant_booking' => $this->input->post('instant_booking', true),
            'auto_acc_book' => $this->input->post('auto_acc_book', true),
            'user_id' => $id ,
            
        );	
        $user = $this->Student_model->add_availbility($data);
        if($user) {
            redirect($this->agent->referrer());
        } else {
            //error
            $this->session->set_flashdata('error', trans("message_user_error"));
            redirect($this->agent->referrer());
        }
    }
    public function calener()
    {
        $data['result'] = $this->db->get("events")->result();
        foreach ($data['result'] as $key => $value) {
            $data['data'][$key]['title'] = $value->title;
            $data['data'][$key]['start'] = $value->start_date;
            $data['data'][$key]['end'] = $value->end_date;
            $data['data'][$key]['backgroundColor'] = "#00a65a";
        }   
        $this->load->view('my_calendar', $data);
    }
   
    public function teacher_intro(){
        $id = $this->input->post('user_id', true);
        $data = array(     
            'about' => $this->input->post('about', true),
            'teacher_info' => $this->input->post('teacher_info', true),
            'teaching_style' => $this->input->post('teaching_style', true),
            'user_id' => $id,        
        );	
            $user = $this->Student_model->teacher_intro($data);
            if($user) {
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', trans("message_user_error"));
                redirect($this->agent->referrer());
            }
    }

    public function teacher_intro_update()
    {
        $id = $this->input->post('user_id', true);
        $data = array(     
            'about' => $this->input->post('about', true),
            'teacher_info' => $this->input->post('teacher_info', true),
            'teaching_style' => $this->input->post('teaching_style', true),            
        );	
            $user = $this->Student_model->teacher_intro_update($id, $data);
            if($user) {
                redirect($this->agent->referrer());
            } else {
                //error
                $this->session->set_flashdata('error', "There was a problem while adding the Form!");
                redirect($this->agent->referrer());
            }
    }

    public function teacher_contact(){
        $id = $this->input->post('user_id', true);
        $data = array(     
            'teacher_reason' => $this->input->post('teacher_reason'),
            'teachingplan' => $this->input->post('teachingplan'),
            'lesson_length' => $this->input->post('lesson_length'),
            'specific_area' => $this->input->post('specific_area'),
            'language_prof' => $this->input->post('language_prof'),
            'teacher_material' => $this->input->post('teacher_material'),
            'time_prefer' => $this->input->post('time_prefer'),
            'fsq' => $this->input->post('fsq'),    
            );	
            $user = $this->Student_model->teacher_intro_update($id, $data);
            if($user){
                redirect($this->agent->referrer());
            }else{
                $this->session->set_flashdata('error',"First add Introduction section!");
                redirect($this->agent->referrer());
            }
    }

    public function teacher_video(){
        
        $id = $this->input->post('user_id', true);
        $video_file = $_FILES['vedio'];       
        //$vedio = $this->upload_model->video_upload($file);
        $upload_path = './uploads/video';
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'wmv|mp4|avi|mov';
        $config['max_size'] = 0;
        $config['max_filename'] = 255;
        $config['encrypt_name'] = false;
        $video_data = array();
        $is_file_error = FALSE;
        $error = "";
        if (!$video_file) {
            $is_file_error = TRUE;
            $error = 'Select a video file.';
            $this->session->set_flashdata('error',$error);
        }
        if (!$is_file_error) {
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('vedio')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error',$error);
                $is_file_error = TRUE;
            } else {
                $video_data = $this->upload->data();
            }
        }
        if ($is_file_error) {
            if ($video_data) {
                $file = $upload_path . $video_data['file_name'];
                if (file_exists($file)) {
                    unlink($file);
                }
            }
        } else {
            $data['video_name'] = $video_data['file_name'];
            $data['video_path'] = $upload_path;
            $data['video_type'] = $video_data['file_type'];
        }
        var_dump($data['video_name'] );
        die();
        $data = array(     
            'vedio' => $vedio,
        );	
        $user = $this->Student_model->teacher_intro_update($id, $data);
        if($user) {
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', trans("message_user_error"));
            redirect($this->agent->referrer());
        }
    }

    public function teacher_language(){
        $id = $this->input->post('user_id', true);
        $data = array(     
            'speak_language' => $this->input->post('speak_language', true),
            'speak_level' => $this->input->post('speak_level', true),
            'speak_lang_le' => $this->input->post('speak_lang_le', true)?1:0,
            'speak_lang_pri' => $this->input->post('speak_lang_pri', true)?1:0,
            'native_lang' => $this->input->post('native_lang', true),
            'optional_language' => $this->input->post('optional_language',true),
            'optional_lang_speak_level' => $this->input->post('optional_lang_speak_level',true),
            'optional_lang_le' => $this->input->post('optional_lang_le',true)?1:0,
        );
        $is_new = $this->input->post('is_new', true);
        if ($is_new == 1){
            $data['user_id'] = $id;
            $user = $this->Student_model->teacher_intro($data);
        }
        else {
            $user = $this->Student_model->teacher_intro_update($id, $data);
        }       
        if($user) {
            redirect($this->agent->referrer());
        } 
        else {
            $this->session->set_flashdata('error', trans("message_user_error"));
            redirect($this->agent->referrer());
        }
    }

    public function add_education(){
        $id = $this->input->post('user_id', true);
        $file = $_FILES['diploma_upload'];
        $edu_upload = $this->upload_model->diploma_upload($file);
        $data = array(     
            'institute' => $this->input->post('institute', true),
            'topic' => $this->input->post('topic', true),
            'from_institute' => $this->input->post('from_institute', true),
            'to_institute' => $this->input->post('to_institute', true),
            'degree' => $this->input->post('degree', true),  
            'Edu_description' => $this->input->post('Edu_description', true),  
            'diploma_upload' => $edu_upload,  
            'user_id' => $id,  
        );	
        $user = $this->Student_model->teacher_education($data);
        if($user) {
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', trans("message_user_error"));
            redirect($this->agent->referrer());
        }
    }

    public function add_work(){
        $id = $this->input->post('user_id', true);
        $data = array(     
            'from_work' => $this->input->post('from_work', true),
            'to_work' => $this->input->post('to_work', true),
            'company' => $this->input->post('company', true),
            'position' => $this->input->post('position', true),
            'country_work' => $this->input->post('country_work', true),
            'city_work' => $this->input->post('city_work', true),  
            'work_description' => $this->input->post('work_description', true),  
            'user_id' => $id,
        );	
            $user = $this->Student_model->add_work($data);
            if($user) {
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', trans("message_user_error"));
                redirect($this->agent->referrer());
            }
    }

    public function add_certificate(){
        $id = $this->input->post('user_id', true);
        $file = $_FILES['certificate_upload'];
        $edu_upload = $this->upload_model->diploma_upload($file);
        $data = array(     
            'from_cerftificate' => $this->input->post('from_cerftificate', true),
            'certificate' => $this->input->post('certificate', true),
            'inst_certificate' => $this->input->post('inst_certificate', true),  
            'desc_work_' => $this->input->post('desc_work_', true),  
            'certificate_upload' => $edu_upload,  
            'user_id' => $id,
        );	
        $user = $this->Student_model->add_certificate($data);
        if($user) {
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', trans("message_user_error"));
            redirect($this->agent->referrer());
        }
    }

    public function status_certificate(){
        $id = $this->input->post('user_id', true);
        $data = array(     
            'status' => $this->input->post('status', true),
            'user_id' =>$id,
        );	
            $user = $this->Student_model->status_certificate_model($data);
            if($user) {
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', trans("message_user_error"));
                redirect($this->agent->referrer());
            }
    }

    public function teacher_edu_delete(){
        $id = $this->input->get('id', true);
        $user = $this->Student_model->teacher_edu_delete($id);
        if($user) {
            redirect($this->agent->referrer());
        } else {
            //error
            $this->session->set_flashdata('error', trans("message_user_error"));
            redirect($this->agent->referrer());
        }
    }

    public function teacher_work_delete(){
        $id = $this->input->get('id', true);
        $user = $this->Student_model->teacher_work_delete($id);
        if($user) {
            redirect($this->agent->referrer());
        } else {
            //error
            $this->session->set_flashdata('error', trans("message_user_error"));
            redirect($this->agent->referrer());
        }
    }
    public function teacher_availibilty(){
        $data = array(     
            'teacher_id'  => $this->input->post('id'),
            'day'         => $this->input->post('day'),
            'start_time'  => $this->input->post('s_time'),
            'end_time'    => $this->input->post('e_time'),
            'date_day'    => $this->input->post('date_day'),
            'day_name'    => $this->input->post('day_name'),
        );
        
         
		// $this->db->where('teacher_id',$this->input->post('id')); 
		// $this->db->set('day',$this->input->post('day'));
		// $this->db->set('start_time',$this->input->post('start_time'));
		// $this->db->set('end_time',$this->input->post('end_time'));
		// $this->db->set('date_day',$this->input->post('date_day'));
		// $this->db->set('day_name',$this->input->post('day_name'));
		// $this->db->update('teacher_availibilty');
        if($this->input->post('date_day') == 0){
            $this->db->where('teacher_id', $this->input->post('id'));
            $this->db->where('day', $this->input->post('day'));
            $this->db->where('day_name', $this->input->post('day_name'));
	
            $this->db->delete('teacher_availibilty');
        }
        // if($this->input->post('date_day') == 1){
        //     $this->db->where('teacher_id', $this->input->post('id'));
        //     $this->db->where('day', $this->input->post('day'));
        //     $this->db->where('day_name', $this->input->post('day_name'));
        //     $this->db->delete('teacher_availibilty');
        // }
        $check_availbility = $this->Student_model->check_availbility($data);
		  //echo $check_availbility;die;
        if( $check_availbility == 0){
            $user = $this->Student_model->add_availbility($data);    
            $data = 200;
            echo json_encode( $data );        
        } else{
            $data = 400;
            echo json_encode($data);
        }
    }
    public function delete_slot(){
        $id = $this->input->post('id');
        $delete_slot = $this->Student_model->delete_slot($id);
        if( $delete_slot ){
            $data = 200;
            echo json_encode( $data );   
        }
    }
    public function teacher_certi_delete(){
        $id = $this->input->get('id', true);
        $user = $this->Student_model->teacher_certi_delete($id);
        if($user) {
            redirect($this->agent->referrer());
        } else {
            //error
            $this->session->set_flashdata('error', trans("message_user_error"));
            redirect($this->agent->referrer());
        }
    }
    public function ban_student(){
        $option = $this->input->post('option', true);
        $id = $this->input->post('id', true);
        $logged_id = user()->id;
        if ($option == 'ban') {
            if ($this->Student_model->ban_user($id)) {
                echo   $this->session->set_flashdata('success', "User successfully banned!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', "There was a problem banning the user!");
                redirect($this->agent->referrer());
            }
        }

        //if option remove ban
        if ($option == 'remove_ban') {
            if ($this->Student_model->remove_user_ban($id)) {
               echo  $this->session->set_flashdata('success', "User ban successfully removed!");
                redirect($this->agent->referrer());
            } else {
                echo  $this->session->set_flashdata('error', "There was a problem removing user ban!");
                redirect($this->agent->referrer());
            }
        }
    }
    
    public function Withdraw()
    {
        $data['title'] = 'Withdraw';
        $id = $this->session->userdata('id');
        $data['user_detail'] = $this->Student_model->user_detail($id);
        $data['sum_transaction'] = $this->Student_model->sum_transaction($id);
        $data['mode'] = "teacher";
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('teacher/Withrawl', $data);
        $this->load->view('admin/includes/_footer');
    }

    public function confirm_withdraw()
    {        
        $data['title'] = 'Withdraw';
        $data['mode'] = "teacher";
        $id = $this->session->userdata('id');
        $data['user_detail'] = $this->Student_model->user_detail($id);
        $data['sum_transaction'] = $this->Student_model->sum_transaction($id);        
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('teacher/Withrawl', $data);
        $this->load->view('admin/includes/_footer');
    }


   
}
