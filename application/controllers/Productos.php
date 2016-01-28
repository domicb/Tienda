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
        
        $cuerpo = $this->load->view('Cuerpo', Array('libros' => $libros), true);
            //cargo la vista pasando los datos de configuacion
        $this->load->view('Plantilla', Array('cuerpo' => $cuerpo));
        
        
        
        $data['title'] = 'Paginacion_ci';
		$pages=10; //Número de registros mostrados por páginas
		$this->load->library('pagination'); //Cargamos la librería de paginación
		$config['base_url'] = site_url('Productos'); // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
		$config['total_rows'] = $this->Tienda_model->dame_libros();//calcula el número de filas  
		$config['per_page'] = $pages; //Número de registros mostrados por páginas
        $config['num_links'] = 20; //Número de links mostrados en la paginación
 		$config['first_link'] = 'Primera';//primer link
		$config['last_link'] = 'Última';//último link
        $config["uri_segment"] = 3;//el segmento de la paginación
		$config['next_link'] = 'Siguiente';//siguiente link
		$config['prev_link'] = 'Anterior';//anterior link
		$this->pagination->initialize($config); //inicializamos la paginación		
		$data["provincias"] = $this->Tienda_model->dame_libros($config['per_page'],$this->uri->segment(3));			
                
                //cargamos la vista y el array data
		$this->load->view('Cuerpo', $data);
    }


}
