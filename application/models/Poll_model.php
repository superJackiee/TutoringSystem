<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poll_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'question' => $this->input->post('question', true),
            'option1' => $this->input->post('option1', true),
            'option2' => $this->input->post('option2', true),
            'option3' => $this->input->post('option3', true),
            'option4' => $this->input->post('option4', true),
            'option5' => $this->input->post('option5', true),
            'option6' => $this->input->post('option6', true),
            'option7' => $this->input->post('option7', true),
            'option8' => $this->input->post('option8', true),
            'option9' => $this->input->post('option9', true),
            'option10' => $this->input->post('option10', true),
            'status' => $this->input->post('status', true)
        );
        return $data;
    }

    //add poll
    public function add()
    {
        $data = $this->input_values();
        return $this->db->insert('polls', $data);
    }

    //update poll
    public function update($id)
    {
        //set values
        $data = $this->input_values();
        $this->db->where('id', $id);
        return $this->db->update('polls', $data);
    }

    //get polls
    public function get_polls()
    {
        $this->db->order_by('polls.id', 'DESC');
        $query = $this->db->get('polls');
        return $query->result();
    }

    //get total vote count
    public function get_total_vote_count($poll_id)
    {
        $this->db->where('poll_votes.poll_id', $poll_id);
        $query = $this->db->get('poll_votes');
        return $query->num_rows();
    }

    //get option vote count
    public function get_option_vote_count($poll_id, $option)
    {
        $this->db->where('poll_votes.poll_id', $poll_id);
        $this->db->where('poll_votes.vote', $option);
        $query = $this->db->get('poll_votes');
        return $query->num_rows();
    }

    //get total votes
    public function get_total_votes($poll_id)
    {
        $this->db->where('poll_votes.poll_id', $poll_id);
        $query = $this->db->get('poll_votes');
        return $query->num_rows();
    }

    //get poll
    public function get_poll($id)
    {
        $this->db->where('polls.id', $id);
        $query = $this->db->get('polls');
        return $query->row();
    }

    //get user vote
    public function get_user_vote($poll_id, $user_id)
    {
        $this->db->where('poll_votes.poll_id', $poll_id);
        $this->db->where('poll_votes.user_id', $user_id);
        $query = $this->db->get('poll_votes');
        return $query->row();
    }

    //add vote
    public function add_vote($poll_id, $user_id, $option)
    {
        $data = array(
            'poll_id' => $poll_id,
            'user_id' => $user_id,
            'vote' => $option
        );

        return $this->db->insert('poll_votes', $data);
    }


    //delete poll
    public function delete($id)
    {
        $poll = $this->get_poll($id);
        if (!empty($poll)) {

            //delete poll votes
            $this->db->where('poll_id', $id);
            $this->db->delete('poll_votes');

            $this->db->where('id', $id);
            return $this->db->delete('polls');
        } else {
            return false;
        }
    }
}