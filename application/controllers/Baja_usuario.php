<?php

class Baja_usuario extends CI_Controller {

    function __construct() {
        parent::__construct();
        //cargo el modelo de artículos
        $this->load->model('Usuarios_model');
         //cargo el helper de url, con funciones para trabajo con URL del sitio
        $this->load->helper('url');
    }

    function index() {
       
        if (isset($_POST['user']) && isset($_POST['pass'])) {
            $ema = $_POST['user'];
            $pass = $_POST['pass'];
            $ok = $this->Usuarios_model->bajaUsuario($ema, $pass);
            if ($ok == false) 
                {//si no se ha borrado comunicamos volviendo al formulari                 
                $noen = '<div class="alert alert-warning">No se ha encontrado ningun usuario con ese email ' . $ema . '!.</div>';
                $carro = $this->load->view('Baja', Array('noen' => $noen),true);
                $this->load->view('Plantilla_carro',Array('carro'=>$carro));
            } 
            else 
                {
                $this->session->sess_destroy();
                $carro = '<div class="alert alert-success">Se ha dado de baja al usuario con email ' . $ema . '!.</div>';
                $this->load->view('Plantilla_carro', Array('carro' => $carro));
            }
        } else {
            $carro = $this->load->view('Baja','',true);
            $this->load->view('Plantilla_carro',Array('carro'=>$carro));
        }
    }

}
