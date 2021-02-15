<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_voting_model extends CI_Model {
	
	
	
	 public function __construct(){

        parent::__construct();

        $this->load->library('bcrypt');
		$this->load->model('Api_author_model');

    }
	
	// get recent vote 
	public function get_recent_vote_posts(){
	$this->db->order_by('polls.id', 'DESC');
	$this->db->where('status','1');
	$query = $this->db->get('polls');
	return $query->result();
	}
	
	//get total yes votes

    public function add_votes($userid,$poll_id,$voting){
		
		$check = $this->Api_author_model->get_user($userid);
		$vote_id = $this->get_vote_by_poll_id($poll_id);
		
		if($check && $vote_id){
			
				$user_id = $check->id;
				$user_email = $check->email;
				$vote_user_id_check = $this->get_votes_by_id($user_id,$poll_id);
				
				if($vote_user_id_check){
				
					$data_result['add_voting'] = false;
					$data_result['title'] = 'You already voted this poll before.';

					return $data_result;
				
				}else{
					
					$user_id = $check->id;
					$data = array('user_id'=>$user_id,'poll_id'=>$poll_id,'vote'=>$voting);

					$query['add_voting'] = $this->db->insert('poll_votes', $data);
					$query['title'] = 'Thanks for your vote...';
					return $query; 
					
				}
	
			}else{
			
			$data_result['error'] = 'Not match your details...';
			
				return $data_result;
			}	 
    }
	
	// get_polls_data
	public function get_polls_data($option){
		
		
			$option_votes = array('option1','option2','option3','option4','option5','option6','option8','option9','option10');
			
			if (in_array($option, $option_votes)){
				
				return $option;
			}
			
			
    }
	
	//get vote by poll id
	public function get_vote_by_poll_id($id){

		$this->db->where('id',$id);
		$this->db->where('status','1');
		$query = $this->db->get('polls');
		$result = $query->row();
		return $result;
	}


	//get total no votes

    public function get_total_voting($user_id,$poll_id) {
      
		$check = $this->get_votes_by_id($user_id,$poll_id);
		
	 if($check){
		 
		$total_vote = $this->get_total_votes_count_by_poll_id($poll_id);
	
			$vote_result['option1_yes'] = $this->get_option_vote_count($poll_id,'option1');
			$vote_result['option2_no'] = $this->get_option_vote_count($poll_id,'option2');
			$vote_result['option3_yes'] = $this->get_option_vote_count($poll_id,'option3');
			$vote_result['option4_no'] = $this->get_option_vote_count($poll_id,'option4');
			$vote_result['option5_yes'] = $this->get_option_vote_count($poll_id,'option5');
			$vote_result['option6_no'] = $this->get_option_vote_count($poll_id,'option6');
			$vote_result['option7_yes'] = $this->get_option_vote_count($poll_id,'option7');
			$vote_result['option8_no'] = $this->get_option_vote_count($poll_id,'option8');
			$vote_result['option9_yes'] = $this->get_option_vote_count($poll_id,'option9');
			$vote_result['option10_no'] = $this->get_option_vote_count($poll_id,'option10');
			$vote_result['voting_parseint'] = $this->parseint_voting($poll_id,$total_vote);
			
			return $vote_result; 
	
		}else{
			
			$data_result['error'] = 'Not match your email id...';
			
				return $data_result;
		}	
    }
	
	//get votes by id
	public function get_votes_by_id($user_id,$poll_id){
		
		$this->db->where('user_id',$user_id);
		$this->db->where('poll_id',$poll_id);
		$query = $this->db->get('poll_votes');
		 
		 return $query->result();
		
		}
		
	//get total votes count by poll_id

	public function get_total_votes_count_by_poll_id($poll_id)

	{

	$this->db->where('poll_votes.poll_id', $poll_id);

	$query = $this->db->get('poll_votes');

	return $query->num_rows();

	}

	 public function get_option_vote_count($poll_id,$option) {
      
	 
		  $this->db->where('poll_votes.poll_id', $poll_id);

        $this->db->where('poll_votes.vote', $option);

        $query = $this->db->get('poll_votes');

        return $query->num_rows();
		
    }
	
	public function parseint_voting($poll_id,$total_vote){

		$option_vote1 = $this->get_option_vote_count($poll_id,'option1');

		$percent1 = round(($option_vote1 * 100) / $total_vote);

		if ($percent1 == 0){

		$ta['option1_yes']  = $percent1 .'%';

		}else{
		$ta['option1_yes'] = $percent1 .'%';
		} 

		$option_vote2 = $this->get_option_vote_count($poll_id,'option2');

		$percent2 = round(($option_vote2 * 100) / $total_vote);

		if ($percent2 == 0){

		$ta['option2_no'] = $percent2 .'%';

		}else{
			
		$ta['option2_no'] = $percent2 .'%';
		
		} 
		
		$option_vote3 = $this->get_option_vote_count($poll_id,'option3');

		$percent3 = round(($option_vote3 * 100) / $total_vote);

		if ($percent3 == 0){

		$ta['option3_yes'] = $percent3 .'%';

		}else{
			
		$ta['option3_yes'] = $percent3 .'%';
		
		} 
		
		
		$option_vote4 = $this->get_option_vote_count($poll_id,'option4');

		$percent4 = round(($option_vote4 * 100) / $total_vote);

		if ($percent4 == 0){

		$ta['option4_no'] = $percent4 .'%';

		}else{
			
		$ta['option4_no'] = $percent4 .'%';
		
		} 
		
		$option_vote5 = $this->get_option_vote_count($poll_id,'option5');

		$percent5 = round(($option_vote5 * 100) / $total_vote);

		if ($percent5 == 0){

		$ta['option5_yes'] = $percent5 .'%';

		}else{
			
		$ta['option5_yes'] = $percent5 .'%';
		
		} 
		
		$option_vote6 = $this->get_option_vote_count($poll_id,'option6');

		$percent6 = round(($option_vote6 * 100) / $total_vote);

		if ($percent6 == 0){

		$ta['option6_no'] = $percent6 .'%';

		}else{
			
		$ta['option6_no'] = $percent6 .'%';
		
		} 
		
		$option_vote7 = $this->get_option_vote_count($poll_id,'option7');

		$percent7 = round(($option_vote7 * 100) / $total_vote);

		if ($percent7 == 0){

		$ta['option7_yes'] = $percent7 .'%';

		}else{
			
		$ta['option7_yes'] = $percent7 .'%';
		
		} 
		
		$option_vote8 = $this->get_option_vote_count($poll_id,'option8');

		$percent8 = round(($option_vote8 * 100) / $total_vote);

		if ($percent8 == 0){

		$ta['option8_no'] = $percent8 .'%';

		}else{
			
		$ta['option8_no'] = $percent8 .'%';
		
		} 
		
		$option_vote9 = $this->get_option_vote_count($poll_id,'option9');

		$percent9 = round(($option_vote9 * 100) / $total_vote);

		if ($percent9 == 0){

		$ta['option9_yes'] = $percent9 .'%';

		}else{
			
		$ta['option9_yes'] = $percent9 .'%';
		
		} 
		$option_vote10 = $this->get_option_vote_count($poll_id,'option10');

		$percent10 = round(($option_vote10 * 100) / $total_vote);

		if ($percent10 == 0){

		$ta['option10_no'] = $percent10 .'%';

		}else{
			
		$ta['option10_no'] = $percent10 .'%';
		
		} 
		return $ta;
		
	}
 	
		
	//get vote
	public function vote_show(){
			
		$this->db->order_by('polls.id', 'DESC');
		$this->db->where('status','1');
		$query = $this->db->get('polls');
		 $result = $query->result();
		 return $result;
		}

		
		// user id by get voting data or poll
	public function user_oder_volting_data_get($id){
		$this->db->join('users', 'poll_votes.user_id = users.id');
        $this->db->join('polls', 'poll_votes.poll_id = polls.id');
        $this->db->select('poll_votes.*, polls.question as polls_question, polls.option1 as polls_option1, polls.option2 as polls_option2, polls.option3 as polls_option3, polls.option4 as polls_option4, polls.option5 as polls_option5, polls.option6 as polls_option6, polls.option7 as polls_option7, polls.option8 as polls_option8, polls.option9 as polls_option9, polls.option10 as polls_option10, polls.created_at as polls_created_at, users.username as users_name , users.email as users_email, users.role as users_role, users.user_type as users_user_type, users.google_id as users_google_id, users.facebook_id as users_facebook_id, users.avatar as users_avatar, users.status as users_status, users.about_me as users_about_me, users.facebook_url as users_facebook_url, users.twitter_url as users_twitter_url, users.google_url as users_google_url, users.instagram_url as users_instagram_url, users.pinterest_url as users_pinterest_url, users.linkedin_url as users_linkedin_url, users.vk_url as users_vk_url, users.youtube_url as users_youtube_url, users.created_at as users_created_at');
        $this->db->where('user_id', $id);
        $query = $this->db->get('poll_votes');
        return $query->result();
	}
	
	
		
}