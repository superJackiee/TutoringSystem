<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model
{
    //post big image upload
    public function post_big_image_upload($post_id, $file)
    {
        $this->my_upload->upload($file);
        if ($this->my_upload->uploaded == true) {
            $this->my_upload->file_new_name_body = 'image_big_' . $post_id . uniqid();
            $this->my_upload->image_convert = 'jpg';
            $this->my_upload->jpeg_quality = 80;
            $this->my_upload->image_resize = true;
            $this->my_upload->image_ratio_no_zoom_in = true;
            $this->my_upload->image_x = 1920;
            $this->my_upload->image_ratio_y = true;
            $this->my_upload->process('./uploads/images/');
            $image_path = "uploads/images/" . $this->my_upload->file_dst_name;
            return $image_path;
        } else {
            return null;
        }
    }

    //post default image upload
    public function post_default_image_upload($post_id, $file)
    {
        $this->my_upload->upload($file);
        if ($this->my_upload->uploaded == true) {
            $this->my_upload->file_new_name_body = 'image_default_' . $post_id . uniqid();
            $this->my_upload->image_convert = 'jpg';
            $this->my_upload->jpeg_quality = 70;
            $this->my_upload->image_resize = true;
            $this->my_upload->image_ratio_no_zoom_in = true;
            $this->my_upload->image_x = 750;
            $this->my_upload->image_ratio_y = true;
            $this->my_upload->process('./uploads/images/');
            $image_path = "uploads/images/" . $this->my_upload->file_dst_name;
            return $image_path;
        } else {
            return null;
        }
    }

    //post slider image upload
    public function post_slider_image_upload($post_id, $file)
    {
        $this->my_upload->upload($file);
        if ($this->my_upload->uploaded == true) {
            $this->my_upload->file_new_name_body = 'image_slider_' . $post_id . uniqid();
            $this->my_upload->image_convert = 'jpg';
            $this->my_upload->jpeg_quality = 70;
            $this->my_upload->image_ratio_crop = true;
            $this->my_upload->image_resize = true;
            $this->my_upload->image_x = 600;
            $this->my_upload->image_y = 460;
            $this->my_upload->process('./uploads/images/');
            $image_path = "uploads/images/" . $this->my_upload->file_dst_name;
            return $image_path;
        } else {
            return null;
        }
    }


    //post mid image upload
    public function post_mid_image_upload($post_id, $file)
    {
        $this->my_upload->upload($file);
        if ($this->my_upload->uploaded == true) {
            $this->my_upload->file_new_name_body = 'image_mid_' . $post_id . uniqid();
            $this->my_upload->image_convert = 'jpg';
            $this->my_upload->jpeg_quality = 70;
            $this->my_upload->image_ratio_crop = true;
            $this->my_upload->image_resize = true;
            $this->my_upload->image_x = 450;
            $this->my_upload->image_y = 300;
            $this->my_upload->process('./uploads/images/');
            $image_path = "uploads/images/" . $this->my_upload->file_dst_name;
            return $image_path;
        } else {
            return null;
        }
    }


    //post small image upload
    public function post_small_image_upload($post_id, $file)
    {
        $this->my_upload->upload($file);
        if ($this->my_upload->uploaded == true) {
            $this->my_upload->file_new_name_body = 'image_small_' . $post_id . uniqid();
            $this->my_upload->image_convert = 'jpg';
            $this->my_upload->jpeg_quality = 70;
            $this->my_upload->image_ratio_crop = true;
            $this->my_upload->image_resize = true;
            $this->my_upload->image_x = 140;
            $this->my_upload->image_y = 98;
            $this->my_upload->process('./uploads/images/');
            $image_path = "uploads/images/" . $this->my_upload->file_dst_name;
            return $image_path;
        } else {
            return null;
        }
    }

    //video image upload
    public function video_image_upload($post_id, $file)
    {
        $this->my_upload->upload($file);
        if ($this->my_upload->uploaded == true) {
            $this->my_upload->file_new_name_body = 'video_' . $post_id . '_' . uniqid();
            $this->my_upload->image_convert = 'jpg';
            $this->my_upload->jpeg_quality = 70;
            $this->my_upload->image_ratio_crop = true;
            $this->my_upload->image_resize = true;
            $this->my_upload->image_x = 450;
            $this->my_upload->image_y = 300;
            $this->my_upload->process('./uploads/thumbnails/');
            $image_path = "uploads/thumbnails/" . $this->my_upload->file_dst_name;
            return $image_path;
        } else {
            return null;
        }
    }


    //gallery big image upload
    public function gallery_big_image_upload($file)
    {
        $this->my_upload->upload($file);
        if ($this->my_upload->uploaded == true) {
            $this->my_upload->file_new_name_body = 'image_big_' . uniqid();
            $this->my_upload->image_convert = 'jpg';
            $this->my_upload->jpeg_quality = 70;
            $this->my_upload->image_resize = true;
            $this->my_upload->image_ratio_no_zoom_in = true;
            $this->my_upload->image_x = 1920;
            $this->my_upload->image_ratio_y = true;
            $this->my_upload->process('./uploads/gallery/');
            $image_path = "uploads/gallery/" . $this->my_upload->file_dst_name;
            return $image_path;
        } else {
            return null;
        }
    }

    //gallery small image upload
    public function gallery_small_image_upload($file)
    {
        $this->my_upload->upload($file);
        if ($this->my_upload->uploaded == true) {
            $this->my_upload->file_new_name_body = 'image_small_' . uniqid();
            $this->my_upload->image_convert = 'jpg';
            $this->my_upload->jpeg_quality = 70;
            $this->my_upload->image_resize = true;
            $this->my_upload->image_ratio_no_zoom_in = true;
            $this->my_upload->image_x = 500;
            $this->my_upload->image_ratio_y = true;
            $this->my_upload->process('./uploads/gallery/');
            $image_path = "uploads/gallery/" . $this->my_upload->file_dst_name;
            return $image_path;
        } else {
            return null;
        }
    }


    //avatar image upload
    public function avatar_upload($user_id, $file)
    {
        $this->my_upload->upload($file);
        if ($this->my_upload->uploaded == true) {
            $this->my_upload->file_new_name_body = 'avatar_' . $user_id . '_' . uniqid();
            $this->my_upload->image_convert = 'jpg';
            $this->my_upload->jpeg_quality = 80;
            $this->my_upload->image_ratio_crop = true;
            $this->my_upload->image_resize = true;
            $this->my_upload->image_x = 150;
            $this->my_upload->image_y = 150;
            $this->my_upload->process('./uploads/profile/');
            $image_path = "uploads/profile/" . $this->my_upload->file_dst_name;
            return $image_path;
        } else {
            return null;
        }
    }


    //logo image upload
    public function logo_upload($file)
    {
        $this->my_upload->upload($file);
        if ($this->my_upload->uploaded == true) {
            $this->my_upload->file_new_name_body = 'logo_' . uniqid();
            $this->my_upload->process('./uploads/logo/');
            $image_path = "uploads/logo/" . $this->my_upload->file_dst_name;
            return $image_path;
        } else {
            return null;
        }
    }

    //favicon image upload
    public function favicon_upload($file)
    {
        $this->my_upload->upload($file);
        if ($this->my_upload->uploaded == true) {
            $this->my_upload->file_new_name_body = 'favicon_' . uniqid();
            $this->my_upload->process('./uploads/logo/');
            $image_path = "uploads/logo/" . $this->my_upload->file_dst_name;
            return $image_path;
        } else {
            return null;
        }
    }


    //upload ck editor image
    public function ck_image_upload($file)
    {
        $this->my_upload->upload($file);
        if ($this->my_upload->uploaded == true) {
            $this->my_upload->file_new_name_body = 'file_' . uniqid();
            $this->my_upload->jpeg_quality = 70;
            $this->my_upload->image_resize = true;
            $this->my_upload->image_ratio_no_zoom_in = true;
            $this->my_upload->image_ratio_crop = true;
            $this->my_upload->image_x = 750;
            $this->my_upload->image_ratio_y = true;
            $this->my_upload->process('./uploads/files/');
            $image_path = "uploads/files/" . $this->my_upload->file_dst_name;
            return $image_path;
        } else {
            return null;
        }
    }

    public function video_upload($file)
    {
        $this->my_upload->upload($file);
        if ($this->my_upload->uploaded == true) {
            $this->my_upload->file_new_name_body = 'video_' . uniqid();
            $this->my_upload->process('./uploads/video/');
            $vedio_path = "uploads/video/" . $this->my_upload->file_dst_name;
            return $vedio_path;
        } else {
            return null;
        }
    }

    public function diploma_upload($file)
    {
        $this->my_upload->upload($file);
        if ($this->my_upload->uploaded == true) {
            $this->my_upload->file_new_name_body = 'attachment' . uniqid();
            $this->my_upload->process('./uploads/attachment/');
            $edu_upload = "uploads/attachment/" . $this->my_upload->file_dst_name;
            return $edu_upload;
        } else {
            return null;
        }
    }
    
    public function section_image($file)
    {
        $this->my_upload->upload($file);
        if ($this->my_upload->uploaded == true) {
            $this->my_upload->file_new_name_body = 'home' . uniqid();
            $this->my_upload->process('./uploads/images/');
            $home = "uploads/images/" . $this->my_upload->file_dst_name;
            return $home;
        } else {
            return null;
        }
    }

    public function testimonial_img($file)
    {
        $this->my_upload->upload($file);
        if ($this->my_upload->uploaded == true) {
            $this->my_upload->file_new_name_body = 'testimonial_img' . uniqid();
            $this->my_upload->process('./uploads/images/');
            $testimonial_img = "uploads/images/" . $this->my_upload->file_dst_name;
            return $testimonial_img;
        } else {
            return null;
        }
    }
}