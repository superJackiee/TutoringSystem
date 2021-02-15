<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_category_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'name' => $this->input->post('name', true)
        );
        return $data;
    }

    //add category
    public function add()
    {
        $data = $this->input_values();
        return $this->db->insert('gallery_categories', $data);
    }

    //get gallery categories
    public function get_categories()
    {
        $query = $this->db->get('gallery_categories');
        return $query->result();
    }

    //get category count
    public function get_category_count()
    {
        $query = $this->db->get('gallery_categories');
        return $query->num_rows();
    }

    //get category
    public function get_category($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('gallery_categories');
        return $query->row();
    }

    //update category
    public function update($id)
    {
        $data = $this->input_values();

        $this->db->where('id', $id);
        return $this->db->update('gallery_categories', $data);
    }

    //delete category
    public function delete($id)
    {
        $category = $this->get_category($id);

        if (!empty($category)) {
            $this->db->where('id', $id);
            return $this->db->delete('gallery_categories');
        } else {
            return false;
        }

    }


}