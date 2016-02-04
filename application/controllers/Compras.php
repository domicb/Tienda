<?php

class Compras extends CI_Controller {
    
    function __construct() {
        parent::__construct();
         //cargo el modelo de artículos
        $this->load->model('Carrito');
        $this->load->model('Tienda_model');
    }
    function index()
    {
        //cargo el helper de url, con funciones para trabajo con URL del sitio
        $this->load->helper('url');    
    }
    
    public function compra($id)
    {//tenemos que regular el paso de los parametros a la funion add del carrito y ver lo de la sesiones
        echo 'se ha comprado el producto con id '.$id;
        $dato = $this->Tienda_model->datos_libro($id);
        $datos['precio']=3;
        $datos['cantidad']=1;
        $datos['id']=$id;
        $this->Carrito->add($datos);
        $res = $this->Carrito->get_content();
        
        $carro = $this->load->view('Carro', Array('datos' => $dato,'resultado' =>$res),true);  
        $this->load->view('Plantilla_carro',Array('carro' => $carro));


        
    }
    
}