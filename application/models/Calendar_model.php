<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends CI_Model {


/*Read the data from DB */
	Public function getEvents($id)
	{		
		$this->db->select('*');
		$this->db->from('events');
		$this->db->where("user_id",$id);
		$query = $this->db->get();
		return $query->result_array();
	}

/*Create new events */

	Public function addEvent()
	{
	$sql = "INSERT INTO events (user_id,to_time,from_time,color,events.start,events.end) VALUES (?,?,?,?,?,?)";
	$this->db->query($sql, array($_POST['user_id'], $_POST['to_time'], $_POST['from_time'], $_POST['color'], $_POST['start'], $_POST['end']));
		return ($this->db->affected_rows()!=1)?false:true;
	}

	/*Update  event */

	Public function updateEvent()
	{
	$sql = "UPDATE events SET to_time = ?, from_time = ?, color = ? WHERE id = ?";
	$this->db->query($sql, array($_POST['to_time'],$_POST['from_time'], $_POST['color'], $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}


	/*Delete event */

	Public function deleteEvent()
	{
	$sql = "DELETE FROM events WHERE id = ?";
	$this->db->query($sql, array($_GET['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}

	/*Update  event */

	Public function dragUpdateEvent()
	{
			//$date=date('Y-m-d h:i:s',strtotime($_POST['date']));

			$sql = "UPDATE events SET  events.start = ? ,events.end = ?  WHERE id = ?";
			$this->db->query($sql, array($_POST['start'],$_POST['end'], $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;


	}






}