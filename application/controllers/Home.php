<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
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
        
        $this->load->model('Home_model');
    }


    /**
     * Index Page
     */
    public function index()
    {
        $page = $this->page_model->get_page("index");

        $data['title'] = get_page_title($page);
        $data['description'] = get_page_description($page);
        $data['keywords'] = get_page_keywords($page);

        $data['page'] = $page;
        $data['section'] =$this->Home_model->section();
        $data['categories'] = $this->category_model->get_categories();
        $data['featured_posts'] = $this->post_model->get_limited_featured_posts(4);
        $data['featured_slider_posts'] = $this->post_model->get_featured_slider_posts();
        $data['index_last_videos'] = $this->video_model->get_last_videos(4);
        $data['last_posts'] = $this->post_model->get_last_posts(6);
        $data['news_ticker_posts'] = $this->post_model->get_breaking_news();
        $data['teacher'] = $this->Home_model->teacher();
        $data['gallery'] = $this->Home_model->gallery();
        $data['testimonial'] =$this->Home_model->view_testimonial();
        $data['total_teacher'] = $this->Home_model->total_teacher();
        $data['slider'] = $this->Home_model->slider();
        $this->load->view('partials/_header', $data);
        $this->load->view('index', $data);
        $this->load->view('partials/_footer');
    }

    /*
    *
    */
    public function  add_section()
    {
        $data['title'] = "Add Section";
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/section/add', $data);
        $this->load->view('admin/includes/_footer');
    }
    
    public function  testimonial()
    {
        $data['title'] = "Add Testimonial";
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/testimonial/add', $data);
        $this->load->view('admin/includes/_footer');
    }
    public function  add_testimonial()
    {
        $file = $_FILES['image'];
        $image = $this->upload_model->testimonial_img($file);
        $data = array(     
            'title' => $this->input->post('title', true),
            'description' => $this->input->post('description', true),
            'author' => $this->input->post('author', true),
            'img' => $image,
        );
        $this->Home_model->testimonial($data);
        redirect($this->agent->referrer());
    }

    public function  view_testimonial()
    {
        $data['title'] = "View Section";
        $data['section'] =$this->Home_model->view_testimonial();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/testimonial/testimonial', $data);
        $this->load->view('admin/includes/_footer');
    }

    
    /**
     * Delete Widget Post
     */
    public function delete_testimonial()
    {
        $id = $this->input->post('id', true);

        $widget = $this->Home_model->get_testimonial($id);
        if ($this->Home_model->delete_testimonial($id)) {
            $this->session->set_flashdata('success', "testimonial successfully deleted!");
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('error', "There was a problem deleting the testimonial!");
            redirect($this->agent->referrer());
        }
    }

    public function get_testimonial()
    {
        $id = $this->input->get('id');
        $data['section'] = $this->Home_model->get_testimonial($id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/testimonial/update', $data);
        $this->load->view('admin/includes/_footer');
    }

    public function  update_testimonial()
    {
        $id = $this->input->post('id');
        $file = $_FILES['image'];
        if (!empty($file['name'])) {
            $image = $this->Home_model->get_testimonial($id);
            
            //delete image
            delete_image_from_server($image->img);
        $image = $this->upload_model->testimonial_img($file);
        $data = array(     
            'title' => $this->input->post('title', true),
            'description' => $this->input->post('description', true),
            'author' => $this->input->post('author', true),
            'img' => $image,
        );
            $this->Home_model->update_testimonial($id,$data);
        }
        $data = array(     
            'title' => $this->input->post('title', true),
            'description' => $this->input->post('description', true),
            'author' => $this->input->post('author', true),
            'img' => $this->input->post('img', true),
        );
        $this->Home_model->update_testimonial($id,$data);
        redirect($this->agent->referrer());
    }


    public function section_one()
    {
        if(isset($_FILES['image'])){
        $file = $_FILES['image'];
        $image = $this->upload_model->section_image($file);
        $data = array(     
            'title' => $this->input->post('title', true),
            'description' => $this->input->post('description', true),
            'image' => $image,
        );
        }
        else{
            $data = array(     
                'title' => $this->input->post('title', true),
                'description' => $this->input->post('description', true),
                'image' => '',
            );
        }   
        
        $this->Home_model->section_one($data);
        redirect($this->agent->referrer());
    }

    public function edit_section()
    {
        $id = $this->input->post('id', true);
        $file = $_FILES['image'];        
        if (!empty($file['name'])) {
            $image = $this->Home_model->update_view($id);
            // var_dump($image[0]['image']);
            // die();
            //delete image
            delete_image_from_server($image[0]['image']);
            $image = $this->upload_model->section_image($file);
        $data = array(     
            'title' => $this->input->post('title', true),
            'description' => $this->input->post('description', true),
            'image' => $image,
        );
        $this->Home_model->edit_section($id,$data);
        } else{
            $data = array(     
                'title' => $this->input->post('title', true),
                'description' => $this->input->post('description', true),
                'image' => $this->input->post('image', true),
            );
            $this->Home_model->edit_section($id,$data);
        }   
        
       
        redirect($this->agent->referrer());
    }

    public function  view_section()
    {
        $data['title'] = "View Section";
        $data['section'] =$this->Home_model->section();
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/section/section', $data);
        $this->load->view('admin/includes/_footer');
    }

    public function  update_view()
    {
        $data['title'] = "View Section";
        $id = $this->input->get('id');
        $data['section'] = $this->Home_model->update_view($id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/section/update', $data);
        $this->load->view('admin/includes/_footer');
    }






    /**
     * Posts Page
     */
    public function posts()
    {
        $page = $this->page_model->get_page("posts");

        $data['title'] = get_page_title($page);
        $data['description'] = get_page_description($page);
        $data['keywords'] = get_page_keywords($page);
        $data['page'] = $page;

        //check page auth
        $this->checkPageAuth($data['page']);

        if ($data['page']->visibility == 0) {
            $this->error_404();
        } else {
            //initialize pagination
            $page = $this->security->xss_clean($this->input->get('page'));
            if (empty($page)) {
                $page = 0;
            }

            if ($page != 0) {
                $page = $page - 1;
            }

            $config['base_url'] = base_url() . '/posts';
            $config['total_rows'] = $this->post_model->get_all_post_count();
            $config['per_page'] = $this->settings->pagination_per_page;
            $this->pagination->initialize($config);

            //get posts
            $data['posts'] = $this->post_model->get_paginated_all_posts($config['per_page'], $page * $config['per_page']);


            $this->load->view('partials/_header', $data);
            $this->load->view('posts', $data);
            $this->load->view('partials/_footer');
        }
    }


    /**
     * Post Page
     */
    public function post($slug, $id)
    {
        $id = $this->security->xss_clean($id);
        $slug = $this->security->xss_clean($slug);

        $data['post'] = $this->post_model->get_post_detailes($id);


        //check if post exists
        if (empty($data['post'])) {
            redirect(base_url());
        }

        if (!auth_check() && $data['post']->need_auth == 1) {
            $this->session->set_flashdata('error', trans("message_post_auth"));
            redirect(base_url() . 'login');
        }

        $data["category"] = $this->category_model->get_category($data['post']->category_id);
        $data["subcategory"] = $this->category_model->get_category($data['post']->subcategory_id);
        $data['post_tags'] = $this->tag_model->get_post_tags($id);
        $data['post_image_count'] = $this->post_image_model->get_post_image_count($id);
        $data['post_images'] = $this->post_image_model->get_post_images($id);
        $data['post_user'] = $this->auth_model->get_user($data['post']->user_id);
        $data['first_comments'] = $this->comment_model->get_first_comments($id);
        $data['comments'] = $this->comment_model->get_comments($id);

        $data['related_posts'] = $this->post_model->get_related_posts($data['post']->category_id, $id);
        $data['previous_post'] = $this->post_model->get_previous_post($id);
        $data['next_post'] = $this->post_model->get_next_post($id);

        $data['is_reading_list'] = $this->reading_list_model->is_post_in_reading_list($id);

        $data['page_type'] = "post";
        //set og tags
        $data['og_type'] = "article";
        $data['og_url'] = base_url() . "post/" . html_escape($data['post']->title_slug) . "/" . html_escape($data['post']->id);
        $data['og_image'] = base_url() . $data['post']->image_default;

        $data['title'] = html_escape($data['post']->title);
        $data['description'] = html_escape($data['post']->title);
        $data['keywords'] = html_escape($data['post']->keywords);

        $this->load->view('partials/_header', $data);
        $this->load->view('post', $data);
        $this->load->view('partials/_footer');

        //increase post hit
        $this->load->helper('cookie');
        $this->post_model->increase_post_hit($id);

    }

    /**
     * Gallery Page
     */
    public function gallery()
    {
        $data['page'] = $this->page_model->get_page('gallery');

        //check page exists
        $this->is_page_exists($data['page']);

        //check page auth
        $this->checkPageAuth($data['page']);

        if ($data['page']->visibility == 0) {
            $this->error_404();
        } else {

            $data['title'] = get_page_title($data['page']);
            $data['description'] = get_page_description($data['page']);
            $data['keywords'] = get_page_keywords($data['page']);

            //get gallery categories
            $data['gallery_categories'] = $this->gallery_category_model->get_categories();
            //get gallery images
            $data['gallery_images'] = $this->gallery_model->get_images();

            $this->load->view('partials/_header', $data);
            $this->load->view('gallery', $data);
            $this->load->view('partials/_footer');
        }

    }


    /**
     * Videos Page
     */
    public function videos()
    {
        $data['page'] = $this->page_model->get_page('videos');

        //check page exists
        $this->is_page_exists($data['page']);

        //check page auth
        $this->checkPageAuth($data['page']);

        $data['title'] = get_page_title($data['page']);
        $data['description'] = get_page_description($data['page']);
        $data['keywords'] = get_page_keywords($data['page']);

        if ($data['page']->visibility == 0) {
            $this->error_404();
        } else {
            //initialize pagination
            $page = $this->security->xss_clean($this->input->get('page'));
            if (empty($page)) {
                $page = 0;
            }

            if ($page != 0) {
                $page = $page - 1;
            }

            $config['base_url'] = base_url() . '/videos';
            $config['total_rows'] = $this->video_model->get_video_post_count();
            $config['per_page'] = $this->settings->pagination_per_page;
            $this->pagination->initialize($config);

            //get posts
            $data['videos'] = $this->video_model->get_paginated_video_posts($config['per_page'], $page * $config['per_page']);

            $this->load->view('partials/_header', $data);
            $this->load->view('videos', $data);
            $this->load->view('partials/_footer');
        }
    }


    /**
     * Video Page
     */
    public function video($slug, $id)
    {
        $id = $this->security->xss_clean($id);
        $slug = $this->security->xss_clean($slug);

        $data['post'] = $this->video_model->get_video($id);


        //check if post exists
        if (empty($data['post'])) {
            redirect(base_url());
        }

        if (!auth_check() && $data['post']->need_auth == 1) {
            $this->session->set_flashdata('error', trans("message_post_auth"));
            redirect(base_url() . 'login');
        }

        $data['post_tags'] = $this->tag_model->get_post_tags($id);
        $data['post_user'] = $this->auth_model->get_user($data['post']->user_id);
        $data['comments'] = $this->comment_model->get_comments($id);
        $data['first_comments'] = $this->comment_model->get_first_comments($id);

        $data['related_posts'] = $this->video_model->get_related_videos(4, $id);
        $data['previous_post'] = $this->video_model->get_previous_video($id);
        $data['next_post'] = $this->video_model->get_next_video($id);
        $data['is_reading_list'] = $this->reading_list_model->is_post_in_reading_list($id);
        $data['page_type'] = "post";
        //set og tags
        $data['og_type'] = "video";
        $data['og_url'] = base_url() . "video/" . html_escape($data['post']->title_slug) . "/" . html_escape($data['post']->id);
        if (empty($data['post']->image_url)):
            $data['og_image'] = base_url() . $data['post']->image_default;
        else:
            $data['og_image'] = $data['post']->image_url;
        endif;


        $data['title'] = html_escape($data['post']->title);
        $data['description'] = html_escape($data['post']->title);
        $data['keywords'] = html_escape($data['post']->keywords);

        $this->load->view('partials/_header', $data);
        $this->load->view('post', $data);
        $this->load->view('partials/_footer');

        //increase post hit
        $this->load->helper('cookie');
        $this->post_model->increase_post_hit($id);

    }


    /**
     * Category Page
     */
    public function category($slug, $category_id)
    {
        $slug = $this->security->xss_clean($slug);
        $category_id = $this->security->xss_clean($category_id);

        $data['category'] = $this->category_model->get_category($category_id);

        //check category exists
        if (empty($data['category'])) {
            redirect(base_url());
        }

        $data['title'] = html_escape($data['category']->name);
        $data['description'] = html_escape($data['category']->description);
        $data['keywords'] = html_escape($data['category']->keywords);

        //category type
        $data['category_type'] = "";
        if ($data['category']->parent_id == 0) {
            $data['category_type'] = "parent";
        } else {
            $data['category_type'] = "sub";
        }

        //initialize pagination
        $page = $this->security->xss_clean($this->input->get('page'));
        if (empty($page)) {
            $page = 0;
        }

        if ($page != 0) {
            $page = $page - 1;
        }

        $config['base_url'] = base_url() . '/category/' . $slug . '/' . $category_id;
        $config['total_rows'] = $this->post_model->get_post_count_by_category($data['category_type'], $category_id);
        $config['per_page'] = $this->settings->pagination_per_page;
        $this->pagination->initialize($config);

        //get posts
        $data['posts'] = $this->post_model->get_paginated_category_posts($data['category_type'], $category_id, $config['per_page'], $page * $config['per_page']);

        $this->load->view('partials/_header', $data);
        $this->load->view('category', $data);
        $this->load->view('partials/_footer');
    }


    /**
     * Profile Page
     */
    public function profile($slug)
    {
        $slug = $this->security->xss_clean($slug);

        $data['author'] = $this->auth_model->get_user_by_slug($slug);

        //check author exists
        if (empty($data['author'])) {
            redirect(base_url());
        }

        $data['title'] = $data['author']->username;
        $data['description'] = trans("title_author") . ': ' . $data['author']->username;
        $data['keywords'] = trans("title_author") . ', ' . $data['author']->username;


        //initialize pagination
        $page = $this->security->xss_clean($this->input->get('page'));
        if (empty($page)) {
            $page = 0;
        }

        if ($page != 0) {
            $page = $page - 1;
        }

        $config['base_url'] = base_url() . '/profile/' . $slug;
        $config['total_rows'] = $this->post_model->get_post_count_by_user($data['author']->id);
        $config['per_page'] = $this->settings->pagination_per_page;
        $this->pagination->initialize($config);

        //get posts
        $data['posts'] = $this->post_model->get_paginated_user_posts($data['author']->id, $config['per_page'], $page * $config['per_page']);

        $this->load->view('partials/_header', $data);
        $this->load->view('profile', $data);
        $this->load->view('partials/_footer');
    }


    /**
     * Tag Page
     */
    public function tag($tag_slug)
    {
        $tag_slug = $this->security->xss_clean($tag_slug);

        $data['tag'] = $this->tag_model->get_tag($tag_slug);

        //check tag exists
        if (empty($data['tag'])) {
            redirect(base_url());
        }

        $data['title'] = html_escape($data['tag']->tag);
        $data['description'] = trans("title_tag") . ': ' . $data['tag']->tag;
        $data['keywords'] = trans("title_tag") . ', ' . $data['tag']->tag;

        //initialize pagination
        $page = $this->security->xss_clean($this->input->get('page'));
        if (empty($page)) {
            $page = 0;
        }

        if ($page != 0) {
            $page = $page - 1;
        }

        $config['base_url'] = base_url() . '/tag/' . $tag_slug;
        $config['total_rows'] = $this->post_model->get_post_count_by_tag($tag_slug);
        $config['per_page'] = $this->settings->pagination_per_page;
        $this->pagination->initialize($config);

        //get posts
        $data['posts'] = $this->post_model->get_paginated_tag_posts($tag_slug, $config['per_page'], $page * $config['per_page']);

        $this->load->view('partials/_header', $data);
        $this->load->view('tag', $data);
        $this->load->view('partials/_footer');
		
	
    }


    /**
     * Rss Page
     */
    public function rss_channels()
    {
        $data['page'] = $this->page_model->get_page('rss-channels');

        //check page exists
        $this->is_page_exists($data['page']);

        //check page auth
        $this->checkPageAuth($data['page']);

        if ($this->settings->show_rss == 0 || $data['page']->visibility == 0) {
            $this->error_404();
        } else {

            $data['title'] = get_page_title($data['page']);
            $data['description'] = get_page_description($data['page']);
            $data['keywords'] = get_page_keywords($data['page']);

            $this->load->view('partials/_header', $data);
            $this->load->view('rss_channels', $data);
            $this->load->view('partials/_footer');

        }
    }


    /**
     * Dynamic Page by Name Slug
     */
    public function page($slug)
    {
        $slug = $this->security->xss_clean($slug);

        //index page
        if (empty($slug)) {
            redirect(base_url());
        }

        $data['page'] = $this->page_model->get_page($slug);

        //if not exists
        if (empty($data['page']) || $data['page'] == null) {
            $this->error_404();
        } //check if page disable
        else if ($data['page']->visibility == 0) {
            $this->error_404();
        } else {

            //check page auth
            $this->checkPageAuth($data['page']);

            $data['title'] = $data['page']->title;
            $data['description'] = $data['page']->description;
            $data['keywords'] = $data['page']->keywords;

            $this->load->view('partials/_header', $data);
            $this->load->view('page', $data);
            $this->load->view('partials/_footer');

        }
    }


    /**
     * Contact Page
     */
    public function contact()
    {
        $data['page'] = $this->page_model->get_page('contact');

        //check page auth
        $this->checkPageAuth($data['page']);

        if ($data['page']->visibility == 0) {
            $this->error_404();
        } else {

            $data['title'] = get_page_title($data['page']);
            $data['description'] = get_page_description($data['page']);
            $data['keywords'] = get_page_keywords($data['page']);

            $this->load->view('partials/_header', $data);
            $this->load->view('contact', $data);
            $this->load->view('partials/_footer');
        }

    }


    /**
     * Contact Page Post
     */
    public function contact_post()
    {
        //validate inputs
        $this->form_validation->set_rules('name', trans("placeholder_name"), 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('email', trans("placeholder_email"), 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('message', trans("placeholder_message"), 'required|xss_clean|max_length[5000]');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->contact_model->input_values());
            redirect($this->agent->referrer());
        } else {
            if ($this->contact_model->add_contact_message()) {
                $this->session->set_flashdata('success', trans("message_contact_success"));
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('form_data', $this->contact_model->input_values());
                $this->session->set_flashdata('error', trans("message_contact_error"));
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Search Page
     */
    public function search()
    {
        $q = $this->input->get('q', TRUE);

        $data['q'] = $q;
        $data['title'] = trans("title_search") . ': ' . $q;
        $data['description'] = trans("title_search") . ': ' . $q;
        $data['keywords'] = trans("title_search") . ', ' . $q;

        //initialize pagination
        $page = $this->security->xss_clean($this->input->get('page'));
        if (empty($page)) {
            $page = 0;
        }

        if ($page != 0) {
            $page = $page - 1;
        }
        $data['post_count'] = $this->post_model->get_search_post_count($q);

        $config['base_url'] = base_url() . '/search?q=' . $q;
        $config['total_rows'] = $data['post_count'];
        $config['per_page'] = $this->settings->pagination_per_page;
        $this->pagination->initialize($config);

        //get posts
        $data['posts'] = $this->post_model->get_paginated_search_posts($q, $config['per_page'], $page * $config['per_page']);

        $this->load->view('partials/_header', $data);
        $this->load->view('search', $data);
        $this->load->view('partials/_footer');
    }


    /**
     * Add Comment
     */
    public function add_comment_post()
    {
        //input values
        $data = $this->comment_model->input_values();

        if ($data['post_id'] && $data['user_id'] && trim($data['comment'])) {
            $this->comment_model->add_comment();
        }

        $data['first_comments'] = $this->comment_model->get_first_comments($data['post_id']);
        $data['comments'] = $this->comment_model->get_comments($data['post_id']);
        $this->load->view('partials/_comments', $data);
    }


    /**
     * Delete Comment
     */
    public function delete_comment_post()
    {
        $id = $this->input->post('id', true);

        $comment = $this->comment_model->get_comment($id);
        $post_id = 0;
        //if comment exists
        if (!empty($comment)) {
            $post_id = $comment->post_id;
            $this->comment_model->delete_comment($post_id,$id);
        }

        $data['first_comments'] = $this->comment_model->get_first_comments($post_id);
        $data['comments'] = $this->comment_model->get_comments($post_id);
        $data['comment_count'] = $this->comment_model->get_post_comment_count($post_id);
        $this->load->view('partials/_comments', $data);
    }

    /**
     * Like Comment
     */
    public function like_comment_post()
    {
        $id = $this->input->post('id', true);

        $comment = $this->comment_model->get_comment($id);

        //if comment exists
        if (!empty($comment)) {
            $this->comment_model->like_comment($comment);

            $data['first_comments'] = $this->comment_model->get_first_comments($comment->post_id);
            $data['comments'] = $this->comment_model->get_comments($comment->post_id);
            $data['comment_count'] = $this->comment_model->get_post_comment_count($comment->post_id);
            $this->load->view('partials/_comments', $data);
        }
    }

    /**
     * Add Poll Vote
     */
    public function add_vote()
    {
		
        if (auth_check()) {
            $poll_id = $this->input->post('poll_id', true);
            $option = $this->input->post('option', true);
            $user_id = user()->id;

            //check voted before
            if (empty($this->poll_model->get_user_vote($poll_id, $user_id))) {
                if ($this->poll_model->add_vote($poll_id, $user_id, $option)) {
                    $data["poll"] = $this->poll_model->get_poll($poll_id);
                    $this->load->view('partials/_poll_results', $data);
                } else {
                    echo "error";
                }
            } else {
                echo "voted";
            }
        }
    }

    /**
     * Add to Newsletter
     */
    public function add_to_newsletter()
    {
        //input values
        $email = $this->input->post('email', true);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->session->set_flashdata('news_error', trans("message_invalid_email"));
        } else {
            if ($email) {
                //check if email exists
                if (empty($this->newsletter_model->get_newsletter($email))) {
                    //addd
                    if ($this->newsletter_model->add_to_newsletter($email)) {
                        $this->session->set_flashdata('news_success', trans("message_newsletter_success"));
                    }
                } else {
                    $this->session->set_flashdata('news_error', trans("message_newsletter_error"));
                }
            }

        }

        redirect($this->agent->referrer() . "#newsletter");
    }


    /**
     * Reading List Page
     */
    public function reading_list()
    {
        $data['page'] = $this->page_model->get_page('reading-list');

        $data['title'] = get_page_title($data['page']);
        $data['description'] = get_page_description($data['page']);
        $data['keywords'] = get_page_keywords($data['page']);

        //initialize pagination
        $page = $this->security->xss_clean($this->input->get('page'));
        if (empty($page)) {
            $page = 0;
        }

        if ($page != 0) {
            $page = $page - 1;
        }
        $data['post_count'] = $this->reading_list_model->get_reading_list_count();

        $config['base_url'] = base_url() . '/reading-list';
        $config['total_rows'] = $data['post_count'];
        $config['per_page'] = 6;
        $this->pagination->initialize($config);

        //get posts
        $data['posts'] = $this->reading_list_model->get_paginated_reading_list($config['per_page'], $page * $config['per_page']);

        $this->load->view('partials/_header', $data);
        $this->load->view('reading_list', $data);
        $this->load->view('partials/_footer');
    }


    /**
     * Add or Delete Reading List
     */
    public function add_delete_reading_list_post()
    {
        $post_id = $this->input->post('post_id');

        if (empty($post_id)) {
            redirect($this->agent->referrer());
        }

        $is_post_in_reading_list = $this->reading_list_model->is_post_in_reading_list($post_id);

        //delete from list
        if ($is_post_in_reading_list == true) {
            $this->reading_list_model->delete_from_reading_list($post_id);
        } else {
            //add to list
            $this->reading_list_model->add_to_reading_list($post_id);
        }

        redirect($this->agent->referrer());
    }

    public function is_page_exists($page)
    {
        if (empty($page)) {
            redirect(base_url());
        }
    }

    public function checkPageAuth($page)
    {
        if (!auth_check() && $page->need_auth == 1) {
            $this->session->set_flashdata('error', trans("message_page_auth"));
            redirect(base_url() . 'login');
        }
    }

    public function error_404()
    {
        $data['title'] = "Error 404";
        $data['description'] = "Error 404";
        $data['keywords'] = "error,404";

        $this->load->view('partials/_header', $data);
        $this->load->view('errors/error_404');
        $this->load->view('partials/_footer');
    }


}
