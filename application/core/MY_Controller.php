<?php

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $global_data['settings'] = $this->settings_model->get_settings();
        $global_data['vsettings'] = $this->visual_settings_model->get_settings();
        $global_data['ads'] = $this->ad_model->get_ads();

        $this->settings = $global_data['settings'];

        //set language
        $this->config->set_item('language', $global_data['settings']->site_lang);
        $this->lang->load("messages", $global_data['settings']->site_lang);

        $global_data['categories'] = $this->category_model->get_categories();
        $global_data['last_videos'] = $this->video_model->get_last_videos(5);

        $global_data['popular_posts'] = $this->post_model->get_popular_posts(5);
        $global_data['recommended_posts'] = $this->post_model->get_recommended_posts();
        $global_data['popular_videos'] = $this->video_model->get_popular_videos(1);
        $global_data['random_posts'] = $this->post_model->get_random_posts(5);
        $global_data['widgets'] = $this->widget_model->get_widgets();
        $global_data['tags'] = $this->tag_model->get_random_tags();
        $global_data['footer_random_posts'] = $this->post_model->get_footer_random_posts();

        $global_data['pages'] = $this->page_model->get_pages();

        $global_data['top_menu_pages'] = $this->page_model->get_top_menu_pages();
        $global_data['main_menu_pages'] = $this->page_model->get_main_menu_pages();
        $global_data['footer_pages'] = $this->page_model->get_footer_pages();

        $global_data['polls'] = $this->poll_model->get_polls();


        //get site primary font
        $this->config->load('fonts');
        $global_data['primary_font'] = $global_data['settings']->primary_font;
        $global_data['primary_font_family'] = $this->config->item($global_data['primary_font'] . '_font_family');
        $global_data['primary_font_url'] = $this->config->item($global_data['primary_font'] . '_font_url');

        //get site secondary font
        $global_data['secondary_font'] = $global_data['settings']->secondary_font;
        $global_data['secondary_font_family'] = $this->config->item($global_data['secondary_font'] . '_font_family');
        $global_data['secondary_font_url'] = $this->config->item($global_data['secondary_font'] . '_font_url');

        //get site tertiary font
        $global_data['tertiary_font'] = $global_data['settings']->tertiary_font;
        $global_data['tertiary_font_family'] = $this->config->item($global_data['tertiary_font'] . '_font_family');
        $global_data['tertiary_font_url'] = $this->config->item($global_data['tertiary_font'] . '_font_url');


        /*
         *
         * Social Login
         *
         */


        //set facebook keys
        $this->facebook_app_id = $global_data['settings'];

        $this->config->load('fonts');
        $this->config->set_item('facebook_app_id', $this->settings->facebook_app_id);
        $this->config->set_item('facebook_app_secret', $this->settings->facebook_app_secret);


        //facebook login url
        $global_data['facebook_login_url'] = $this->facebook->login_url();
        //google plus login url
       // $global_data['google_plus_login_url'] = $this->googleplus->loginURL();

        $this->load->vars($global_data);

    }
}