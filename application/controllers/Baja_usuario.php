<?php
class Baja_usuario extends CI_Controller {
    
    function __construct() {
        parent::__construct();
         //cargo el modelo de artículos
        $this->load->model('Usuarios_model');
    }
    function index()
    {
        //cargo el helper de url, con funciones para trabajo con URL del sitio
        $this->load->helper('url');   
        
         if(isset($_POST['username']) && isset($_POST['password']))
            {
                $email = $_POST['username'];
                $password = $_POST['password'];
                bajaUsuario($email, $password);
                $carro = '<div class="alert alert-success">Se ha dado de baja al usuario con email '.$email.'!.</div>';
                $this->load->view('Plantilla_carro', Array('carro' => $carro));  
            }
            else
            {
                 $this->load->view('Baja');
            }              
        
    }
}