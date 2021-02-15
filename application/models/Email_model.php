<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model
{
    //send email
    public function send_email($to, $subject, $message)
    {

        $settings = $this->settings_model->get_settings();

        if ($settings->mail_protocol == "mail") {
            $config = Array(
                'protocol' => 'mail',
                'smtp_host' => $settings->mail_host,
                'smtp_port' => $settings->mail_port,
                'smtp_user' => $settings->mail_username,
                'smtp_pass' => $settings->mail_password,
                'smtp_timeout' => 4,
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'wordwrap' => TRUE
            );
        } else {
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => $settings->mail_host,
                'smtp_port' => $settings->mail_port,
                'smtp_user' => $settings->mail_username,
                'smtp_pass' => $settings->mail_password,
                'smtp_timeout' => 4,
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );
        }


        //initialize
        //$this->email->initialize($config);
        $this->load->library('email', $config);
        //send email
        $this->email->from($settings->mail_username, $settings->application_name);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        $this->email->set_newline("\r\n");

        if($this->email->send())
        {
         echo 'Email sent.';
        }
        else
       {
        show_error($this->email->print_debugger());
       }
    }

}