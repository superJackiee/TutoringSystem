<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_video_model extends CI_Model {
	
	 
	 
	
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
	
	//get video post
    public function get_video_post($id)
    {
        $this->db->where('posts.id', $id);
		$this->db->where('posts.post_type','video');
        $query = $this->db->get('posts');
        return $query->row();
    }


      //get video by post type 
    public function get_post_by_post_type($post_type){
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->select('posts.*,users.username as username, users.slug as user_slug');
        $this->db->where('posts.post_type',$post_type);
        $this->db->where('posts.visibility', 1);
        $query = $this->db->get('posts');
        return $query->result();
    } 

	//get video by post type 
    public function get_post_type($post_type){
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->select('posts.*,users.username as username, users.slug as user_slug');
        $this->db->where('posts.post_type',$post_type);
        $this->db->where('posts.visibility', 1);
        $query = $this->db->get('posts');
        return $query->result();
    }
	
	//get video by post type 
    public function get_video_comments($post_type){
      
        $this->db->where('posts.post_type',$post_type);
        $query = $this->db->get('posts');
		$result_data = $query->result();
		foreach ($result_data as $value) {

				$coment_id = $this->Api_comment_model->get_comment($value->id);
				$userid = $this->Api_author_model->get_user($value->user_id);
				
				$result[] =['id'=>$value->id,
				'title'=>$value->title,
				'title_slug'=>$value->title_slug,
				'keywords'=>$value->keywords,
				'summary'=>$value->summary,
				'content'=>$value->content,
				'category_id'=>$value->category_id,
				'subcategory_id'=>$value->subcategory_id,
				'image_big'=>$value->image_big,
				'image_default'=>$value->image_default,
				'image_slider'=>$value->image_slider,
				'image_mid'=>$value->image_mid,
				'image_small'=>$value->image_small,
				'hit'=>$value->hit,
				'optional_url'=>$value->optional_url,
				'need_auth'=>$value->need_auth,
				'is_slider'=>$value->is_slider,
				'slider_order'=>$value->slider_order,
				'is_featured'=>$value->is_featured,
				'featured_order'=>$value->featured_order,
				'is_recommended'=>$value->is_recommended,
				'is_breaking'=>$value->is_breaking,
				'visibility'=>$value->visibility,
				'post_type'=>$value->post_type,
				'image_url'=>$value->image_url,
				'embed_code'=>$value->embed_code,
				'user_id'=>$value->user_id,
				'created_at'=>$value->created_at,
				'username'=>$userid->username,
				'user_slug'=>$userid->slug,
				'comment_count'=>$value->comment_count,
				'share_facebook'=>$this->Api_share_model->share_facebook($value->post_type,$value->title_slug,$value->id),
				'share_twitter'=>$this->Api_share_model->share_twitter($value->post_type,$value->title_slug,$value->id,$value->title),
				'share_plus_google'=>$this->Api_share_model->share_plus_google($value->post_type,$value->title_slug,$value->id),
				'share_linkedin'=>$this->Api_share_model->share_linkedin($value->post_type,$value->title_slug,$value->id),
				'share_pinterest'=>$this->Api_share_model->share_pinterest($value->post_type,$value->title_slug,$value->id,$value->image_url),
				'share_tumblr'=>$this->Api_share_model->share_tumblr($value->post_type,$value->title_slug,$value->id,$value->title),
				'video_comment' =>$this->Api_comment_model->get_post_comments($value->id),
				'video_tags' =>$this->Api_tags_model->get_tags_by_post_id($value->id),
				];
			}
		 return $result;
		 
		
		
    }
	
	

    public function get_post_by_id_or_post_type($post_type,$id){
		
		$this->Api_model->increase_post_hit($id);

		$this->db->where('posts.id', $id);
	    $this->db->where('posts.post_type',$post_type);
        $query = $this->db->get('posts');
		$result_data = $query->result();
		foreach ($result_data as $value) {

				$coment_id = $this->Api_comment_model->get_comment($value->id);
				$userid = $this->Api_author_model->get_user($value->user_id);
				
				$result[] =['id'=>$value->id,
				'title'=>$value->title,
				'title_slug'=>$value->title_slug,
				'keywords'=>$value->keywords,
				'summary'=>$value->summary,
				'content'=>$value->content,
				'category_id'=>$value->category_id,
				'subcategory_id'=>$value->subcategory_id,
				'image_big'=>$value->image_big,
				'image_default'=>$value->image_default,
				'image_slider'=>$value->image_slider,
				'image_mid'=>$value->image_mid,
				'image_small'=>$value->image_small,
				'hit'=>$value->hit,
				'optional_url'=>$value->optional_url,
				'need_auth'=>$value->need_auth,
				'is_slider'=>$value->is_slider,
				'slider_order'=>$value->slider_order,
				'is_featured'=>$value->is_featured,
				'featured_order'=>$value->featured_order,
				'is_recommended'=>$value->is_recommended,
				'is_breaking'=>$value->is_breaking,
				'visibility'=>$value->visibility,
				'post_type'=>$value->post_type,
				'image_url'=>$value->image_url,
				'embed_code'=>$value->embed_code,
				'user_id'=>$value->user_id,
				'created_at'=>$value->created_at,
				'username'=>$userid->username,
				'user_slug'=>$userid->slug,
				'comment_count'=>$value->comment_count,
				'share_facebook'=>$this->Api_share_model->share_facebook($value->post_type,$value->title_slug,$value->id),
				'share_twitter'=>$this->Api_share_model->share_twitter($value->post_type,$value->title_slug,$value->id,$value->title),
				'share_plus_google'=>$this->Api_share_model->share_plus_google($value->post_type,$value->title_slug,$value->id),
				'share_linkedin'=>$this->Api_share_model->share_linkedin($value->post_type,$value->title_slug,$value->id),
				'share_pinterest'=>$this->Api_share_model->share_pinterest($value->post_type,$value->title_slug,$value->id,$value->image_url),
				'share_tumblr'=>$this->Api_share_model->share_tumblr($value->post_type,$value->title_slug,$value->id,$value->title),
				'video_post_comment' =>$this->Api_comment_model->get_post_comments($value->id),
				'video_tags' =>$this->Api_tags_model->get_tags_by_post_id($value->id),
				];
			}
		 return $result;
	}
	
	public function get_post_byid_post_type($post_type,$id){
		
		$this->Api_model->increase_post_hit($id);
		
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->select('posts.*,users.username as username, users.slug as user_slug');
        $this->db->where('posts.post_type',$post_type);
        $this->db->where('posts.visibility', 1);
		$this->db->where('posts.id', $id);
        $query = $this->db->get('posts');
        return $query->result();
    }
}

?>