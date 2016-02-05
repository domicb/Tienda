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
        
        $articulo = $this->Tienda_model->datos_libro($id);
        echo "<pre>"; print_r($articulo); echo "</pre>";
        $articulo['id']=$id;
      //el problema lo tenemos que al incluir el articulo nos reconoce los datos
                //creamos el carrito
        $carrito = new Carrito();
        //$carrito->destroy();
        $carrito->add($articulo);
        $res = $carrito->get_content();
        
        echo "<pre>"; print_r($res); echo "</pre>";
        $carro = $this->load->view('Carro', Array('articulos' =>$res),true);  
        $this->load->view('Plantilla_carro',Array('carro' => $carro));
        
    }
    
}