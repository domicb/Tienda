<?php
class Compras extends CI_Controller {
         
    function __construct() {
        parent::__construct();
         //cargo el modelo de artículos
        $this->load->model('Carrito');
        $this->load->model('Tienda_model');
        $this->load->model('Usuarios_model');
        //cargo el helper de url, con funciones para trabajo con URL del sitio
        $this->load->helper('url');  
    }
    
    function index()
    {
        if($this->session->userdata('username'))
        {
            $email = $this->session->userdata('username');  
            print_r($email);
            $datos = $this->Usuarios_model->getUsuario($email);
            $total = $this->Carrito->precio_total();  
            //una vez tenemos los datos creamos el pedido para poder enlazarlo con la linea de pedido
            $this->Tienda_model->newPedido($datos,$total);
            $datosCarrito = $this->Carrito->get_content();
        }
        else
        {
            $carro = $this->load->view('Vista_login', '', true);
            $this->load->view('Plantilla_carro', Array('carro' => $carro));
        }
    }
    function micarro()
    {
         $res = $this->Carrito->get_content();       
        //echo "<pre>"; print_r($res); echo "</pre>";
        $carro = $this->load->view('Carro', Array('articulos' =>$res),true);  
        $this->load->view('Plantilla_carro',Array('carro' => $carro));
    }


    function compra($id)
    {   
        $articulo = $this->Tienda_model->datos_libro($id);
        if($articulo['cantidad']>0) //si hay existencias operamos
        {
            //restamos en 1 el stock del articulo
           
            //$this->Tienda_model->setLibro($articulo['id'],$datos);
            echo "<pre>"; print_r($articulo); echo "</pre>";
            $articulo['id']=$id;
            $articulo['cantidad']=1;

            $this->Carrito->add($articulo);    
            $res = $this->Carrito->get_content();

            //echo "<pre>"; print_r($res); echo "</pre>";
            $carro = $this->load->view('Carro', Array('articulos' =>$res),true);  
            $this->load->view('Plantilla_carro',Array('carro' => $carro));     
        }
        else {
             $carro = '<div class="alert alert-info">Lo sentimos no quedan existencias de ese articulo :(!</div>'; 
             $this->load->view('Plantilla_carro',Array('carro' => $carro));  
        }
    }
    
    function vaciar()
    {
        $this->Carrito->destroy();
        $carro = $this->load->view('Carro','',true);  
        $this->load->view('Plantilla_carro',Array('carro' => $carro));
    }
    
    function eliminar($pro)
    {
        $this->Carrito->remove_producto($pro);
        $res = $this->Carrito->get_content(); 
        $carro = $this->load->view('Carro', Array('articulos' =>$res),true);  
        $this->load->view('Plantilla_carro',Array('carro' => $carro));
    }
    
}