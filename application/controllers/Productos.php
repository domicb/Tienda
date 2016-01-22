<?php

class Productos extends CI_Controller {

    function index() {
            //cargo el helper de url, con funciones para trabajo con URL del sitio
        $this->load->helper('url');
            //cargo el modelo de artículos
        $this->load->model('Tienda_model');
            //pido los ultimos artículos al modelo
        $libros = $this->Tienda_model->dame_libros();
            //creo el array con datos de configuración para la vista
        $cuerpo = array('rs_articulos' => $libros);
            //cargo la vista pasando los datos de configuacion
        $this->load->view('Plantilla', $cuerpo);
    }


}
