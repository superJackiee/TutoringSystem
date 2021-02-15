<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visual_settings_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'post_list_style' => $this->input->post('post_list_style', true),
            'site_color' => $this->input->post('site_color', true),
            'site_block_color' => $this->input->post('site_block_color', true),
        );
        return $data;
    }


    //get settings
    public function get_settings()
    {
        $query = $this->db->get_where('visual_settings', array('id' => 1));
        return $query->row();
    }

    //update settings
    public function update_settings()
    {
        $data = $this->visual_settings_model->input_values();

        //get file
        $file = $_FILES['logo'];
        if (!empty($file['name'])) {
            //upload logo
            $data["logo"] = $this->upload_model->logo_upload($file);
        }

        //get file
        $file = $_FILES['logo_footer'];
        if (!empty($file['name'])) {
            //upload logo
            $data["logo_footer"] = $this->upload_model->logo_upload($file);
        }

        //get file
        $file = $_FILES['favicon'];
        if (!empty($file['name'])) {
            //upload logo
            $data["favicon"] = $this->upload_model->favicon_upload($file);
        }

        $this->db->where('id', 1);
        return $this->db->update('visual_settings', $data);
    }

}