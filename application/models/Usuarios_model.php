<?php

class Usuarios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    /**
     * Comprabamos que el usuario exista a traves de su email y password
     * @param type $email
     * @param type $password
     * @return boolean
     */
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
    /**
     * Devuelve el identificador aleatorio de ese usuario
     * @param type $email
     * @return type
     */
    function getClave($email)
    {
        $query = $this->db->select('aleatorio');
        $query = $this->db->where('email',$email);
        $query = $this->db->get('usuario');
        return $query->row_array();
    }
    
    /**
     * Comprueba que el usuario exista en la base de datos
     * @param type $email
     * @return boolean
     */
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
    /**
     * Elimina el usuario identificadolo por su email y password
     * @param type $email
     * @param type $password
     * @return boolean
     */
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
    /**
     * Borramos directamente con la información que nos duevlve bajaUSuario
     * @param type $id
     */
    function baja($id) {
        $this->db->where('idusuario', $id['idusuario']);
        $this->db->delete('usuario');
    }
    /**
     * obtenemos el id del usuario a traves de sus datos email y password
     * @param type $email
     * @param type $password
     * @return type
     */
    function getID($email, $password) {
        $query = $this->db->select('idusuario');
        $query = $this->db->where('email', $email);
        $query = $this->db->where('password', $password);
        $query = $this->db->get('usuario');
        return $query->row_array();
    }
    /**
     * Devuelve todos los datos del usuario
     * @param type $email
     * @return type
     */
    function getUsuario($email) {
        $query = $this->db->select('*');
        $query = $this->db->where('email', $email);
        $query = $this->db->get('usuario');
        return $query->row_array();
    }
    /**
     * Devuelve todos los datos del usuario
     * @param type $email
     * @return type
     */
    function getUsu($email) {
        $query = $this->db->select('*');
        $query = $this->db->where('email', $email);
        $query = $this->db->get('usuario');
        return $query->result_array();
    }
    /**
     * Actualiza los campos del usuario
     * @param type $email
     * @param type $data
     */
    function setUsuario($email,$data) {
        $this->db->where('email', $email);
        $this->db->update('usuario', $data);
    }
    /**
     * Actualiza su contraseña
     * @param type $id
     * @param type $aleatorio
     * @param type $data
     */
    function setContra($id,$aleatorio,$data) {
        $this->db->where('idusuario', $id,'aleatorio',$aleatorio);
        $this->db->update('usuario', $data);
    }

}
