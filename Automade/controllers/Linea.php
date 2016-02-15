<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Linea extends CI_Controller {
            public function __construct(){
                    parent::__construct();
                    $this->load->model('Linea_Model'); 
                        
                    $paramSearch=initSessionSearch($this->uri->segment(1));
                    $this->Linea_Model->setParamSearch($paramSearch);
                    $this->load->model('Pedido_Model'); $this->load->model('Producto_Model');             
            }
            

           public function index(){
           
                    $data['title'] = 'Paginacion_ci';
                    $pages=10; //Número de registros mostrados por páginas
                    $this->load->library('pagination'); //Cargamos la librería de paginación
                    $config['base_url'] = base_url().'Linea/index/page/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
                    $config['total_rows'] = $this->Linea_Model->filas();//calcula el número de filas  
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
           
           
           
                    $data['dataLists'] = $this->Linea_Model->total_paginados($config['per_page'],$get['page']);
                    $dataTitle['_titlePage']="Records Linea";
                    $menu_active['active'] = $this->uri->segment(1);
                    $menu_active['h1']=$this->uri->segment(1);;
                    $menu_active['h2']="&nbsp;>>&nbsp;List";
                    $this->load->view('header', $dataTitle);
                    $this->load->view('menu', $menu_active);
                    $this->load->view('Linea_index', $data);
                    $this->output->enable_profiler(TRUE);
                    $this->load->view('footer');
            }
            
            public function Linea_new(){            		
                    $field['idlinea']= array(
              				'name'        => 'idlinea',
              				'id'          => 'idlinea',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'idlinea'
            			); 
                                $field['options_2']['pedido_idpedido']=$this->Pedido_Model->getSelectData() ;  
 $field['iva']= array(
              				'name'        => 'iva',
              				'id'          => 'iva',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'iva'
            			); 
                                $field['precio']= array(
              				'name'        => 'precio',
              				'id'          => 'precio',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'precio'
            			); 
                                $field['cantidad']= array(
              				'name'        => 'cantidad',
              				'id'          => 'cantidad',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'cantidad'
            			); 
                                $field['options_6']['producto_idproducto']=$this->Producto_Model->getSelectData() ;  
 
                    $field['field']=$field;
                    $dataTitle['_titlePage']="Records Linea";
                    $menu_active['active'] = $this->uri->segment(1);
                    $menu_active['h1']=$this->uri->segment(1);;
                    $menu_active['h2']="&nbsp;>>&nbsp;New";
                    $this->load->view('header', $dataTitle);
                    $this->load->view('menu', $menu_active);
                    $this->load->view('Linea_new',$field);
                    $this->load->view('footer');
            }
            
            public function Linea_update($id){
                    //old way to get id
                    //$field['uri_segment_index']=$this->uri->segment(3);
                    
                    $get = $this->uri->uri_to_assoc();
           			$field['uri_segment_index']=$get['id'];
                    $data = $this->Linea_Model->getByID($get['id']);
                    $field['idlinea']= array(
              				'name'        => 'idlinea',
              				'id'          => 'idlinea',
              				'value'       => $data->idlinea,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'idlinea' 
            			);  

                                $field['options_2']['pedido_idpedido']=$this->Pedido_Model->getSelectData() ;  
 $field['iva']= array(
              				'name'        => 'iva',
              				'id'          => 'iva',
              				'value'       => $data->iva,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'iva' 
            			);  

                                $field['precio']= array(
              				'name'        => 'precio',
              				'id'          => 'precio',
              				'value'       => $data->precio,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'precio' 
            			);  

                                $field['cantidad']= array(
              				'name'        => 'cantidad',
              				'id'          => 'cantidad',
              				'value'       => $data->cantidad,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'cantidad' 
            			);  

                                $field['options_6']['producto_idproducto']=$this->Producto_Model->getSelectData() ;  
 
                    
           			
                    $field['field']=$field;
                    $field['data']=$data;
                    $dataTitle['_titlePage']="Records Linea";
                    $menu_active['active'] = $this->uri->segment(1);
                    $menu_active['h1']=$this->uri->segment(1);;
                    $menu_active['h2']="&nbsp;>>&nbsp;Update";
                    $this->load->view('header', $dataTitle);
                    $this->load->view('menu', $menu_active);
                    $this->load->view('Linea_update',$field);
                    $this->load->view('footer');
            }

            public function Lineaprocess_new(){                    
                   $postData = array();
                        $this->form_validation->set_rules('producto_idproducto' , 'producto_idproducto' , 'trim|required');
$postData['producto_idproducto'] =  $this->input->post('producto_idproducto');
 $this->form_validation->set_rules('cantidad' , 'cantidad' , 'trim|required');
$postData['cantidad'] =  $this->input->post('cantidad');
 $this->form_validation->set_rules('precio' , 'precio' , 'trim|required');
$postData['precio'] =  $this->input->post('precio');
 $this->form_validation->set_rules('iva' , 'iva' , 'trim|required');
$postData['iva'] =  $this->input->post('iva');
 $this->form_validation->set_rules('pedido_idpedido' , 'pedido_idpedido' , 'trim|required');
$postData['pedido_idpedido'] =  $this->input->post('pedido_idpedido');
 $this->form_validation->set_rules('idlinea' , 'idlinea' , 'trim|required');
$postData['idlinea'] =  $this->input->post('idlinea');
  
                                    
                $rowsaffected=$this->Linea_Model->processNew($postData);
                if($rowsaffected>0){
                	redirect(base_url()."Linea/Linea_update/id/".$rowsaffected);
                }else{
                	redirect(base_url()."Linea/Linea_new");
                }
                
                
            }
            
            public function Lineaprocess_update($id){                    
                   $postData = array();  
                   $this->form_validation->set_rules('producto_idproducto' , 'producto_idproducto' , 'trim|required');
$postData['producto_idproducto'] =  $this->input->post('producto_idproducto');
 $this->form_validation->set_rules('cantidad' , 'cantidad' , 'trim|required');
$postData['cantidad'] =  $this->input->post('cantidad');
 $this->form_validation->set_rules('precio' , 'precio' , 'trim|required');
$postData['precio'] =  $this->input->post('precio');
 $this->form_validation->set_rules('iva' , 'iva' , 'trim|required');
$postData['iva'] =  $this->input->post('iva');
 $this->form_validation->set_rules('pedido_idpedido' , 'pedido_idpedido' , 'trim|required');
$postData['pedido_idpedido'] =  $this->input->post('pedido_idpedido');
 $this->form_validation->set_rules('idlinea' , 'idlinea' , 'trim|required');
$postData['idlinea'] =  $this->input->post('idlinea');
  
                //old way to get id
                //$field['uri_segment_index']=$this->uri->segment(3);
                $get = $this->uri->uri_to_assoc();
           		$field['uri_segment_index']=$get['id'];                
                $rowsaffected=$this->Linea_Model->processUpdate($postData,$get['id']);
                redirect(base_url()."Linea/Linea_update/id/".$get['id']);
            }

            
     }
    