<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tienda_model extends CI_Model {

    function __construct() {
    // Llamar al constructor de CI_Model
        parent::__construct();
         $this->load->database();
    }

    public function dame_libros() 
    {
        $query = $this->db->get('producto');
        return $query->result_array();
    }
    
    public function cuantos_libros()
    {
        $query = $this->db->get('producto');
        return $query->num_rows();
    }   
	

}
