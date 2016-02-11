<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Envio_email extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Envio_email_model');
        $this->load->helper('dni_helper');
    }

    function index() {
        $data['title'] = 'Formulario de registro';
        $data['head'] = 'Reg�strate desde aqu�';
        $carro = $this->load->view('envio_email_view', $data,true);
        $this->load->view('Plantilla_carro',Array('carro' => $carro) );
        
    }

    function nuevo_usuario() 
    {
        if (isset($_POST['grabar']) and $_POST['grabar'] == 'si') {
            //SI EXISTE EL CAMPO OCULTO LLAMADO GRABAR CREAMOS LAS VALIDACIONES
            $this->form_validation->set_rules('nom', 'Nombre', 'required|trim|xss_clean');
            $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email|trim|xss_clean');
            $this->form_validation->set_rules('nick', 'Usuario', 'required|trim|xss_clean');
            $this->form_validation->set_rules('pass', 'Password', 'required|trim|xss_clean|md5');
            $this->form_validation->set_rules('ape', 'Apellidos', 'required|trim|xss_clean');
            $this->form_validation->set_rules('dir', 'Direccion', 'required|trim|xss_clean');
            $this->form_validation->set_rules('cp', 'Codigo Postal', 'required|trim|xss_clean');
            $this->form_validation->set_rules('dni', 'DNI', 'required|trim|xss_clean');

            //SI HAY ALG�NA REGLA DE LAS ANTERIORES QUE NO SE CUMPLE MOSTRAMOS EL MENSAJE
            //EL COMOD�N %s SUSTITUYE LOS NOMBRES QUE LE HEMOS DADO ANTERIORMENTE, EJEMPLO, 
            //SI EL NOMBRE EST� VAC�O NOS DIR�A, EL NOMBRE ES REQUERIDO, EL COMOD�N %s 
            //SER� SUSTITUIDO POR EL NOMBRE DEL CAMPO
            $this->form_validation->set_message('required', 'El %s es requerido');
            $this->form_validation->set_message('valid_email', 'El %s no es v�lido');

            //SI ALGO NO HA IDO BIEN NOS DEVOLVER� AL INDEX MOSTRANDO LOS ERRORES
            if ($this->form_validation->run() == FALSE) {
                $this->index();
            } else {
                //EN CASO CONTRARIO PROCESAMOS LOS DATOS
                $nombre = $this->input->post('nom');
                $correo = $this->input->post('correo');
                $nick = $this->input->post('nick');
                $password = $this->input->post('pass');
                $apellidos = $this->input->post('ape');
                $direccion = $this->input->post('dir');
                $cp = $this->input->post('cp');
                $dni = $this->input->post('dni');
                $validado = site_url("dni_helper/function dni_valida_nif_cif_nie/" . $dni);
                if ($validado == 1) {
                    $dniOK = $dni;
                } else {
                    if($validado == '')
                    {
                        $dniOK = 'no hace na';
                    }
                    $dniOK = 'no validado';
                }

                //$provincia = $this->input->post('prov');
                //$prov = $this->Envio_email_model->get_provincia($provincia);

                $insert = $this->Envio_email_model->new_user($nombre, $correo, $nick, $password, $apellidos, $direccion, $cp, $dniOK);
                //si el modelo nos responde afirmando que todo ha ido bien, env�amos un correo
                //al usuario y lo redirigimos al index, en verdad deber�amos redirigirlo al home de
                //nuestra web para que puediera iniciar sesi�n
               
                //creo el array con datos de configuración para la vista      
                $carro = '<div class="alert alert-success">Se ha registrado satisfacctoriamente en unos minutos
    le llegará un correo electronico con la informacion de su cuenta grácias por confirar en nosotros!.</div>';
                //cargo la vista pasando los datos de configuacion
                $this->load->view('Plantilla_carro', Array('carro' => $carro));  
            }
        }
    }

}
