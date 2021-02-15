<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends MY_Controller
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
     * Add Video
     */
    public function add_video()
    {
        $data['title'] = "Add Video";

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/video/add', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Add Video Post
     */
    public function add_video_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', "Title", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('optional_url', "Optional Url", 'xss_clean|max_length[1000]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->video_model->input_values());
            redirect($this->agent->referrer());
        } else {
            //if video added
            if ($this->video_model->add()) {
                //last id
                $last_id = $this->db->insert_id();
                //add video image
                $this->video_model->add_image($last_id);
                //add video tags
                $this->tag_model->add_post_tags($last_id);

                $this->session->set_flashdata('success', "Video successfully added!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('form_data', $this->video_model->input_values());
                $this->session->set_flashdata('error', "There was a problem adding the video!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Videos
     */
    public function videos()
    {
        $data['title'] = 'Videos';

        //get videos
        $data["videos"] = $this->video_model->get_videos_backend();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/video/videos', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Pending Videos
     */
    public function pending_videos()
    {
        $data['title'] = 'Pending Videos';

        //get posts
        $data["videos"] = $this->video_model->get_pending_videos();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/video/pending_videos', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Video
     */
    public function update_video($id)
    {
        $data['title'] = 'Update Video';

        //get video
        $data['video'] = $this->video_model->get_video_backend($id);

        if (empty($data['video'])) {
            redirect($this->agent->referrer());
        }

        //check if author
        if (is_author()) {
            //check owner
            if ($data['video']->user_id != user()->id):
                redirect("admin");
            endif;
        }

        //combine video tags
        $tags = "";
        $count = 0;
        $tags_array = $this->tag_model->get_post_tags($id);
        foreach ($tags_array as $item) {
            if ($count > 0) {
                $tags .= ",";
            }
            $tags .= $item->tag;
            $count++;
        }

        $data['tags'] = $tags;

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/video/update', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Video Post
     */
    public function update_video_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', "Title", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('optional_url', "Optional Url", 'xss_clean|max_length[1000]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->video_model->input_values());
            redirect($this->agent->referrer());
        } else {
            //video id
            $video_id = $this->input->post('id', true);

            if ($this->video_model->update($video_id)) {

                //update video image
                $this->video_model->update_image($video_id);

                //update video tags
                $this->tag_model->update_post_tags($video_id);

                $this->session->set_flashdata('success', "Video successfully updated!");
                redirect('admin/videos');
            } else {
                $this->session->set_flashdata('form_data', $this->video_model->input_values());
                $this->session->set_flashdata('error', "There was a problem updating the video!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Video Options Post
     */
    public function video_options_post()
    {
        $option = $this->input->post('option', true);
        $id = $this->input->post('id', true);

        $data["video"] = $this->video_model->get_video_backend($id);

        //check if exists
        if (empty($data['video'])) {
            redirect($this->agent->referrer());
        }

        //if option approve
        if ($option == 'approve') {

            //check if admin
            if (is_admin()) {
                if ($this->video_model->approve_video($id)) {
                    $this->session->set_flashdata('success', "Video approved!");
                } else {
                    $this->session->set_flashdata('error', "There was a problem approving the video!");
                }
            }

            redirect($this->agent->referrer());
        }

        //if option delete
        if ($option == 'delete') {

            if ($this->video_model->delete($id)) {
                //delete video tags
                $this->tag_model->delete_post_tags($id);

                $this->session->set_flashdata('success', "Video successfully deleted!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', "There was a problem deleting the video!");
                redirect($this->agent->referrer());
            }

        }
    }
}
