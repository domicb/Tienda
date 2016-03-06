<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tienda_model extends CI_Model {

    function __construct() {
        // Llamar al constructor de CI_Model
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Obtiene las categorias y las devuelve con array a la vista
     * @return type
     */
 
    public function get_categorias() {
        $query = $this->db->get('categoria');
        return $query->result_array();
    }
    
    /**
     * Obtiene y devuelve todos los libros destacados 
     * @param type $por_pagina
     * @param type $segmento
     * @return type
     */
    public function dame_libros($por_pagina, $segmento) {
        $query = $this->db->get('producto', $por_pagina, $segmento);
        
        //$this->db->where('inicio', valor, 'fin',valor);
        
        return $query->result_array();
    }

    /**
     * Obtiene y devuelve los libros de la categoria filosofia
     * @param type $por_pagina
     * @param type $segmento
     * @return type
     */
    public function libros_filosofia($por_pagina, $segmento) {
        $this->db->select('*');
        $this->db->from('producto');
        $this->db->where('categoria_idcategoria', 1);
        $this->db->limit($por_pagina, $segmento);
        $query = $this->db->get();
        return $query->result_array();
    }
    /**
     * Obtiene y devuelve todos los libros de la categoria economia
     * @param type $por_pagina
     * @param type $segmento
     * @return type
     */
     public function libros_economia($por_pagina, $segmento) {
        $this->db->select('*');
        $this->db->from('producto');
        $this->db->where('categoria_idcategoria', 2);
        $this->db->limit($por_pagina, $segmento);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    /**
     * Obtiene y devuelve el numero de filas que tiene esa categoria
     * @return type
     */
    function filas_filo() {
        $this->db->select('*');
        $this->db->from('producto');
        $this->db->where('categoria_idcategoria', 1);
        $consulta = $this->db->get();
        return $consulta->num_rows();
    }
    /**
     * Obtiene y devuelve el numero de filas que tiene la categoria economia
     * @return type
     */
        function filas_eco() {
        $this->db->select('*');
        $this->db->from('producto');
        $this->db->where('categoria_idcategoria', 2);
        $consulta = $this->db->get();
        return $consulta->num_rows();
    }
    /**
     * obtenemos el total de filas para hacer la paginación
     * @return type
     */
     
    function filas() {
        $consulta = $this->db->get('producto');
        return $consulta->num_rows();
    }

    /**
     * obtenemos todas las provincias a paginar con la función total_posts_paginados pasando la cantidad por página y el segmentocomo parámetros de la misma
     * @param type $por_pagina
     * @param type $segmento
     * @return type
     */
    function total_paginados($por_pagina, $segmento) {
        $consulta = $this->db->get('producto', $por_pagina, $segmento);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }
    /**
     * Sacamos los datos del libro a traves de su id
     * @param type $id
     * @return type
     */
    function datos_libro($id) {
        $this->db->select('*');
        $this->db->from('producto');
        $this->db->where('idproducto', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    /**
     * Sacamos los datos del pedido relacionandolo con el usuario a traves de su id
     * @param type $id
     * @return type
     */
    function getPedido($id)
    {
        $this->db->select('*');
        $this->db->from('pedido');
        $this->db->where('usuario_idusuario', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    /**
     * Devuelve los datos de un pedido en concreto
     * @param type $id
     * @return type
     */
    function datosPedido($id)
    {
        $this->db->select('*');
        $this->db->from('pedido');
        $this->db->where('idpedido', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    /**
     * Devuelve la linea que le pasemos como parametro a traves de su id
     * @param type $id
     * @return type
     */
    function getLinea($id)
    {
        $this->db->select('*');
        $this->db->from('linea');
        $this->db->where('pedido_idpedido', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    /**
     * Actualiza los campos de un articulo a traves de su id
     * @param type $id
     * @param type $data
     */
    function setLibro($id,$data)
    {
        $this->db->where('idproducto', $id);
        $this->db->update('producto', $data);
    }
    /**
     * Borra la cantidad comprada de el articulo en cuestion
     * @param type $id
     * @param type $cantidad
     */
    function unomenos($id,$cantidad)
    {
        $datos = $this->datos_libro($id);
        $quedan = $datos['cantidad'];
        $resultado = $quedan - $cantidad;
        $data = array(
            'cantidad' => $resultado
        );
        $this->db->where('idproducto', $id);
        $this->db->update('producto', $data);
    }
    /**
     * Elimina el pedido a traves de su id
     * @param type $id
     */
     function bajaPedido($id) {
         //primero borramos las lineas de pedido relacionadas
        $this->db->where('pedido_idpedido', $id);
        $this->db->delete('linea');
        //una vez nos hemos cargado las lineas relacionadas borramos los pedidos
        $this->db->where('idpedido', $id);
        $this->db->delete('pedido');
    }
    
    /**
     * Añade el pedido
     * @param type $datosUsuario
     * @param type $total
     * @return type
     */
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
     /**
      * Añade la linea asociada al pedido y al usuario
      * @param type $idPedido
      * @param type $precio
      * @param type $cantidad
      * @param type $idproducto
      * @return type
      */   
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
