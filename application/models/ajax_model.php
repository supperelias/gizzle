<?php

class Ajax_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function sendMail($name, $email, $phone, $message, $subscribe = 'off') {

        $this->load->model('Mail_model');
        $this->load->library('email');

        if ($subscribe == 'on') {
            //$this->subscribe($email);
        }

        $content = $this->Mail_model->html_mail(
                array(
                    $name => 'Naam',
                    $email => 'Email',
                    $phone => 'Tel',
                    $message => 'Bericht'
                ));

        // Send mail
        $this->email->from($email, $name);
        $this->email->to('wouter@jd-systems.be');
        $this->email->bcc('wouter@jd-systems.be');
        $this->email->set_mailtype("html");
        $this->email->subject('Mail van Homedrome.be');
        $this->email->message($content);

        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    function subscribe($email) {
        $this->load->database();

        $data = array(
            'email' => $email,
            'ip' => $_SERVER['REMOTE_ADDR']
        );

        $query = $this->db->select('id')->where('email', $this->db->escape($email))->get('newsletter');

        if ($query->num_rows == 0) {
            $this->db->insert('newsletter', $this->db->escape($data));
        }
    }

}

?>
