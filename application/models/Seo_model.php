<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'site_title' => $this->input->post('site_title', true),
            'site_description' => $this->input->post('site_description', true),
            'google_analytics' => $this->input->post('google_analytics', false),
        );
        return $data;
    }

    //update seo tools
    public function update()
    {
        $data = $this->input_values();

        $this->db->where('id', 1);
        return $this->db->update('settings', $data);
    }
}