<?php
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
            
            $carro = $this->load->view('Pedido', Array('articulos' => $datosCarrito,'usuarios'=>$datos,'total'=>$total),true);  
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
    
    function pdf()
    {
        $pdf = new FPDF();
         $pdf->AddPage();
          $pdf->SetFont('Arial','B',16);
        //cabecera
            $pdf->Image(base_url().'Assets/img/logo.png',10,8,100);
            /*$this->Cell(30);
            $this->Cell(120,10,'ESCUELA X',0,0,'C');
            $this->Ln('5');
            $this->SetFont('Arial','B',8);
            $this->Cell(30);
            $this->Cell(120,10,'INFORMACION DE CONTACTO',0,0,'C');
            $this->Ln(20);*/
        //cuerpo
       
       
        $pdf->Cell(40,80,'¡Hola, Mundo!');
        //pie
         $pdf->SetY(-15);
         $pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');
        $pdf->Output();
    }
    
    function finalCompra()
    {
        //mandamos el correo con los datos del pedido
        $res = $this->Carrito->get_content();//para ello recogemos los datos del carrito actual
        $correo = $this->session->userdata('username'); 
        //$this->Envio_email_model->sendMailPedido($correo,$res);
        
        //como hemos creado el pedido borramos el carrito
        $this->borraCarrito();
        //mostramos de nuevo la lista de pedidos
        $this->pedidos();       
    }
    
}