<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widget_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'title' => $this->input->post('title', true),
            'content' => $this->input->post('content', false),
            'widget_order' => $this->input->post('widget_order', true),
            'type' => $this->input->post('type', true),
            'visibility' => $this->input->post('visibility', true),
            'is_custom' => $this->input->post('is_custom', true),
        );
        return $data;
    }

    //add widget
    public function add()
    {
        $data = $this->input_values();
        $data['is_custom'] = 1;
        return $this->db->insert('widgets', $data);
    }

    //update widget
    public function update($id)
    {
        //set values
        $data = $this->input_values();
        $this->db->where('id', $id);
        return $this->db->update('widgets', $data);
    }

    //get widgets
    public function get_widgets()
    {
        $this->db->order_by('widget_order');
        $query = $this->db->get('widgets');
        return $query->result();
    }

    //get widget
    public function get_widget($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('widgets');
        return $query->row();
    }

    //delete widget
    public function delete($id)
    {
        $widget = $this->get_widget($id);
        if (!empty($widget)) {
            $this->db->where('id', $id);
            return $this->db->delete('widgets');
        } else {
            return false;
        }
    }
}