<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model
{

    //input values
    public function input_values()
    {
        
            // Change the line below to your timezone!
            date_default_timezone_set('Asia/Kolkata');
            $date_time = date('Y/m/d h:i:s a', time());

        $data = array(
            'title' => $this->input->post('title', true),
            'title_slug' => $this->input->post('title_slug', true),
            'summary' => $this->input->post('summary', true),
            'category_id' => $this->input->post('category_id', false),
            'subcategory_id' => $this->input->post('subcategory_id', false),
            'content' => $this->input->post('content', false),
            'optional_url' => $this->input->post('optional_url', true),
            'need_auth' => $this->input->post('need_auth', true),
            'is_slider' => $this->input->post('is_slider', true),
            'is_featured' => $this->input->post('is_featured', true),
            'is_recommended' => $this->input->post('is_recommended', true),
            'is_breaking' => $this->input->post('is_breaking', true),
            'visibility' => $this->input->post('visibility', true),
            'keywords' => $this->input->post('keywords', true),
            'created_at' => $date_time,
        );
        return $data;
    }

    //add post
    public function add_post()
    {
        $data = $this->input_values();

        if (!isset($data['is_featured'])) {
            $data['is_featured'] = 0;
        }
        if (!isset($data['is_breaking'])) {
            $data['is_breaking'] = 0;
        }
        if (!isset($data['is_slider'])) {
            $data['is_slider'] = 0;
        }
        if (!isset($data['is_recommended'])) {
            $data['is_recommended'] = 0;
        }
        if (!isset($data['need_auth'])) {
            $data['need_auth'] = 0;
        }


        $data["post_type"] = "post";

        $data['user_id'] = user()->id;

        if (empty($data["title_slug"])) {
            //slug for title
            $data["title_slug"] = str_slug($data["title"]);
        }

        return $this->db->insert('posts', $data);
    }

    //update post
    public function update_post($id)
    {
        $data = $this->input_values();

        if (!isset($data['is_featured'])) {
            $data['is_featured'] = 0;
        }
        if (!isset($data['is_breaking'])) {
            $data['is_breaking'] = 0;
        }
        if (!isset($data['is_slider'])) {
            $data['is_slider'] = 0;
        }
        if (!isset($data['is_recommended'])) {
            $data['is_recommended'] = 0;
        }
        if (!isset($data['need_auth'])) {
            $data['need_auth'] = 0;
        }

        //if author set visibility
        if (is_author()) {
            $data['visibility'] = 0;
        }

        if (empty($data["title_slug"])) {
            //slug for title
            $data["title_slug"] = str_slug($data["title"]);
        }

        $this->db->where('id', $id);
        return $this->db->update('posts', $data);
    }

    //add post image
    public function add_post_image($post_id)
    {
        //get file
        $file = $_FILES['file'];
        if ($file) {

            //upload images
            $data["image_big"] = $this->upload_model->post_big_image_upload($post_id, $file);
            $data["image_default"] = $this->upload_model->post_default_image_upload($post_id, $file);
            $data["image_slider"] = $this->upload_model->post_slider_image_upload($post_id, $file);
            $data["image_mid"] = $this->upload_model->post_mid_image_upload($post_id, $file);
            $data["image_small"] = $this->upload_model->post_small_image_upload($post_id, $file);

            $this->db->where('id', $post_id);
            return $this->db->update('posts', $data);
        }
    }

    //update post image
    public function update_post_image($post_id)
    {
        //get file
        $file = $_FILES['file'];

        if (!empty($file['name'])) {
            //delete old image
            $post = $this->post_model->get_post($post_id);

            //delete images
            delete_image_from_server($post->image_big);
            delete_image_from_server($post->image_default);
            delete_image_from_server($post->image_slider);
            delete_image_from_server($post->image_mid);
            delete_image_from_server($post->image_small);

            //upload images
            $data["image_big"] = $this->upload_model->post_big_image_upload($post_id, $file);
            $data["image_default"] = $this->upload_model->post_default_image_upload($post_id, $file);
            $data["image_slider"] = $this->upload_model->post_slider_image_upload($post_id, $file);
            $data["image_mid"] = $this->upload_model->post_mid_image_upload($post_id, $file);
            $data["image_small"] = $this->upload_model->post_small_image_upload($post_id, $file);

            $this->db->where('id', $post_id);
            return $this->db->update('posts', $data);
        }
    }

    //get posts
    public function get_posts_backend()
    {
        //check if author
        if (user()->role == "author"):
            $author_id = user()->id;
            $this->db->order_by('posts.id', 'DESC');
            $this->db->where('post_type !=', "video");
            $this->db->where('posts.user_id', $author_id);
            $this->db->where('posts.visibility', 1);
            $query = $this->db->get('posts');
            return $query->result();
        else:
            $this->db->order_by('posts.id', 'DESC');
            $this->db->where('post_type !=', "video");
            $this->db->where('posts.visibility', 1);
            $query = $this->db->get('posts');
            return $query->result();
        endif;

    }
	
	// get all posts data
	
	function get_all_post(){
		
		$this->db->order_by('posts.id');
		$query = $this->db->get('posts'); 
		return $query->result();
		
		}

    //get posts
    public function get_posts()
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get pending posts
    public function get_pending_posts()
    {
        //check if author
        if (user()->role == "author"):
            $author_id = user()->id;
            $this->db->order_by('posts.id', 'DESC');
            $this->db->where('posts.visibility', 0);
            $this->db->where('posts.user_id', $author_id);
            $this->db->where('post_type !=', "video");
            $query = $this->db->get('posts');
            return $query->result();
        else:
            $this->db->order_by('posts.id', 'DESC');
            $this->db->where('posts.visibility', 0);
            $this->db->where('post_type !=', "video");
            $query = $this->db->get('posts');
            return $query->result();
        endif;
    }

    //get featured posts
    public function get_featured_posts_backend()
    {
        $this->db->where('is_featured', 1);
        $this->db->where('post_type !=', "video");
        $this->db->where('posts.visibility', 1);
        $this->db->order_by('featured_order');
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get featured slider posts
    public function get_featured_slider_posts_backend()
    {
        $this->db->where('is_slider', 1);
        $this->db->where('post_type !=', "video");
        $this->db->order_by('slider_order');
        $this->db->where('posts.visibility', 1);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get breaking news
    public function get_breaking_news_backend()
    {
        $this->db->where('is_breaking', 1);
        $this->db->where('post_type !=', "video");
        $this->db->where('posts.visibility', 1);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get breaking news
    public function get_breaking_news()
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('is_breaking', 1);
        $this->db->where('post_type !=', "video");
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get recommended posts
    public function get_recommended_posts_backend()
    {
        $this->db->where('is_recommended', 1);
        $this->db->where('post_type !=', "video");
        $this->db->where('posts.visibility', 1);
        $this->db->order_by('featured_order');
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get post
    public function get_post($id)
    {
        $this->db->where('posts.id', $id);
        $query = $this->db->get('posts');
        return $query->row();
    }


    //get featured slider posts
    public function get_featured_slider_posts()
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->where('is_slider', 1);
        $this->db->order_by('slider_order');
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get author posts
    public function get_author_posts($author_id)
    {
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->where('posts.user_id', $author_id);
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get author pending posts
    public function get_author_pending_posts($author_id)
    {

        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color');
        $this->db->where('posts.visibility', 0);
        $this->db->where('post_type !=', "video");
        $this->db->where('posts.user_id', $author_id);
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get last posts
    public function get_last_posts($limit)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->order_by('posts.id', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get all post count
    public function get_all_post_count()
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->num_rows();
    }

    //get all posts
    public function get_paginated_all_posts($per_page, $offset)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->order_by('posts.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get limited featured posts
    public function get_limited_featured_posts($limit)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->where('is_featured', 1);
        $this->db->order_by('featured_order');
        $this->db->limit($limit);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get popular posts
    public function get_popular_posts($limit)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->order_by('hit', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get recommended posts
    public function get_recommended_posts()
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('is_recommended', 1);
        $this->db->where('post_type !=', "video");
        $this->db->order_by('posts.id', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get random posts
    public function get_random_posts($limit)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->where("posts.image_mid != ''");
        $this->db->order_by('rand()');
        $this->db->limit($limit);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get related posts
    public function get_related_posts($category_id, $post_id)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->where('posts.id !=', $post_id);
        $this->db->order_by('rand()');
        $this->db->limit(4);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get posts by user
    public function get_paginated_user_posts($user_id, $per_page, $offset)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->select('posts.*,users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('posts.user_id', $user_id);
        $this->db->order_by('posts.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get post count by user
    public function get_post_count_by_user($user_id)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->select('posts.*,users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('posts.user_id', $user_id);
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->num_rows();
    }

    //get search posts
    public function get_paginated_search_posts($q, $per_page, $offset)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->select('posts.*,users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->like('title', $q);
        $this->db->order_by('posts.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get search post count
    public function get_search_post_count($q)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->select('posts.*,users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->like('title', $q);
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->num_rows();
    }

    //get posts by topcategory
    public function get_posts_by_category($category_id)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->where('category_id', $category_id);
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get last posts by topcategory
    public function get_last_posts_by_category($category_id, $count)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->where('category_id', $category_id);
        $this->db->order_by('posts.id', 'DESC');
        $this->db->limit($count);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get last posts by subcategory
    public function get_last_posts_by_subcategory($subcategory_id, $count)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->where('subcategory_id', $subcategory_id);
        $this->db->order_by('posts.id', 'DESC');
        $this->db->limit($count);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get paginated category posts
    public function get_paginated_category_posts($type, $category_id, $per_page, $offset)
    {
        if ($type == "parent") {
            $this->db->join('users', 'posts.user_id = users.id');
            $this->db->join('categories', 'posts.category_id = categories.id');
            $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
            $this->db->where('posts.visibility', 1);
            $this->db->where('post_type !=', "video");
            $this->db->where('category_id', $category_id);
            $this->db->order_by('posts.id', 'DESC');
            $this->db->limit($per_page, $offset);
            $query = $this->db->get('posts');
            return $query->result();
        } else {
            $this->db->join('users', 'posts.user_id = users.id');
            $this->db->join('categories', 'posts.category_id = categories.id');
            $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
            $this->db->where('posts.visibility', 1);
            $this->db->where('post_type !=', "video");
            $this->db->where('subcategory_id', $category_id);
            $this->db->order_by('posts.id', 'DESC');
            $this->db->limit($per_page, $offset);
            $query = $this->db->get('posts');
            return $query->result();
        }

    }

    //get post count by category
    public function get_post_count_by_category($category_id)
    {
        $category = $this->category_model->get_category($category_id);

        if (!empty($category)) {
            if ($category->parent_id == 0) {
                $this->db->join('users', 'posts.user_id = users.id');
                $this->db->join('categories', 'posts.category_id = categories.id');
                $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
                $this->db->where('posts.visibility', 1);
                $this->db->where('post_type !=', "video");
                $this->db->where('posts.category_id', $category_id);
                $query = $this->db->get('posts');
                return $query->num_rows();
            } else {
                $this->db->join('users', 'posts.user_id = users.id');
                $this->db->join('categories', 'posts.category_id = categories.id');
                $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
                $this->db->where('posts.visibility', 1);
                $this->db->where('post_type !=', "video");
                $this->db->where('posts.subcategory_id', $category_id);
                $query = $this->db->get('posts');
                return $query->num_rows();
            }
        } else {
            return 0;
        }


    }

    //get posts by tag
    public function get_paginated_tag_posts($tag_slug, $per_page, $offset)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('tags', 'posts.id = tags.post_id');
        $this->db->select('posts.*, tags.id as tag_id, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('tags.tag_slug', $tag_slug);
        $this->db->order_by('posts.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //get post count by tag
    public function get_post_count_by_tag($tag_slug)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('tags', 'posts.id = tags.post_id');
        $this->db->select('posts.*, tags.id as tag_id, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('tags.tag_slug', $tag_slug);
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->num_rows();
    }

    //get post
    public function get_post_detailes($id)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('posts.id', $id);
        $query = $this->db->get('posts');
        return $query->row();
    }

    //get previous post
    public function get_previous_post($id)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->where('posts.visibility', 1);
        $this->db->where('posts.id <', $id);
        $this->db->where('post_type !=', "video");
        $this->db->select('posts.*');
        $this->db->order_by('posts.id', 'DESC');
        $query = $this->db->get('posts');
        return $query->row();
    }

    //get next post
    public function get_next_post($id)
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->where('posts.visibility', 1);
        $this->db->where('posts.id >', $id);
        $this->db->where('post_type !=', "video");
        $this->db->select('posts.*');
        $this->db->order_by('posts.id');
        $query = $this->db->get('posts');
        return $query->row();
    }

    //get footer random posts
    public function get_footer_random_posts()
    {
        $this->db->join('users', 'posts.user_id = users.id');
        $this->db->join('categories', 'posts.category_id = categories.id');
        $this->db->select('posts.*, categories.name as category_name, categories.color as category_color, users.username as username, users.slug as user_slug');
        $this->db->where('posts.visibility', 1);
        $this->db->where('post_type !=', "video");
        $this->db->order_by('rand()');
        $this->db->limit(3);
        $query = $this->db->get('posts');
        return $query->result();
    }

    //increase post hit
    public function increase_post_hit($id)
    {
        //get post
        $post = $this->get_post($id);

        if (!empty($post)):
            if (get_cookie('var_post_' . $id) != 1) :
                //increase hit
                set_cookie('var_post_' . $id, '1', time() + 8640000);
                $data = array(
                    'hit' => $post->hit + 1
                );

                $this->db->where('id', $id);
                $this->db->update('posts', $data);
            endif;
        endif;
    }

    //add or remove post from slider
    public function post_add_remove_slider($id)
    {
        //get post
        $post = $this->post_model->get_post($id);

        if (!empty($post)) {
            $result = "";
            if ($post->is_slider == 1) {
                //remove from slider
                $data = array(
                    'is_slider' => 0,
                );
                $result = "removed";
            } else {
                //add to slider
                $data = array(
                    'is_slider' => 1,
                );
                $result = "added";
            }

            $this->db->where('id', $id);
            $this->db->update('posts', $data);
            return $result;
        }
    }

    //add or remove post from featured
    public function post_add_remove_featured($id)
    {
        //get post
        $post = $this->post_model->get_post($id);

        if (!empty($post)) {
            $result = "";
            if ($post->is_featured == 1) {
                //remove from featured
                $data = array(
                    'is_featured' => 0,
                );
                $result = "removed";
            } else {
                //add to featured
                $data = array(
                    'is_featured' => 1,
                );
                $result = "added";
            }

            $this->db->where('id', $id);
            $this->db->update('posts', $data);
            return $result;
        }
    }

    //add or remove post from breaking
    public function post_add_remove_breaking($id)
    {
        //get post
        $post = $this->post_model->get_post($id);

        if (!empty($post)) {
            $result = "";
            if ($post->is_breaking == 1) {
                //remove from breaking
                $data = array(
                    'is_breaking' => 0,
                );
                $result = "removed";
            } else {
                //add to breaking
                $data = array(
                    'is_breaking' => 1,
                );
                $result = "added";
            }

            $this->db->where('id', $id);
            $this->db->update('posts', $data);
            return $result;
        }
    }

    //approve post
    public function approve_post($id)
    {

        $data = array(
            'visibility' => 1,
        );

        $this->db->where('id', $id);
        return $this->db->update('posts', $data);
    }

    //add or remove post from recommended
    public function post_add_remove_recommended($id)
    {
        //get post
        $post = $this->post_model->get_post($id);

        if (!empty($post)) {
            $result = "";
            if ($post->is_recommended == 1) {
                //remove from recommended
                $data = array(
                    'is_recommended' => 0,
                );
                $result = "removed";
            } else {
                //add to recommended
                $data = array(
                    'is_recommended' => 1,
                );
                $result = "added";
            }

            $this->db->where('id', $id);
            $this->db->update('posts', $data);
            return $result;
        }
    }

    //save feaured post order
    public function save_featured_post_order($id, $order)
    {
        //get post
        $post = $this->get_post($id);

        if (!empty($post)):
            $data = array(
                'featured_order' => $order,
            );
            $this->db->where('id', $id);
            $this->db->update('posts', $data);
        endif;
    }

    //save home slider post order
    public function save_home_slider_post_order($id, $order)
    {
        //get post
        $post = $this->get_post($id);

        if ($post):
            $data = array(
                'slider_order' => $order,
            );
            $this->db->where('id', $id);
            $this->db->update('posts', $data);
        endif;
    }

    //delete post
    public function delete_post($id)
    {
        $post = $this->get_post($id);

        if (!empty($post)):
            //delete posts images
            delete_image_from_server($post->image_big);
            delete_image_from_server($post->image_default);
            delete_image_from_server($post->image_slider);
            delete_image_from_server($post->image_mid);
            delete_image_from_server($post->image_small);

            $this->db->where('id', $id);
            return $this->db->delete('posts');
        else:
            return false;
        endif;
    }
}