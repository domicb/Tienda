<?php

class Usuarios_ci extends CI_Controller {

    function __construct() {
        parent::__construct();
        //cargo el modelo de artículos
        $this->load->model('Envio_email_model');
        $this->load->model('Tienda_model');
        $this->load->helper('dni_helper');
        $this->load->model('Usuarios_model');
    }

    function mostrar() {
        $carro = $this->load->view('Vista_usuario', '', true);
        $this->load->view('Plantilla_carro', Array('carro' => $carro));
    }

    function index() {
        $data['title'] = 'Modificando datos';
        $data['head'] = 'Introduce los campos';
        $carro = $this->load->view('Modificar', $data, true);
        $this->load->view('Plantilla_carro', Array('carro' => $carro));
    }

    function valid($dni) {
        $validado = dni_NIF_NIE_Ok($dni);
        if ($validado == 1) {
            return true;
        } else {
            return false;
        }
    }

    function updateUsuario() {
        if (isset($_POST['modificar']) and $_POST['modificar'] == 'si') {
            //SI EXISTE EL CAMPO OCULTO LLAMADO GRABAR CREAMOS LAS VALIDACIONES
            $this->form_validation->set_rules('nom', 'Nombre', 'required|trim|xss_clean');
            $this->form_validation->set_rules('correo', 'Email', 'required|is_unique[usuario.email]|valid_email|trim|xss_clean');
            $this->form_validation->set_rules('nick', 'Usuario', 'required|trim|xss_clean');
            $this->form_validation->set_rules('pass', 'Password', 'required|trim|xss_clean|md5');
            $this->form_validation->set_rules('ape', 'Apellidos', 'required|trim|xss_clean');
            $this->form_validation->set_rules('dir', 'Direccion', 'required|trim|xss_clean');
            $this->form_validation->set_rules('cp', 'Codigo Postal', 'required|trim|integer|max_length[5]|min_length[5]|xss_clean');
            $this->form_validation->set_rules('dni', 'DNI', 'required|trim|xss_clean|callback_valid');
            $this->form_validation->set_rules('provincia', 'Provincia', 'required|trim|xss_clean');

            //SI HAY ALG�NA REGLA DE LAS ANTERIORES QUE NO SE CUMPLE MOSTRAMOS EL MENSAJE
            //EL COMOD�N %s SUSTITUYE LOS NOMBRES QUE LE HEMOS DADO ANTERIORMENTE, EJEMPLO, 
            //SI EL NOMBRE EST� VAC�O NOS DIR�A, EL NOMBRE ES REQUERIDO, EL COMOD�N %s 
            //SER� SUSTITUIDO POR EL NOMBRE DEL CAMPO
            $this->form_validation->set_message('required', 'El %s es requerido');
            $this->form_validation->set_message('valid_email', 'El %s no es valido');
            $this->form_validation->set_message('is_unique', 'Ya existe un %s registrado con esa dirección');
            $this->form_validation->set_message('max_length', 'El %s es demasiado largo');
            $this->form_validation->set_message('integer', 'El %s debe ser de números enteros');
            $this->form_validation->set_message('valid', 'El %s no es válido');


            //SI ALGO NO HA IDO BIEN NOS DEVOLVER� AL INDEX MOSTRANDO LOS ERRORES
            if ($this->form_validation->run() == FALSE) {
                $this->index();
            } else {
                $datos = array(
                    'nombre' => $this->input->post('name'),
                    'provincia' => $this->input->post('provincia'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'apellidos' => $this->input->post('ape'),
                    'direccion' => $this->input->post('address'),
                    'cp' => $this->input->post('cp'),
                    'dni' => $this->input->post('dni'),
                );

                $email = $this->session->userdata('username');

                $this->Usuarios_model->setUsuario($email, $datos);
                $carro = '<div class="alert alert-success">Los datos de su cuenta han sido actualizados!.</div>';

                $this->load->view('Plantilla_carro', Array('carro' => $carro));
            }
        }
    }

}
