<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rss extends MY_Controller
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

        //load the library
        $this->load->library('feed');
        $this->load->helper('xml');
    }


    /**
     * Rss All Posts
     */
    public function rss_all_posts()
    {
        $data['feed_name'] = $this->settings->site_title . " - " . trans("all_posts");
        $data['encoding'] = 'utf-8';
        $data['feed_url'] = base_url() . "rss/posts";
        $data['page_description'] = $this->settings->site_description;
        $data['page_language'] = $this->get_lang();
        $data['creator_email'] = '';
        $data['posts'] = $this->post_model->get_posts();
        header("Content-Type: application/rss+xml");

        $this->load->view('rss', $data);
    }

    /**
     * Rss Popular Posts
     */
    public function rss_popular_posts()
    {
        $data['feed_name'] = $this->settings->site_title . " - " . trans("title_popular_posts");
        $data['encoding'] = 'utf-8';
        $data['feed_url'] = base_url() . "rss/popular-posts";
        $data['page_description'] = $this->settings->site_description;
        $data['page_language'] = $this->get_lang();
        $data['creator_email'] = '';
        $data['posts'] = $this->post_model->get_popular_posts(5);
        header("Content-Type: application/rss+xml");

        $this->load->view('rss', $data);
    }

    /**
     * Rss Latest Posts
     */
    public function rss_latest_posts()
    {
        $data['feed_name'] = $this->settings->site_title . " - " . trans("title_latest_posts");
        $data['encoding'] = 'utf-8';
        $data['feed_url'] = base_url() . "rss/latest-posts";
        $data['page_description'] = $this->settings->site_description;
        $data['page_language'] = $this->get_lang();
        $data['creator_email'] = '';
        $data['posts'] = $this->post_model->get_last_posts(5);
        header("Content-Type: application/rss+xml");

        $this->load->view('rss', $data);
    }


    /**
     * Rss By Category
     */
    public function rss_by_category($slug, $id)
    {
        $category_id = $this->security->xss_clean($id);

        $data['category'] = $this->category_model->get_category($category_id);
        if (empty($data['category'])) {
            redirect(base_url());
        }

        $data['feed_name'] = $this->settings->site_title . " - " . trans("title_category") . ": " . $data['category']->name;
        $data['encoding'] = 'utf-8';
        $data['feed_url'] = base_url() . "rss/posts/" . $data['category']->name_slug . "/" . $data['category']->id;
        $data['page_description'] = $this->settings->site_description;
        $data['page_language'] = $this->get_lang();
        $data['creator_email'] = '';
        $data['posts'] = $this->post_model->get_posts_by_category($data['category']->id);
        header("Content-Type: application/rss+xml");

        $this->load->view('rss', $data);
    }

    /**
     * Rss Videos
     */
    public function rss_videos()
    {
        $data['feed_name'] = $this->settings->site_title . " - " . trans("title_videos");
        $data['encoding'] = 'utf-8';
        $data['feed_url'] = base_url() . "rss/videos";
        $data['page_description'] = $this->settings->site_description;
        $data['page_language'] = $this->get_lang();
        $data['creator_email'] = '';
        $data['posts'] = $this->video_model->get_videos();
        header("Content-Type: application/rss+xml");

        $this->load->view('rss', $data);
    }

    public function get_lang()
    {
        $lang = $this->settings->site_lang;

        if ($lang == "english") {
            return "en";
        }
        if ($lang == "french") {
            return "fr";
        }
        if ($lang == "german") {
            return "ger";
        }
        if ($lang == "portuguese") {
            return "por";
        }
        if ($lang == "russian") {
            return "ru";
        }
        if ($lang == "turkish") {
            return "tr";
        }

    }
}