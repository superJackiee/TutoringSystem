<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Api_comment_model extends CI_Model{
	
	public function __construct()
		 {
			 parent::__construct();
			 
			 $this->load->helper('cookie');
			 $this->load->library('bcrypt');
			 $this->load->model('Api_model');
			 $this->load->model('Api_reading_list_model');
			 $this->load->model('Api_video_model');
			 $this->load->model('Api_categories_model');
			 $this->load->model('Api_gallery_model');
			 $this->load->model('Api_tags_model');
			 $this->load->model('Api_login_model');
			 $this->load->model('Api_voting_model');
			 $this->load->model('Api_author_model');
			 $this->load->model('Api_widget_model');
			 $this->load->model('Api_comment_model');
			 $this->load->model('Api_post_model');
			
		 }
		 //add comment

    public function add_comment($post_id,$user_id,$comment)

    {
		
       $data = array(
            'post_id' =>$post_id,
            'user_id' =>$user_id,
            'comment' =>$comment);
		
       return $data;
	   
      //  return $this->db->insert('comments', $data);

    }
	
	//add like comment

    public function add_like_comment($comment_id,$user_id){
	
	
		$like_user = $this->get_like_comment_user_id_comment_id($user_id,$comment_id);
		
		$user_data = $this->Api_author_model->get_user($user_id);

		$email = $user_data->email;
		$username = $user_data->username;

		if($like_user){
			
			$this->db->where('comment_id', $comment_id);
			$this->db->where('user_id', $user_id);
			$this->db->delete('comment_likes');
			
			$add_result =['like_comment'=>'false','user_name'=>$username,'user_email'=>$email,'title'=>'Delete comment like....','status'=>0];
		
		}else{
	
		$data = array('comment_id' =>$comment_id,'user_id' =>$user_id,);

		$this->db->insert('comment_likes', $data);

		$add_result =['like_comment'=>'true','user_name'=>$username,'user_email'=>$email,'title'=>'Thanks comment like....','status'=>1];

		}
		
		return  $add_result;

    }
	
	
	// get_like_comment_user_id_comment_id
	
	 public function get_like_comment_user_id_comment_id($user_id,$comment_id) {
		 
        $this->db->where('user_id', $user_id);
        $this->db->where('comment_id', $comment_id);

        $query = $this->db->get('comment_likes');

        return $query->row(); 

    } 
	
	
	//comment like count

    public function comment_like_count($id) {
		 
        $this->db->where('comment_id', $id);

        $query = $this->db->get('comment_likes');

        return $query->num_rows(); 

    } 

	public function update_post_comment_by_post_id($post_id) {
		
		$coment_count = $this->post_comment_count($post_id);	
		$post_data = array('comment_count'=>$coment_count);	
		
		$this->db->where('posts.id', $post_id);	
		return $this->db->update('posts', $post_data);
		
		
    } 
	
	// get_comment by post id 
	 public function get_comment($post_id) {
		 
        $this->db->where('post_id', $post_id);

        $query = $this->db->get('comments');

		$data_result = $query->row(); 
		
		if($data_result){
				
				 return $data_result;
				 
			}else{ 
			
			$data_error['error'] = 'Not found comments details...';
			
			return $data_error;
			
			}

    } 
	
	// get_comment by post id 
	 public function get_comment_by_id($id) {
		 
        $this->db->where('id', $id);

        $query = $this->db->get('comments');

        return $query->row(); 

    } 
	
	
	
		//post comment count

    public function post_comment_count($post_id)

    {

        $this->db->where('post_id', $post_id);

        $query = $this->db->get('comments');

        return $query->num_rows();

    }
	
	
	
	
	//get post comments

    public function get_post_comments($post_id) {
		
		$this->db->where('post_id', $post_id);

		$query = $this->db->get('comments');

		$comments_data = $query->result();

		foreach ($comments_data as $t) {
		$userid = $this->Api_author_model->get_user($t->user_id);
				$usercomment[] =['user_like_count' =>$this->comment_like_count($t->id),
				'comment_id' =>$t->id,
				'comment_post_id' =>$t->post_id,
				'comment_user_id' =>$t->user_id,
				'comment_user_image'=>$userid->avatar,
				'comment_user_name'=>$userid->username,
				'comment_parent_id' =>$t->parent_id,
				'comment_content' =>$t->comment,
				'comment_created_at' =>$t->created_at,
				];
			}
		
			if($usercomment){ 

			$user_comment['user_comment'] = $usercomment; 
			
			return $user_comment;

			}else{  

			$data_result['error'] = 'Not found comment details...';

			return $data_result;

			}
		
		}
}
?>