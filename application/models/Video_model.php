<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model
{

    //input values
    public function input_values()
    {
        $data = array(
            'title' => $this->input->post('title', true),
            'title_slug' => $this->input->post('title_slug', true),
            'content' => $this->input->post('content', false),
            'summary' => $this->input->post('summary', true),
            'image_default' => $this->input->post('image_default', true),
            'image_url' => $this->input->post('image_url', true),
            'embed_code' => $this->input->post('embed_code', true),
            'optional_url' => $this->input->post('optional_url', true),
            'need_auth' => $this->input->post('need_auth', true),
            'user_id' => $this->input->post('user_id', true),
            'visibility' => $this->input->post('visibility', true),
            'keywords' => $this->input->post('keywords', true),
        );
        return $data;
    }

    //add video
    public function add()
    {
        $data = $this->input_values();

        if (!$data["need_auth"]) {
            $data["need_auth"] = 0;
        }

        $data["post_type"] = "video";
        $data['user_id'] = user()->id;

        if (empty($data["title_slug"])) {
            //slug for title
            $data["title_slug"] = str_slug($data["title"]);
        }

        return $this->db->insert('posts', $data);
    }

    //add video image
    public function add_image($post_id)
    {
        //get file
        $file = $_FILES['file'];
        if (!empty($file['name'])) {
            //upload image
            $data["image_default"] = $this->upload_model->video_image_upload($post_id, $file);

            $this->db->where('id', $post_id);
            return $this->db->update('posts', $data);
        }
    }


    //update video
    public function update($id)
    {
        $data = $this->input_values();

        if (!$data["need_auth"]) {
            $data["need_auth"] = 0;
        }

        if (is_author()) {
            $data["visibility"] = 0;
        }

        //slug for title
        if (empty($data["title_slug"])) {
            //slug for title
            $data["title_slug"] = str_slug($data["title"]);
        }

        $this->db->where('id', $id);
        return $this->db->update('posts', $data);
    }


    //update video image
    public function update_image($post_id)
    {
        //get file
        $file = $_FILES['file'];

        if (!empty($file['name'])) {
            //delete old image
            $video = $this->get_video($post_id);

            //delete image
            delete_image_from_server($video->image_default);

            //upload new image
            $data["image_default"] = $this->upload_model->video_image_upload($post_id, $file);

            $this->db->where('id', $post_id);
            return $this->db->update('posts', $data);
        }
    }

    //get videos
    public function get_videos_backend()
    {
        //check if user author
        if (user()->role == "author"):
            $author_id = user()->id;
            $this->db->where('post_type', "video");
            $this->db->where('posts.visibility', 1);
            $this->db->where('posts.user_id', $author_id);
            $this->db->order_by('posts.id', 'DESC');
            $query = $this->db->get('posts');
            return $query->result();
        else:
            $this->db->where('post_type', "video");
            $this->db->where('posts.visibility', 1);
            $this->db->order_by('posts.id', 'DESC');
            $query = $this->db->get('posts');
            return $query->result();
        endif;
    }

    //get pending videos
    public function get_pending_videos()
    {
        //check if user author
        if (user()->role == "author"):
            $author_id = user()->id;
            $this->db->where('post_type', "video");
            $this->db->where('posts.visibility', 0);
            $this->db->where('posts.user_id', $author_id);
            $this->db->order_by('posts.id', 'DESC');
            $query = $this->db->get('posts');
            return $query->result();
        else:
            $this->db->where('post_type', "video");
            $this->db->where('posts.visibility', 0);
            $this->db->order_by('posts.id', 'DESC');
            $query = $this->db->get('posts');
            return $query->result();
        endif;
    }

    //get videos
    public function get_videos()
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->select('posts.*,users.username as username, users.slug as user_slug');
        $this->db->where('post_type', "video");
        $this->db->where('posts.visibility', 1);
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->result();
    }
	

    //get last videos
    public function get_last_videos($limit)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->select('posts.*,users.username as username, users.slug as user_slug');
        $this->db->where('post_type', "video");
        $this->db->where('posts.visibility', 1);
        $this->db->order_by('posts.id', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get video count
    public function get_video_post_count()
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->select('posts.*,users.username as username, users.slug as user_slug');
        $this->db->where('post_type', "video");
        $this->db->where('posts.visibility', 1);
        $query = $this->db->get('posts');
        return $query->num_rows();
    }

    //get paginated videos
    public function get_paginated_video_posts($per_page, $offset)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->select('posts.*,users.username as username, users.slug as user_slug');
        $this->db->where('post_type', "video");
        $this->db->where('posts.visibility', 1);
        $this->db->order_by('posts.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get related videos
    public function get_related_videos($limit, $video_id)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->select('posts.*,users.username as username, users.slug as user_slug');
        $this->db->where('post_type', "video");
        $this->db->where('posts.id!=', $video_id);
        $this->db->where('posts.visibility', 1);
        $this->db->order_by('rand()');
        $this->db->limit($limit);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get popular videos
    public function get_popular_videos($limit)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->select('posts.*,users.username as username, users.slug as user_slug');
        $this->db->where('post_type', "video");
        $this->db->where('posts.visibility', 1);
        $this->db->order_by('hit', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get video
    public function get_video_backend($id)
    {
        $this->db->where('posts.id', $id);
        $this->db->where('post_type', "video");
        $query = $this->db->get('posts');
        return $query->row();
    }
		
    //get video
    public function get_video($id)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->select('posts.*,users.username as username, users.slug as user_slug');
        $this->db->where('post_type', "video");
        $this->db->where('posts.visibility', 1);
        $this->db->where('posts.id', $id);
        $query = $this->db->get('posts');
        return $query->row();
    }

    //get previous video
    public function get_previous_video($id)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->select('posts.*,users.username as username, users.slug as user_slug');
        $this->db->where('post_type', "video");
        $this->db->where('posts.visibility', 1);
        $this->db->where('posts.id <', $id);
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->row();
    }

    //get next video
    public function get_next_video($id)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->select('posts.*,users.username as username, users.slug as user_slug');
        $this->db->where('post_type', "video");
        $this->db->where('posts.visibility', 1);
        $this->db->where('posts.id >', $id);
        $this->db->order_by('posts.id');
        $query = $this->db->get('posts');
        return $query->row();
    }

    //approve video
    public function approve_video($id)
    {

        $data = array(
            'visibility' => 1,
        );

        $this->db->where('id', $id);
        return $this->db->update('posts', $data);
    } 
	
    //delete video
    public function delete($id)
    {
        $video = $this->video_model->get_video_backend($id);

        if (!empty($video)) {
            //delete video image
            delete_image_from_server($video->image_default);

            $this->db->where('id', $id);
            return $this->db->delete('posts');
        } else {
            return false;
        }
    }
}