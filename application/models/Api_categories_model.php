<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Api_categories_model extends CI_Model {
	 
	 
	 public function get_url_id_check_slug($cat_slug){
		 
		  $data = $this->get_category_by_name_slug($cat_slug);

        $cat_id = $data->name_slug;
		
		return $cat_id;
	 }
	 
	 //get category slug name
    public function get_category($name_slug){

       $data = $this->get_category_by_name_slug($name_slug);

        $parent_id = $data->id;
       
		$query = $this->get_sub_categories_by_parent_id($parent_id);
		
		
        return $query;

    }
	
		 
	 //get category
    public function get_category_by_name_slug($name_slug)

    {

        $this->db->where('name_slug', $name_slug);

        $query = $this->db->get('categories');

        return $query->row();

    }
	
    //get subcategories by parent_id

    public function get_sub_categories_by_parent_id($parent_id){

        $this->db->where('parent_id', $parent_id);

        $query = $this->db->get('categories');

        return $query->result();
		
    }
	
	//get row subcategories by parent_id 

    public function get_sub_categories_row($parent_id){

        $this->db->where('parent_id', $parent_id);

        $query = $this->db->get('categories');

        $data_result = $query->row();
		
		if($data_result){
				
				 return $data_result;
				 
			}else{ 
			
			$data_error['error'] = 'Not found categories details...';
			
			return $data_error;
			
			}
    }
	
	     //get top categories
    public function get_categories()
    {
        $this->db->where('parent_id', 0);
        $this->db->order_by('category_order');
        $query = $this->db->get('categories');
        return $query->result();
    }
	
	
	//get sub_categories by id

    public function get_sub_categories_by_id($slug,$id){

		$cat_data =$this->get_category_by_name_slug($slug);
        
		$cat_id = $cat_data->id;
		 
		$this->db->where('parent_id', $cat_id);
		$this->db->where('id', $id);
        $query = $this->db->get('categories');
		$data_result = $query->result();
			
			if($data_result){
			
			 return $data_result;
			 
		}else{ 
		
		$data_result['error'] = 'Not found categories details...';
		return $data_result;
		
		}

    }
	
	
	//get categories by id

    public function get_categories_by_id($id){

		$this->db->where('id', $id);
        $query = $this->db->get('categories');
		$data_result = $query->row();
			
			if($data_result){
			
			 return $data_result;
			 
		}else{ 
		
		$data_result['error'] = 'Not found categories details...';
		return $data_result;
		
		}

    }
	
	
	
	// oder by sub cat data or post data get 
	public function sub_category_slug_orderby_get_post($subcategory_id){
		$this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->where('subcategory_id', $subcategory_id);
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->result();
			
	}
	
}
?>