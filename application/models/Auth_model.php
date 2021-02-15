<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'username' => $this->input->post('username', true),
            'gender' => $this->input->post('gender', true),
            // 'phone' => $this->input->post('phone', true),
            'role' => $this->input->post('role', true),
            'email' => $this->input->post('email', true),
            'password' => $this->input->post('password', true)
        );
        return $data;	
    }

    //change password input values
    public function change_password_input_values()
    {
        $data = array(
            'old_password' => $this->input->post('old_password', true),
            'password' => $this->input->post('password', true),
            'password_confirmation' => $this->input->post('password_confirmation', true)
        );
        return $data;
    }

    //login
    public function login()
    {
        
        $data = $this->input_values();
        $user = $this->get_user_by_email($data['email']);

        if (!empty($user)) {

            //password does not match stored password.
            if (!$this->bcrypt->check_password($data['password'], $user->password)) {
                return false;
            }

            if ($user->status == 0) {
                return "banned";
            }

            if ($user->active == 0) {
                return "Unactive";
            }

            //set user data
            $user_data = array(
                'id' => $user->id,
                'username' => $user->username,
                'email' => $user->email,
                'role' => $user->role,
                'logged_in' => true,
                'app_key' => $this->config->item('app_key'),
            );
            
            $this->session->set_userdata($user_data);
            return "success";

        } else {
            return false;
        }

    }

    //login direct
    public function login_direct($user)
    {
        //set user data
        $user_data = array(
            'id' => $user->id,
            'email' => $user->email,
            'role' => $user->role,
            'logged_in' => true,
            'app_key' => $this->config->item('app_key'),
        );

        $this->session->set_userdata($user_data);
    }

    //login with facebook
    public function login_with_facebook($user_info)
    {

        $user = $this->get_user_by_email($user_info['email']);

        //check if user registered
        if (empty($user)) {

            //add user to database
            $data = array(
                'facebook_id' => $user_info['id'],
                'email' => $user_info['email'],
                'username' => $user_info['first_name'] . " " . $user_info['last_name'],
                'slug' => str_slug($user_info['first_name'] . " " . $user_info['last_name'] . "-" . uniqid()),
                'avatar' => $user_info['picture']['data']['url'],
                'user_type' => "facebook",
            );

            $this->db->insert('users', $data);

            $user = $this->get_user_by_email($user_info['email']);

            //login
            $this->login_direct($user);

        } else {

            //login
            $this->login_direct($user);
        }
    }

    //login with google
    public function login_with_google($user_info)
    {
        $user = $this->get_user_by_email($user_info['email']);

        //check if user registered
        if (empty($user)) {

            //add user to database
            $data = array(
                'google_id' => $user_info['id'],
                'email' => $user_info['email'],
                'username' => $user_info['name'],
                'slug' => str_slug($user_info['name'] . "-" . uniqid()),
                'avatar' => $user_info['picture'],
                'user_type' => "google",
            );

            $this->db->insert('users', $data);

            $user = $this->get_user_by_email($user_info['email']);

            //login
            $this->login_direct($user);

        } else {

            //login
            $this->login_direct($user);
        }
    }

    //register
    // public function register()
    // {
    //     $data = $this->auth_model->input_values();
    //     $data['password'] = $this->bcrypt->hash_password($data['password']);
    //     $data['user_type'] = "registered";
    //     $data["slug"] = str_slug($data["username"] . "-" . uniqid());
    //     if($this->db->insert('users', $data)){
    //       $last_id = $this->db->insert_id();
    //         $config = Array(
    //             'protocol' => 'mail',
    //             'smtp_host' => 'ssl://smtp.googlemail.com',
    //             'smtp_port' => 465,
    //             'smtp_user' => 'info@mylanguage.pro',
    //             'smtp_pass' => 'james786$',
    //             'mailtype'  => 'html',
    //         'charset'   => 'iso-8859-1'
    //         );
    //         $this->load->library('email');
    //         $this->email->initialize($config);
    //       $this->email->from('info@mylanguage.pro', 'My Language Pro');
    //       $this->email->to($data['email']); 
    //       $this->email->subject('Registration successfull');
    //       $this->email->message('After Verification from MyLanguagePro you will able to login'.'  '. base_url().' '.'Please check spam if you dont recieve message');  
    //       $this->email->send();
    //         return $this->get_user($last_id);
    //         } else {
    //             return false;
    //         }
    // }
    
    public function register()
    {
        $data = $this->auth_model->input_values();
        $data['password'] = $this->bcrypt->hash_password($data['password']);
        $data['user_type'] = "registered";
        $data["slug"] = str_slug($data["username"] . "-" . uniqid());
        if($this->db->insert('users', $data)){
            $last_id = $this->db->insert_id();
        //  $query = $this->db->get_where('users', array('id' => $last_id));
            $query = $this->db->select('*')->from('users')->where("id",$last_id)->get();
            $get_result = $query->result();
            // $email = $get_result[0]->email;
            return $get_result;            
        } else {
            return false;
        }
    }
    //logout
    public function logout()
    {
        //unset user data
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('app_key');

        //$this->googleplus->revokeToken();
        $this->facebook->destroy_session();
    }

    //update user
    public function update_user($id)
    {
        $user = $this->get_user($id);

        $data = array(
            'username' => $this->input->post('username', true),
        );

        //get file
        $file = $_FILES['file'];
        if (!empty($file['name'])) {

            //delete old
            delete_image_from_server($user->avatar);

            //upload new
            $data["avatar"] = $this->upload_model->avatar_upload($id, $file);
        }

        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    //update author
    public function update_author($id)
    {
        $user = $this->get_user($id);

        $data = array(
            'username' => $this->input->post('username', true),
            'slug' => $this->input->post('slug', true),
            'about_me' => $this->input->post('about_me', true),
            'phone' => $this->input->post('phone', true),
            'role' => $this->input->post('role', true),
            'gender' => $this->input->post('gender', true),
            'facebook_url' => $this->input->post('facebook_url', true),
            'twitter_url' => $this->input->post('twitter_url', true),
            'google_url' => $this->input->post('google_url', true),
            'instagram_url' => $this->input->post('instagram_url', true),
            'pinterest_url' => $this->input->post('pinterest_url', true),
            'linkedin_url' => $this->input->post('linkedin_url', true),
            'vk_url' => $this->input->post('vk_url', true),
            'youtube_url' => $this->input->post('youtube_url', true),
        );

        //get file
        $file = $_FILES['file'];
        if (!empty($file['name'])) {

            //delete old
            delete_image_from_server($user->avatar);

            //upload new
            $data["avatar"] = $this->upload_model->avatar_upload($id, $file);
        }

        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    //change password
    public function change_password($old_password_empty)
    {
        $user = user();

        if (!empty($user)) {

            $data = $this->change_password_input_values();

            if ($old_password_empty == 1) {
                //password does not match stored password.
                if (!$this->bcrypt->check_password($data['old_password'], $user->password)) {
                    $this->session->set_flashdata('error', html_escape(trans("wrong_password_error")));
                    $this->session->set_flashdata('form_data', $this->change_password_input_values());
                    redirect($this->agent->referrer());
                }
            }

            $data = array(
                'password' => $this->bcrypt->hash_password($data['password'])
            );

            $this->db->where('id', $user->id);
            return $this->db->update('users', $data);

        } else {
            return false;
        }
    }

    //reset password
    public function reset_password($email)
    {
        //generate new password
        $new_password = bin2hex(openssl_random_pseudo_bytes(3));

        $data = array(
            'password' => $this->bcrypt->hash_password($new_password)
        );

        //change password
        $this->db->where('email', $email);
        $this->db->update('users', $data);
        return $new_password;
    }

    //change user role
    public function change_user_role($id, $role)
    {
        $data = array(
            'role' => $role
        );

        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    //delete user
    public function delete_user($id)
    {
        $user = $this->get_user($id);

        if (!empty($user)) {
            $this->db->where('id', $id);
            return $this->db->delete('users');
        } else {
            return false;
        }
    }

    //ban user
    public function ban_user($id)
    {
        $user = $this->get_user($id);

        if (!empty($user)) {

            $data = array(
                'status' => 0
            );

            $this->db->where('id', $id);
            return $this->db->update('users', $data);
        } else {
            return false;
        }
    }

    //remove user ban
    public function remove_user_ban($id)
    {
        $user = $this->get_user($id);

        if (!empty($user)) {

            $data = array(
                'status' => 1
            );

            $this->db->where('id', $id);
            return $this->db->update('users', $data);
        } else {
            return false;
        }
    }

     //ban user
     public function live_user($id)
     {
         $user = $this->get_user($id);
 
         if (!empty($user)) {
 
             $data = array(
                 'live' => 0
             );
 
             $this->db->where('id', $id);
             return $this->db->update('users', $data);
         } else {
             return false;
         }
     }
 
     //remove user ban
     public function remove_user_live($id)
     {
         $user = $this->get_user($id);
 
         if (!empty($user)) {
 
             $data = array(
                 'live' => 1
             );
 
             $this->db->where('id', $id);
             return $this->db->update('users', $data);
         } else {
             return false;
         }
     }

     //active user
     public function active_user($id)
     {
         $user = $this->get_user($id);
         if (!empty($user)) {
             $data = array(
                 'active' => 1
             );
             $this->db->where('id', $id);
            $update = $this->db->update('users', $data);
            if($update){
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
             $this->email->to($user->email); 
             $this->email->subject('Your account is Verified by the admin Successfully');
             $this->email->message('You can proceed to Login to the site'.'  '. base_url());  
            return $this->email->send();
            }else
            {
                return false;
            }
         } else {
             return false;
         }
     }

    //is logged in
    public function is_logged_in()
    {
        //check if user logged in
        if ($this->session->userdata('logged_in') == true && $this->session->userdata('app_key') == $this->config->item('app_key')) {
            return true;
        } else {
            return false;
        }
    }

    //is admin
    public function is_admin()
    {
        //check logged in
        if (!$this->is_logged_in()) {
            return false;
        }

        //check role
        if (user()->role == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    //is author
    public function is_author(){
        //check logged in
        if (!$this->is_logged_in()) {
            return false;
        }
		
        //check role
        if (user()->role == 'author' || user()->role == 'student' || user()->role == 'teacher') {
            $return=true;
        }else{
            $return= false;
        }
		
		return $return;
    }

    //function get user
    public function get_logged_user()
    {
        if ($this->session->userdata('logged_in') == true) {
            $query = $this->db->get_where('users', array('id' => $this->get_user_id()));
            return $query->row();
        }
    }

	
    //get user by id
    public function get_user($id)
    {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row();
    }

    //get user by email
    public function get_user_by_email($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->row();
    }

    //get user by slug
    public function get_user_by_slug($slug)
    {
        $query = $this->db->get_where('users', array('slug' => $slug));
        return $query->row();
    }

    //get users
    public function get_users()
    {
        $this->db->where_not_in('id', 1);
        $query = $this->db->get('users');
        return $query->result();
    }


    // get teacher
    public function get_teacher()
    {
        $this->db->where("role","teacher");
        $this->db->where("active","1");
        $query = $this->db->get('users');
        return $query->result();
    }

    // get admin student
    public function get_adminstudent()
    {
        $this->db->where("role","student");
        $this->db->where("active","1");
        $query = $this->db->get('users');
        return $query->result();
    }

    

    // get student
    public function get_student($id)
    {
        $this->db->select('*');
		$this->db->from('users');
		$this->db->join('booking_student','booking_student.student_id = users.id');
		$this->db->where("booking_student.teacher_id",$id);
   		$query = $this->db->get();
        return $query->result();
    }

		
    //get last users
    public function get_last_teachers()
    {
        $this->db->limit(7);
        $this->db->where("role","teacher");
        $this->db->order_by('users.id', 'DESC');
        $query = $this->db->get('users');
        return $query->result();
    }

    public function get_latest_reg_user()
    {
        $this->db->limit(7);
        $this->db->where("active","0");
        $this->db->order_by('users.id', 'DESC');
        $query = $this->db->get('users');
        return $query->result();
    }

    public function get_last_students()
    {
        $this->db->limit(7);
        $this->db->where("role","student");
        $this->db->order_by('users.id', 'DESC');
        $query = $this->db->get('users');
        return $query->result();
    }

    //get logged user id
    public function get_user_id()
    {
        if ($this->session->userdata('logged_in') == true) {
            return $this->session->userdata('id');
        }
    }

    //get logged username
    public function get_username()
    {
        if ($this->session->userdata('logged_in') == true) {
            return $this->session->userdata('username');
        }
    }

    //user count
    public function get_user_count()
    {
        $this->db->where_not_in('id', 1);
        $query = $this->db->get('users');
        return $query->num_rows();
    }


    //check if email is unique
    public function is_unique_email($email, $user_id = 0)
    {
        $user = $this->auth_model->get_user_by_email($email);

        //if id doesnt exists
        if ($user_id == 0) {
            if (empty($user)) {
                return true;
            } else {
                return false;
            }
        }

        if ($user_id != 0) {
            if (!empty($user) && $user->id != $user_id) {
                //email taken
                return false;
            } else {
                return true;
            }
        }
    }

    public function country(){

        $country = array(
            // "-1" => "Select Country",
            "AF" => "Afghanistan",
            "AL" => "Albania",
            "DZ" => "Algeria",
            "AS" => "American Samoa",
            "AD" => "Andorra",
            "AO" => "Angola",
            "AI" => "Anguilla",
            "AQ" => "Antarctica",
            "AG" => "Antigua and Barbuda",
            "AR" => "Argentina",
            "AM" => "Armenia",
            "AW" => "Aruba",
            "AU" => "Australia",
            "AT" => "Austria",
            "AZ" => "Azerbaijan",
            "BS" => "Bahamas",
            "BH" => "Bahrain",
            "BD" => "Bangladesh",
            "BB" => "Barbados",
            "BY" => "Belarus",
            "BE" => "Belgium",
            "BZ" => "Belize",
            "BJ" => "Benin",
            "BM" => "Bermuda",
            "BT" => "Bhutan",
            "BO" => "Bolivia",
            "BA" => "Bosnia and Herzegowina",
            "BW" => "Botswana",
            "BV" => "Bouvet Island",
            "BR" => "Brazil",
            "IO" => "British Indian Ocean Territory",
            "BN" => "Brunei Darussalam",
            "BG" => "Bulgaria",
            "BF" => "Burkina Faso",
            "BI" => "Burundi",
            "KH" => "Cambodia",
            "CM" => "Cameroon",
            "CA" => "Canada",
            "CV" => "Cape Verde",
            "KY" => "Cayman Islands",
            "CF" => "Central African Republic",
            "TD" => "Chad",
            "CL" => "Chile",
            "CN" => "China",
            "CX" => "Christmas Island",
            "CC" => "Cocos (Keeling) Islands",
            "CO" => "Colombia",
            "KM" => "Comoros",
            "CG" => "Congo",
            "CK" => "Cook Islands",
            "CR" => "Costa Rica",
            "CI" => "Cote D'Ivoire",
            "HR" => "Croatia",
            "CU" => "Cuba",
            "CY" => "Cyprus",
            "CZ" => "Czech Republic",
            "DK" => "Denmark",
            "DJ" => "Djibouti",
            "DM" => "Dominica",
            "DO" => "Dominican Republic",
            "TL" => "East Timor",
            "EC" => "Ecuador",
            "EG" => "Egypt",
            "SV" => "El Salvador",
            "GQ" => "Equatorial Guinea",
            "ER" => "Eritrea",
            "EE" => "Estonia",
            "ET" => "Ethiopia",
            "FK" => "Falkland Islands (Malvinas)",
            "FO" => "Faroe Islands",
            "FJ" => "Fiji",
            "FI" => "Finland",
            "FR" => "France",
            "FX" => "France, Metropolitan",
            "GF" => "French Guiana",
            "PF" => "French Polynesia",
            "TF" => "French Southern Territories",
            "GA" => "Gabon",
            "GM" => "Gambia",
            "GE" => "Georgia",
            "DE" => "Germany",
            "GH" => "Ghana",
            "GI" => "Gibraltar",
            "GR" => "Greece",
            "GL" => "Greenland",
            "GD" => "Grenada",
            "GP" => "Guadeloupe",
            "GU" => "Guam",
            "GT" => "Guatemala",
            "GN" => "Guinea",
            "GW" => "Guinea-bissau",
            "GY" => "Guyana",
            "HT" => "Haiti",
            "HM" => "Heard and Mc Donald Islands",
            "HN" => "Honduras",
            "HK" => "Hong Kong",
            "HU" => "Hungary",
            "IS" => "Iceland",
            "IN" => "India",
            "ID" => "Indonesia",
            "IR" => "Iran (Islamic Republic of)",
            "IQ" => "Iraq",
            "IE" => "Ireland",
            "IL" => "Israel",
            "IT" => "Italy",
            "JM" => "Jamaica",
            "JP" => "Japan",
            "JO" => "Jordan",
            "KZ" => "Kazakhstan",
            "KE" => "Kenya",
            "KI" => "Kiribati",
            "KP" => "Korea, Democratic People's Republic of",
            "KR" => "Korea, Republic of",
            "KW" => "Kuwait",
            "KG" => "Kyrgyzstan",
            "LA" => "Lao People's Democratic Republic",
            "LV" => "Latvia",
            "LB" => "Lebanon",
            "LS" => "Lesotho",
            "LR" => "Liberia",
            "LY" => "Libyan Arab Jamahiriya",
            "LI" => "Liechtenstein",
            "LT" => "Lithuania",
            "LU" => "Luxembourg",
            "MO" => "Macau",
            "MK" => "Macedonia, The Former Yugoslav Republic of",
            "MG" => "Madagascar",
            "MW" => "Malawi",
            "MY" => "Malaysia",
            "MV" => "Maldives",
            "ML" => "Mali",
            "MT" => "Malta",
            "MH" => "Marshall Islands",
            "MQ" => "Martinique",
            "MR" => "Mauritania",
            "MU" => "Mauritius",
            "YT" => "Mayotte",
            "MX" => "Mexico",
            "FM" => "Micronesia, Federated States of",
            "MD" => "Moldova, Republic of",
            "MC" => "Monaco",
            "MN" => "Mongolia",
            "MS" => "Montserrat",
            "MA" => "Morocco",
            "MZ" => "Mozambique",
            "MM" => "Myanmar",
            "NA" => "Namibia",
            "NR" => "Nauru",
            "NP" => "Nepal",
            "NL" => "Netherlands",
            "AN" => "Netherlands Antilles",
            "NC" => "New Caledonia",
            "NZ" => "New Zealand",
            "NI" => "Nicaragua",
            "NE" => "Niger",
            "NG" => "Nigeria",
            "NU" => "Niue",
            "NF" => "Norfolk Island",
            "MP" => "Northern Mariana Islands",
            "NO" => "Norway",
            "OM" => "Oman",
            "PK" => "Pakistan",
            "PW" => "Palau",
            "PA" => "Panama",
            "PG" => "Papua New Guinea",
            "PY" => "Paraguay",
            "PE" => "Peru",
            "PH" => "Philippines",
            "PN" => "Pitcairn",
            "PL" => "Poland",
            "PT" => "Portugal",
            "PR" => "Puerto Rico",
            "QA" => "Qatar",
            "RE" => "Reunion",
            "RO" => "Romania",
            "RU" => "Russian Federation",
            "RW" => "Rwanda",
            "KN" => "Saint Kitts and Nevis",
            "LC" => "Saint Lucia",
            "VC" => "Saint Vincent and the Grenadines",
            "WS" => "Samoa",
            "SM" => "San Marino",
            "ST" => "Sao Tome and Principe",
            "SA" => "Saudi Arabia",
            "SN" => "Senegal",
            "SC" => "Seychelles",
            "SL" => "Sierra Leone",
            "SG" => "Singapore",
            "SK" => "Slovakia (Slovak Republic)",
            "SI" => "Slovenia",
            "SB" => "Solomon Islands",
            "SO" => "Somalia",
            "ZA" => "South Africa",
            "GS" => "South Georgia and the South Sandwich Islands",
            "ES" => "Spain",
            "LK" => "Sri Lanka",
            "SH" => "St. Helena",
            "PM" => "St. Pierre and Miquelon",
            "SD" => "Sudan",
            "SR" => "Suriname",
            "SJ" => "Svalbard and Jan Mayen Islands",
            "SZ" => "Swaziland",
            "SE" => "Sweden",
            "CH" => "Switzerland",
            "SY" => "Syrian Arab Republic",
            "TW" => "Taiwan",
            "TJ" => "Tajikistan",
            "TZ" => "Tanzania, United Republic of",
            "TH" => "Thailand",
            "TG" => "Togo",
            "TK" => "Tokelau",
            "TO" => "Tonga",
            "TT" => "Trinidad and Tobago",
            "TN" => "Tunisia",
            "TR" => "Turkey",
            "TM" => "Turkmenistan",
            "TC" => "Turks and Caicos Islands",
            "TV" => "Tuvalu",
            "UG" => "Uganda",
            "UA" => "Ukraine",
            "AE" => "United Arab Emirates",
            "GB" => "United Kingdom",
            "US" => "United States",
            "UM" => "United States Minor Outlying Islands",
            "UY" => "Uruguay",
            "UZ" => "Uzbekistan",
            "VU" => "Vanuatu",
            "VA" => "Vatican City State (Holy See)",
            "VE" => "Venezuela",
            "VN" => "Viet Nam",
            "VG" => "Virgin Islands (British)",
            "VI" => "Virgin Islands (U.S.)",
            "WF" => "Wallis and Futuna Islands",
            "EH" => "Western Sahara",
            "YE" => "Yemen",
            "RS" => "Serbia",
            "CD" => "The Democratic Republic of Congo",
            "ZM" => "Zambia",
            "ZW" => "Zimbabwe",
            "JE" => "Jersey",
            "BL" => "St. Barthelemy",
            "XU" => "St. Eustatius",
            "XC" => "Canary Islands",
            "ME" => "Montenegro"
        );
        return $country;
    }

    //Get Language List
    public function languages(){
        $languages =  array(
            "English" => "English",
            "French" => "French",
            "Spanish" => "Spanish",
            "Portuguese" => "Portuguese",
            "Japanese" => "Japanese",
            "Korean" => "Korean",
            "Arabic" => "Arabic",
            "Hindi" => "Hindi",
            "Italian" => "Italian",
            "Russian" => "Russian",
            "Afrikaans" => "Afrikaans",
            "Akan Twi" => "Akan Twi",
            "Albanian" => "Albanian",
            "American Sign Language (ASL)" => "American Sign Language (ASL)",
            "Amharic" => "Amharic",
            "Argentine Sign Language" => "Argentine Sign Language",
            "Armenian" => "Armenian",
            "Azeri" => "Azeri",
            "Arabic (Egyptian)" => "Arabic (Egyptian)",
            "Arabic (Gulf)" => "Arabic (Gulf)",
            "Arabic (Modern Standard)" => "Arabic (Modern Standard)",
            'Arabic(Sudanese)' => 'Arabic(Sudanese)',
            "Arabic (Maghrebi)" => "Arabic (Maghrebi)",
            "Arabic (Levantine)" => "Arabic (Levantine)",
            "Alsatian" => "Alsatian",
            "Assamese" => "Assamese",
            "Aiki (Kibet)" => "Aiki (Kibet)",
            "Aiki (Runga)" => "Aiki (Runga)",
            "Ainu" => "Ainu",
            "Aragonese" => "Aragonese",
            "Aramaic" => "Aramaic",
            "Aromanian" => "Aromanian",
            "Assiniboine (Nakota)" => "Assiniboine (Nakota)",
            "Austrian German" => "Austrian German",
            "Australian Sign Language (Auslan)" => "Australian Sign Language (Auslan)",
            "Avar" => "Avar",
            "Aymara" => "Aymara",
            "Azerbaijani" => "Azerbaijani",
            "Basque" => "Basque",
            "Belait" => "Belait",
            "Belarusian" => "Belarusian",
            "Bengali" => "Bengali",
            "Bosnian" => "Bosnian",
            "Brazilian Sign Language (LIBRAS)" => "Brazilian Sign Language (LIBRAS)",
            "British Sign Language (BSL)" => "British Sign Language (BSL)",
            "Bulgarian" => "Bulgarian",
            "Burmese" => "Burmese",
            "Balochi" => "Balochi",
            "Blackfoot (Niitsi`powahsin)" => "Blackfoot (Niitsi`powahsin)",
            "Breton" => "Breton",
            "Balinese" => "Balinese",
            "Bago-Kusuntu" => "Bago-Kusuntu",
            "Bagri" => "Bagri",
            "Bambara (Bamanankan)" => "Bambara (Bamanankan)",
            "Banjar" => "Banjar",
            "Barawana (Baré)" => "Barawana (Baré)",
            "Bari" => "Bari",
            "Batak Toba" => "Batak Toba",
            "Bats" => "Bats",
            "Bavarian" => "Bavarian",
            "Beja" => "Beja",
            "Bhojpuri" => "Bhojpuri",
            "Bislama" => "Bislama",
            "Bugis" => "Bugis",
            "Catalan" => "Catalan",
            "Cebuano" => "Cebuano",
            "Chinese (Cantonese)" => "Chinese (Cantonese)",
            "Chinese (Hakka)" => "Chinese (Hakka)",
            "Chinese (Hokkien)" => "Chinese (Hokkien)",
            "Chinese (Shanghainese)" => "Chinese (Shanghainese)",
            "Chinese (Taiwanese)" => "Chinese (Taiwanese)",
            "Chinese (Other)" => "Chinese (Other)",
            "Croatian" => "Croatian",
            "Czech" => "Czech",
            "Cornish" => "Cornish",
            "Corsican" => "Corsican",
            "Cree" => "Cree",
            "Cherokee" => "Cherokee",
            "Chewa (Chichewa)" => "Chewa (Chichewa)",
            "Chavacano" => "Chavacano",
            "Chechen" => "Chechen",
            "Chibarwe" => "Chibarwe",
            "Chiquitano" => "Chiquitano",
            "Choctaw" => "Choctaw",
            "Chukchi" => "Chukchi",
            "Chuwabu" => "Chuwabu",
            "Coptic" => "Coptic",
            "Crow" => "Crow",
            "Danish" => "Danish",
            "Dutch" => "Dutch",
            "Dzongkha" => "Dzongkha",
            "Dari" => "Dari",
            "Dothraki" => "Dothraki",
            "Daakaka" => "Daakaka",
            "Dakota" => "Dakota",
            "Daza" => "Daza",
            "Dela-Oenale" => "Dela-Oenale",
            "Dinka" => "Dinka",
            "Domari" => "Domari",
            "Dotyali" => "Dotyali",
            "Drehu" => "Drehu",
            "Esperanto" => "Esperanto",
            "Estonian" => "Estonian",
            "Erzya" => "Erzya",
            "Ewe" => "Ewe",
            "Ewondo (Fang)" => "Ewondo (Fang)",
            "Filipino (Tagalog)" => "Filipino (Tagalog)",
            "Finnish" => "Finnish",
            "Flemish" => "Flemish",
            "Faroese" => "Faroese",
            "Frisian" => "Frisian",
            "Fijian (ITaukei)" => "Fijian (ITaukei)",
            "Fon (Fon gbè)" => "Fon (Fon gbè)",
            "Friulian" => "Friulian",
            "Fulah" => "Fulah",
            "Fur" => "Fur",
            "Gaelic (Irish)" => "Gaelic (Irish)",
            "Gaelic (Scottish)" => "Gaelic (Scottish)",
            "Galician" => "Galician",
            "Georgian" => "Georgian",
            "Greek" => "Greek",
            "Greek (Ancient)" => "Greek (Ancient)",
            "Greenlandic" => "Greenlandic",
            "Gujarati" => "Gujarati",
            "Ga" => "Ga",
            "Guarani" => "Guarani",
            "Gaelic (Manx)" => "Gaelic (Manx)",
            "Gallo" => "Gallo",
            "Garifuna" => "Garifuna",
            "Gikuyu" => "Gikuyu",
            "Guambiano" => "Guamb,iano",
            "Gullah" => "Gullah",
            "Gullah (Afro-Seminole Creole)" => "Gullah (Afro-Seminole Creole)",
            "Haitian Creole" => "Haitian Creole",
            "Hausa" => "Hausa",
            "Hebrew" => "Hebrew",
            "Hmong" => "Hmong",
            "Hungarian" => "Hun,garian",
            "Hawaiian Pidgin (Hawaiian ,Creole English)" => "Hawaiian Pidgin (Hawaiian Creole English)",
            "Honduran Sign Language (LESHO)" => "Honduran Sign Language (LESHO)",
            "Icelandic" => "Icelandic",
            "Indonesian" => "Indonesian",
            "Igbo" => "Igbo",
            "Inuktitut" => "Inuktitut",
            "Iban" => "Iban",
            "Ingush" => "Ingush",
            "International Sign (IS)" => "International Sign (IS)",
            "Ido" => "Ido",
            "Inuinnaqtun" => "Inuinnaqtun",
            "Inuvialuktun" => "Inuvialuktun",
            "Ixcatec" => "Ixcatec",
            "Javanese" => "Javanese",
            "Japanese (Okinawan)" => "Japanese (Okinawan)",
            "Japanese Sign Language" => "Japanese Sign Language",
            "Jamaican Creole" => "Jamaican Creole",
            "Judeo-Tat" => "Judeo-Tat",
            "Kannada" => "Kannada",
            "Kazakh" => "Kazakh",
            "Kinyarwanda" => "Kinyarwanda",
            "Khmer (Cambodian)" => "Khmer (Cambodian)",
            "Klingon" => "Klingon",
            "Kurdish" => "Kurdish",
            "Kyrgyz" => "Kyrgyz",
            "Kekchi (Q'eqchi')" => "Kekchi (Q'eqchi')",
            "K'iche'" => "K'iche'",
            "Kachin (Jingpho)" => "Kalanga",
            "Kalmyk Oirat" => "Kalmyk Oirat",
            "Kanuri" => "Kanuri",
            "Kenjeje" => "Kenjeje",
            "Khmu" => "Khmu",
            "Khoemana" => "Khoemana",
            "Kirundi" => "Kirundi",
            "Koisan (Tsoa)" => "Koisan (Tsoa)",
            "Konkani" => "Konkani",
            "Lao" => "Lao",
            "Latin" => "Latin",
            "Latvian" => "Latvian",
            "Lithuanian" => "Lithuanian",
            "Luo" => "Luo",
            "Luxembourgish" => "Luxembourgish",
            "Lakota" => "Lakota",
            "Ladino (Judeo-Spanish)" => "Ladino (Judeo-Spanish)",
            "Ladin" => "Ladin",
            "Lau" => "Lau",
            "Limburgish" => "Limburgish",
            "Litzlitz (Naman)" => "Litzlitz (Naman)",
            "Lombard" => "Lombard",
            "Macedonian" => "Macedonian",
            "Malagasy" => "Malagasy",
            "Malay" => "Malay",
            "Malayalam" => "Malayalam",
            "Maltese" => "Maltese",
            "Maori" => "Maori",
            "Marathi" => "Marathi",
            "Mongolian" => "Mongolian",
            "Maasai" => "Maasai",
            "Maithili" => "Maithili",
            "Mamuju" => "Mamuju",
            "Manchu" => "Manchu",
            "Mandingo (Madinka)" => "Mandingo (Madinka)",
            "Manggarai" => "Manggarai",
            "Mapudungun" => "Mapudungun",
            "Marri Ngarr" => "Marri Ngarr",
            "Masalit" => "Masalit",
            "Mekeo" => "Mekeo",
            "Mexican Sign Language (LSM)" => "Mexican Sign Language (LSM)",
            "Minangkabau" => "Minangkabau",
            "Mingrelian" => "Mingrelian",
            "Mirandese" => "Mirandese",
            "Miyako" => "Miyako",
            "Mon" => "Mon",
            "Maloptionian (Dhivehi)" => "Maloptionian (Dhivehi)",
            "Marshallese" => "Marshallese",
            "Mauritian Creole" => "Mauritian Creole",
            "Mazatec" => "Mazatec",
            "Montenegrin" => "Montenegrin",
            "Mnong" => "Mnong",
            "Nahuatl" => "Nahuatl",
            "Nepali" => "Nepali",
            "Norwegian" => "Norwegian",
            "Nambya" => "Nambya",
            "Neapolitan (Napoletano)" => "Neapolitan (Napoletano)",
            "Natchez" => "Natchez",
            "Navajo (Diné bizaad)" => "Navajo (Diné bizaad)",
            "Ndebele" => "Ndebele",
            "Neverver" => "Neverver",
            "Newar" => "Newar",
            "Nigerian Pidgin" => "Nigerian Pidgin",
            "North Efate (Nakanamanga)" => "North Efate (Nakanamanga)",
            "Nubian (Midob)" => "Nubian (Midob)",
            "Nubian (Nobiin)" => "Nubian (Nobiin)",
            "Nuer" => "Nuer",
            "Ojibwe" => "Ojibwe",
            "Ogiek (Akiek)" => "Ogiek (Akiek)",
            "Okinawan" => "Okinawan",
            "Oromo" => "Oromo",
            "Pashto" => "Pashto",
            "Persian (Farsi)" => "Persian (Farsi)",
            "Polish" => "Polish",
            "Punjabi" => "Punjabi",
            "Papiamento" => "Papiamento",
            "Pa'o" => "Pa'o",
            "Palauan" => "Palauan",
            "Quechua" => "Quechua",
            "Rohingya" => "Rohingya",
            "Romanian" => "Romanian",
            "Romani (Balkan)" => "Romani (Balkan)",
            "Romani (Sinte)" => "Romani (Sinte)",
            "Romani (Vlax)" => "Romani (Vlax)",
            "Romansch" => "Romansch",
            "Samoan" => "Samoan",
            "Sanskrit" => "Sanskrit",
            "Serbian" => "Serbian",
            "Sindhi" => "Sindhi",
            "Sinhala" => "Sinhala",
            "Sicilian" => "Sicilian",
            "Slovak" => "Slovak",
            "Slovenian" => "Slovenian",
            "Somali" => "Somali",
            "Swahili" => "Swahili",
            "Swedish" => "Swedish",
            "Scots" => "Scots",
            "Swiss German" => "Swiss German",
            "Syriac" => "Syriac",
            "Sa" => "Sa",
            "Saami (Kildin)" => "Saami (Kildin)",
            "Saami (Lule)" => "Saami (Lule)",
            "Saami (Northern)" => "Saami (Northern)",
            "Sardinian" => "Sardinian",
            "Sekani" => "Sekani",
            "Sena" => "Sena",
            "Sfyria" => "Sfyria",
            "Shan" => "Shan",
            "Sherpa" => "Sherpa",
            "Shona" => "Shona",
            "Shona (Ndau)" => "Shona (Ndau)",
            "Shoshoni" => "Shoshoni",
            "Shumashti" => "Shumashti",
            "Sign Language(Other)" => "Sign Language(Other)",
            "Silbo Gomero" => "Silbo Gomero",
            "Sotho" => "Sotho",
            "Sundanese" => "Sundanese",
            "Swazi" => "Swazi",
            "Swiss-French Sign Language" => "Swiss-French Sign Language",
            "Swiss-German Sign Language" => "Swiss-German Sign Language",
            "Tajik" => "Tajik",
            "Berber (Tamazight)" => "Berber (Tamazight)",
            "Tamil" => "Tamil",
            "Tatar" => "Tatar",
            "Telugu" => "Telugu",
            "Thai" => "Thai",
            "Tibetan" => "Tibetan",
            "Turkish" => "Turkish",
            "Turkmen" => "Turkmen",
            "Tutong" => "Tutong",
            "Toki Pona" => "Toki Pona",
            "Tamang" => "Tamang",
            "Tharu" => "Tharu",
            "Tigrinya" => "Tigrinya",
            "Tlingit" => "Tlingit",
            "Tongan" => "Tongan",
            "Tsonga (Xitsonga)" => "Tsonga (Xitsonga)",
            "Tswana" => "Tswana",
            "Tz’utujil" => "Tz’utujil",
            "Ukrainian" => "Ukrainian",
            "Urdu" => "Urdu",
            "Uyghur" => "Uyg,hur",
            "Uzbek" => "Uzbek",
            "Vietnamese" => "Vi,etnamese",
            "Venda" => "Venda",
            "Welsh" => "Welsh",
            "Wolof" => "Wolof",
            "Waray" => "Waray",
            "Wayuu" => "Wayuu",
            "Wyandot" => "Wyandot",
            "Xhosa" => "Xhosa",
            "Yakut" => "Yakut",
            "Yiddish" => "Yiddish",
            "Yoruba" => "Yoruba",
            "Yucatec Maya" => "Yucatec Maya",
            "Yola" => "Yola",
            "Yugoslavian Sign Language" => "Yugoslavian Sign Language",
            "Zhuang" => "Zhuang",
            "Zulu" => "Zulu",
            "Zaghawa (Beria)" => "Zaghawa (Beria)",
            "Zapotec" => "Zapotec",
            "Zarma" => "Zarma",
            "Zaza (Northern)" => "Zaza (Northern)",
            "Occitan" => "Occitan",
            "Odia" => "Odia",
            "Oneida" => "Oneida",
        );
        return $languages;
    }

    //remove user ban
    public function baseic_inf($data)
    {
        $this->db->insert('user_detail', $data);
        return TRUE;
    }

    public function user_exit($id)
    {
        $query = $this->db->get_where('user_detail', array('user_id' => $id));
        return $query->row();
    }


    public function update_avtar($id){
        $user = $this->get_user($id);
        $file = $_FILES['file'];
        if (!empty($file['name'])) {

            //delete old
            delete_image_from_server($user->avatar);

            //upload new
            $data["avatar"] = $this->upload_model->avatar_upload($id, $file);
        }
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function update_avtar_student($id){
        $user = $this->get_user($id);
        $file = $_FILES['avatar'];
        if (!empty($file['name'])) {

            //delete old
            delete_image_from_server($user->avatar);

            //upload new
            $data["avatar"] = $this->upload_model->avatar_upload($id, $file);
            $this->db->where('id', $id);
            return $this->db->update('users', $data);
        }
        else{
            $data = array(
                'avatar' =>  $this->input->post('avatar', true),
            );
            $this->db->where('id', $id);
            return $this->db->update('users', $data);
        }
       
    }

    public function update_user_Det($id , $data){
        $this->db->where('user_id', $id);
        return $this->db->update('user_detail', $data);
    }

}