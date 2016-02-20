<?php

class Usuarios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function ValidarUsuario($email, $password) {         //   Consulta Mysql para buscar en la tabla Usuario aquellos usuarios que coincidan con el mail y password ingresados en pantalla de login
        $query = $this->db->where('email', $email);   //   La consulta se efectúa mediante Active Record. Una manera alternativa, y en lenguaje más sencillo, de generar las consultas Sql.
        $query = $this->db->where('password', md5($password));
        $query = $this->db->get('usuario');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function getClave($email)
    {
        $query = $this->db->select('aleatorio');
        $query = $this->db->where('email',$email);
        $query = $this->db->get('usuario');
        return $query->row_array();
    }
    
    
    function existeUsuario($email)
    {
        $query = $this->db->where('email', $email);
        $query = $this->db->get('usuario');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function bajaUsuario($email, $password) {
        $existe = $this->ValidarUsuario($email, $password);

        if ($existe) {//si existe sacamos el id para poder borrarlo
            $id = $this->getID($email, md5($password));
            //como ultimo paso le damos de baja borrando su registro  
            $this->baja($id);
            return true;
        }//si el usuario a borrar no existe lo comunicamos
        else {
            return false;
        }
    }

    function baja($id) {
        $this->db->where('idusuario', $id['idusuario']);
        $this->db->delete('usuario');
    }

    function getID($email, $password) {
        $query = $this->db->select('idusuario');
        $query = $this->db->where('email', $email);
        $query = $this->db->where('password', $password);
        $query = $this->db->get('usuario');
        return $query->row_array();
    }

    function getUsuario($email) {
        $query = $this->db->select('*');
        $query = $this->db->where('email', $email);
        $query = $this->db->get('usuario');
        return $query->row_array();
    }

    function setUsuario($email,$data) {
        $this->db->where('email', $email);
        $this->db->update('usuario', $data);
    }
    
    function setContra($id,$aleatorio,$data) {
        $this->db->where('idusuario', $id,'aleatorio',$aleatorio);
        print_r($aleatorio);
        $this->db->update('usuario', $data);
    }

}
