<?php

class Compras extends CI_Controller {
    
    function __construct() {
        parent::__construct();
         //cargo el modelo de artículos
        $this->load->model('Carrito');
    }
    function index()
    {
        //cargo el helper de url, con funciones para trabajo con URL del sitio
        $this->load->helper('url');    
    }
    
    public function compra($id)
    {
        echo 'se ha comprado el producto con id '.$id;
    }
}