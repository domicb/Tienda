<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Envio_email_model extends CI_Model
{
	public function construct()
	{
		parent::__construct();
	}
	
	//realizamos la inserci�n de los datos y devolvemos el 
	//resultado al controlador para env�ar el correo si todo ha ido bien
	function new_user($nombre,$correo,$nick,$password,$apellidos,$direccion,$cp,$dni,$provincia)
	{
       $data = array(
            'idusuario' => null,
            'provincia' => $provincia,
            'username' => $nick,
            'password' => $password,
            'dni' => $dni,
            'email' => $correo,          
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'direccion' => $direccion,
            'cp' => $cp,
            'estado' => null
            
        );
        return $this->db->insert('usuario', $data);	
    }
    /**
     * No sabemos si la utilizaremos
     * preguntar si en la tabla usuarios va el nombre de la provincia
     * @param type $prov
     * @return type
     */
    public function get_provincia($prov)
    {
            $this->db->select('nombre');
            $this->db->from('provincia');
            $this->db->where('idprovincia',$prov);
            $query = $this->db->get();
            return $query->row_array();
    }
}