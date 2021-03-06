<?php

class Productos extends CI_Controller {
    
    function __construct() {
        parent::__construct();
         //cargo el modelo de artículos
        $this->load->model('Tienda_model');
    }

    function index($desde = 0) {          
         //$this -> output->cache(10);       
        $pages=4; //Número de registros mostrados por páginas
	$this->load->library('pagination'); //Cargamos la librería de paginación
        // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
        $config['base_url'] = site_url('/Productos/index');
        $config['total_rows'] = $this->Tienda_model->filas();//calcula el número de filas 
        $config['per_page'] = $pages; //Número de registros mostrados por páginas
        $config['num_links'] = 20; //Número de links mostrados en la paginación
        $config['first_link'] = 'Primera';//primer link
        $config['last_link'] = 'Última';//último link
        $config["uri_segment"] = 3;//el segmento de la paginación
        $config['next_link'] = 'Siguiente';//siguiente link
        $config['prev_link'] = 'Anterior';//anterior link
        $this->pagination->initialize($config); //inicializamos la paginación		
        
        //cargo el helper de url, con funciones para trabajo con URL del sitio
        $this->load->helper('url');        
        //pido los ultimos artículos al modelo
        $libros = $this->get_libros($config,$desde);       
        $categorias = $this->dame_categorias();  
        
        //creo el array con datos de configuración para la vista      
        $cuerpo = $this->load->view('Cuerpo', Array('libros' => $libros, 'categorias' => $categorias), true);
        //cargo la vista pasando los datos de configuacion
        $this->load->view('Plantilla', Array('cuerpo' => $cuerpo));  
        
    }
    
    public function get_libros($config,$desde)
    {
        $libros = $this->Tienda_model->dame_libros($config['per_page'], $desde);
        return $libros;
    }
    public function dame_categorias()
    {
        $categorias = $this->Tienda_model->get_categorias();
        return $categorias;
    }


}
