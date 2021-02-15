<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widget extends MY_Controller
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
     * Add Widget
     */
    public function add_widget()
    {
        $data['title'] = "Add Widget";
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/widget/add', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Widgets
     */
    public function widgets()
    {
        $data['title'] = "Widgets";
        $data['widgets'] = $this->widget_model->get_widgets();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/widget/widgets', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * Add Widget Post
     */
    public function add_widget_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', "Widget Title", 'required|xss_clean|max_length[400]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->widget_model->input_values());
            redirect($this->agent->referrer());
        } else {
            if ($this->widget_model->add()) {
                $this->session->set_flashdata('success', "Widget successfully added!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('form_data', $this->widget_model->input_values());
                $this->session->set_flashdata('error', "There was a problem adding the widget!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Update Widget
     */
    public function update_widget()
    {
        $data['title'] = 'Update Widget';

        //get widget
        $data['widget'] = $this->widget_model->get_widget($id);

        if (empty($data['widget'])) {
            redirect($this->agent->referrer());
        }

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/widget/update', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Widget Post
     */
    public function update_widget_post()
    {
        //widget id
        $id = $this->input->post('id', true);

        //validate inputs
        $this->form_validation->set_rules('title', "Widget Title", 'required|xss_clean|max_length[400]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->widget_model->input_values());
            redirect($this->agent->referrer());
        } else {
            if ($this->widget_model->update($id)) {
                $this->session->set_flashdata('success', "Widget successfully updated!");
                redirect(base_url() . "admin/widgets");
            } else {
                $this->session->set_flashdata('form_data', $this->widget_model->input_values());
                $this->session->set_flashdata('error', "There was a problem updating the widget!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Delete Widget Post
     */
    public function delete_widget_post()
    {
        $id = $this->input->post('id', true);

        $widget = $this->widget_model->get_widget($id);

        //check if widget custom or not
        if ($widget->is_custom == 0) {
            $this->session->set_flashdata('error', "Default widgets can not be deleted!");
            redirect($this->agent->referrer());
        }

        if ($this->widget_model->delete($id)) {
            $this->session->set_flashdata('success', "Widget successfully deleted!");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "There was a problem deleting the widget!");
            redirect($this->agent->referrer());
        }
    }

}
