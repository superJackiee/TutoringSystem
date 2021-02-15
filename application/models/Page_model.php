<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'title' => $this->input->post('title', true),
            'slug' => $this->input->post('slug', true),
            'description' => $this->input->post('description', true),
            'keywords' => $this->input->post('keywords', true),
            'page_content' => $this->input->post('page_content', false),
            'page_order' => $this->input->post('page_order', true),
            'visibility' => $this->input->post('visibility', true),
            'title_active' => $this->input->post('title_active', true),
            'breadcrumb_active' => $this->input->post('breadcrumb_active', true),
            'right_column_active' => '0',
            'need_auth' => $this->input->post('need_auth', true),
            'location' => $this->input->post('location', true)
        );
        return $data;
    }

    //add page
    public function add()
    {
        $data = $this->page_model->input_values();

        if (empty($data["slug"])) {
            //slug for title
            $data["slug"] = str_slug($data["title"]);
      
        }

        return $this->db->insert('pages', $data);
    }

    //update page
    public function update($id)
    {
        //set values
        $data = $this->page_model->input_values();

        if (empty($data["slug"])) {
            //slug for title
            $data["slug"] = str_slug($data["title"]);
        }

        $page = $this->get_page_by_id($id);
        if (!empty($page)) {
            $this->db->where('id', $id);
            return $this->db->update('pages', $data);
        }
        return false;
    }

    //get pages
    public function get_pages()
    {
        $this->db->order_by('page_order');
        $query = $this->db->get('pages');
        return $query->result();
    }

    //get pages sitemap
    public function get_pages_sitemap()
    {
        $this->db->order_by('pages.id');
        $query = $this->db->get('pages');
        return $query->result();
    }

    //get top menu pages
    public function get_top_menu_pages()
    {
        $this->db->order_by('page_order');
        $this->db->where('location', 'top');
        $query = $this->db->get('pages');
        return $query->result();
    }

    //get main menu pages
    public function get_main_menu_pages()
    {
        $this->db->order_by('page_order');
        $this->db->where('location', 'main');
        $query = $this->db->get('pages');
        return $query->result();
    }

	//get footer pages
	public function get_footer_pages()
	{
	$this->db->order_by('page_order');
	$this->db->where('location', 'footer');
	$query = $this->db->get('pages');
	return $query->result();
	}

    //get page
    public function get_page($slug)
    {
        $this->db->where('slug', $slug);
        $query = $this->db->get('pages');
        return $query->row();
    }

    //get page by id
    public function get_page_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('pages');
        return $query->row();
    }

    //delete page
    public function delete($id)
    {
        $page = $this->get_page_by_id($id);
        if (!empty($page)) {

            $this->db->where('id', $id);
            return $this->db->delete('pages');
        }
        return false;
    }
}