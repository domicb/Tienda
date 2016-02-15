<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Pedido extends CI_Controller {
            public function __construct(){
                    parent::__construct();
                    $this->load->model('Pedido_Model'); 
                        
                    $paramSearch=initSessionSearch($this->uri->segment(1));
                    $this->Pedido_Model->setParamSearch($paramSearch);
                    $this->load->model('Usuario_Model');             
            }
            

           public function index(){
           
                    $data['title'] = 'Paginacion_ci';
                    $pages=10; //Número de registros mostrados por páginas
                    $this->load->library('pagination'); //Cargamos la librería de paginación
                    $config['base_url'] = base_url().'Pedido/index/page/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
                    $config['total_rows'] = $this->Pedido_Model->filas();//calcula el número de filas  
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
           
           
           
                    $data['dataLists'] = $this->Pedido_Model->total_paginados($config['per_page'],$get['page']);
                    $dataTitle['_titlePage']="Records Pedido";
                    $menu_active['active'] = $this->uri->segment(1);
                    $menu_active['h1']=$this->uri->segment(1);;
                    $menu_active['h2']="&nbsp;>>&nbsp;List";
                    $this->load->view('header', $dataTitle);
                    $this->load->view('menu', $menu_active);
                    $this->load->view('Pedido_index', $data);
                    $this->output->enable_profiler(TRUE);
                    $this->load->view('footer');
            }
            
            public function Pedido_new(){            		
                    $field['idpedido']= array(
              				'name'        => 'idpedido',
              				'id'          => 'idpedido',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'idpedido'
            			); 
                                $field['options_2']['usuario_idusuario']=$this->Usuario_Model->getSelectData() ;  
 $field['importe']= array(
              				'name'        => 'importe',
              				'id'          => 'importe',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'importe'
            			); 
                                $field['estado']= array(
              				'name'        => 'estado',
              				'id'          => 'estado',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'estado'
            			); 
                                $field['fecha']= array(
              				'name'        => 'fecha',
              				'id'          => 'fecha',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'fecha'
            			); 
                                $field['direccion']= array(
              				'name'        => 'direccion',
              				'id'          => 'direccion',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'direccion'
            			); 
                                $field['cp']= array(
              				'name'        => 'cp',
              				'id'          => 'cp',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'cp'
            			); 
                                $field['cod_provincia']= array(
              				'name'        => 'cod_provincia',
              				'id'          => 'cod_provincia',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'cod_provincia'
            			); 
                                $field['nombre_persona']= array(
              				'name'        => 'nombre_persona',
              				'id'          => 'nombre_persona',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'nombre_persona'
            			); 
                                $field['apellidos_persona']= array(
              				'name'        => 'apellidos_persona',
              				'id'          => 'apellidos_persona',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'apellidos_persona'
            			); 
                                $field['dni']= array(
              				'name'        => 'dni',
              				'id'          => 'dni',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'dni'
            			); 
                                $field['email']= array(
              				'name'        => 'email',
              				'id'          => 'email',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'email'
            			); 
                                
                    $field['field']=$field;
                    $dataTitle['_titlePage']="Records Pedido";
                    $menu_active['active'] = $this->uri->segment(1);
                    $menu_active['h1']=$this->uri->segment(1);;
                    $menu_active['h2']="&nbsp;>>&nbsp;New";
                    $this->load->view('header', $dataTitle);
                    $this->load->view('menu', $menu_active);
                    $this->load->view('Pedido_new',$field);
                    $this->load->view('footer');
            }
            
            public function Pedido_update($id){
                    //old way to get id
                    //$field['uri_segment_index']=$this->uri->segment(3);
                    
                    $get = $this->uri->uri_to_assoc();
           			$field['uri_segment_index']=$get['id'];
                    $data = $this->Pedido_Model->getByID($get['id']);
                    $field['idpedido']= array(
              				'name'        => 'idpedido',
              				'id'          => 'idpedido',
              				'value'       => $data->idpedido,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'idpedido' 
            			);  

                                $field['options_2']['usuario_idusuario']=$this->Usuario_Model->getSelectData() ;  
 $field['importe']= array(
              				'name'        => 'importe',
              				'id'          => 'importe',
              				'value'       => $data->importe,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'importe' 
            			);  

                                $field['estado']= array(
              				'name'        => 'estado',
              				'id'          => 'estado',
              				'value'       => $data->estado,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'estado' 
            			);  

                                $field['fecha']= array(
              				'name'        => 'fecha',
              				'id'          => 'fecha',
              				'value'       => $data->fecha,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'fecha' 
            			);  

                                $field['direccion']= array(
              				'name'        => 'direccion',
              				'id'          => 'direccion',
              				'value'       => $data->direccion,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'direccion' 
            			);  

                                $field['cp']= array(
              				'name'        => 'cp',
              				'id'          => 'cp',
              				'value'       => $data->cp,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'cp' 
            			);  

                                $field['cod_provincia']= array(
              				'name'        => 'cod_provincia',
              				'id'          => 'cod_provincia',
              				'value'       => $data->cod_provincia,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'cod_provincia' 
            			);  

                                $field['nombre_persona']= array(
              				'name'        => 'nombre_persona',
              				'id'          => 'nombre_persona',
              				'value'       => $data->nombre_persona,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'nombre_persona' 
            			);  

                                $field['apellidos_persona']= array(
              				'name'        => 'apellidos_persona',
              				'id'          => 'apellidos_persona',
              				'value'       => $data->apellidos_persona,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'apellidos_persona' 
            			);  

                                $field['dni']= array(
              				'name'        => 'dni',
              				'id'          => 'dni',
              				'value'       => $data->dni,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'dni' 
            			);  

                                $field['email']= array(
              				'name'        => 'email',
              				'id'          => 'email',
              				'value'       => $data->email,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'email' 
            			);  

                                
                    
           			
                    $field['field']=$field;
                    $field['data']=$data;
                    $dataTitle['_titlePage']="Records Pedido";
                    $menu_active['active'] = $this->uri->segment(1);
                    $menu_active['h1']=$this->uri->segment(1);;
                    $menu_active['h2']="&nbsp;>>&nbsp;Update";
                    $this->load->view('header', $dataTitle);
                    $this->load->view('menu', $menu_active);
                    $this->load->view('Pedido_update',$field);
                    $this->load->view('footer');
            }

            public function Pedidoprocess_new(){                    
                   $postData = array();
                        $this->form_validation->set_rules('email' , 'email' , 'trim|required');
$postData['email'] =  $this->input->post('email');
 $this->form_validation->set_rules('dni' , 'dni' , 'trim|required');
$postData['dni'] =  $this->input->post('dni');
 $this->form_validation->set_rules('apellidos_persona' , 'apellidos_persona' , 'trim|required');
$postData['apellidos_persona'] =  $this->input->post('apellidos_persona');
 $this->form_validation->set_rules('nombre_persona' , 'nombre_persona' , 'trim|required');
$postData['nombre_persona'] =  $this->input->post('nombre_persona');
 $this->form_validation->set_rules('cod_provincia' , 'cod_provincia' , 'trim|required');
$postData['cod_provincia'] =  $this->input->post('cod_provincia');
 $this->form_validation->set_rules('cp' , 'cp' , 'trim|required');
$postData['cp'] =  $this->input->post('cp');
 $this->form_validation->set_rules('direccion' , 'direccion' , 'trim|required');
$postData['direccion'] =  $this->input->post('direccion');
 $this->form_validation->set_rules('fecha' , 'fecha' , 'trim|required');
$postData['fecha'] =  $this->input->post('fecha');
 $this->form_validation->set_rules('estado' , 'estado' , 'trim|required');
$postData['estado'] =  $this->input->post('estado');
 $this->form_validation->set_rules('importe' , 'importe' , 'trim|required');
$postData['importe'] =  $this->input->post('importe');
 $this->form_validation->set_rules('usuario_idusuario' , 'usuario_idusuario' , 'trim|required');
$postData['usuario_idusuario'] =  $this->input->post('usuario_idusuario');
 $this->form_validation->set_rules('idpedido' , 'idpedido' , 'trim|required');
$postData['idpedido'] =  $this->input->post('idpedido');
  
                                    
                $rowsaffected=$this->Pedido_Model->processNew($postData);
                if($rowsaffected>0){
                	redirect(base_url()."Pedido/Pedido_update/id/".$rowsaffected);
                }else{
                	redirect(base_url()."Pedido/Pedido_new");
                }
                
                
            }
            
            public function Pedidoprocess_update($id){                    
                   $postData = array();  
                   $this->form_validation->set_rules('email' , 'email' , 'trim|required');
$postData['email'] =  $this->input->post('email');
 $this->form_validation->set_rules('dni' , 'dni' , 'trim|required');
$postData['dni'] =  $this->input->post('dni');
 $this->form_validation->set_rules('apellidos_persona' , 'apellidos_persona' , 'trim|required');
$postData['apellidos_persona'] =  $this->input->post('apellidos_persona');
 $this->form_validation->set_rules('nombre_persona' , 'nombre_persona' , 'trim|required');
$postData['nombre_persona'] =  $this->input->post('nombre_persona');
 $this->form_validation->set_rules('cod_provincia' , 'cod_provincia' , 'trim|required');
$postData['cod_provincia'] =  $this->input->post('cod_provincia');
 $this->form_validation->set_rules('cp' , 'cp' , 'trim|required');
$postData['cp'] =  $this->input->post('cp');
 $this->form_validation->set_rules('direccion' , 'direccion' , 'trim|required');
$postData['direccion'] =  $this->input->post('direccion');
 $this->form_validation->set_rules('fecha' , 'fecha' , 'trim|required');
$postData['fecha'] =  $this->input->post('fecha');
 $this->form_validation->set_rules('estado' , 'estado' , 'trim|required');
$postData['estado'] =  $this->input->post('estado');
 $this->form_validation->set_rules('importe' , 'importe' , 'trim|required');
$postData['importe'] =  $this->input->post('importe');
 $this->form_validation->set_rules('usuario_idusuario' , 'usuario_idusuario' , 'trim|required');
$postData['usuario_idusuario'] =  $this->input->post('usuario_idusuario');
 $this->form_validation->set_rules('idpedido' , 'idpedido' , 'trim|required');
$postData['idpedido'] =  $this->input->post('idpedido');
  
                //old way to get id
                //$field['uri_segment_index']=$this->uri->segment(3);
                $get = $this->uri->uri_to_assoc();
           		$field['uri_segment_index']=$get['id'];                
                $rowsaffected=$this->Pedido_Model->processUpdate($postData,$get['id']);
                redirect(base_url()."Pedido/Pedido_update/id/".$get['id']);
            }

            
     }
    