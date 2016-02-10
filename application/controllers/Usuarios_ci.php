<?php
class Usuarios_ci extends CI_Controller {
    
    function __construct() {
        parent::__construct();
         //cargo el modelo de artículos
        $this->load->model('Tienda_model');
        $this->load->model('Usuarios_model');
    }

    function index() 
    {
        $carro = $this->load->view('Vista_usuario','',true);
        $this->load->view('Plantilla_carro',Array('carro' => $carro));
        
    }  
    
}
