<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tienda_model extends CI_Model {

    function __construct() {
    // Llamar al constructor de CI_Model
        parent::__construct();
         $this->load->database();      
    }

    public function dame_libros($por_pagina,$segmento) 
    {
        $query = $this->db->get('producto', $por_pagina,$segmento);
        return $query->result_array();
    }
   
    //obtenemos el total de filas para hacer la paginación
    function filas()
    {
            $consulta = $this->db->get('producto');
            return  $consulta->num_rows() ;
    } 
    //obtenemos todas las provincias a paginar con la función
    //total_posts_paginados pasando la cantidad por página y el segmento
    //como parámetros de la misma
	function total_paginados($por_pagina,$segmento) 
        {
            $consulta = $this->db->get('producto',$por_pagina,$segmento);
            if($consulta->num_rows()>0)
            {
                foreach($consulta->result() as $fila)
		{
		    $data[] = $fila;
		}
                    return $data;
            }
	}
	

}
