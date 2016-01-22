<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tienda_model extends CI_Model {

    function __construct() {
    // Llamar al constructor de CI_Model
        parent::__construct();
         $this->load->database();
    }

    public function dame_libros() {
        $query = $this->db->get('producto',10);
        if($query != '')
        {
            $cuerpo = $query;
        }
        else
        {
            $cuerpo = 'vacio';
        }
        return $cuerpo;
    }

}
