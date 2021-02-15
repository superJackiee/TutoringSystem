<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_reading_list_model extends CI_Model {
	
	  public function __construct(){

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
		$this->load->model('Api_share_model');

    }
	
	//add to reading list

    public function add_to_reading_list($user_id,$post_id){
		
				
			$check_reading = $this->get_user_id_or_post_id_get_post($user_id,$post_id);
		
				if($check_reading){

				$delete_result = $this->delete_from_reading_list($user_id,$post_id);

					 $delete_reading_list['added_reading_post'] =['read_post'=>$delete_result,'title'=>'Remove from Reading List','status'=>'0'];
					return $delete_reading_list;
				
				}else{

			
					$data = array('post_id' => $post_id,'user_id' => $user_id);
					
					 $insert_result = $this->db->insert('reading_lists', $data);
					 
					 $insert['added_reading_post'] =['read_post'=>$insert_result,'title'=>'Add to Reading List...','status'=>'1'];
					return $insert;
			
				} 
			
		}  



    //delete reading list order by user id or post id 

    public function delete_from_reading_list($user_id,$post_id)

    {

        if (empty($user_id) || empty($post_id)) {

			$data_result['error'] = 'Not delete reading list details...';
		
			return $data_result;

        }

        $this->db->where('user_id', $user_id);
		$this->db->where('post_id', $post_id);
        $data_result = $this->db->delete('reading_lists');

			if($data_result){
				
				 return $data_result;
				 
			}else{ 
			
				$data_result['error'] = 'Not delete reading_lists details...';
			
				return $data_result;
			
			}

    }
	
	
	
	//get user_id or post_id get reading post
	public function get_user_id_or_post_id_get_post($user_id,$post_id){
		
		$this->db->where('post_id', $post_id);
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('reading_lists');

		 return $query->row();
			
	}
	
	// get post data
	public function get_post_data($id){
		
		$this->db->where('posts.id',$id);
        $query = $this->db->get('posts');
		
       $data_result = $query->row();
			
		return $data_result;
			
    }
	
	//get id by reading list post

	public function get_id_by_reading_list($id){
		
		$this->db->order_by('reading_lists.id', 'DESC');
		$this->db->where('reading_lists.user_id',$id);
		$this->db->join('users', 'posts.user_id = users.id');
		$this->db->join('reading_lists', 'posts.id = reading_lists.post_id');
		$this->db->select('posts.*,users.username as username, users.slug as user_slug');
		$this->db->where('posts.visibility', 1);
		$query = $this->db->get('posts');

		 $data_result = $query->result();
			
			if($data_result){
				
				 return $data_result;
				 
			}else{ 
			
			$data_result['error'] = 'Not found reading list details...';
			
			return $data_result;
			
			}
	}
		
	//get id reading list count
	public function get_reading_list_count($id){
		
		$this->db->order_by('posts.id', 'DESC');
		$this->db->join('reading_lists', 'posts.id = reading_lists.post_id');
		$this->db->join('users', 'posts.user_id = users.id');
		$this->db->select('posts.*,users.username as username, users.slug as user_slug');
		$this->db->where('posts.visibility', 1);
		$this->db->where('reading_lists.user_id',$id);
		$query = $this->db->get('posts');

		$data_result = $query->num_rows();
			
			if($data_result){
				
				 return $data_result;
				 
			}else{ 
			
			$data_result['error'] = 'Not count reading list details...';
			
			return $data_result;
			
			}
	}
	
}



?>