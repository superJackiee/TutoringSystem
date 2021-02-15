<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends MY_Controller
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

        $this->load->model('sitemap_model');
    }


    /**
     * Generate Sitemap
     */
    public function generate_sitemap()
    {

        $data['title'] = "Generate Sitemap";

        $this->load->view('admin/_header', $data);
        $this->load->view('admin/generate_sitemap', $data);
        $this->load->view('admin/_footer');
    }

    /**
     * Generate Sitemap Post
     */
    public function generate_sitemap_post()
    {
        $data = $this->sitemap_model->input_values();
        $this->add_page_urls($data['frequency'], $data['last_modification'], $data['priority'], $data['lastmod_time']);
        $this->add_static_urls($data['frequency'], $data['last_modification'], $data['priority'], $data['lastmod_time']);
        $this->add_post_urls($data['frequency'], $data['last_modification'], $data['priority'], $data['lastmod_time']);
        $this->add_category_urls($data['frequency'], $data['last_modification'], $data['priority'], $data['lastmod_time']);
        $this->add_tag_urls($data['frequency'], $data['last_modification'], $data['priority'], $data['lastmod_time']);

        $this->sitemap_model->output('sitemapindex');
    }

    /**
     * Page Urls
     */
    public function add_page_urls($frequency, $last_modification, $priority, $lastmod_time)
    {
        $pages = $this->page_model->get_pages_sitemap();

        foreach ($pages as $page) {
            if ($page->slug == 'index') {
                $priority_value = 1.0;
                $this->sitemap_model->add(base_url(), $frequency, $last_modification, $priority, $priority_value, $lastmod_time);
            } else {
                $priority_value = 0.8;
                $this->sitemap_model->add(base_url() . $page->slug, $frequency, $last_modification, $priority, $priority_value, $lastmod_time);
            }
        }
    }

    /**
     * Static Page Urls
     */
    public function add_static_urls($frequency, $last_modification, $priority, $lastmod_time)
    {
        $priority_value = 0.8;

        $this->sitemap_model->add(base_url() . "search", $frequency, $last_modification, $priority, $priority_value, $lastmod_time);

    }

    /**
     * Post Urls
     */
    public function add_post_urls($frequency, $last_modification, $priority, $lastmod_time)
    {
        $posts = $this->post_model->get_posts();
        $videos = $this->video_model->get_videos();
        $priority_value = 0.8;

        foreach ($posts as $post) {
            $this->sitemap_model->add(base_url() . "post/" . $post->title_slug . "/" . $post->id, $frequency, $last_modification, $priority, $priority_value, $lastmod_time);
        }
        foreach ($videos as $video) {
            $this->sitemap_model->add(base_url() . "video/" . $video->title_slug . "/" . $video->id, $frequency, $last_modification, $priority, $priority_value, $lastmod_time);
        }
    }

    /**
     * Category Urls
     */
    public function add_category_urls($frequency, $last_modification, $priority, $lastmod_time)
    {
        $categories = $this->category_model->get_categories();
        $subcategories = $this->category_model->get_subcategories();
        $priority_value = 0.8;

        foreach ($categories as $category) {
            $this->sitemap_model->add(base_url() . "category/" . str_slug($category->name) . "/" . $category->id, $frequency, $last_modification, $priority, $priority_value, $lastmod_time);
        }
        foreach ($subcategories as $category) {
            $this->sitemap_model->add(base_url() . "category/" . str_slug($category->name) . "/" . $category->id, $frequency, $last_modification, $priority, $priority_value, $lastmod_time);
        }
    }

    /**
     * Tag Urls
     */
    public function add_tag_urls($frequency, $last_modification, $priority, $lastmod_time)
    {
        $tags = $this->tag_model->get_tags();
        $priority_value = 0.8;

        foreach ($tags as $tag) {
            $this->sitemap_model->add(base_url() . "tag/" . $tag->tag_slug, $frequency, $last_modification, $priority, $priority_value, $lastmod_time);
        }
    }
}

