<?php

class Usuarios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function ValidarUsuario($email, $password) {         //   Consulta Mysql para buscar en la tabla Usuario aquellos usuarios que coincidan con el mail y password ingresados en pantalla de login
        $query = $this->db->where('email', $email);   //   La consulta se efectúa mediante Active Record. Una manera alternativa, y en lenguaje más sencillo, de generar las consultas Sql.
        $query = $this->db->where('password', $password);
        $query = $this->db->get('usuario');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function bajaUsuario($email, $password)
    {
        $existe = ValidarUsuario($email, $password);
        
        if($existe)//si existe sacamos el id para poder borrarlo
        {
            $id = getID($email, $password);
            //como ultimo paso le damos de baja borrando su registro
            baja($id);
        }
    }
    
    function baja($id)
    {
        $this->db->where('idusuario',$id);
        $this->db->delete('usuario');
    }
    
    function getID($email, $password)
    {
            $query = $this->db->select('idusuario');
            $query = $this->db->where('email',$email);
            $query = $this->db->where('password', $password);
            $query = $this->db->get('usuario');
            return $query->row_array();
    }
}
