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

}
