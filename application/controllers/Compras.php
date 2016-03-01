<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Compras extends CI_Controller {
         
    function __construct() {
        parent::__construct();
         //cargo el modelo de artículos
        $this->load->model('Carrito');
        $this->load->model('Tienda_model');
        $this->load->model('Usuarios_model');
        $this->load->model('Envio_email_model');
        //cargo el helper de url, con funciones para trabajo con URL del sitio
        $this->load->helper('url');  
        $this->load->library('fpdf');
    }
    
    function index()
    {
        if($this->session->userdata('username'))
        {
            $email = $this->session->userdata('username');  
            $datos = $this->Usuarios_model->getUsu($email);
            $total = $this->Carrito->precio_total();  
            //print_r($datos);
            //una vez tenemos los datos creamos el pedido para poder enlazarlo con la linea de pedido
            $idPedido = $this->Tienda_model->newPedido($datos,$total);
            
            //una vez creamos el pedido relacionamos las lineas con el pedido 
            //primero recojemos los datos del carrito
            $datosCarrito = $this->Carrito->get_content();
            //metemos tantas lineas como elementos existan en el carrito
            foreach ($datosCarrito as $dato)
            {
                $this->newLinea($idPedido,$dato['precio'],$dato['cantidad'],$dato['idproducto']);
            }
            
            $carro = $this->load->view('Pedido', Array('articulos' => $datosCarrito,'usuarios'=>$datos,'total'=>$total,'id'=>$idPedido),true);  
            $this->load->view('Plantilla_carro',Array('carro' => $carro));
        }
        else
        {
            $carro = $this->load->view('Vista_login', '', true);
            $this->load->view('Plantilla_carro', Array('carro' => $carro));
        }
    }
    
    function newLinea($idpedido,$precio,$cantidad,$idproducto)
    {
        $this->Tienda_model->setLinea($idpedido,$precio,$cantidad,$idproducto);
    }
    function micarro()
    {
         $res = $this->Carrito->get_content();       
        //echo "<pre>"; print_r($res); echo "</pre>";
        $carro = $this->load->view('Carro', Array('articulos' =>$res),true);  
        $this->load->view('Plantilla_carro',Array('carro' => $carro));
    }
    
    function borraPedido($id)
    {
        $this->Tienda_model->bajaPedido($id);
        $this->pedidos();
    }


    function compra($id)
    {   
        $articulo = $this->Tienda_model->datos_libro($id);
        if($articulo['cantidad']>0) //si hay existencias operamos
        {
            //restamos en 1 el stock del articulo
           
            //$this->Tienda_model->setLibro($articulo['id'],$datos);
           // echo "<pre>"; print_r($articulo); echo "</pre>";
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
    function borraCarrito()
    {
        $this->Carrito->destroy();
    }
    
    function pedidos()
    {
        $email = $this->session->userdata('username'); 
        $datos = $this->Usuarios_model->getUsu($email);
        //una vez tengo los datos del usuario logeado selecciono su id
        $idUsu=$datos[0]['idusuario'];
        //una vez tengo el id recojo los pedidos del usuario
        $pedidos = $this->Tienda_model->getPedido($idUsu);
        $carro = $this->load->view('Pedidos', Array('articulos' =>$pedidos),true);  
        $this->load->view('Plantilla_carro',Array('carro' => $carro));
    }
    
    function eliminar($pro)
    {
        $this->Carrito->remove_producto($pro);
        $res = $this->Carrito->get_content(); 
        $carro = $this->load->view('Carro', Array('articulos' =>$res),true);  
        $this->load->view('Plantilla_carro',Array('carro' => $carro));
    }
    
    function verPdf($idPedido)
    {
        $datosPedido = $this->Tienda_model->datosPedido($idPedido);
        $email = $this->session->userdata('username');  
        $datos = $this->Usuarios_model->getUsuario($email);
        $lineas = $this->Tienda_model->getLinea($idPedido);
        //nos falta el nombre del libro para ello deberemos consultar su nombre por cada uno
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',20);
        //cabecera
        $pdf->Image(base_url().'Assets/img/logo.png',10,8,100);
        $pdf->Cell(60);
        $pdf->Cell(80,100,'PEDIDO');      
        $pdf->Ln(15);
        $pdf->Cell(100,100,'Datos cliente');
        $pdf->Cell(40,100,'Datos librosweb');
        $pdf->Ln(8);
        $pdf->SetFont('Arial','B',12);      
        $pdf->Cell(100,100,'Cliente: '.$datos['username'].' '.$datos['apellidos']);
        $pdf->Cell(40,100,'Librosweb');
        $pdf->Ln(5);
        $pdf->Cell(100,100,utf8_decode('Dirección: '.$datos['direccion']));
        $pdf->Cell(40,100,'Avda Europa, Parcela 2-5 y 2-6');
        $pdf->Ln(5);
        $pdf->Cell(100,100,utf8_decode('Población: '.$datos['provincia'].' '.$datos['cp']));
        $pdf->Cell(40,100,'Murcia');
        $pdf->Ln(5);
        $pdf->Cell(100,100,utf8_decode('NIF/CIF: '.$datos['dni']));
        $pdf->Cell(40,100,'CIF: B-73347494'); 
        $pdf->Ln(65);
        //Datos
        $header = array('LIBRO', 'PRECIO', 'IVA', 'CANTIDAD', 'TOTAL');
         $w = array(83, 25, 22, 35, 25);
        for ($i = 0; $i < count($header); $i++)
            $pdf->Cell($w[$i], 7, utf8_decode($header[$i]), 1, 0, true);
        $pdf->Ln();

        $pdf->SetFont('Arial','B',10); 
        // Datos
        foreach ($lineas as $linea) {      
            $titulo = $this->Tienda_model->datos_libro($linea['producto_idproducto']);
            $cantidad = $linea['cantidad'] * $linea['precio'];
            $pdf->Cell(83,40, utf8_decode($titulo['nombre']),1);
            $pdf->Cell(25,40, utf8_decode($linea['precio']) ." " .iconv('UTF-8', 'windows-1252', '€'),1);
            $pdf->Cell(22,40, utf8_decode('21%'),1);
            $pdf->Cell(35,40, utf8_decode($linea['cantidad']),1);
            $pdf->Cell(25,40, utf8_decode($cantidad)." " .iconv('UTF-8', 'windows-1252', '€'),1);
            $pdf->Ln();
            if ($pdf->GetY() > 264) {
                $pdf->AddPage();
            }
        }  
         $pdf->SetFont('Arial','B',12); 
        $pdf->Cell(40,40,'El importe total del pedido es de: '.$datosPedido['importe']." " .iconv('UTF-8', 'windows-1252', '€'));    
        //pie
         $pdf->SetY(-15);
         $pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');
        $pdf->Output();
    }
    function pdf($idPedido)
    {
        $metodo = 'F';
                $datosPedido = $this->Tienda_model->datosPedido($idPedido);
        $email = $this->session->userdata('username');  
        $datos = $this->Usuarios_model->getUsuario($email);
        $lineas = $this->Tienda_model->getLinea($idPedido);
        //nos falta el nombre del libro para ello deberemos consultar su nombre por cada uno
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',20);
        //cabecera
        $pdf->Image(base_url().'Assets/img/logo.png',10,8,100);
        $pdf->Cell(60);
        $pdf->Cell(80,100,'PEDIDO');      
        $pdf->Ln(15);
        $pdf->Cell(100,100,'Datos cliente');
        $pdf->Cell(40,100,'Datos librosweb');
        $pdf->Ln(8);
        $pdf->SetFont('Arial','B',12);      
        $pdf->Cell(100,100,'Cliente: '.$datos['username'].' '.$datos['apellidos']);
        $pdf->Cell(40,100,'Librosweb');
        $pdf->Ln(5);
        $pdf->Cell(100,100,utf8_decode('Dirección: '.$datos['direccion']));
        $pdf->Cell(40,100,'Avda Europa, Parcela 2-5 y 2-6');
        $pdf->Ln(5);
        $pdf->Cell(100,100,utf8_decode('Población: '.$datos['provincia'].' '.$datos['cp']));
        $pdf->Cell(40,100,'Murcia');
        $pdf->Ln(5);
        $pdf->Cell(100,100,utf8_decode('NIF/CIF: '.$datos['dni']));
        $pdf->Cell(40,100,'CIF: B-73347494'); 
        $pdf->Ln(65);
        //Datos
        $header = array('LIBRO', 'PRECIO', 'IVA', 'CANTIDAD', 'TOTAL');
         $w = array(83, 25, 22, 35, 25);
        for ($i = 0; $i < count($header); $i++)
            $pdf->Cell($w[$i], 7, utf8_decode($header[$i]), 1, 0, true);
        $pdf->Ln();

        $pdf->SetFont('Arial','B',10); 
        // Datos
        foreach ($lineas as $linea) {      
            $titulo = $this->Tienda_model->datos_libro($linea['producto_idproducto']);
            $cantidad = $linea['cantidad'] * $linea['precio'];
            $pdf->Cell(83,40, utf8_decode($titulo['nombre']),1);
            $pdf->Cell(25,40, utf8_decode($linea['precio']) ." " .iconv('UTF-8', 'windows-1252', '€'),1);
            $pdf->Cell(22,40, utf8_decode('21%'),1);
            $pdf->Cell(35,40, utf8_decode($linea['cantidad']),1);
            $pdf->Cell(25,40, utf8_decode($cantidad)." " .iconv('UTF-8', 'windows-1252', '€'),1);
            $pdf->Ln();
            if ($pdf->GetY() > 264) {
                $pdf->AddPage();
            }
        }  
         $pdf->SetFont('Arial','B',12); 
        $pdf->Cell(40,40,'El importe total del pedido es de: '.$datosPedido['importe']." " .iconv('UTF-8', 'windows-1252', '€'));    
        //pie
         $pdf->SetY(-15);
         $pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');
        $pdf->Output($metodo,'Assets/img/'.$idPedido.'pedido.pdf', true);
    }
    
    function finalCompra($idPedido)
    {
        $datosPedido = $this->Tienda_model->datosPedido($idPedido);
        $this->pdf($idPedido);
        $correo = $this->session->userdata('username'); 
        $datosUsu = $this->Usuarios_model->getUsuario($correo);
        $this->Envio_email_model->sendMailPedido($correo,$datosUsu,$datosPedido);
        //como hemos creado el pedido borramos el carrito
        $this->borraCarrito();
        //mostramos de nuevo la lista de pedidos
        $this->pedidos();
    }
    
}