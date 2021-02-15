<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api_tags_model extends CI_Model {

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
				
		 }

	// get all tags data	
	
	public function all_get_tags(){	
	 
	 
	//$this->db->distinct('tags.tag_slug');
	$this->db->select('*');
	$this->db->group_by('tag_slug');
	$this->db->distinct();
	$this->db->from('tags');
	$query = $this->db->get();
	
	$data_result = $query->result();
		
		if($data_result){
		
			 return $data_result;
			 
		}else{ 
		
		$data_result['error'] = 'Not found tags details...';
		
		return $data_result;
		
		}
	}

	//order by tags_slug get all tags	
	public function get_all_tag_slug($id){
		
		$this->db->where('tags.id', $id);
        $query = $this->db->get('tags');
     
		$data_result = $query->row();
		
		if($data_result){
			
			 return $data_result;
			 
		}else{ 
		
		$data_result['error'] = 'Not found tags details...';
		
		return $data_result;
		
		}
	}
	
	// get tags_slug by post id	
	public function get_tags_by_post_id($post_id){
		
	
		$this->db->where('tags.post_id', $post_id);
        $query = $this->db->get('tags');
		
			 $data_result = $query->result();
			
			if($data_result){
				
				 return $data_result;
				 
			}else{ 
			
			$data_error['error'] = 'Not found tags details...';
			
			return $data_error;
			
			}
	}
	
	//order by tag_slug get post inner joins
    public function order_tag_slug_by_get_posts($tag_slug)
    {
	$this->db->join('users', 'posts.user_id = users.id');
      $this->db->join('tags', 'posts.id = tags.post_id');
		$this->db->where('tags.tag_slug', $tag_slug);
        $this->db->select('posts.* , tags.tag_slug as tag_slug_name,tags.tag as tags_name , users.username as username, users.slug as user_slug');
        $query = $this->db->get('posts');

        return $query->result();
		
    }
	
}
?>