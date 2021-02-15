<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api_gallery_model extends CI_Model {

	
	
	//get gallery images

    public function get_images()

    {

        $this->db->join('gallery_categories', 'gallery.category_id = gallery_categories.id');

        $this->db->select('gallery.* , gallery_categories.name as category_name');

        $this->db->order_by('gallery.id', 'DESC');

        $query = $this->db->get('gallery');

        $data_result = $query->result();
		
		if($data_result){
			
			 return $data_result;
			 
		}else{ 
		
		$data_result['error'] = 'Not found gallery images details...';
		
		return $data_result;
		
		}

    }

	//get gallery_categories DESC data

    public function get_gallery_categories_desc() {

		
        $query = $this->db->get('gallery_categories');
        $data_result = $query->result();
		
		foreach($data_result as $val){
			
			 $result[] =['id'=>$val->id,
			 'category_name'=>$val->name,
			 'created_at'=>$val->created_at,
			 'gallery_data'=>$this->get_categories_gallery($val->id),
			 ];
			
			 
		}
		
		return $result;
			
    }
	
	//get gallery category by id images
    public function get_categories_gallery($id) {

		 $this->db->where('gallery.category_id', $id);
        $query = $this->db->get('gallery');

		$data_result = $query->result();
		
		if($data_result){
			
			 return $data_result;
			 
		}else{ 
		
		$data_result['error'] = 'Not found gallery images details...';
		
		return $data_result;
		
		}
		
    }
	
	//get gallery images

    public function get_gallery_categories_images($id) {

        $this->db->join('gallery_categories', 'gallery.category_id = gallery_categories.id');

        $this->db->select('gallery.* , gallery_categories.name as category_name');

        $this->db->order_by('gallery.id', 'DESC');
		 $this->db->where('gallery.category_id', $id);
        $query = $this->db->get('gallery');

		$data_result = $query->result();
		
			 return $data_result;
			 
    }
	
}

?>