<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

         //check auth
        if(is_admin() or is_author()){
		  
        }else{
			redirect('login');
		}
			
    }


    /**
     * Index Page
     */
    public function index()
    {
        $data['title'] = "Index";

        $data['user_count'] = $this->auth_model->get_user_count();
        $data['latest_user'] = $this->auth_model->get_latest_reg_user();
        $data['last_contacts'] = $this->contact_model->get_last_contact_messages();
        $data['last_teachers'] = $this->auth_model->get_last_teachers();
        $data['last_students'] = $this->auth_model->get_last_students();
        $data['post_count'] = count($this->post_model->get_posts_backend());
        $data['pending_post_count'] = count($this->post_model->get_pending_posts());
        $data['video_count'] = count($this->video_model->get_videos_backend());
        $data['pending_video_count'] = count($this->video_model->get_pending_videos());


        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Add Page
     */
    public function add_page()
    {
        prevent_author();

        $data['title'] = "Add New Page";
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/add_page', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Add Page Post
     */
    public function add_page_post()
    {
        prevent_author();

        //validate inputs
        $this->form_validation->set_rules('title', "Page Title", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('page_description', "Page Description", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('page_content', "Page Content", 'required');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->page_model->input_values());
            redirect($this->agent->referrer());
        } else {
            if ($this->page_model->add_page()) {
                $this->session->set_flashdata('success', "Page added successfully!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('form_data', $this->page_model->input_values());
                $this->session->set_flashdata('error', "There was a problem while adding the page!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Update Page
     */
    public function update_page($id)
    {
        prevent_author();

        $data['title'] = "Update Page";

        //find page
        $data['page'] = $this->page_model->get_page_by_id($id);

        //page not found
        if (empty($data['page'])) {
            redirect(base_url() . 'admin');
        }

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/update_page', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Page Post
     */
    public function update_page_post()
    {
        prevent_author();

        //validate inputs
        $this->form_validation->set_rules('title', "Page Title", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('page_description', "Page Description", 'xss_clean|max_length[500]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->page_model->input_values());
            redirect($this->agent->referrer());
        } else {
            if ($this->page_model->update_page()) {
                $this->session->set_flashdata('success', "Page updated successfully!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('form_data', $this->page_model->input_values());
                $this->session->set_flashdata('error', "There was a problem while updating the page!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Delete Page Post
     */
    public function delete_page_post()
    {
        prevent_author();

        $id = $this->input->post('id', true);
        $data["page"] = $this->page_model->get_page_by_id($id);

        //check if exists
        if (empty($data['page'])) {
            redirect($this->agent->referrer());
        } else {
            if ($this->page_model->delete_page($id)) {
                return true;
            } else {
                return false;
            }
        }
    }


    /**
     * Update Profile
     */
    public function update_profile()
    {
        $data['title'] = "Update Profile";

        $data['user'] = user();

        //user not found
        if (empty($data['user'])) {
            redirect('admin');
        }

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/update_profile', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * Update Profile Post
     */
    public function update_profile_post()
    {
        $id = $this->input->post('id', true);
        $slug = $this->input->post('slug', true);
        $user = $this->auth_model->get_user($id);
        //user not found
        if (empty($user)) {
            redirect('admin');
        }
        //check slug
        $user_slug = $this->auth_model->get_user_by_slug($slug);
        if (!empty($user_slug)) {
            if ($user_slug->id != $user->id) {
                $this->session->set_flashdata('error', "The slug you entered is being used by another user!");
                redirect($this->agent->referrer());
            }
        }
        if ($this->auth_model->update_author($id)) {
            $this->session->set_flashdata('success', "Your profile successfully updated!");
        } else {
            $this->session->set_flashdata('error', "There was a problem updating your profile!");
        }
        redirect($this->agent->referrer());
    }

    /**
     * Comments
     */
    public function register_users()
    {
        prevent_author();
        $data['title'] = "Comments";
        $data['users'] = $this->auth_model->get_latest_reg_user();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/comments', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Delete Comment Post
     */
    public function delete_comment_post()
    {
        prevent_author();

        $id = $this->input->post('id', true);

        if ($this->comment_model->delete_comment($id)) {
            $this->session->set_flashdata('success', "Comment successfully deleted!");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "There was a problem deleting the comment!");
            redirect($this->agent->referrer());
        }
    }


    /**
     * Contact Messages
     */
    public function contact_messages()
    {
        prevent_author();

        $data['title'] = "Contact Messages";

        $data['messages'] = $this->contact_model->get_contact_messages();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/contact_messages', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Delete Contact Message Post
     */
    public function delete_contact_message_post()
    {
        prevent_author();

        $id = $this->input->post('id', true);

        if ($this->contact_model->delete_contact_message($id)) {
            $this->session->set_flashdata('success', "Message successfully deleted!");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "There was a problem deleting the message!");
            redirect($this->agent->referrer());
        }
    }


    /**
     * Ads
     */
    public function ads()
    {
        prevent_author();

        $data['title'] = "Ads";

        $data['ads'] = $this->ad_model->get_ads();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/ad_spaces', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Ads Post
     */
    public function ads_post()
    {
        prevent_author();

        if ($this->ad_model->update_ads()) {
            $this->session->set_flashdata('success', "Ads updated successfully!");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "There was a problem while updating the ads!");
            redirect($this->agent->referrer());
        }
    }


    /**
     * Settings
     */
    public function settings()
    {
        prevent_author();

        $data['title'] = "Settings";

        $data['settings'] = $this->settings_model->get_settings();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/settings', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Settings Post
     */
    public function settings_post()
    {
        prevent_author();

        //validate inputs
        $this->form_validation->set_rules('home_title', "Home Title", 'xss_clean|max_length[255]');
        $this->form_validation->set_rules('application_name', "Application Name", 'xss_clean|max_length[255]');
        $this->form_validation->set_rules('about_footer', "About Footer", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('optional_url_button_name', "Optional Url Button Name", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('facebook_url', "Facebook Url", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('twitter_url', "Twitter Url", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('google_url', "Google Url", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('instagram_url', "Instagram Url", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('pinterest_url', "Pinterest Url", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('linkedin_url', "Linkedin Url", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('vk_url', "Vk Url", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('youtube_url ', "Youtube Url", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('contact_address', "Contact Address", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('contact_email', "Contact Email", 'xss_clean|max_length[200]');
        $this->form_validation->set_rules('contact_phone', "About Phone", 'xss_clean|max_length[200]');
        $this->form_validation->set_rules('map_api_key', "Map API Key", 'xss_clean|max_length[500]');
        $this->form_validation->set_rules('latitude', "Map Latitude", 'xss_clean|max_length[200]');
        $this->form_validation->set_rules('longitude', "Map Longitude", 'xss_clean|max_length[200]');
        $this->form_validation->set_rules('mail_host', "Mail Host", 'xss_clean|max_length[255]');
        $this->form_validation->set_rules('mail_port', "Mail Port", 'xss_clean|max_length[255]');
        $this->form_validation->set_rules('mail_username', "Mail Username", 'xss_clean|max_length[255]');
        $this->form_validation->set_rules('mail_password', "Mail Password", 'xss_clean|max_length[255]');
        $this->form_validation->set_rules('mail_title', "Mail Title", 'xss_clean|max_length[255]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->settings_model->input_values());
            redirect($this->agent->referrer());
        } else {
            if ($this->settings_model->update_settings()) {
                $this->session->set_flashdata('success', "Settings successfully updated!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('form_data', $this->settings_model->input_values());
                $this->session->set_flashdata('error', "There was a problem updating the settings!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Visual Settings
     */
    public function visual_settings()
    {
        prevent_author();

        $data['title'] = "Visual Settings";

        $data['visual_settings'] = $this->visual_settings_model->get_settings();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/visual_settings', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Settings Post
     */
    public function visual_settings_post()
    {

        if ($this->visual_settings_model->update_settings()) {
            $this->session->set_flashdata('success', "Visual settings successfully updated!");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('form_data', $this->visual_settings_model->input_values());
            $this->session->set_flashdata('error', "There was a problem updating the settings!");
            redirect($this->agent->referrer());
        }

    }


    /**
     * Newsletter
     */
    public function newsletter()
    {
        prevent_author();

        $data['title'] = "Newsletter";

        $data['newsletter'] = $this->newsletter_model->get_newsletters();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/newsletter', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Delete Newsletter Post
     */
    public function delete_newsletter_post()
    {
        prevent_author();

        $id = $this->input->post('id', true);
        $data['newsletter'] = $this->newsletter_model->get_newsletter_by_id($id);

        if (empty($data['newsletter'])) {
            redirect($this->agent->referrer());
        }

        if ($this->newsletter_model->delete_from_newsletter($id)) {
            $this->session->set_flashdata('success', "Email successfully deleted!");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "There was a problem deleting the email!");
            redirect($this->agent->referrer());
        }
    }

    /**
     * Newsletter Send Email Post
     */
    public function newsletter_send_email_post()
    {
        prevent_author();

        $subject = $this->input->post('subject', true);
        $message = $this->input->post('message', false);

        $data['newsletter'] = $this->newsletter_model->get_newsletters();

        foreach ($data['newsletter'] as $item) {
            //send email
            $this->email_model->send_email($item->email, $subject, $message);
        }

        $this->session->set_flashdata('success', "Email successfully sent!");
        redirect($this->agent->referrer());
    }

    /**
     * Seo Tools
     */
    public function seo_tools()
    {
        prevent_author();

        $data['title'] = "Seo Tools";

        $data['settings'] = $this->settings_model->get_settings();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/seo_tools', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * Seo Tools Post
     */
    public function seo_tools_post()
    {
        prevent_author();

        //validate inputs
        $this->form_validation->set_rules('site_title', "Site Title", 'xss_clean|max_length[255]');
        $this->form_validation->set_rules('site_keywords', "Site Keywords", 'xss_clean|max_length[400]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->seo_model->input_values());
            redirect($this->agent->referrer());
        } else {
            if ($this->seo_model->update()) {
                $this->session->set_flashdata('success', "Seo options successfully updated!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('form_data', $this->seo_model->input_values());
                $this->session->set_flashdata('error', "There was a problem updating the seo options!");
                redirect($this->agent->referrer());
            }
        }
    }

    /**
     * Social Login Configuration
     */
    public function social_login_configuration()
    {
        prevent_author();

        $data['title'] = "Social Login Configuration";
        $data['settings'] = $this->settings_model->get_settings();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/social_login', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Social Login Configuration Post
     */
    public function social_login_configuration_post()
    {
        prevent_author();

        if ($this->settings_model->update_social_settings()) {
            $this->session->set_flashdata('success', "Configurations successfully updated!");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "There was a problem updating the configurations!");
            redirect($this->agent->referrer());
        }

    }


    /**
     * Font Options
     */
    public function font_options()
    {
        prevent_author();

        $data['title'] = "Font Options";

        $this->config->load('fonts');
        $data['fonts'] = $this->config->item('fonts_array');

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/font_options', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Font Options Post
     */
    public function font_options_post()
    {
        prevent_author();

        if ($this->font_options_model->update()) {
            $this->session->set_flashdata('success', "Fonts successfully updated!");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "There was a problem updating the fonts!");
            redirect($this->agent->referrer());
        }

    }


}