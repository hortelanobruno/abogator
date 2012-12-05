<?php

class Noticias_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    public function get_noticia($idnoticia) {
        $query = $this->db->query("SELECT * FROM bf_info_noticias where id = " . $idnoticia);
        return $query->result_array();
    }
    
    public function get_all_noticias(){
        $query = $this->db->query("SELECT id,titulo,descripcion,fecha FROM bf_info_noticias order by fecha desc");
        return $query->result_array();
    }
    
}