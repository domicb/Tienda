<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Categoria extends CI_Controller {
            public function __construct(){
                    parent::__construct();
                    $this->load->model('Categoria_Model'); 
                        
                    $paramSearch=initSessionSearch($this->uri->segment(1));
                    $this->Categoria_Model->setParamSearch($paramSearch);
                                
            }
            

           public function index(){
           
                    $data['title'] = 'Paginacion_ci';
                    $pages=10; //Número de registros mostrados por páginas
                    $this->load->library('pagination'); //Cargamos la librería de paginación
                    $config['base_url'] = base_url().'Categoria/index/page/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
                    $config['total_rows'] = $this->Categoria_Model->filas();//calcula el número de filas  
                    $config['per_page'] = $pages; //Número de registros mostrados por páginas
                    $config['num_links'] = 20; //Número de links mostrados en la paginación
                    $config['first_link'] = 'First';//primer link
                    $config['last_link'] = 'Last';//último link
                    
                    $get = $this->uri->uri_to_assoc();
                     $get['page']=(isset($get['page']))?$get['page']:0;
                    $config['uri_segment'] = 4;//el segmento de la paginación
                    $config['next_link'] = 'Next';//siguiente link
                    $config['prev_link'] = 'Prev';//anterior link
                    $config['full_tag_open'] = '<div id="pagination">';//el div que debemos maquetar
                    $config['full_tag_close'] = '</div>';//el cierre del div de la paginación
                    $this->pagination->initialize($config); //inicializamos la paginación          
           
           
           
                    $data['dataLists'] = $this->Categoria_Model->total_paginados($config['per_page'],$get['page']);
                    $dataTitle['_titlePage']="Records Categoria";
                    $menu_active['active'] = $this->uri->segment(1);
                    $menu_active['h1']=$this->uri->segment(1);;
                    $menu_active['h2']="&nbsp;>>&nbsp;List";
                    $this->load->view('header', $dataTitle);
                    $this->load->view('menu', $menu_active);
                    $this->load->view('Categoria_index', $data);
                    $this->output->enable_profiler(TRUE);
                    $this->load->view('footer');
            }
            
            public function Categoria_new(){            		
                    $field['idcategoria']= array(
              				'name'        => 'idcategoria',
              				'id'          => 'idcategoria',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'idcategoria'
            			); 
                                $field['cod_categoria']= array(
              				'name'        => 'cod_categoria',
              				'id'          => 'cod_categoria',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'cod_categoria'
            			); 
                                $field['nombre']= array(
              				'name'        => 'nombre',
              				'id'          => 'nombre',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'nombre'
            			); 
                                $field['descripcion']= array(
              				'name'        => 'descripcion',
              				'id'          => 'descripcion',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'descripcion'
            			); 
                                $field['anuncio']= array(
              				'name'        => 'anuncio',
              				'id'          => 'anuncio',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'anuncio'
            			); 
                                
                    $field['field']=$field;
                    $dataTitle['_titlePage']="Records Categoria";
                    $menu_active['active'] = $this->uri->segment(1);
                    $menu_active['h1']=$this->uri->segment(1);;
                    $menu_active['h2']="&nbsp;>>&nbsp;New";
                    $this->load->view('header', $dataTitle);
                    $this->load->view('menu', $menu_active);
                    $this->load->view('Categoria_new',$field);
                    $this->load->view('footer');
            }
            
            public function Categoria_update($id){
                    //old way to get id
                    //$field['uri_segment_index']=$this->uri->segment(3);
                    
                    $get = $this->uri->uri_to_assoc();
           			$field['uri_segment_index']=$get['id'];
                    $data = $this->Categoria_Model->getByID($get['id']);
                    $field['idcategoria']= array(
              				'name'        => 'idcategoria',
              				'id'          => 'idcategoria',
              				'value'       => $data->idcategoria,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'idcategoria' 
            			);  

                                $field['cod_categoria']= array(
              				'name'        => 'cod_categoria',
              				'id'          => 'cod_categoria',
              				'value'       => $data->cod_categoria,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'cod_categoria' 
            			);  

                                $field['nombre']= array(
              				'name'        => 'nombre',
              				'id'          => 'nombre',
              				'value'       => $data->nombre,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'nombre' 
            			);  

                                $field['descripcion']= array(
              				'name'        => 'descripcion',
              				'id'          => 'descripcion',
              				'value'       => $data->descripcion,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'descripcion' 
            			);  

                                $field['anuncio']= array(
              				'name'        => 'anuncio',
              				'id'          => 'anuncio',
              				'value'       => $data->anuncio,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'anuncio' 
            			);  

                                
                    
           			
                    $field['field']=$field;
                    $field['data']=$data;
                    $dataTitle['_titlePage']="Records Categoria";
                    $menu_active['active'] = $this->uri->segment(1);
                    $menu_active['h1']=$this->uri->segment(1);;
                    $menu_active['h2']="&nbsp;>>&nbsp;Update";
                    $this->load->view('header', $dataTitle);
                    $this->load->view('menu', $menu_active);
                    $this->load->view('Categoria_update',$field);
                    $this->load->view('footer');
            }

            public function Categoriaprocess_new(){                    
                   $postData = array();
                        $this->form_validation->set_rules('anuncio' , 'anuncio' , 'trim|required');
$postData['anuncio'] =  $this->input->post('anuncio');
 $this->form_validation->set_rules('descripcion' , 'descripcion' , 'trim|required');
$postData['descripcion'] =  $this->input->post('descripcion');
 $this->form_validation->set_rules('nombre' , 'nombre' , 'trim|required');
$postData['nombre'] =  $this->input->post('nombre');
 $this->form_validation->set_rules('cod_categoria' , 'cod_categoria' , 'trim|required');
$postData['cod_categoria'] =  $this->input->post('cod_categoria');
 $this->form_validation->set_rules('idcategoria' , 'idcategoria' , 'trim|required');
$postData['idcategoria'] =  $this->input->post('idcategoria');
  
                                    
                $rowsaffected=$this->Categoria_Model->processNew($postData);
                if($rowsaffected>0){
                	redirect(base_url()."Categoria/Categoria_update/id/".$rowsaffected);
                }else{
                	redirect(base_url()."Categoria/Categoria_new");
                }
                
                
            }
            
            public function Categoriaprocess_update($id){                    
                   $postData = array();  
                   $this->form_validation->set_rules('anuncio' , 'anuncio' , 'trim|required');
$postData['anuncio'] =  $this->input->post('anuncio');
 $this->form_validation->set_rules('descripcion' , 'descripcion' , 'trim|required');
$postData['descripcion'] =  $this->input->post('descripcion');
 $this->form_validation->set_rules('nombre' , 'nombre' , 'trim|required');
$postData['nombre'] =  $this->input->post('nombre');
 $this->form_validation->set_rules('cod_categoria' , 'cod_categoria' , 'trim|required');
$postData['cod_categoria'] =  $this->input->post('cod_categoria');
 $this->form_validation->set_rules('idcategoria' , 'idcategoria' , 'trim|required');
$postData['idcategoria'] =  $this->input->post('idcategoria');
  
                //old way to get id
                //$field['uri_segment_index']=$this->uri->segment(3);
                $get = $this->uri->uri_to_assoc();
           		$field['uri_segment_index']=$get['id'];                
                $rowsaffected=$this->Categoria_Model->processUpdate($postData,$get['id']);
                redirect(base_url()."Categoria/Categoria_update/id/".$get['id']);
            }

            
     }
    