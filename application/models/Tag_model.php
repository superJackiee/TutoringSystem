<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag_model extends CI_Model
{

    //add post tags
    public function add_post_tags($post_id)
    {
        //tags
        $tags = trim($this->input->post('tags', true));

        $tags_array = explode(",", $tags);
        foreach ($tags_array as $tag) {
            if (strlen($tag) > 1) {
                $data = array(
                    'post_id' => $post_id,
                    'tag' => trim($tag),
                    'tag_slug' => str_slug(trim($tag))
                );
                //insert tag
                $this->db->insert('tags', $data);
            }
        }
    }

    //update post tags
    public function update_post_tags($post_id)
    {
        //delete old tags
        $this->delete_post_tags($post_id);

        //add new tags
        $tags = trim($this->input->post('tags', true));

        $tags_array = explode(",", $tags);
        foreach ($tags_array as $tag) {
            if (strlen($tag) > 1) {
                $data = array(
                    'post_id' => $post_id,
                    'tag' => trim($tag),
                    'tag_slug' => str_slug(trim($tag))
                );
                //insert tag
                $this->db->insert('tags', $data);
            }
        }
    }

    //get random tags
    public function get_random_tags()
    {
        $this->db->join('posts', 'posts.id = tags.post_id');
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->select('tags.* , posts.visibility as post_visibility');
        $this->db->group_by('tag_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->order_by('rand()');
        $this->db->limit(15);
        $query = $this->db->get('tags');
        return $query->result();
    }

    //get tags
    public function get_tags()
    {
        $this->db->join('posts', 'posts.id = tags.post_id');
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->select('tags.* , posts.visibility as post_visibility');
        $this->db->group_by('tag_slug');
        $this->db->order_by('tags.id', 'DESC');
        $this->db->where('posts.visibility', 1);
        $query = $this->db->get('tags');
        return $query->result();
    }

    //get tag
    public function get_tag($tag_slug)
    {
        $this->db->where('tag_slug', $tag_slug);
        $query = $this->db->get('tags');
        return $query->row();
    }

    //get posts tags
    public function get_post_tags($post_id)
    {
        $this->db->where('post_id', $post_id);
        $query = $this->db->get('tags');
        return $query->result();
    }

    //delete tags
    public function delete_post_tags($post_id)
    {
        //find tags
        $tags = $this->get_post_tags($post_id);

        foreach ($tags as $tag) {
            //delete
            $this->db->where('id', $tag->id);
            $this->db->delete('tags');
        }
    }
}