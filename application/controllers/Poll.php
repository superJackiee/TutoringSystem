<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Poll extends MY_Controller
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
     * Add Poll
     */
    public function add_poll()
    {
        $data['title'] = "Add Poll";
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/poll/add', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Add Poll Post
     */
    public function add_poll_post()
    {
        //validate inputs
        $this->form_validation->set_rules('question', "Question", 'required|xss_clean');
        $this->form_validation->set_rules('option1', "Option 1", 'required|xss_clean');
        $this->form_validation->set_rules('option2', "Option 2", 'required|xss_clean');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->poll_model->input_values());
            redirect($this->agent->referrer());
        } else {
            if ($this->poll_model->add()) {
                $this->session->set_flashdata('success', "Poll successfully added!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('form_data', $this->poll_model->input_values());
                $this->session->set_flashdata('error', "There was a problem adding the poll!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Polls
     */
    public function polls()
    {
        $data['title'] = "Polls";
        $data['polls'] = $this->poll_model->get_polls();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/poll/polls', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Poll
     */
    public function update_poll($id)
    {

        $data['title'] = "Update Poll";

        //find poll
        $data['poll'] = $this->poll_model->get_poll($id);

        //poll not found
        if (empty($data['poll'])) {
            redirect($this->agent->referrer());
        }

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/poll/update', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Poll Post
     */
    public function update_poll_post()
    {
        //validate inputs
        $this->form_validation->set_rules('question', "Question", 'required|xss_clean');
        $this->form_validation->set_rules('option1', "Option 1", 'required|xss_clean');
        $this->form_validation->set_rules('option2', "Option 2", 'required|xss_clean');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->poll_model->input_values());
            redirect($this->agent->referrer());
        } else {
            //get id
            $id = $this->input->post('id', true);

            if ($this->poll_model->update($id)) {
                $this->session->set_flashdata('success', "Poll successfully updated!");
                redirect('admin/polls');
            } else {
                $this->session->set_flashdata('form_data', $this->poll_model->input_values());
                $this->session->set_flashdata('error', "There was a problem updating the poll!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Delete Poll Post
     */
    public function delete_poll_post()
    {

        $id = $this->input->post('id', true);

        $poll = $this->poll_model->get_poll($id);

        if (empty($poll)) {
            redirect($this->agent->referrer());
        }


        if ($this->poll_model->delete($id)) {
            $this->session->set_flashdata('success', "Poll successfully deleted!");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "There was a problem deleting the poll!");
            redirect($this->agent->referrer());
        }
    }

}