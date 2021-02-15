<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ad_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'header_728' => $this->input->post('header_728', false),
            'header_468' => $this->input->post('header_468', false),
            'header_234' => $this->input->post('header_234', false),

            'index_728_top' => $this->input->post('index_728_top', false),
            'index_468_top' => $this->input->post('index_468_top', false),
            'index_234_top' => $this->input->post('index_234_top', false),

            'index_728_bottom' => $this->input->post('index_728_bottom', false),
            'index_468_bottom' => $this->input->post('index_468_bottom', false),
            'index_234_bottom' => $this->input->post('index_234_bottom', false),

            'posts_728' => $this->input->post('posts_728', false),
            'posts_468' => $this->input->post('posts_468', false),
            'posts_234' => $this->input->post('posts_234', false),

            'videos_728' => $this->input->post('videos_728', false),
            'videos_468' => $this->input->post('videos_468', false),
            'videos_234' => $this->input->post('videos_234', false),

            'category_728' => $this->input->post('category_728', false),
            'category_468' => $this->input->post('category_468', false),
            'category_234' => $this->input->post('category_234', false),

            'tag_728' => $this->input->post('tag_728', false),
            'tag_468' => $this->input->post('tag_468', false),
            'tag_234' => $this->input->post('tag_234', false),

            'search_728' => $this->input->post('search_728', false),
            'search_468' => $this->input->post('search_468', false),
            'search_234' => $this->input->post('search_234', false),

            'post_details_728' => $this->input->post('post_details_728', false),
            'post_details_468' => $this->input->post('post_details_468', false),
            'post_details_234' => $this->input->post('post_details_234', false),

            'sidebar_300' => $this->input->post('sidebar_300', false),
            'sidebar_234' => $this->input->post('sidebar_234', false),
        );
        return $data;
    }

    //add ads
    public function update_ads()
    {
        $this->db->where('id', 1);
        $data = $this->ad_model->input_values();
        return $this->db->update('ads', $data);
    }


    //get ads
    public function get_ads()
    {
        $query = $this->db->get_where('ads');
        return $query->row();
    }

}