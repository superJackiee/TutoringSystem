<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('bcrypt');
        $this->load->library('email');
    }
    /**
     * Login
     */
    public function login()
    {
        //check if logged in
        if (auth_check()) {
            redirect(base_url());
        }

        $page = $this->page_model->get_page("login");

        //check if page exists
        if (empty($page)) {
            redirect(base_url());
        }

        $data['title'] = get_page_title($page);
        $data['description'] = get_page_description($page);
        $data['keywords'] = get_page_keywords($page);

        $this->load->view('partials/_header', $data);
        $this->load->view('auth/login');
        $this->load->view('partials/_footer');
    }


    /**
     * Login Post
     */
    public function login_post()
    {
        //check if logged in
        if (auth_check()) {
            redirect(base_url());
        }

        //validate inputs
        $this->form_validation->set_rules('email', trans("form_email"), 'required|xss_clean|max_length[100]');
        $this->form_validation->set_rules('password', trans("form_password"), 'required|xss_clean|max_length[30]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->auth_model->input_values());
            redirect($this->agent->referrer());
        } else {

            $result = $this->auth_model->login();

            if ($result == "banned") {
                //user banned
                $this->session->set_flashdata('form_data', $this->auth_model->input_values());
                $this->session->set_flashdata('error', trans("message_ban_error"));
                redirect($this->agent->referrer());
            } elseif ($result == "success") {
                //logged in
                redirect(base_url());
            } else {
                //error
                $this->session->set_flashdata('form_data', $this->auth_model->input_values());
                $this->session->set_flashdata('error', trans("login_error"));
                redirect($this->agent->referrer());
            }

        }
    }


    /**
     * Login Ajax Post
     */
    public function login_ajax_post()
    {
        $this->reset_flash_data();

        //validate inputs
        $this->form_validation->set_rules('email', trans("form_email"), 'required|xss_clean|max_length[100]');
        $this->form_validation->set_rules('password', trans("form_password"), 'required|xss_clean|max_length[30]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->auth_model->input_values());
            $this->load->view('partials/_messages');
        } else {
            $result = $this->auth_model->login();
            if ($result == "banned") {
                //user banned
                $this->session->set_flashdata('error', trans("message_ban_error"));
                $this->load->view('partials/_messages');
                $this->reset_flash_data();
            
            }else if ($result == "Unactive") {
                //user banned
                $this->session->set_flashdata('error', trans("message_active_error"));
                // $this->load->view('partials/_messages');
                // $this->reset_flash_data();
                redirect(base_url());
            }
            
            elseif ($result == "success") {
                //logged in
                if(user()->role == "student"){
                redirect(base_url('student'));
                }
                else if(user()->role == "teacher"){
                    redirect(base_url('teacher'));
                    }
                else{
                    redirect(base_url('dashboard')); 
                }
            } else {
                //error
                $this->session->set_flashdata('error', 'Invalid email and Password');  
                redirect(base_url());  
            }
        }
    }


    /**
     * Login with Facebook
     */
    public function login_with_facebook()
    {
        //check if logged in
        if (auth_check()) {
            redirect(base_url());
        }

        // Check if user is logged in
        if ($this->facebook->is_authenticated()) {
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,picture');

            $this->auth_model->login_with_facebook($userProfile);
        }


        redirect($this->agent->referrer());
    }


    /**
     * Login with Google
     */
    // public function login_with_google()
    // {
    //     //check if logged in
    //     if (auth_check()) {
    //         redirect(base_url());
    //     }

    //     $code = $this->input->get('code');

    //     if (!empty($code)) {
    //         $this->googleplus->getAuthenticate();
    //         $this->auth_model->login_with_google($this->googleplus->getUserInfo());
    //     }

    //     redirect($this->agent->referrer());
    // }


    /**
     * Register
     */
    public function register()
    {
        //check if logged in
        if (auth_check()) {
            redirect(base_url());
        }

        $page = $this->page_model->get_page("register");

        //check if page exists
        if (empty($page)) {
            redirect(base_url());
        }

        $data['title'] = get_page_title($page);
        $data['description'] = get_page_description($page);
        $data['keywords'] = get_page_keywords($page);

        $this->load->view('partials/_header', $data);
        $this->load->view('auth/register');
        $this->load->view('partials/_footer');
    }

    public function teacher_acknowlegment()
    {
        //check if logged in
        if (auth_check()) {
            redirect(base_url());
        }

        $page = $this->page_model->get_page("Acknowledgment");

        $data['title'] = get_page_title($page);
        $data['description'] = get_page_description($page);
        $data['keywords'] = get_page_keywords($page);

        $this->load->view('partials/_header', $data);
        $this->load->view('auth/application');
        $this->load->view('partials/_footer');
    }


    public function teacher_certificate()
    {
        $page = $this->page_model->get_page("Certificate");

        $data['title'] = get_page_title($page);
        $data['description'] = get_page_description($page);
        $data['keywords'] = get_page_keywords($page);

        $this->load->view('partials/_header', $data);
        $this->load->view('teacher/certificate_process');
        $this->load->view('partials/_footer');
    }

    public function teacher_application()
    {
        $page = $this->page_model->get_page("Application");

        $data['title'] = get_page_title($page);
        $data['description'] = get_page_description($page);
        $data['keywords'] = get_page_keywords($page);

        $this->load->view('partials/_header', $data);
        $this->load->view('teacher/applicattion_process');
        $this->load->view('partials/_footer');
    }

    public function teacher_process()
    {
        $page = $this->page_model->get_page("register");
        $data['title'] = get_page_title($page);
        $data['description'] = get_page_description($page);
        $data['keywords'] = get_page_keywords($page);

        $this->load->view('partials/_header', $data);
        $this->load->view('auth/become_teacher');
        $this->load->view('partials/_footer');
    }

    public function teacher_vedio()
    {
        $page = $this->page_model->get_page("Video Process");

        $data['title'] = get_page_title($page);
        $data['description'] = get_page_description($page);
        $data['keywords'] = get_page_keywords($page);

        $this->load->view('partials/_header', $data);
        $this->load->view('teacher/video_process');
        $this->load->view('partials/_footer');
    }

    public function student_register()
    {
        //check if logged in
        if (auth_check()) {
            redirect(base_url());
        }
        $data['refer_id'] = $this->uri->segment(3);
        $page = $this->page_model->get_page("Student register");
        $data['title'] = get_page_title($page);
        $data['description'] = get_page_description($page);
        $data['keywords'] = get_page_keywords($page);
        $this->load->view('partials/_header', $data);
        $this->load->view('auth/student_register',$data);
        $this->load->view('partials/_footer');
    }

    public function teacher_register()
    {
        //check if logged in
        if (auth_check()) {
            redirect(base_url());
        }

        $page = $this->page_model->get_page("register");

        $data['title'] = get_page_title($page);
        $data['description'] = get_page_description($page);
        $data['keywords'] = get_page_keywords($page);

        $this->load->view('partials/_header', $data);
        $this->load->view('auth/teacher_register.php');
        $this->load->view('partials/_footer');
    }

    public function become_teacher()
    {
        //check if logged in
        if (auth_check()) {
            redirect(base_url());
        }

        $page = $this->page_model->get_page("register");

        $data['title'] = get_page_title($page);
        $data['description'] = get_page_description($page);
        $data['keywords'] = get_page_keywords($page);

        $this->load->view('partials/_header', $data);
        $this->load->view('auth/become_teacher.php');
        $this->load->view('partials/_footer');
    }

    /**
     * Register Post
     */
    public function register_post()
    {
        $refer = $this->input->post('refer_id', true);  
        $this->reset_flash_data();
        $this->form_validation->set_rules('email', trans("form_email"), 'required|xss_clean|max_length[200]|is_unique[users.email]');
        $this->form_validation->set_rules('password', trans("form_password"), 'required|xss_clean|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('confirm_password', trans("form_confirm_password"), 'required|xss_clean|matches[password]');
		$_POST['role']='student';
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->auth_model->input_values());
            redirect($this->agent->referrer());
        } else {
            //register
            $user = $this->auth_model->register();
            $email = $user[0]->email;
            // var_dump($user[0]->email);
            // die();
                // here auth_model->register() returns email so $user = email
            if ($user) {
                $refer_id = base64_decode(base64_decode($refer));
               
                $this->db->where('refer_id', $refer_id);
                $this->db->update('refer_student', array('status'=>'1'));
                $subject = 'Registration successfull';
                // $body = "you have been successfully";
                $body = $this->load->view('emailtmp','',true);
                // var_dump($user);
                // die();
                // $headers = $this->email->set_header('Content-type', 'text/plain');
                // $headers = $this->email->set_header('From', 'My Language Pro');
                $result = $this->email
                ->from('support@mylanguage.pro','My Language Pro')
                ->to($email)
                ->reply_to('support@mylanguage.pro', 'My Language Pro')
                // ->set_header('Date', 'Thu, 9 Jul 2020')
                ->subject($subject)
                ->message($body)
                ->set_header('X-Priority', '1')
                ->set_header('X-SpamCatcher-Score', '0')
                ->set_header('X-MSMail-Priority', 'High/n')
                ->set_header('Importance', 'High/n')
                ->set_header('content-type', 'text/html')
                ->send();
                // var_dump($result) ;
                // die();
                $this->session->set_flashdata('registersuccess', 'Register Successfully'); 
                // redirect($this->agent->referrer());
                
                
                $this->auth_model->login_direct($user[0]);
                redirect(base_url('student'));
            } else {
                //error
                $this->session->set_flashdata('form_data', $this->auth_model->input_values());
                $this->session->set_flashdata('error', trans("message_register_error"));
                redirect($this->agent->referrer());
            }
        }
    }

    /**
     * basic_info
     */
    public function basic_info()
    {
        $user_id =$this->input->post('user_id', true);
        $id = $this->auth_model->user_exit($user_id);
        if(empty($id)){
        $data = array(
            'user_id' =>  $user_id,
            'from_add' => $this->input->post('from_add', true),
            'live_add' => $this->input->post('live_add', true),
            'live_state' => $this->input->post('live_state', true),
            'from_state' => $this->input->post('from_state', true),
            'time_zone' => $this->input->post('time_zone', true),
        );	
            $user = $this->auth_model->baseic_inf($data);
        }
            if($user) {
                redirect($this->agent->referrer());
            } else {
                //error
                $this->session->set_flashdata('error', trans("message_user_error"));
                redirect($this->agent->referrer());
            }
    }
    public function update_basic(){
            $id = $this->input->post('user_id', true);
            $data = array(     
                'from_add' => $this->input->post('from_add', true),
                'live_add' => $this->input->post('live_add', true),
                'live_state' => $this->input->post('live_state', true),
                'from_state' => $this->input->post('from_state', true),
                'time_zone' => $this->input->post('time_zone', true),
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
    
    /**
     * basic_info
     */
    public function update_avtar()
    {
        if (!auth_check()) {
            redirect('login');
        }
            $id = $this->input->post('user_id');
            $user = $this->auth_model->update_avtar($id);
            if($user) {
                redirect($this->agent->referrer());
            } else {
                //error
                $this->session->set_flashdata('error', trans("message_user_error"));
                redirect($this->agent->referrer());
            }
    }

	/**
     * Teacher Register Post
     */
    public function teacher_register_post()
    {
        $this->reset_flash_data();

        //validate inputs
        $this->form_validation->set_rules('email', trans("form_email"), 'required|xss_clean|max_length[200]|is_unique[users.email]');
        $this->form_validation->set_rules('password', trans("form_password"), 'required|xss_clean|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('confirm_password', trans("form_confirm_password"), 'required|xss_clean|matches[password]');
		$_POST['role'] = 'teacher';

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->auth_model->input_values());            
            redirect($this->agent->referrer());
            
        } else {
            //register teacher
            $user = $this->auth_model->register();
            $email = $user[0]->email;
            $subject = 'Registration successfull';
                // $body = "you have been successfully";
                $body = $this->load->view('emailtmp','',true);
                // var_dump($user[0]);
                // die();
                // $headers = $this->email->set_header('Content-type', 'text/plain');
                // $headers = $this->email->set_header('From', 'My Language Pro');
                $result = $this->email
                               ->from('support@mylanguage.pro','My Tutoring Pro')
                               ->to($email)
                // ->addCustomHeader('Content-type', 'text/plain')
                               ->reply_to('support@mylanguage.pro', 'My Tutoring Pro')
                            // ->set_header('Date', 'Thu, 9 Jul 2020')
                               ->subject($subject)
                               ->message($body)
                               ->set_header('X-Priority', '1')
                               ->set_header('X-SpamCatcher-Score', '0')
                               ->set_header('X-MSMail-Priority', 'High/n')
                               ->set_header('Importance', 'High/n')
                               ->set_header('content-type', 'text/html')
                               ->send();
            if ($user) {
                // if($this->agent->referrer()){
                // redirect($this->agent->referrer());
                // }
                $this->session->set_flashdata('success', trans("Register Successfully!"));
                // var_dump($user[0]);
                $this->auth_model->login_direct($user[0]);
                redirect(base_url('teacher/console?id='.user()->id));
                // redirect(base_url('student'));
            } else {
                //error
                $this->session->set_flashdata('form_data', $this->auth_model->input_values());
                $this->session->set_flashdata('error', trans("message_registeer"));               
            }
        }
    }


    /**
     * Users
     */
    public function users()
    {
        //check if admin
        if (is_admin() == false) {
            redirect('login');
        }

        $data['title'] = 'Users';
        $data['users'] = $this->auth_model->get_users();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('auth/users', $data);
        $this->load->view('admin/includes/_footer');
    }



     /**
     * teacher
     */
    public function teacher()
    {
        //check if admin
        if (is_admin() == false) {
            redirect('login');
        }

        $data['title'] = 'teacher';
        $data['users'] = $this->auth_model->get_teacher();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('auth/users', $data);
        $this->load->view('admin/includes/_footer');
    }

     /**
     * student
     */
    public function student()
    {
        //check if admin
        // if (is_admin() == false) {
        //     redirect('login');
        // }

        $data['title'] = 'student';
        $data['users'] = $this->auth_model->get_adminstudent();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('auth/users', $data);
        $this->load->view('admin/includes/_footer');
    }
    /**
     * Logout
     */
    public function logout()
    {
        $this->auth_model->logout();
        //redirect($this->agent->referrer());
        redirect(base_url());
    }


    /**
     * Update Profile
     */
    public function update_profile()
    {
        //check if logged in
        if (!auth_check()) {
            redirect('login');
        }

        $page = $this->page_model->get_page("update-profile");
        //check if page exists
        if (empty($page)) {
            redirect(base_url());
        }
        $data['title'] = get_page_title($page);
        $data['description'] = get_page_description($page);
        $data['keywords'] = get_page_keywords($page);
        $data["user"] = user();

        $this->load->view('partials/_header', $data);
        $this->load->view('auth/update_profile');
        $this->load->view('partials/_footer');
    }


    /**
     * Update Profile Post
     */
    public function update_profile_post()
    {
        //check if logged in
        if (!auth_check()) {
            redirect('login');
        }

        $this->form_validation->set_rules('email', trans("form_email"), 'required|xss_clean|max_length[200]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        } else {
            $email = $this->input->post('email', true);
            //is email unique
            if (!$this->auth_model->is_unique_email($email, user()->id)) {
                $this->session->set_flashdata('error', trans("message_email_unique_error"));
                redirect($this->agent->referrer());
            }
            if ($this->auth_model->update_user(user()->id)) {
                $this->session->set_flashdata('success', trans("message_profile_success"));
            }
            redirect($this->agent->referrer());
        }
    }


    /**
     * Change Password
     */
    public function change_password()
    {
        //check if logged in
        if (!auth_check()) {
            redirect('login');
        }

        $page = $this->page_model->get_page("change-password");
        //check if page exists
        if (empty($page)) {
            redirect(base_url());
        }
        $data['title'] = get_page_title($page);
        $data['description'] = get_page_description($page);
        $data['keywords'] = get_page_keywords($page);

        $data["user"] = user();

        $this->load->view('partials/_header', $data);
        $this->load->view('auth/change_password');
        $this->load->view('partials/_footer');
    }


    /**
     * Change Password Post
     */
    public function change_password_post()
    {
        //check if logged in
        if (!auth_check()) {
            redirect('login');
        }

        $old_password_empty = $this->input->post('old_password_empty', true);

        if ($old_password_empty == 1) {
            $this->form_validation->set_rules('old_password', html_escape(trans("form_old_password")), 'required|xss_clean|max_length[50]');
        }

        $this->form_validation->set_rules('password', html_escape(trans("form_password")), 'required|xss_clean|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('password_confirmation', html_escape(trans("form_confirm_password")), 'required|xss_clean|max_length[50]|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->auth_model->change_password_input_values());
            redirect($this->agent->referrer());
        } else {
            if ($this->auth_model->change_password($old_password_empty)) {
                $this->session->set_flashdata('success', html_escape(trans("message_change_password_success")));
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', html_escape(trans("message_change_password_error")));
                redirect($this->agent->referrer());
            }
        }
    }

    /**
     * Reset Password
     */
    public function reset_password()
    {
        //check if logged in
        if (auth_check()) {
            redirect('login');
        }

        $page = $this->page_model->get_page("reset-password");
        //check if page exists
        if (empty($page)) {
            redirect(base_url());
        }
        $data['title'] = get_page_title($page);
        $data['description'] = get_page_description($page);
        $data['keywords'] = get_page_keywords($page);

        $this->load->view('partials/_header', $data);
        $this->load->view('auth/reset_password');
        $this->load->view('partials/_footer');
    }


    /**
     * Reset Password Post
     */
    public function reset_password_post()
    {
        $this->reset_flash_data();

        $email = $this->input->post('email', true);

        //get user
        $user = $this->auth_model->get_user_by_email($email);


        //if user not exists
        if (empty($user)) {
            $this->session->set_flashdata('error', html_escape(trans("reset_password_error")));
            redirect($this->agent->referrer());
        } else {
            //generate new password
            $new_password = $this->auth_model->reset_password($email);

            $subject = "Password Reset";
            $message = trans("email_reset_password") . " <strong>" . $new_password . "</strong>";
             $this->load->library('email');
            $config['protocol']    = 'smtp';
            $config['smtp_host']    = 'ssl://smtp.gmail.com';
            $config['smtp_port']    = '465';
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = 'manormacc@gmail.com';
            $config['smtp_pass']    = '1234@admin.com';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'text'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not      
            $this->email->initialize($config);
            $this->email->from('manormacc@gmail.com', 'My Language Pro');
            $this->email->to($email); 
            $this->email->subject($subject);
            $this->email->message($message.'  '. base_url());  
            $email = $this->email->send();
            if ($email){
            //if ($this->email_model->send_email('manormak3090@gmail.com', , $message)) {
                $this->session->set_flashdata('success', html_escape(trans("reset_password_success")));
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Change User Role
     */
    public function change_user_role_post()
    {
        //check if admin
        if (is_admin() == false) {
            redirect('login');
        }

        $id = $this->input->post('user_id', true);
        $role = $this->input->post('role', true);

        $user = $this->auth_model->get_user($id);

        //check if exists
        if (empty($user)) {
            redirect($this->agent->referrer());
        } else {
            if ($this->auth_model->change_user_role($id, $role)) {
                $this->session->set_flashdata('success', "User role successfully changed!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', "There was a problem changing the user role!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * User Options Post
     */
    public function user_options_post()
    {
        //check if admin
        // if (is_admin() == false) {
        //     redirect('login');
        // }

        $option = $this->input->post('option', true);
        $id = $this->input->post('id', true);
        $logged_id = user()->id;

        //if option delete
        if ($option == 'delete') {
            if ($this->auth_model->delete_user($id)) {
                $this->session->set_flashdata('success', "User successfully deleted!");

                if ($id == $logged_id) {
                    redirect("logout");
                } else {
                    redirect($this->agent->referrer());
                }

            } else {
                $this->session->set_flashdata('error', "There was a problem deleting the user!");
                redirect($this->agent->referrer());
            }
        }

        //if option delete
        if ($option == 'active') {
            if ($this->auth_model->active_user($id)) {
                $this->session->set_flashdata('success', "User successfully Active!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', "There was a problem banning the user!");
                redirect($this->agent->referrer());
            }
        }

        //if option ban
        if ($option == 'ban') {
            if ($this->auth_model->ban_user($id)) {
                $this->session->set_flashdata('success', "User successfully banned!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', "There was a problem banning the user!");
                redirect($this->agent->referrer());
            }
        }

        //if option remove ban
        if ($option == 'remove_ban') {
            if ($this->auth_model->remove_user_ban($id)) {
                $this->session->set_flashdata('success', "User ban successfully removed!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', "There was a problem removing user ban!");
                redirect($this->agent->referrer());
            }
        }

        //if option live
        if ($option == 'live') {
            if ($this->auth_model->live_user($id)) {
                $this->session->set_flashdata('success', "User successfully Live!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', "There was a problem Live the user!");
                redirect($this->agent->referrer());
            }
        }

        //if option remove ban
        if ($option == 'not_live') {
            if ($this->auth_model->remove_user_live($id)) {
                $this->session->set_flashdata('success', "User successfully removed From Live!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', "There was a problem removing user Live!");
                redirect($this->agent->referrer());
            }
        }


    }


    public function reset_flash_data()
    {
        $this->session->set_flashdata('errors', "");
        $this->session->set_flashdata('error', "");
        $this->session->set_flashdata('success', "");
    }

}
