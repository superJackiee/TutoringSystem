<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'title' => $this->input->post('title', true),
            'category_id' => $this->input->post('category_id', true),
            'path_big' => $this->input->post('path_big', true),
            'path_small' => $this->input->post('path_small', true)
        );
        return $data;
    }

    public function slider_input_values()
    {
        $data = array(
            'title' => $this->input->post('title', true),
            'slider_description' => $this->input->post('slider_description', true),
            'path_big' => $this->input->post('path_big', true),
            'path_small' => $this->input->post('path_small', true),
            'favcolor'  => $this->input->post('favcolor',true)
        );
        return $data;
    }

    public function slider_add()
    {
        $data = $this->slider_input_values();
        //get file
        $file = $_FILES['file'];
        if (!empty($file['name'])) {
            //upload images
            $data["path_big"] = $this->upload_model->gallery_big_image_upload($file);
            $data["path_small"] = $this->upload_model->gallery_small_image_upload($file);
        } else {
            $data['path_big'] = "";
            $data['path_small'] = "";
        }

        return $this->db->insert('slider', $data);
    }

     //get slider images
     public function slider_get_images()
     {
        $this->db->select('*');
        $this->db->from('slider');
        $query = $this->db->get();
        return $query->result();
     }

     //get image
    public function slider_get_image($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('slider');
        return $query->row();
    }

    //delete image
    public function slider_delete($id)
    {
        $image = $this->slider_get_image($id);

        if (!empty($image)) {
            //delete image
            delete_image_from_server($image->path_big);
            delete_image_from_server($image->path_small);

            $this->db->where('id', $id);
            return $this->db->delete('slider');
        } else {
            return false;
        }

    }

    //update_slider image
    public function update_slider($id)
    {
        $data = $this->slider_input_values();
        //get file
        $file = $_FILES['file'];

        if (!empty($file['name'])) {
            //delete old image
            $image = $this->slider_get_image($id);

            //delete image
            delete_image_from_server($image->path_big);
            delete_image_from_server($image->path_small);

            //upload new image
            $data["path_big"] = $this->upload_model->gallery_big_image_upload($file);
            $data["path_small"] = $this->upload_model->gallery_small_image_upload($file);

            $this->db->where('id', $id);
            return $this->db->update('slider', $data);
        }

        $this->db->where('id', $id);
        return $this->db->update('slider', $data);
    }



    //add image
    public function add()
    {
        $data = $this->input_values();

        //get file
        $file = $_FILES['file'];
        if (!empty($file['name'])) {
            //upload images
            $data["path_big"] = $this->upload_model->gallery_big_image_upload($file);
            $data["path_small"] = $this->upload_model->gallery_small_image_upload($file);
        } else {
            $data['path_big'] = "";
            $data['path_small'] = "";
        }

        return $this->db->insert('gallery', $data);
    }

    //get gallery images
    public function get_images()
    {
        $this->db->join('gallery_categories', 'gallery.category_id = gallery_categories.id');
        $this->db->select('gallery.* , gallery_categories.name as category_name');
        $this->db->order_by('gallery.id', 'DESC');
        $query = $this->db->get('gallery');
        return $query->result();
    }

    //get gallery images by category
    public function get_images_by_category($category_id)
    {
        $this->db->join('gallery_categories', 'gallery.category_id = gallery_categories.id');
        $this->db->select('gallery.* , gallery_categories.name as category_name');
        $this->db->where('category_id', $category_id);
        $this->db->order_by('gallery.id', 'DESC');
        $query = $this->db->get('gallery');
        return $query->result();
    }

    //get category image count
    public function get_category_image_count($category_id)
    {
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('gallery');
        return $query->num_rows();
    }

    //get image
    public function get_image($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('gallery');
        return $query->row();
    }

    //update image
    public function update($id)
    {
        $data = $this->input_values();

        //get file
        $file = $_FILES['file'];

        if (!empty($file['name'])) {
            //delete old image
            $image = $this->get_image($id);

            //delete image
            delete_image_from_server($image->path_big);
            delete_image_from_server($image->path_small);

            //upload new image
            $data["path_big"] = $this->upload_model->gallery_big_image_upload($file);
            $data["path_small"] = $this->upload_model->gallery_small_image_upload($file);

            $this->db->where('id', $id);
            return $this->db->update('gallery', $data);
        }

        $this->db->where('id', $id);
        return $this->db->update('gallery', $data);
    }


    //delete image
    public function delete($id)
    {
        $image = $this->get_image($id);

        if (!empty($image)) {
            //delete image
            delete_image_from_server($image->path_big);
            delete_image_from_server($image->path_small);

            $this->db->where('id', $id);
            return $this->db->delete('gallery');
        } else {
            return false;
        }

    }
}