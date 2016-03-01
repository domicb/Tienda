<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tienda_model extends CI_Model {

    function __construct() {
        // Llamar al constructor de CI_Model
        parent::__construct();
        $this->load->database();
    }

    public function get_categorias() {
        $query = $this->db->get('categoria');
        return $query->result_array();
    }

    public function dame_libros($por_pagina, $segmento) {
        $query = $this->db->get('producto', $por_pagina, $segmento);
        return $query->result_array();
    }

    public function libros_filosofia($por_pagina, $segmento) {
        $this->db->select('*');
        $this->db->from('producto');
        $this->db->where('categoria_idcategoria', 2);
        $this->db->limit($por_pagina, $segmento);
        $query = $this->db->get();
        return $query->result_array();
    }

    function filas_filo() {
        $this->db->select('*');
        $this->db->from('producto');
        $this->db->where('categoria_idcategoria', 2);
        $consulta = $this->db->get();
        return $consulta->num_rows();
    }

    //obtenemos el total de filas para hacer la paginación
    function filas() {
        $consulta = $this->db->get('producto');
        return $consulta->num_rows();
    }

    //obtenemos todas las provincias a paginar con la función
    //total_posts_paginados pasando la cantidad por página y el segmento
    //como parámetros de la misma
    function total_paginados($por_pagina, $segmento) {
        $consulta = $this->db->get('producto', $por_pagina, $segmento);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }

    function datos_libro($id) {
        $this->db->select('*');
        $this->db->from('producto');
        $this->db->where('idproducto', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function getPedido($id)
    {
        $this->db->select('*');
        $this->db->from('pedido');
        $this->db->where('usuario_idusuario', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function datosPedido($id)
    {
        $this->db->select('*');
        $this->db->from('pedido');
        $this->db->where('idpedido', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function getLinea($id)
    {
        $this->db->select('*');
        $this->db->from('linea');
        $this->db->where('pedido_idpedido', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function setLibro($id,$data)
    {
        $this->db->where('idproducto', $id);
        $this->db->update('producto', $data);
    }
     function bajaPedido($id) {
         //primero borramos las lineas de pedido relacionadas
        $this->db->where('pedido_idpedido', $id);
        $this->db->delete('linea');
        //una vez nos hemos cargado las lineas relacionadas borramos los pedidos
        $this->db->where('idpedido', $id);
        $this->db->delete('pedido');
    }
    
    function newPedido($datosUsuario,$total)
    {
        $fecha = date("Y/m/d");
        $data = array(
                 'idpedido' => null,
                 'usuario_idusuario' => $datosUsuario[0]['idusuario'],
                 'importe' => $total,
                 'estado' => 1,
                 'fecha' => $fecha,
                 'direccion' => $datosUsuario[0]['direccion'],
                 'cp' => $datosUsuario[0]['cp'],          
                 'provincia' => $datosUsuario[0]['provincia'],
                 'nombre_persona' => $datosUsuario[0]['nombre'],
                 'apellidos_persona' => $datosUsuario[0]['apellidos'],
                 'dni' => $datosUsuario[0]['dni'],
                 'email' => $datosUsuario[0]['email']
                 
             );
         $this->db->insert('pedido', $data);	
        return $this->db->insert_id();	
    }   
        
    function setLinea($idPedido,$precio,$cantidad,$idproducto)
    {
        $data = array(
                 'idlinea' => null,
                 'pedido_idpedido' => $idPedido,
                 'iva' => null,
                 'precio' => $precio,      
                 'cantidad' => $cantidad,
                 'producto_idproducto' => $idproducto
                 
             );
        return $this->db->insert('linea', $data);	
    }

}
