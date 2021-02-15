<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MY_Controller
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
     * Gallery
     */
    public function index()
    {
        $data['title'] = "Gallery";
        $data['images'] = $this->gallery_model->get_images();
        $data['categories'] = $this->gallery_category_model->get_categories();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/gallery/gallery', $data);
        $this->load->view('admin/includes/_footer');
    }


    public function slider()
    {
        $data['title'] = "Slider";
        $data['images'] = $this->gallery_model->slider_get_images();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/Slider/Slider', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Add Image Post
     */
    public function add_gallery_image_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', "Image Title", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('category_id', "Category", 'required');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors_form', validation_errors());
            $this->session->set_flashdata('form_data', $this->gallery_model->input_values());
            redirect($this->agent->referrer());
        } else {
            if ($this->gallery_model->add()) {
                $this->session->set_flashdata('success_form', "Image successfully added!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('form_data', $this->gallery_model->input_values());
                $this->session->set_flashdata('error_form', "There was a problem adding the image!");
                redirect($this->agent->referrer());
            }
        }
    }

    /**
     * Add Image Post
     */
    public function add_slider_image()
    {
        //validate inputs
        $this->form_validation->set_rules('title', "Image Title", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('slider_description', "Description", 'required');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors_form', validation_errors());
            $this->session->set_flashdata('form_data', $this->gallery_model->slider_input_values());
            redirect($this->agent->referrer());
        } else {
            if ($this->gallery_model->slider_add()) {
                $this->session->set_flashdata('success_form', "Image successfully added!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('form_data', $this->gallery_model->slider_input_values());
                $this->session->set_flashdata('error_form', "There was a problem adding the image!");
                redirect($this->agent->referrer());
            }
        }
    }

    /**
     * Update Slider
     */
    public function update_slider_image($id)
    {
        $data['title'] = 'Update Slider';

        //get post
        $data['image'] = $this->gallery_model->slider_get_image($id);

        if (empty($data['image'])) {
            redirect($this->agent->referrer());
        }
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/Slider/update', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * Update Image
     */
    public function update_gallery_image($id)
    {
        $data['title'] = 'Update Image';

        //get post
        $data['image'] = $this->gallery_model->get_image($id);

        if (empty($data['image'])) {
            redirect($this->agent->referrer());
        }

        $data['categories'] = $this->gallery_category_model->get_categories();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/gallery/update', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Image Post
     */
    public function update_gallery_image_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', "Image Title", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('category_id', "Category", 'required');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->gallery_model->input_values());
            redirect($this->agent->referrer());
        } else {

            $id = $this->input->post('id', true);

            if ($this->gallery_model->update($id)) {
                $this->session->set_flashdata('success', "Image successfully updated!");
                redirect('admin/gallery');
            } else {
                $this->session->set_flashdata('form_data', $this->post_model->input_values());
                $this->session->set_flashdata('error', "There was a problem updating the image!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Delete Image Post
     */
    public function delete_gallery_image_post()
    {
        $id = $this->input->post('id', true);

        if ($this->gallery_model->delete($id)) {
            $this->session->set_flashdata('success', "Image successfully deleted!");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "There was a problem deleting the image!");
            redirect($this->agent->referrer());
        }
    }

    /**
     * Delete Slider Post
     */
    public function delete_slider_image_post()
    {
        $id = $this->input->post('id', true);

        if ($this->gallery_model->slider_delete($id)) {
            $this->session->set_flashdata('success', "Image successfully deleted!");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "There was a problem deleting the image!");
            redirect($this->agent->referrer());
        }
    }

      /**
     * Update slider Post
     */
    public function update_slider_image_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', "Image Title", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('slider_description', "slider_description", 'required');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->gallery_model->slider_input_values());
            redirect($this->agent->referrer());
        } else {

            $id = $this->input->post('id', true);

            if ($this->gallery_model->update_slider($id)) {
                $this->session->set_flashdata('success', "Image successfully updated!");
                redirect('gallery/slider');
            }
        }
    }


}
