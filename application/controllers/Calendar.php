<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

		function __construct()
    {
        // Call the Model constructor
        parent::__construct();

        $this->load->model('Calendar_model');
    }


	/*Home page Calendar view  */
	Public function index()
	{
		$this->load->view('home');
		header("Access-control-allow-origin:*");
	}

	/*Get all Events */

	Public function getEvents()
	{
//         $id = user()->id;
// 		$result=$this->Calendar_model->getEvents($id);
// 		echo json_encode($result);
        $id = user()->id;
		$data=$this->Calendar_model->getEvents($id);
		echo json_encode($data);
	}
	/*Add new event */
	Public function addEvent()
	{
		$result=$this->Calendar_model->addEvent();
		echo $result;
	}
	/*Update Event */
	Public function updateEvent()
	{
		$result=$this->Calendar_model->updateEvent();
		echo $result;
	}
	/*Delete Event*/
	Public function deleteEvent()
	{
		$result=$this->Calendar_model->deleteEvent();
		echo $result;
	}
	Public function dragUpdateEvent()
	{	

		$result=$this->Calendar_model->dragUpdateEvent();
		echo $result;
	}



}
