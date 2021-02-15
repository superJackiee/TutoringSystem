<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'name' => $this->input->post('name', true),
            'name_slug' => $this->input->post('name_slug', true),
            'parent_id' => $this->input->post('parent_id', true),
            'description' => $this->input->post('description', true),
            'keywords' => $this->input->post('keywords', true),
            'color' => $this->input->post('color', true),
            'category_order' => $this->input->post('category_order', true),
            'block_type' => $this->input->post('block_type', true),
        );
        return $data;
    }

    //add category
    public function add_category()
    {
        $data = $this->input_values();

        if (empty($data["name_slug"])) {
            //slug for title
            $data["name_slug"] = str_slug($data["name"]);
        }

        return $this->db->insert('categories', $data);
    }

    //add subcategory
    public function add_subcategory()
    {
        $data = $this->input_values();

        $category = helper_get_category($data["parent_id"]);

        if ($category) {
            $data["color"] = $category->color;
        } else {
            $data["color"] = "#0a0a0a";
        }

        if (empty($data["name_slug"])) {
            //slug for title
            $data["name_slug"] = str_slug($data["name"]);
        }

        return $this->db->insert('categories', $data);
    }

    //get category
    public function get_category($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('categories');
        return $query->row();
    }

    //get top categories
    public function get_categories()
    {
        $this->db->where('parent_id', 0);
        $this->db->order_by('category_order');
        $query = $this->db->get('categories');
        return $query->result();
    }

    //get subcategories
    public function get_subcategories()
    {
        $this->db->where('parent_id !=', 0);
        $query = $this->db->get('categories');
        return $query->result();
    }

    //get subcategories by id
    public function get_subcategories_by_parent_id($parent_id)
    {
        $this->db->where('parent_id', $parent_id);
        $query = $this->db->get('categories');
        return $query->result();
    }

    //get category count
    public function get_category_count()
    {
        $query = $this->db->get('categories');
        return $query->num_rows();
    }


    //update category
    public function update_category($id)
    {
        $data = $this->input_values();

        if (empty($data["name_slug"])) {
            //slug for title
            $data["name_slug"] = str_slug($data["name"]);
        }

        $category = helper_get_category($id);
        //check if parent
        if ($category->parent_id == 0) {
            $this->update_subcategories_color($id, $data["color"]);
        } else {
            $category = helper_get_category($data["parent_id"]);
            if ($category) {
                $data["color"] = $category->color;
            } else {
                $data["color"] = "#0a0a0a";
            }
        }

        $this->db->where('id', $id);
        return $this->db->update('categories', $data);
    }

    //update subcategory
    public function update_subcategory($id)
    {
        $data = $this->input_values();

        if (empty($data["name_slug"])) {
            //slug for title
            $data["name_slug"] = str_slug($data["name"]);
        }

        $this->db->where('id', $id);
        return $this->db->update('categories', $data);
    }

    //update subcategory color
    public function update_subcategories_color($parent_id, $color)
    {
        $categories = $this->get_subcategories_by_parent_id($parent_id);

        foreach ($categories as $item) {
            $data = array(
                'color' => $color,
            );

            $this->db->where('parent_id', $parent_id);
            return $this->db->update('categories', $data);
        }
    }


    //delete category
    public function delete_category($id)
    {
        $category = $this->get_category($id);

        if (!empty($category)) {
            $this->db->where('id', $id);
            return $this->db->delete('categories');
        } else {
            return false;
        }
    }

}