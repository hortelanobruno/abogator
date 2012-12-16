<?php

class Email_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    public function save_email($email,$sistema) {
        $query = $this->db->query("INSERT INTO bf_user_emails (user_emails_email,user_emails_fecha,user_emails_sistema) VALUES ('".$email."',now(),'".$sistema."')");
    }
    
    
    
}