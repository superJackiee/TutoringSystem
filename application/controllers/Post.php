<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller
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
     * Add Post
     */
    public function add_post()
    {
        $data['title'] = "Add Post";
        $data['top_categories'] = $this->category_model->get_categories();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/add', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Add Post Post
     */
    public function add_post_post()
    {
        //validate inputs
        $this->form_validation->set_rules('title', "Title", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('summary', "Summary", 'xss_clean|max_length[1000]');
        $this->form_validation->set_rules('category_id', "Category", 'required');
        $this->form_validation->set_rules('optional_url', "Optional Url", 'xss_clean|max_length[1000]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->post_model->input_values());
            redirect($this->agent->referrer());
        } else {
            //if post added
            if ($this->post_model->add_post()) {
                //last id
                $last_id = $this->db->insert_id();

                //insert post image
                $this->post_model->add_post_image($last_id);
                //insert post additional images
                $this->post_image_model->add_post_images($last_id);
                //insert post tags
                $this->tag_model->add_post_tags($last_id);

                $this->session->set_flashdata('success', "Post successfully added!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('form_data', $this->post_model->input_values());
                $this->session->set_flashdata('error', "There was a problem adding the post!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Posts
     */
    public function posts()
    {
        prevent_author();

        $data['title'] = 'Posts';

        //get posts
        $data["posts"] = $this->post_model->get_posts_backend();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/posts', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * Pending Posts
     */
    public function pending_posts()
    {
        $data['title'] = 'Pending Posts';

        //get posts
        $data["posts"] = $this->post_model->get_pending_posts();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/pending_posts', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * Author Posts
     */
    public function author_posts()
    {
        $data['title'] = 'Author Posts';

        $author_id = user()->id;

        //get posts
        $data["posts"] = $this->post_model->get_author_posts($author_id);

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/author_posts', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * Author Pending Posts
     */
    public function author_pending_posts()
    {
        $data['title'] = 'Pending Posts';

        $author_id = user()->id;

        //get posts
        $data["posts"] = $this->post_model->get_author_pending_posts($author_id);

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/pending_posts', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * Featured Posts
     */
    public function featured_posts()
    {
        prevent_author();

        $data['title'] = 'Featured Posts';

        //get featured posts
        $data["posts"] = $this->post_model->get_featured_posts_backend();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/featured_posts', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * Featured Slider Posts
     */
    public function featured_slider_posts()
    {
        prevent_author();

        $data['title'] = 'Featured Slider Posts';

        //get featured slider posts
        $data["posts"] = $this->post_model->get_featured_slider_posts_backend();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/featured_slider_posts', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Breaking news
     */
    public function breaking_news()
    {
        prevent_author();

        $data['title'] = 'Breaking News';

        //get featured posts
        $data["posts"] = $this->post_model->get_breaking_news_backend();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/breaking_news', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * Recommended Posts
     */
    public function recommended_posts()
    {
        prevent_author();

        $data['title'] = 'Recommended Posts';

        //get featured posts
        $data["posts"] = $this->post_model->get_recommended_posts_backend();

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/recommended_posts', $data);
        $this->load->view('admin/includes/_footer');
    }

    /**
     * Update Post
     */
    public function update_post($id)
    {
        $data['title'] = 'Update Post';

        //get post
        $data['post'] = $this->post_model->get_post($id);

        if (empty($data['post'])) {
            redirect($this->agent->referrer());
        }

        //check if author
        if (is_author()) {
            //check owner
            if ($data['post']->user_id != user()->id):
                redirect("admin");
            endif;
        }

        //combine post tags
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
        $data['post_images'] = $this->post_image_model->get_post_images($id);
        $data['categories'] = $this->category_model->get_categories();
        $data['subcategories'] = $this->category_model->get_subcategories_by_parent_id($data['post']->category_id);

        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/post/update', $data);
        $this->load->view('admin/includes/_footer');
    }


    /**
     * Update Post Post
     */
    public function update_post_post()
    {

        //validate inputs
        $this->form_validation->set_rules('title', "Title", 'required|xss_clean|max_length[500]');
        $this->form_validation->set_rules('summary', "Summary", 'xss_clean|max_length[1000]');
        $this->form_validation->set_rules('category_id', "Category", 'required');
        $this->form_validation->set_rules('optional_url', "Optional Url", 'xss_clean|max_length[1000]');

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('form_data', $this->post_model->input_values());
            redirect($this->agent->referrer());
        } else {
            //post id
            $post_id = $this->input->post('id', true);

            if ($this->post_model->update_post($post_id)) {

                //update post image
                $this->post_model->update_post_image($post_id);
                //insert post additional images
                $this->post_image_model->add_post_images($post_id);
                //update post tags
                $this->tag_model->update_post_tags($post_id);

                $this->session->set_flashdata('success', "Post successfully updated!");

                $redirect_url = $this->input->post("redirect_url");
                if (!empty($redirect_url)) {
                    redirect('admin/' . $redirect_url);
                } else {
                    redirect('admin/posts');
                }


            } else {
                $this->session->set_flashdata('form_data', $this->post_model->input_values());
                $this->session->set_flashdata('error', "There was a problem updating the post!");
                redirect($this->agent->referrer());
            }
        }
    }


    /**
     * Upload Ck Editor Images Post
     */
    public function upload_ckimage_post()
    {
        if ('kgh764hdj990sghsg46r' == $this->input->get('key', true)) {
            //get file
            $file = $_FILES['upload'];
            $path = $this->upload_model->ck_image_upload($file);
            $url = base_url() . $path;

            //return ck editor message and image url
            $msg = 'Successfully Uploaded';
            $CKEditorFuncNum = $_GET['CKEditorFuncNum'];
            $output = '<html><body><script type="text/javascript">window.parent.CKEDITOR.tools.callFunction(' . $CKEditorFuncNum . ', "' . $url . '","' . $msg . '");</script></body></html>';
            echo $output;
        }
    }

    /**
     * Delete Post Image
     */
    public function delete_post_image_post()
    {
        $id = $this->input->post('id', true);

        $image = $this->post_image_model->get_post_image($id);

        if ($image) {
            $post_id = $image->post_id;
            //delete image
            $this->post_image_model->delete_post_image($id);

            $data['post_images'] = $this->post_image_model->get_post_images($post_id);

            $this->load->view('admin/includes/_delete_image_response', $data);
        }
    }


    /**
     * Post Options Post
     */
    public function post_options_post()
    {
        $option = $this->input->post('option', true);
        $id = $this->input->post('id', true);

        $data["post"] = $this->post_model->get_post($id);

        //check if exists
        if (empty($data['post'])) {
            redirect($this->agent->referrer());
        }

        //if option add remove from slider
        if ($option == 'add-remove-from-slider') {

            $result = $this->post_model->post_add_remove_slider($id);

            if ($result == "removed") {
                $this->session->set_flashdata('success', "Post removed from slider!");
                redirect($this->agent->referrer());
            }
            if ($result == "added") {
                $this->session->set_flashdata('success', "Post added to slider!");
                redirect($this->agent->referrer());
            }

        }

        //if option add remove from featured
        if ($option == 'add-remove-from-featured') {

            $result = $this->post_model->post_add_remove_featured($id);

            if ($result == "removed") {
                $this->session->set_flashdata('success', "Post removed from featured posts!");
                redirect($this->agent->referrer());
            }
            if ($result == "added") {
                $this->session->set_flashdata('success', "Post added to featured posts!");
                redirect($this->agent->referrer());
            }

        }

        //if option add remove from breaking
        if ($option == 'add-remove-from-breaking') {

            $result = $this->post_model->post_add_remove_breaking($id);

            if ($result == "removed") {
                $this->session->set_flashdata('success', "Post removed from breaking news!");
                redirect($this->agent->referrer());
            }
            if ($result == "added") {
                $this->session->set_flashdata('success', "Post added to breaking news!");
                redirect($this->agent->referrer());
            }

        }

        //if option add remove from recommended
        if ($option == 'add-remove-from-recommended') {

            $result = $this->post_model->post_add_remove_recommended($id);

            if ($result == "removed") {
                $this->session->set_flashdata('success', "Post removed from recommended posts!");
                redirect($this->agent->referrer());
            }
            if ($result == "added") {
                $this->session->set_flashdata('success', "Post added to recommended posts!");
                redirect($this->agent->referrer());
            }

        }


        //if option approve
        if ($option == 'approve') {
            if (is_admin()):
                if ($this->post_model->approve_post($id)) {
                    $this->session->set_flashdata('success', "Post approved!");
                } else {
                    $this->session->set_flashdata('error', "There was a problem approving the post!");
                }
            endif;
            redirect($this->agent->referrer());
        }

        //if option delete
        if ($option == 'delete') {

            if ($this->post_model->delete_post($id)) {
                //delete post tags
                $this->tag_model->delete_post_tags($id);
                //delete post images
                $this->post_image_model->delete_post_images($id);

                $this->session->set_flashdata('success', "Post successfully deleted!");
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('error', "There was a problem deleting the post!");
                redirect($this->agent->referrer());
            }

        }
    }

    /**
     * Save Featured Post Order
     */
    public function featured_posts_order_post()
    {
        $post_id = $this->input->post('id', true);
        $order = $this->input->post('featured_order', true);

        $this->post_model->save_featured_post_order($post_id, $order);
        redirect($this->agent->referrer());
    }

    /**
     * Save Home Slider Post Order
     */
    public function home_slider_posts_order_post()
    {
        $post_id = $this->input->post('id', true);
        $order = $this->input->post('slider_order', true);

        $this->post_model->save_home_slider_post_order($post_id, $order);
        redirect($this->agent->referrer());
    }

}
