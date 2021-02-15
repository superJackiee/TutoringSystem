<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {
	
	public function __construct(){ 
	
	 parent::__construct();		

 	 $this->load->model('Api_comment_model');	

	 }	 
	 
    //get input values
    public function input_values(){
		
        $data = array(
            'post_id' => $this->input->post('post_id', true),
            'user_id' => $this->input->post('user_id', true),
            'parent_id' => $this->input->post('parent_id', true),
            'comment' => $this->input->post('comment', true)
        );
		
        return $data;
		
    }
		
    //add comment
    public function add_comment(){
        $data = $this->comment_model->input_values();		
		$insert  = $this->db->insert('comments', $data);	
		
				if($insert){
					$post_id = $data['post_id'];
					$result = $this->Api_comment_model->update_post_comment_by_post_id($post_id);
					return $result;
			}
    }

    //like comment
    public function like_comment($comment)
    {
        if (auth_check() && !empty($comment)) {

            $user_id = user()->id;

            if ($this->is_user_liked_comment($comment->id, user()->id) && user()->id != $comment->user_id):

                $data = array(
                    'comment_id' => $comment->id,
                    'user_id' => $user_id,
                );

                return $this->db->insert('comment_likes', $data);
            else:
                $this->db->where('comment_id', $comment->id);
                $this->db->where('user_id', $user_id);
                $this->db->delete('comment_likes');
            endif;

        } else {
            return false;
        }
    }

    //comment like count
    public function comment_like_count($id)
    {
        $this->db->where('comment_id', $id);
        $query = $this->db->get('comment_likes');
        return $query->num_rows();
    }

    //is user liked before
    public function is_user_liked_comment($comment_id, $user_id)
    {
        $this->db->where('comment_id', $comment_id);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('comment_likes');

        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    //get comment
    public function get_comment($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('comments');
        return $query->row();
    }


    //post comment count
    public function post_comment_count($post_id)
    {
        $this->db->where('post_id', $post_id);
        $query = $this->db->get('comments');
        return $query->num_rows();
    }

    //get first comments
    public function get_first_comments($post_id)
    {
        $this->db->join('users', 'comments.user_id = users.id');
        $this->db->where('post_id', $post_id);
        $this->db->where('parent_id', 0);
        $this->db->select('comments.* , users.avatar as user_avatar, users.id as user_id, users.username as username');
        $this->db->order_by('comments.id');
        $this->db->limit(2);
        $query = $this->db->get('comments');
        return $query->result();
    }

    //get comments
    public function get_comments($post_id)
    {
        $this->db->join('users', 'comments.user_id = users.id');
        $this->db->where('post_id', $post_id);
        $this->db->where('parent_id', 0);
        $this->db->select('comments.* , users.avatar as user_avatar, users.id as user_id, users.username as username');
        $this->db->order_by('comments.id');
        $query = $this->db->get('comments');
        return $query->result();
    }

    //get all comments
    public function get_all_comments()
    {
        $this->db->join('users', 'comments.user_id = users.id');
        $this->db->join('posts', 'comments.post_id = posts.id');
        $this->db->select('comments.* , users.email as user_email, users.id as user_id,users.username as username, posts.title as post_title ');
        $this->db->order_by('comments.id');
        $query = $this->db->get('comments');
        return $query->result();
    }

    //get last comments
    public function get_last_comments($limit)
    {
        $this->db->join('users', 'comments.user_id = users.id');
        $this->db->join('posts', 'comments.post_id = posts.id');
        $this->db->select('comments.* , users.avatar as user_avatar, users.username as username, posts.title_slug as post_slug, ');
        $this->db->order_by('comments.id', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('comments');
        return $query->result();
    }

    //get subcomments
    public function get_subcomments($comment_id)
    {
        $this->db->join('users', 'comments.user_id = users.id');
        $this->db->where('parent_id', $comment_id);
        $this->db->select('comments.* , users.avatar as user_avatar, users.id as user_id, users.username as username');
        $this->db->order_by('comments.id');
        $query = $this->db->get('comments');
        return $query->result();
    }

    //get post comment count
    public function get_post_comment_count($post_id)
    {
        $this->db->join('users', 'comments.user_id = users.id');
        $this->db->where('post_id', $post_id);
        $this->db->where('parent_id', 0);
        $this->db->select('comments.* , users.avatar as user_avatar');
        $query = $this->db->get('comments');
        return $query->num_rows();
    }

    //get comment count
    public function get_comment_count()
    {
        $query = $this->db->get('comments');
        return $query->num_rows();
    }

    //delete comment
    public function delete_comment($post_id,$id){	
	
			
        $subcomments = $this->get_subcomments($id);

        if (!empty($subcomments)) {

            foreach ($subcomments as $comment) {

                $this->delete_subcomments($comment->id);

                $this->db->where('id', $comment->id);
                $this->db->delete('comments');
            }
        }
		
		
       $this->db->where('id', $id);
		$comments_delete = $this->db->delete('comments');	
			if($comments_delete){
				$result = $this->Api_comment_model->update_post_comment_by_post_id($post_id);
					return $result;
			}
    }

    //delete sub comments
    public function delete_subcomments($id)
    {
        $subcomments = $this->get_subcomments($id);

        if (!empty($subcomments)) {
            foreach ($subcomments as $comment) {
                $this->db->where('id', $comment->id);
                $this->db->delete('comments');
            }
        }

    }

}