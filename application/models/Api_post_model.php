<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_post_model extends CI_Model {
	
	 
	 
	
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

	
	//get featured slider posts
	public function get_featured_slider_posts(){
		$this->db->join('users', 'posts.user_id = users.id');
		$this->db->join('categories', 'posts.category_id = categories.id');
		$this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
		$this->db->where('posts.visibility', 1);
		$this->db->where('post_type !=', "video");
		$this->db->where('is_slider', 1);
		$this->db->order_by('slider_order');
		$query = $this->db->get('posts');
		return $query->result();
	}
	
	// breaking news
	public function get_breking_news(){
		$this->db->where('is_breaking', 1);
        $this->db->where('post_type !=', "video");
        $this->db->where('posts.visibility', 1);
        $query = $this->db->get('posts');
        return $query->result();
	}

 
		
	// get random post
	public function get_random_post(){
	$this->db->join('users', 'posts.user_id = users.id');
	$this->db->join('categories', 'posts.category_id = categories.id');
	$this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
	$this->db->where('posts.visibility', 1);
	$this->db->where('post_type !=', "video");
	$this->db->where("posts.image_mid != ''");
	$this->db->order_by('rand()');
	$query = $this->db->get('posts');
	return $query->result();
	}
			
		
		
	//get last post limit
	public function get_last_post(){
		 $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->result();
	}
		
	//get recent posts
	
	public function get_recommended_posts(){
		$this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('is_recommended', 1);
        $this->db->where('post_type !=', "video");
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->result();
	}
	
	
		
	//get popular posts
    public function get_popular_posts()
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->order_by('hit', 'DESC');
        $query = $this->db->get('posts');
        return $query->result();
    }
	
	
	// get video
	public function get_video_post(){
	$this->db->join('users', 'posts.user_id = users.id');
	$this->db->select('posts.*,users.username as username, users.slug as user_slug');
	$this->db->where('post_type', "video");
	$this->db->where('posts.visibility', 1);
	$this->db->order_by('posts.id', 'DESC');
	$query = $this->db->get('posts');
	return $query->result(); 
	}
	
	
	//get posts by sub categories related
    public function get_posts_sub_categoris_related($cat_slug,$subcategory_id){
		
		
		$data = $this->Api_categories_model->get_category_by_name_slug($cat_slug);

        $cat_id = $data->id;
		
		$this->db->where('posts.category_id',$cat_id);
		$this->db->where('posts.subcategory_id',$subcategory_id);
        $query = $this->db->get('posts');
		$result_data = $query->result();
		foreach ($result_data as $value) {

				$userid = $this->Api_author_model->get_user($value->user_id);
				$categories = $this->Api_categories_model->get_categories_by_id($value->category_id);
				$sub_categories_select_parent = $this->Api_categories_model->get_categories_by_id($value->category_id);
		
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
				'category_name' =>$categories->name,
				'category_name_slug' =>$categories->name_slug,
				'sub_category_name' =>$sub_categories_select_parent->name,
				'sub_category_name_slug' =>$sub_categories_select_parent->name_slug,
				'comment_count'=>$value->comment_count,
				'post_comment' =>$this->Api_comment_model->get_post_comments($value->id),
				'post_tags' =>$this->Api_tags_model->get_tags_by_post_id($value->id),
				
				];
			}
			
			if($result){
			
			 return $result;
			 
			}else{ 
		
			$data_result['error'] = 'Not found post details...';
		
			return $data_result;
		}
    }


	//get posts by sub categories
    public function get_posts_subcategoris($cat_slug,$subcategory_id){
		
		
		$data = $this->Api_categories_model->get_category_by_name_slug($cat_slug);

        $cat_id = $data->id;
			
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->where('category_id', $cat_id);
        $this->db->where('subcategory_id', $subcategory_id);
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
		$data_result = $query->result();
		
		if($data_result){
			
			 return $data_result;
			 
		}else{ 
		
			$data_result['error'] = 'Not found post details...';
		
		return $data_result;
		}
		 
    }
	
	//get post by post categor_slugname 
    public function get_post_by_categor_slug_name($category_name_slug){
		
		$data = $this->Api_categories_model->get_category_by_name_slug($category_name_slug);

        $category_id = $data->id;
		
		$this->db->where('posts.category_id',$category_id);
        $query = $this->db->get('posts');
		$result_data = $query->result();
		foreach ($result_data as $value) {

				$userid = $this->Api_author_model->get_user($value->user_id);
				$sub_categories_select_parent = $this->Api_categories_model->get_sub_categories_row($value->category_id);
				$categories = $this->Api_categories_model->get_categories_by_id($value->category_id);
				
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
				'share_pinterest'=>$this->Api_share_model->share_pinterest($value->post_type,$value->title_slug,$value->id,$value->image_big),
				'share_tumblr'=>$this->Api_share_model->share_tumblr($value->post_type,$value->title_slug,$value->id,$value->title),
				'post_comment' =>$this->Api_comment_model->get_post_comments($value->id),
				'category_name' =>$categories->name,
				'category_name_slug' =>$categories->name_slug,
				'sub_category_name' =>$sub_categories_select_parent->name,
				'sub_category_name_slug' =>$sub_categories_select_parent->name_slug,
				'post_tags' =>$this->Api_tags_model->get_tags_by_post_id($value->id),
				
				];
			}
		 
		
				 return $result;
				 
		
        
    }
	
	 public function get_post_by_id_or_post_type($post_type,$post_id){
		 
			
			$this->increase_post_hit($post_id);
		
			$this->db->where('posts.post_type',$post_type);
			$this->db->where('posts.id',$post_id);
			$query = $this->db->get('posts');
			$result_data = $query->result();
			
			foreach ($result_data as $value) {
			$userid = $this->Api_author_model->get_user($value->user_id);
			$categories = $this->Api_categories_model->get_categories_by_id($value->category_id);
			$sub_categories_select_parent = $this->Api_categories_model->get_sub_categories_row($value->category_id);

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
			'share_pinterest'=>$this->Api_share_model->share_pinterest($value->post_type,$value->title_slug,$value->id,$value->image_big),
			'share_tumblr'=>$this->Api_share_model->share_tumblr($value->post_type,$value->title_slug,$value->id,$value->title),
			'post_comment' =>$this->Api_comment_model->get_post_comments($value->id),
			'category_name' =>$categories->name,
			'category_name_slug' =>$categories->name_slug,
			'sub_category_name' =>$sub_categories_select_parent->name,
			'sub_category_name_slug' =>$sub_categories_select_parent->name_slug,
			'tags_data' =>$this->Api_tags_model->get_tags_by_post_id($value->id),

			];
			}
		
				 return $result;
		
    }
	
	//get post by post type 
    public function get_post_by_post_type($post_type){
		
		$this->db->where('posts.post_type',$post_type);
        $query = $this->db->get('posts');
		$result_data = $query->result();
		foreach ($result_data as $value) {

				$userid = $this->Api_author_model->get_user($value->user_id);
				$sub_categories_select_parent = $this->Api_categories_model->get_sub_categories_row($value->category_id);
				
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
				'share_pinterest'=>$this->Api_share_model->share_pinterest($value->post_type,$value->title_slug,$value->id,$value->image_big),
				'share_tumblr'=>$this->Api_share_model->share_tumblr($value->post_type,$value->title_slug,$value->id,$value->title),
				'post_comment' =>$this->Api_comment_model->get_post_comments($value->id),
				'category_name' =>$sub_categories_select_parent->name,
				'post_tags' =>$this->Api_tags_model->get_tags_by_post_id($value->id),
				
				];
			}
		
				 return $result;
			
    }
	
	
	//increase post hit
    public function increase_post_hit($id)
    {
        //get post
        $post = $this->get_post($id);

        if (!empty($post)):
		
			
             if (get_cookie('var_post_' . $id) != 1) :
			 
                //increase hit
				set_cookie('var_post_' . $id, '1', time() + 8640000);
                $data = array(
                    'hit' => $post->hit + 1
                );
				
                $this->db->where('id', $id);
				$this->db->update('posts', $data); 

				return   $post->hit;
				
				else:
				
				return   $post->hit;
				
            endif; 
			
        endif;
    }
	
	 //get post
    public function get_post($id)
    {
        $this->db->where('posts.id', $id);
		$this->db->where('posts.post_type','post');
        $query = $this->db->get('posts');
        return $query->row();
    }

	
}

?>