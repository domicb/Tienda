<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Provincia extends CI_Controller {
            public function __construct(){
                    parent::__construct();
                    $this->load->model('Provincia_Model'); 
                        
                    $paramSearch=initSessionSearch($this->uri->segment(1));
                    $this->Provincia_Model->setParamSearch($paramSearch);
                                
            }
            

           public function index(){
           
                    $data['title'] = 'Paginacion_ci';
                    $pages=10; //Número de registros mostrados por páginas
                    $this->load->library('pagination'); //Cargamos la librería de paginación
                    $config['base_url'] = base_url().'Provincia/index/page/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
                    $config['total_rows'] = $this->Provincia_Model->filas();//calcula el número de filas  
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
           
           
           
                    $data['dataLists'] = $this->Provincia_Model->total_paginados($config['per_page'],$get['page']);
                    $dataTitle['_titlePage']="Records Provincia";
                    $menu_active['active'] = $this->uri->segment(1);
                    $menu_active['h1']=$this->uri->segment(1);;
                    $menu_active['h2']="&nbsp;>>&nbsp;List";
                    $this->load->view('header', $dataTitle);
                    $this->load->view('menu', $menu_active);
                    $this->load->view('Provincia_index', $data);
                    $this->output->enable_profiler(TRUE);
                    $this->load->view('footer');
            }
            
            public function Provincia_new(){            		
                    $field['idprovincia']= array(
              				'name'        => 'idprovincia',
              				'id'          => 'idprovincia',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'idprovincia'
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
                                
                    $field['field']=$field;
                    $dataTitle['_titlePage']="Records Provincia";
                    $menu_active['active'] = $this->uri->segment(1);
                    $menu_active['h1']=$this->uri->segment(1);;
                    $menu_active['h2']="&nbsp;>>&nbsp;New";
                    $this->load->view('header', $dataTitle);
                    $this->load->view('menu', $menu_active);
                    $this->load->view('Provincia_new',$field);
                    $this->load->view('footer');
            }
            
            public function Provincia_update($id){
                    //old way to get id
                    //$field['uri_segment_index']=$this->uri->segment(3);
                    
                    $get = $this->uri->uri_to_assoc();
           			$field['uri_segment_index']=$get['id'];
                    $data = $this->Provincia_Model->getByID($get['id']);
                    $field['idprovincia']= array(
              				'name'        => 'idprovincia',
              				'id'          => 'idprovincia',
              				'value'       => $data->idprovincia,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'idprovincia' 
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

                                
                    
           			
                    $field['field']=$field;
                    $field['data']=$data;
                    $dataTitle['_titlePage']="Records Provincia";
                    $menu_active['active'] = $this->uri->segment(1);
                    $menu_active['h1']=$this->uri->segment(1);;
                    $menu_active['h2']="&nbsp;>>&nbsp;Update";
                    $this->load->view('header', $dataTitle);
                    $this->load->view('menu', $menu_active);
                    $this->load->view('Provincia_update',$field);
                    $this->load->view('footer');
            }

            public function Provinciaprocess_new(){                    
                   $postData = array();
                        $this->form_validation->set_rules('nombre' , 'nombre' , 'trim|required');
$postData['nombre'] =  $this->input->post('nombre');
 $this->form_validation->set_rules('idprovincia' , 'idprovincia' , 'trim|required');
$postData['idprovincia'] =  $this->input->post('idprovincia');
  
                                    
                $rowsaffected=$this->Provincia_Model->processNew($postData);
                if($rowsaffected>0){
                	redirect(base_url()."Provincia/Provincia_update/id/".$rowsaffected);
                }else{
                	redirect(base_url()."Provincia/Provincia_new");
                }
                
                
            }
            
            public function Provinciaprocess_update($id){                    
                   $postData = array();  
                   $this->form_validation->set_rules('nombre' , 'nombre' , 'trim|required');
$postData['nombre'] =  $this->input->post('nombre');
 $this->form_validation->set_rules('idprovincia' , 'idprovincia' , 'trim|required');
$postData['idprovincia'] =  $this->input->post('idprovincia');
  
                //old way to get id
                //$field['uri_segment_index']=$this->uri->segment(3);
                $get = $this->uri->uri_to_assoc();
           		$field['uri_segment_index']=$get['id'];                
                $rowsaffected=$this->Provincia_Model->processUpdate($postData,$get['id']);
                redirect(base_url()."Provincia/Provincia_update/id/".$get['id']);
            }

            
     }
    