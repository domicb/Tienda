<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Usuario extends CI_Controller {
            public function __construct(){
                    parent::__construct();
                    $this->load->model('Usuario_Model'); 
                        
                    $paramSearch=initSessionSearch($this->uri->segment(1));
                    $this->Usuario_Model->setParamSearch($paramSearch);
                                
            }
            

           public function index(){
           
                    $data['title'] = 'Paginacion_ci';
                    $pages=10; //Número de registros mostrados por páginas
                    $this->load->library('pagination'); //Cargamos la librería de paginación
                    $config['base_url'] = base_url().'Usuario/index/page/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
                    $config['total_rows'] = $this->Usuario_Model->filas();//calcula el número de filas  
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
           
           
           
                    $data['dataLists'] = $this->Usuario_Model->total_paginados($config['per_page'],$get['page']);
                    $dataTitle['_titlePage']="Records Usuario";
                    $menu_active['active'] = $this->uri->segment(1);
                    $menu_active['h1']=$this->uri->segment(1);;
                    $menu_active['h2']="&nbsp;>>&nbsp;List";
                    $this->load->view('header', $dataTitle);
                    $this->load->view('menu', $menu_active);
                    $this->load->view('Usuario_index', $data);
                    $this->output->enable_profiler(TRUE);
                    $this->load->view('footer');
            }
            
            public function Usuario_new(){            		
                    $field['idusuario']= array(
              				'name'        => 'idusuario',
              				'id'          => 'idusuario',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'idusuario'
            			); 
                                $field['provincia']= array(
              				'name'        => 'provincia',
              				'id'          => 'provincia',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'provincia'
            			); 
                                $field['username']= array(
              				'name'        => 'username',
              				'id'          => 'username',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'username'
            			); 
                                $field['password']= array(
              				'name'        => 'password',
              				'id'          => 'password',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'password'
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
                                $field['apellidos']= array(
              				'name'        => 'apellidos',
              				'id'          => 'apellidos',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'apellidos'
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
                                
                    $field['field']=$field;
                    $dataTitle['_titlePage']="Records Usuario";
                    $menu_active['active'] = $this->uri->segment(1);
                    $menu_active['h1']=$this->uri->segment(1);;
                    $menu_active['h2']="&nbsp;>>&nbsp;New";
                    $this->load->view('header', $dataTitle);
                    $this->load->view('menu', $menu_active);
                    $this->load->view('Usuario_new',$field);
                    $this->load->view('footer');
            }
            
            public function Usuario_update($id){
                    //old way to get id
                    //$field['uri_segment_index']=$this->uri->segment(3);
                    
                    $get = $this->uri->uri_to_assoc();
           			$field['uri_segment_index']=$get['id'];
                    $data = $this->Usuario_Model->getByID($get['id']);
                    $field['idusuario']= array(
              				'name'        => 'idusuario',
              				'id'          => 'idusuario',
              				'value'       => $data->idusuario,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'idusuario' 
            			);  

                                $field['provincia']= array(
              				'name'        => 'provincia',
              				'id'          => 'provincia',
              				'value'       => $data->provincia,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'provincia' 
            			);  

                                $field['username']= array(
              				'name'        => 'username',
              				'id'          => 'username',
              				'value'       => $data->username,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'username' 
            			);  

                                $field['password']= array(
              				'name'        => 'password',
              				'id'          => 'password',
              				'value'       => $data->password,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'password' 
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

                                $field['apellidos']= array(
              				'name'        => 'apellidos',
              				'id'          => 'apellidos',
              				'value'       => $data->apellidos,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'apellidos' 
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

                                
                    
           			
                    $field['field']=$field;
                    $field['data']=$data;
                    $dataTitle['_titlePage']="Records Usuario";
                    $menu_active['active'] = $this->uri->segment(1);
                    $menu_active['h1']=$this->uri->segment(1);;
                    $menu_active['h2']="&nbsp;>>&nbsp;Update";
                    $this->load->view('header', $dataTitle);
                    $this->load->view('menu', $menu_active);
                    $this->load->view('Usuario_update',$field);
                    $this->load->view('footer');
            }

            public function Usuarioprocess_new(){                    
                   $postData = array();
                        $this->form_validation->set_rules('estado' , 'estado' , 'trim|required');
$postData['estado'] =  $this->input->post('estado');
 $this->form_validation->set_rules('cp' , 'cp' , 'trim|required');
$postData['cp'] =  $this->input->post('cp');
 $this->form_validation->set_rules('direccion' , 'direccion' , 'trim|required');
$postData['direccion'] =  $this->input->post('direccion');
 $this->form_validation->set_rules('apellidos' , 'apellidos' , 'trim|required');
$postData['apellidos'] =  $this->input->post('apellidos');
 $this->form_validation->set_rules('nombre' , 'nombre' , 'trim|required');
$postData['nombre'] =  $this->input->post('nombre');
 $this->form_validation->set_rules('email' , 'email' , 'trim|required');
$postData['email'] =  $this->input->post('email');
 $this->form_validation->set_rules('dni' , 'dni' , 'trim|required');
$postData['dni'] =  $this->input->post('dni');
 $this->form_validation->set_rules('password' , 'password' , 'trim|required');
$postData['password'] =  $this->input->post('password');
 $this->form_validation->set_rules('username' , 'username' , 'trim|required');
$postData['username'] =  $this->input->post('username');
 $this->form_validation->set_rules('provincia' , 'provincia' , 'trim|required');
$postData['provincia'] =  $this->input->post('provincia');
 $this->form_validation->set_rules('idusuario' , 'idusuario' , 'trim|required');
$postData['idusuario'] =  $this->input->post('idusuario');
  
                                    
                $rowsaffected=$this->Usuario_Model->processNew($postData);
                if($rowsaffected>0){
                	redirect(base_url()."Usuario/Usuario_update/id/".$rowsaffected);
                }else{
                	redirect(base_url()."Usuario/Usuario_new");
                }
                
                
            }
            
            public function Usuarioprocess_update($id){                    
                   $postData = array();  
                   $this->form_validation->set_rules('estado' , 'estado' , 'trim|required');
$postData['estado'] =  $this->input->post('estado');
 $this->form_validation->set_rules('cp' , 'cp' , 'trim|required');
$postData['cp'] =  $this->input->post('cp');
 $this->form_validation->set_rules('direccion' , 'direccion' , 'trim|required');
$postData['direccion'] =  $this->input->post('direccion');
 $this->form_validation->set_rules('apellidos' , 'apellidos' , 'trim|required');
$postData['apellidos'] =  $this->input->post('apellidos');
 $this->form_validation->set_rules('nombre' , 'nombre' , 'trim|required');
$postData['nombre'] =  $this->input->post('nombre');
 $this->form_validation->set_rules('email' , 'email' , 'trim|required');
$postData['email'] =  $this->input->post('email');
 $this->form_validation->set_rules('dni' , 'dni' , 'trim|required');
$postData['dni'] =  $this->input->post('dni');
 $this->form_validation->set_rules('password' , 'password' , 'trim|required');
$postData['password'] =  $this->input->post('password');
 $this->form_validation->set_rules('username' , 'username' , 'trim|required');
$postData['username'] =  $this->input->post('username');
 $this->form_validation->set_rules('provincia' , 'provincia' , 'trim|required');
$postData['provincia'] =  $this->input->post('provincia');
 $this->form_validation->set_rules('idusuario' , 'idusuario' , 'trim|required');
$postData['idusuario'] =  $this->input->post('idusuario');
  
                //old way to get id
                //$field['uri_segment_index']=$this->uri->segment(3);
                $get = $this->uri->uri_to_assoc();
           		$field['uri_segment_index']=$get['id'];                
                $rowsaffected=$this->Usuario_Model->processUpdate($postData,$get['id']);
                redirect(base_url()."Usuario/Usuario_update/id/".$get['id']);
            }

            
     }
    