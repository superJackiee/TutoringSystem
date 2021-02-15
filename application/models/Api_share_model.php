<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_share_model extends CI_Model{
     
         
		 function __construct()
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
      
	  //share_facebook
       public function share_facebook($post_type,$title_slug,$post_id){
		   
		   if($post_type && $title_slug && $post_id){
		
		$share = 'https://www.facebook.com/sharer/sharer.php?u=https://www.tallypost.com/'.$post_type.'/'.$title_slug.'/'.$post_id;

			return $share;
		}else{
			
			echo json_encode(['error_json'=>'Not share...','status'=>0]);
		
		}
	   
	   } 
	   
	   //share_twitter
	   public function share_twitter($post_type,$title_slug,$post_id,$title){
		   
		   if($post_type && $title_slug && $post_id && $title){
		
		$share = 'https://twitter.com/share?url=https://www.tallypost.com/'. $post_type .'/'. $title_slug .'/'. $post_id .'&amp;text='. $title;

			return $share;
		
		}else{
			
			echo json_encode(['error_json'=>'Not share...','status'=>0]);
		
		}
		
	   }
		
		//share_twitter
	   public function share_plus_google($post_type,$title_slug,$post_id){
		   
		   if($post_type && $title_slug && $post_id){
		
		$share = 'https://plus.google.com/share?url=https://www.tallypost.com/'. $post_type .'/'. $title_slug .'/'. $post_id;

			return $share;
		
		}else{
			
			echo json_encode(['error_json'=>'Not share...','status'=>0]);
		
		}
		
	   }

	   //share_linkedin
	   public function share_linkedin($post_type,$title_slug,$post_id){
		   
		   if($post_type && $title_slug && $post_id){
		
		$share = 'https://www.linkedin.com/shareArticle?mini=true&url=https://www.tallypost.com/'. $post_type .'/'. $title_slug .'/'. $post_id;

			return $share;
		
		}else{
			
			echo json_encode(['error_json'=>'Not share...','status'=>0]);
		
		}
		
	   }
			
	 //share_pinterest
	   public function share_pinterest($post_type,$title_slug,$post_id,$image_url){
		   
		   if($post_type && $title_slug && $post_id && $image_url){
		
		$share = 'http://pinterest.com/pin/create/button/?url=https://www.tallypost.com/'. $post_type .'/'. $title_slug .'/'. $post_id .'&amp;media=https://www.tallypost.com/uploads/images/'. $image_url;

			return $share;
		
		}else{
			
			echo json_encode(['error_json'=>'Not share...','status'=>0]);
		
		}
		
	   }
	   
	   //share_tumblr
	   public function share_tumblr($post_type,$title_slug,$post_id,$title){
		   
		   if($post_type && $title_slug && $post_id && $title){
		
		$share = 'http://www.tumblr.com/share/link?url=https://www.tallypost.com/'. $post_type .'/'. $title_slug .'/'. $post_id .'&title='. $title;

			return $share;
		
		}else{
			
			echo json_encode(['error_json'=>'Not share...','status'=>0]);
		
		}
		
	   }
	   
}
?>