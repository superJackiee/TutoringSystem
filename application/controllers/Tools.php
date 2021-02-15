<?php
error_reporting(0);

class Tools extends CI_Controller {

	
		 
       function index(){
		   $type = $this->uri->segment(2);
			
			switch($type)
		    {
			
				case 'test';
				$this->TEST_function();
				break;
				
				case 'login';
				$this->login_function();
				break;
				
				default:
				echo 'not found....';
				break;
			}
		}
		
		 function view()
		 {
		 	 $this->load->view('test');
		 }
		
		
			function TEST_function(){
			 
			 
			 print_r($this->input->post('name'));
			
        
		}
			
			
}

