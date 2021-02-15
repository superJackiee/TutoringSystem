<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller
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
        if (!is_admin()) {
            redirect('login');
        }
    }


    /**
     * Add Page
     */
    public function add_page()
    {
        $data['title'] = "Add Page";
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/page/add', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Add Page Post
     */
    public function add_page_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', "Page Title", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('description', "Page Description", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('keywords', "Page Keywords", 'xss_clean|max_length[500]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->page_model->input_values());
            redirect($this->agent->referrer());
        } else {
            if ($this->page_model->add()) {
                $this->session->set_flashdata('success', "Page successfully added!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('form_data', $this->page_model->input_values());
                $this->session->set_flashdata('error', "There was a problem adding the page!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Pages
     */
    public function pages()
    {
        $data['title'] = "Pages";
        $data['pages'] = $this->page_model->get_pages();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/page/pages', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Page
     */
    public function update_page($id)
    {

        $data['title'] = "Update Page";

        //find page
        $data['page'] = $this->page_model->get_page_by_id($id);

        //page not found
        if (empty($data['page'])) {
            redirect($this->agent->referrer());
        }

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/page/update', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Page Post
     */
    public function update_page_post()
    {

        //validate inputs
        $this->form_validation->set_rules('title', "Page Title", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('description', "Page Description", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('keywords', "Page Keywords", 'xss_clean|max_length[500]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->page_model->input_values());
            redirect($this->agent->referrer());
        } else {
            //get id
            $id = $this->input->post('id', true);

            if ($this->page_model->update($id)) {
                $this->session->set_flashdata('success', "Page successfully updated!");
                redirect('admin/pages');
            } else {
                $this->session->set_flashdata('form_data', $this->page_model->input_values());
                $this->session->set_flashdata('error', "There was a problem updating the page!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Delete Page Post
     */
    public function delete_page_post()
    {

        $id = $this->input->post('id', true);

        $page = $this->page_model->get_page_by_id($id);

        if (empty($page)) {
            redirect($this->agent->referrer());
        }

        //check if page custom or not
        if ($page->is_custom == 0) {
            $this->session->set_flashdata('error',"Default pages can not be deleted!");
            redirect($this->agent->referrer());
        }
        if ($this->page_model->delete($id)) {
            $this->session->set_flashdata('success',"Page successfully deleted!");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error',"There was a problem deleting the page!");
            redirect($this->agent->referrer());
        }
    }

}