<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_image_model extends CI_Model
{

    //add post images
    public function add_post_images($post_id)
    {
        //get files
        $images = array();
        foreach ($_FILES['add_file'] as $k => $l) {
            foreach ($l as $i => $v) {
                if (!array_key_exists($i, $images))
                    $images[$i] = array();
                $images[$i][$k] = $v;
            }
        }

        foreach ($images as $file) {
            if (!empty($file['name'])) {
                //upload images
                $data["image_big"] = $this->upload_model->post_big_image_upload($post_id, $file);
                $data["image_default"] = $this->upload_model->post_default_image_upload($post_id, $file);
                $data["post_id"] = $post_id;

                $this->db->insert('post_images', $data);
            }
        }
    }

    //get post images
    public function get_post_images($post_id)
    {
        $this->db->where('post_id', $post_id);
        $query = $this->db->get('post_images');
        return $query->result();
    }

    //get post image
    public function get_post_image($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('post_images');
        return $query->row();
    }

    //get post image count
    public function get_post_image_count($post_id)
    {
        $this->db->where('post_id', $post_id);
        $query = $this->db->get('post_images');
        return $query->num_rows();
    }

    //delete post images
    public function delete_post_images($post_id)
    {
        //find images
        $images = $this->post_image_model->get_post_images($post_id);
        foreach ($images as $image) {
            if ($image) {
                //delete
                delete_image_from_server($image->image_big);
                delete_image_from_server($image->image_default);

                $this->db->where('id', $image->id);
                $this->db->delete('post_images');
            }
        }
    }

    //delete post image
    public function delete_post_image($image_id)
    {
        //find image
        $image = $this->post_image_model->get_post_image($image_id);

        if ($image) {
            //delete from folder
            delete_image_from_server($image->image_big);
            delete_image_from_server($image->image_default);

            $this->db->where('id', $image_id);
            $this->db->delete('post_images');
        }

    }
}