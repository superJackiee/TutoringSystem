<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model
{
	
	
	
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
			 $this->load->model('Api_share_model');
			
			
		 }
		 
	   public function get_page($slug){
		   
        $this->db->where('slug', $slug);
        $query = $this->db->get('pages');
		$result_data = $query->row();
		
		
			return $result_data;
		}
		
	//get main menu pages
    public function get_top_hearder_menu()
    {
        $this->db->order_by('page_order');
        $this->db->where('location', 'main');
        $query = $this->db->get('pages');
        $header_menu = $query->result();
		
		$data = $this->get_page("index");
		
		$category = $this->Api_categories_model->get_categories();
		
		$result_data[] =['id'=>$data->id,
		'title'=>$data->title,
		 'slug'=>'homepage', 
		 'name'=>$data->slug, 
		 
		];
		
		sort($category);
		foreach ($category as $value ) {
		
		$result_category[] =['id'=>$value->id,
		'title'=>$value->name,
		'slug'=> $value->name_slug,
		'name'=> 'categories',
		
		];
		
		}
		sort($header_menu);
		foreach ($header_menu as $value ) {
		
		 if($value->slug == 'videos'){
              $slug = 'video';
			  $name = 'videos';
			  
          }elseif($value->slug == 'gallery'){
			 
			 $slug = 'gallery';
			  $name = 'gallery';
			  
		  }else{
			$slug = $value->slug;
			 $name = 'page';
		  }
		  
		$result[] =['id'=>$value->id,
		'title'=>$value->title,
		'slug'=>$slug,
		'name'=>$name,
		
		];
		
		
		}
		
		unset($result_category['videos']);
		
		$array = array_merge($result,$result_category);
		
		$array_cecond = array_merge($result_data,$array);

		 return $array_cecond;
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
        $query = $this->db->get('posts');
        return $query->row();
    }

	//get last post pagination 
	public function get_last_post_pagination($per_page, $offset){
		$this->db->order_by('posts.id', 'DESC');
		$this->db->limit($per_page, $offset);
		$query = $this->db->get('posts');
        return $query->result();
	}
	
	

	
	
	//get footer random posts
    public function get_footer_random_posts()
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->order_by('rand()');
        $this->db->limit(3);
        $query = $this->db->get('posts');
        return $query->result();
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
				'post_comment' =>$this->Api_comment_model->get_post_comments($value->id),
				'post_categoris' =>$sub_categories_select_parent->name,
				'post_tags' =>$this->Api_tags_model->get_tags_by_post_id($value->id),
				
				];
			}
		 return $result;
        
    }
	
	 public function get_post_by_id_or_post_type($post_type,$post_id){
		 
		$this->increase_post_hit($post_id);
		
	   $this->db->join('users', 'posts.user_id = users.id');
		$this->db->join('categories', 'posts.category_id = categories.id');
		$this->db->select('posts.*,categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.post_type',$post_type);
        $this->db->where('posts.visibility', 1);
		$this->db->where('posts.id', $post_id);
        $query = $this->db->get('posts');
		
		$data_posts['posts_data'] =  $query->result();
		$data_posts['post_comment'] = $this->Api_comment_model->get_post_comments($post_id);
		$data_posts['tags_data'] = $this->Api_tags_model->get_tags_by_post_id($post_id);
	
		return $data_posts;
		
	
    }
	
	
	// oder by sub cat data or post data get 
	public function sub_category_slug_get_post($subcategory_id){
		$this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.subcategory_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.name_slug as category_slug, categories.description as category_description, categories.keywords as category_keywords, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->where('subcategory_id', $subcategory_id);
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->result();
		
	}


	//error create api
	public function api_check_error_404()
    {
        $data['title'] = "Error 404";
        $data['description'] = "Error 404";
        $data['keywords'] = "error,404";

        $this->load->view('partials/_header', $data);
        $this->load->view('errors/error_404');
        $this->load->view('partials/_footer');
    }

	
	//update poll by id

    public function update($id){

        //set values

        $data = $this->input_values();

        $this->db->where('id', $id);

        return $this->db->update('polls', $data);

    }
	//get user by id

    public function get_user_by_id($id){

        $query = $this->db->get_where('users', array('id' => $id));

        return $query->row();

    }
		
}