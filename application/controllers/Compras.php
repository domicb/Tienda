<?php
session_start();
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
    function micarro()
    {
         $res = $carrito->get_content();
        
        //echo "<pre>"; print_r($res); echo "</pre>";
        $carro = $this->load->view('Carro', Array('articulos' =>$res),true);  
        $this->load->view('Plantilla_carro',Array('carro' => $carro));
    }


    function compra($id)
    {
        echo 'se ha comprado el producto con id '.$id;        
        $articulo = $this->Tienda_model->datos_libro($id);
        echo "<pre>"; print_r($articulo); echo "</pre>";
        $articulo['id']=$id;
      
        //creamos el carrito
        $carrito = new Carrito();
        $carrito->add($articulo);    
        $res = $carrito->get_content();
        
        //echo "<pre>"; print_r($res); echo "</pre>";
        $carro = $this->load->view('Carro', Array('articulos' =>$res),true);  
        $this->load->view('Plantilla_carro',Array('carro' => $carro));
    }
    
    function vaciar()
    {
        $this->Tienda->Carrito->destroy();
    }
    
    function eliminar($pro)
    {
        $this->Tienda->Carrito->remove_producto($pro);
    }
    
}