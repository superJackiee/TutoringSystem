<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();

        //check auth
        if (!is_admin() && !is_author()) {
            redirect('login');
        }
    }


    /**
     * Categories
     */
    public function categories()
    {
        prevent_author();

        $data['title'] = "Categories";
        $data['categories'] = $this->category_model->get_categories();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/category/categories', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Add Category Post
     */
    public function add_category_post()
    {
        prevent_author();

        //validate inputs
        $this->form_validation->set_rules('name', "Category Name", 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('color', "Color", 'required|xss_clean|max_length[200]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors_form', validation_errors());
            $this->session->set_flashdata('form_data', $this->category_model->input_values());
            redirect($this->agent->referrer());
        } else {
            if ($this->category_model->add_category()) {
                $this->session->set_flashdata('success_form', "Category successfully added!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('form_data', $this->category_model->input_values());
                $this->session->set_flashdata('error_form', "There was a problem adding the category!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Update Category
     */
    public function update_category($id)
    {
        prevent_author();

        $data['title'] = 'Update Category';

        //get category
        $data['category'] = $this->category_model->get_category($id);

        if (empty($data['category'])) {
            redirect($this->agent->referrer());
        }

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/category/update_category', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Category Post
     */
    public function update_category_post()
    {
        prevent_author();

        //validate inputs
        $this->form_validation->set_rules('name', "Category Name", 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('color', "Color", 'required|xss_clean|max_length[200]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->category_model->input_values());
            redirect($this->agent->referrer());
        } else {
            //category id
            $id = $this->input->post('id', true);
            if ($this->category_model->update_category($id)) {
                $this->session->set_flashdata('success', "Category successfully updated!");
                redirect('admin/categories');
            } else {
                $this->session->set_flashdata('form_data', $this->category_model->input_values());
                $this->session->set_flashdata('error', "There was a problem updating the category!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Delete Category Post
     */
    public function delete_category_post()
    {
        prevent_author();

        $id = $this->input->post('id', true);

        //check subcategories
        if (count($this->category_model->get_subcategories_by_parent_id($id)) > 0) {
            $this->session->set_flashdata('error', "Please delete subcategories belonging to this category first!");
            redirect($this->agent->referrer());
        }

        //check posts
        if ($this->post_model->get_post_count_by_category($id) > 0) {
            $this->session->set_flashdata('error', "Please delete posts belonging to this category first!");
            redirect($this->agent->referrer());
        }

        if ($this->category_model->delete_category($id)) {
            $this->session->set_flashdata('success', "Category successfully deleted!");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "There was a problem deleting the category!");
            redirect($this->agent->referrer());
        }
    }


    /**
     * Subcategories
     */
    public function subcategories()
    {
        prevent_author();

        $data['title'] = "Subcategories";
        $data['categories'] = $this->category_model->get_subcategories();
        $data['top_categories'] = $this->category_model->get_categories();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/category/subcategories', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Add Subcategory Post
     */
    public function add_subcategory_post()
    {
        prevent_author();

        //validate inputs
        $this->form_validation->set_rules('name', "Category Name", 'required|xss_clean|max_length[200]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors_form', validation_errors());
            $this->session->set_flashdata('form_data', $this->category_model->input_values());
            redirect($this->agent->referrer());
        } else {
            if ($this->category_model->add_subcategory()) {
                $this->session->set_flashdata('success_form', "Category successfully added!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('form_data', $this->category_model->input_values());
                $this->session->set_flashdata('error_form', "There was a problem adding the category!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Update Subcategory
     */
    public function update_subcategory($id)
    {
        prevent_author();

        $data['title'] = 'Update Subcategory';

        //get category
        $data['category'] = $this->category_model->get_category($id);

        if (empty($data['category'])) {
            redirect($this->agent->referrer());
        }

        $data['top_categories'] = $this->category_model->get_categories();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/category/update_subcategory', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Subcategory Post
     */
    public function update_subcategory_post()
    {
        prevent_author();

        //validate inputs
        $this->form_validation->set_rules('name', "Category Name", 'required|xss_clean|max_length[200]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->category_model->input_values());
            redirect($this->agent->referrer());
        } else {
            //category id
            $id = $this->input->post('id', true);
            if ($this->category_model->update_category($id)) {
                $this->session->set_flashdata('success', "Category successfully updated!");
                redirect('admin/subcategories');
            } else {
                $this->session->set_flashdata('form_data', $this->category_model->input_values());
                $this->session->set_flashdata('error', "There was a problem updating the category!");
                redirect($this->agent->referrer());
            }
        }
    }

    //get sub categorie
    public function get_sub_categories()
    {
        $id = $this->input->post('parent_id', true);

        $data['subcategories'] = $this->category_model->get_subcategories_by_parent_id($id);

        $this->load->view('admin/includes/_get_sub_categories', $data);
    }


    /**
     * Gallery Categories
     */
    public function gallery_categories()
    {
        prevent_author();

        $data['title'] = "Gallery Categories";
        $data['categories'] = $this->gallery_category_model->get_categories();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/gallery/categories', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Add Gallery Category Post
     */
    public function add_gallery_category_post()
    {
        prevent_author();

        //validate inputs
        $this->form_validation->set_rules('name', "Category Name", 'required|xss_clean|max_length[200]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors_form', validation_errors());
            $this->session->set_flashdata('form_data', $this->gallery_category_model->input_values());
            redirect($this->agent->referrer());
        } else {
            if ($this->gallery_category_model->add()) {
                $this->session->set_flashdata('success_form', "Category successfully added!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('form_data', $this->gallery_category_model->input_values());
                $this->session->set_flashdata('error_form', "There was a problem adding the category!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Update Gallery Category
     */
    public function update_gallery_category($id)
    {
        prevent_author();

        $data['title'] = 'Update Gallery Category';

        //get category
        $data['category'] = $this->gallery_category_model->get_category($id);

        if (empty($data['category'])) {
            redirect($this->agent->referrer());
        }

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/gallery/update_category', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Gallery Category Post
     */
    public function update_gallery_category_post()
    {
        prevent_author();

        //validate inputs
        $this->form_validation->set_rules('name', "Category Name", 'required|xss_clean|max_length[200]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->gallery_category_model->input_values());
            redirect($this->agent->referrer());
        } else {
            //category id
            $id = $this->input->post('id', true);
            if ($this->gallery_category_model->update($id)) {
                $this->session->set_flashdata('success', "Category successfully updated!");
                redirect('admin/gallery-categories');
            } else {
                $this->session->set_flashdata('form_data', $this->gallery_category_model->input_values());
                $this->session->set_flashdata('error', "There was a problem updating the category!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Delete Gallery Category Post
     */
    public function delete_gallery_category_post()
    {
        prevent_author();

        $id = $this->input->post('id', true);

        if ($this->gallery_category_model->delete($id)) {
            $this->session->set_flashdata('success', "Category successfully deleted!");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "There was a problem deleting the category!");
            redirect($this->agent->referrer());
        }
    }


}
