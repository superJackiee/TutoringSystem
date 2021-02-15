<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_widget_model extends CI_Model{
	
	function __construct(){
			 parent::__construct();
			 $this->load->model('Api_model');
			 $this->load->model('Api_reading_list_model');
			 $this->load->model('Api_video_model');
			 $this->load->model('Api_categories_model');
			 $this->load->model('Api_gallery_model');
			 $this->load->model('Api_tags_model');
			 $this->load->model('Api_login_model');
			 $this->load->model('Api_voting_model');
			 $this->load->model('Api_author_model');
			 
			
		 }
		 
	//get widgets

    public function get_widgets()

    {

        $this->db->order_by('widget_order');

        $query = $this->db->get('widgets');

        return $query->result();
		
		

    }
	
	public function get_widgets_type($type)

    {
		 $this->db->where('type', $type);
        $this->db->order_by('widget_order');

        $query = $this->db->get('widgets');

       $data = $query->row();
	   
	   return  $data;
    }

	
}
?>