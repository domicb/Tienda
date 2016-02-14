<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
	$this->load->model('Usuarios_model');
    }
	
	public function index()
        {	           
            if(isset($_POST['username']) && isset($_POST['password']))
            {
                $pass = $_POST['password'];
                $ema = $_POST['username'];
                //si la sesion está creada redirigimos a inicio
                if($this->session->userdata('username'))
                {
                    redirect(base_url());
                }
                //si devuelve 1 es true sino false
                 if($this->Usuarios_model->ValidarUsuario($ema,$pass))
                 {//si no estaba logeado pero si esta en la base de datos le damos acceso con set_userdata
                     $this->session->set_userdata('username',$ema);
                     redirect(base_url());
                 }
                 else
                 {//si no tiene cuenta lo mandamos de nuevo al login
                     redirect(base_url().'index.php/Login/');                  
                 }
            }
            
            $carro = $this->load->view('Vista_login','',true);
            $this->load->view('Plantilla_carro',Array('carro'=>$carro));
        }
        public function logout()
        {
            $this->session->sess_destroy();
            redirect(base_url());
        }
}

