<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_login_model extends CI_Model {
	
	 public function __construct(){

        parent::__construct();

        $this->load->library('bcrypt');
		$this->load->model('Api_author_model');
		$this->load->model('upload_model');
    }
	
	 //register 

    public function register_check($user,$email,$password){

        $data = array('username' => $user,'email' => $email,'password' => $password);

		   //secure password

       $data['password'] = $this->bcrypt->hash_password($data['password']);

        $data['user_type'] = "registered";

        $data["slug"] = str_slug($data["username"] . "-" . uniqid());

			$get_user = $this->Api_author_model->get_user_by_email($email);

		
			$check_email = $get_user->email; 
			
			 if ($check_email) {
				 
				return  'This user (' . $check_email .') already register . please different email id register...';
				
			
			}
		
    }	
	//register 

    public function register($user,$email,$password){

		$data = array('username' => $user,'email' => $email,'password' => $password);

		   //secure password

       $data['password'] = $this->bcrypt->hash_password($data['password']);

        $data['user_type'] = "registered";

        $data["slug"] = str_slug($data["username"] . "-" . uniqid());
	
        $this->db->insert('users', $data);
			
				$inser_get = $this->Api_author_model->get_user_by_email($data['email']);

				unset($inser_get->password);

				return $inser_get;
		
    }

	// email or password match by database .
	
    public function get_data_by_email_pass_match($email,$password){
		
		$query = $this->db->get('users');
		$user = $this->Api_author_model->get_user_by_email($email);
		$get_pass = $user->password;
		$check_result = $this->bcrypt->check_password($password, $get_pass);
		if($check_result){
			
			$query = $this->db->get_where('users', array('email' => $email));
				$get_result = $query->row();

				unset($get_result->password);
			return $get_result;
		}
    }
	
	public function compress_image($source_url, $destination_url, $quality){

     $info = getimagesize($source_url);

      if ($info['mime'] == 'image/jpeg'){
		  
         $image = imagecreatefromjpeg($source_url);
		$uploaded_folder =  imagejpeg($image, $destination_url, $quality);
	 
	 } elseif ($info['mime'] == 'image/gif'){
        
		$image = imagecreatefromgif($source_url);
		$uploaded_folder =  imagegif($image, $destination_url, $quality);
		
	  } elseif ($info['mime'] == 'image/png'){
         $image = imagecreatefrompng($source_url);
		$uploaded_folder = imagepng($image, $destination_url, $quality);
	   }

     return $uploaded_folder;
	 
	 
	}
	
	//user update profile name or image 

	public function user_update_name_image($email,$username,$image_url,$image_type){
		
		$time = time();

		$img_upload = './uploads/profile/avatar_'.$time.$image_type;
		$img_upload_update = 'uploads/profile/avatar_'.$time.$image_type;

		
		$check = move_uploaded_file($image_url, $img_upload);


		$data = array('username' =>$username, 
		'slug' => str_slug($username . "-" . uniqid()),
		'avatar'=>$img_upload_update,);

		$this->db->where('email',$email);

		$this->db->update('users', $data);

		$inser_get = $this->Api_author_model->get_user_by_email($email);

		unset($inser_get->password);

		$data_result['change_user_profile'] = ['title_success'=>'Your profile has been successfully updated!...',
		'user_profile'=>$inser_get,
		'status'=>0];

		return $data_result;
				
    } 
	
	
	//user update profile only image

	public function user_update_profile($email, $username){
		
		$user = $this->Api_author_model->get_user_by_email($email);
		$use_email = $user->email;

			$data = array('username' =>$username, 
			'slug' => str_slug($username . "-" . uniqid()),);

			$this->db->where('email',$use_email);
			
			$this->db->update('users', $data);
			
			$inser_get = $this->Api_author_model->get_user_by_email($use_email);

				unset($inser_get->password);
					
				$data_result['change_user_profile'] = ['title_success'=>'Your profile has been successfully updated!...',
				'user_profile'=>$inser_get,
				'status'=>0];
				
				return $data_result;	
				
       
    } 
	
	//change password by user id

	public function change_password_by_user($email, $old_pass, $new_pass){

		$data = array('password' => $this->bcrypt->hash_password($new_pass));

		$this->db->where('email',$email);
		$this->db->update('users', $data);

		$update_seccess = $this->Api_author_model->get_user_by_email($email);

		unset($update_seccess->password);
				
		$data_result['change_pass'] = 'Your password has been successfully changed...';
		$data_result['user_profile'] = $update_seccess;

		return $data_result;
		

	} 
	
	


	
}
	
?>