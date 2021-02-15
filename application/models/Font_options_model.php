<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Font_options_model extends CI_Model
{

    //input values
    public function input_values()
    {
        $data = array(
            'primary_font' => $this->input->post('primary_font', true),
            'secondary_font' => $this->input->post('secondary_font', true),
            'tertiary_font' => $this->input->post('tertiary_font', true),
        );
        return $data;
    }

    //update fonts
    public function update()
    {
        $data = $this->input_values();

        $this->db->where('id', 1);
        return $this->db->update('settings', $data);
    }
}