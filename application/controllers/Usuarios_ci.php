<?php

class Usuarios_ci extends CI_Controller {

    function __construct() {
        parent::__construct();
        //cargo el modelo de artículos
        $this->load->model('Tienda_model');
        $this->load->model('Usuarios_model');
    }
    function mostrar()
    {
        $carro = $this->load->view('Vista_usuario', '', true);
        $this->load->view('Plantilla_carro', Array('carro' => $carro));
    }

    function index() {               
     
        if(isset($_POST['modificar']))
        {       
            $email = $this->session->userdata('username');
            $this->updateUsuario($email);
        }
        else
        {
            $carro = $this->load->view('Modificar', '', true);
            $this->load->view('Plantilla_carro', Array('carro' => $carro));
        }
    }

    function updateUsuario($email) {
        
        $datos = array(
            'nombre' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'apellidos' => $this->input->post('ape'),
            'direccion' => $this->input->post('address'),
            'cp' => $this->input->post('cp'),
            'dni' => $this->input->post('dni'),
        );

        $this->Usuarios_model->setUsuario($email, $datos);
        $carro = '<div class="alert alert-success">Los datos de su cuenta han sido actualizados!.</div>';
       
        $this->load->view('Plantilla_carro', Array('carro' => $carro));
       
    }

}
