<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Producto extends CI_Controller {
            public function __construct(){
                    parent::__construct();
                    $this->load->model('Producto_Model'); 
                        
                    $paramSearch=initSessionSearch($this->uri->segment(1));
                    $this->Producto_Model->setParamSearch($paramSearch);
                    $this->load->model('Categoria_Model');             
            }
            

           public function index(){
           
                    $data['title'] = 'Paginacion_ci';
                    $pages=10; //Número de registros mostrados por páginas
                    $this->load->library('pagination'); //Cargamos la librería de paginación
                    $config['base_url'] = base_url().'Producto/index/page/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
                    $config['total_rows'] = $this->Producto_Model->filas();//calcula el número de filas  
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
           
           
           
                    $data['dataLists'] = $this->Producto_Model->total_paginados($config['per_page'],$get['page']);
                    $dataTitle['_titlePage']="Records Producto";
                    $menu_active['active'] = $this->uri->segment(1);
                    $menu_active['h1']=$this->uri->segment(1);;
                    $menu_active['h2']="&nbsp;>>&nbsp;List";
                    $this->load->view('header', $dataTitle);
                    $this->load->view('menu', $menu_active);
                    $this->load->view('Producto_index', $data);
                    $this->output->enable_profiler(TRUE);
                    $this->load->view('footer');
            }
            
            public function Producto_new(){            		
                    $field['idproducto']= array(
              				'name'        => 'idproducto',
              				'id'          => 'idproducto',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'idproducto'
            			); 
                                $field['options_2']['categoria_idcategoria']=$this->Categoria_Model->getSelectData() ;  
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
                                $field['descuento']= array(
              				'name'        => 'descuento',
              				'id'          => 'descuento',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'descuento'
            			); 
                                $field['imagen']= array(
              				'name'        => 'imagen',
              				'id'          => 'imagen',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'imagen'
            			); 
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
                                $field['seleccion']= array(
              				'name'        => 'seleccion',
              				'id'          => 'seleccion',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'seleccion'
            			); 
                                $field['mostrar']= array(
              				'name'        => 'mostrar',
              				'id'          => 'mostrar',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'mostrar'
            			); 
                                $field['inicio']= array(
              				'name'        => 'inicio',
              				'id'          => 'inicio',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'inicio'
            			); 
                                $field['fin']= array(
              				'name'        => 'fin',
              				'id'          => 'fin',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'fin'
            			); 
                                
                    $field['field']=$field;
                    $dataTitle['_titlePage']="Records Producto";
                    $menu_active['active'] = $this->uri->segment(1);
                    $menu_active['h1']=$this->uri->segment(1);;
                    $menu_active['h2']="&nbsp;>>&nbsp;New";
                    $this->load->view('header', $dataTitle);
                    $this->load->view('menu', $menu_active);
                    $this->load->view('Producto_new',$field);
                    $this->load->view('footer');
            }
            
            public function Producto_update($id){
                    //old way to get id
                    //$field['uri_segment_index']=$this->uri->segment(3);
                    
                    $get = $this->uri->uri_to_assoc();
           			$field['uri_segment_index']=$get['id'];
                    $data = $this->Producto_Model->getByID($get['id']);
                    $field['idproducto']= array(
              				'name'        => 'idproducto',
              				'id'          => 'idproducto',
              				'value'       => $data->idproducto,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'idproducto' 
            			);  

                                $field['options_2']['categoria_idcategoria']=$this->Categoria_Model->getSelectData() ;  
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

                                $field['descuento']= array(
              				'name'        => 'descuento',
              				'id'          => 'descuento',
              				'value'       => $data->descuento,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'descuento' 
            			);  

                                $field['imagen']= array(
              				'name'        => 'imagen',
              				'id'          => 'imagen',
              				'value'       => $data->imagen,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'imagen' 
            			);  

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

                                $field['seleccion']= array(
              				'name'        => 'seleccion',
              				'id'          => 'seleccion',
              				'value'       => $data->seleccion,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'seleccion' 
            			);  

                                $field['mostrar']= array(
              				'name'        => 'mostrar',
              				'id'          => 'mostrar',
              				'value'       => $data->mostrar,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'mostrar' 
            			);  

                                $field['inicio']= array(
              				'name'        => 'inicio',
              				'id'          => 'inicio',
              				'value'       => $data->inicio,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'inicio' 
            			);  

                                $field['fin']= array(
              				'name'        => 'fin',
              				'id'          => 'fin',
              				'value'       => $data->fin,
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => 'fin' 
            			);  

                                
                    
           			
                    $field['field']=$field;
                    $field['data']=$data;
                    $dataTitle['_titlePage']="Records Producto";
                    $menu_active['active'] = $this->uri->segment(1);
                    $menu_active['h1']=$this->uri->segment(1);;
                    $menu_active['h2']="&nbsp;>>&nbsp;Update";
                    $this->load->view('header', $dataTitle);
                    $this->load->view('menu', $menu_active);
                    $this->load->view('Producto_update',$field);
                    $this->load->view('footer');
            }

            public function Productoprocess_new(){                    
                   $postData = array();
                        $this->form_validation->set_rules('fin' , 'fin' , 'trim|required');
$postData['fin'] =  $this->input->post('fin');
 $this->form_validation->set_rules('inicio' , 'inicio' , 'trim|required');
$postData['inicio'] =  $this->input->post('inicio');
 $this->form_validation->set_rules('mostrar' , 'mostrar' , 'trim|required');
$postData['mostrar'] =  $this->input->post('mostrar');
 $this->form_validation->set_rules('seleccion' , 'seleccion' , 'trim|required');
$postData['seleccion'] =  $this->input->post('seleccion');
 $this->form_validation->set_rules('anuncio' , 'anuncio' , 'trim|required');
$postData['anuncio'] =  $this->input->post('anuncio');
 $this->form_validation->set_rules('descripcion' , 'descripcion' , 'trim|required');
$postData['descripcion'] =  $this->input->post('descripcion');
 $this->form_validation->set_rules('iva' , 'iva' , 'trim|required');
$postData['iva'] =  $this->input->post('iva');
 $this->form_validation->set_rules('imagen' , 'imagen' , 'trim|required');
$postData['imagen'] =  $this->input->post('imagen');
 $this->form_validation->set_rules('descuento' , 'descuento' , 'trim|required');
$postData['descuento'] =  $this->input->post('descuento');
 $this->form_validation->set_rules('precio' , 'precio' , 'trim|required');
$postData['precio'] =  $this->input->post('precio');
 $this->form_validation->set_rules('cantidad' , 'cantidad' , 'trim|required');
$postData['cantidad'] =  $this->input->post('cantidad');
 $this->form_validation->set_rules('nombre' , 'nombre' , 'trim|required');
$postData['nombre'] =  $this->input->post('nombre');
 $this->form_validation->set_rules('categoria_idcategoria' , 'categoria_idcategoria' , 'trim|required');
$postData['categoria_idcategoria'] =  $this->input->post('categoria_idcategoria');
 $this->form_validation->set_rules('idproducto' , 'idproducto' , 'trim|required');
$postData['idproducto'] =  $this->input->post('idproducto');
  
                                    
                $rowsaffected=$this->Producto_Model->processNew($postData);
                if($rowsaffected>0){
                	redirect(base_url()."Producto/Producto_update/id/".$rowsaffected);
                }else{
                	redirect(base_url()."Producto/Producto_new");
                }
                
                
            }
            
            public function Productoprocess_update($id){                    
                   $postData = array();  
                   $this->form_validation->set_rules('fin' , 'fin' , 'trim|required');
$postData['fin'] =  $this->input->post('fin');
 $this->form_validation->set_rules('inicio' , 'inicio' , 'trim|required');
$postData['inicio'] =  $this->input->post('inicio');
 $this->form_validation->set_rules('mostrar' , 'mostrar' , 'trim|required');
$postData['mostrar'] =  $this->input->post('mostrar');
 $this->form_validation->set_rules('seleccion' , 'seleccion' , 'trim|required');
$postData['seleccion'] =  $this->input->post('seleccion');
 $this->form_validation->set_rules('anuncio' , 'anuncio' , 'trim|required');
$postData['anuncio'] =  $this->input->post('anuncio');
 $this->form_validation->set_rules('descripcion' , 'descripcion' , 'trim|required');
$postData['descripcion'] =  $this->input->post('descripcion');
 $this->form_validation->set_rules('iva' , 'iva' , 'trim|required');
$postData['iva'] =  $this->input->post('iva');
 $this->form_validation->set_rules('imagen' , 'imagen' , 'trim|required');
$postData['imagen'] =  $this->input->post('imagen');
 $this->form_validation->set_rules('descuento' , 'descuento' , 'trim|required');
$postData['descuento'] =  $this->input->post('descuento');
 $this->form_validation->set_rules('precio' , 'precio' , 'trim|required');
$postData['precio'] =  $this->input->post('precio');
 $this->form_validation->set_rules('cantidad' , 'cantidad' , 'trim|required');
$postData['cantidad'] =  $this->input->post('cantidad');
 $this->form_validation->set_rules('nombre' , 'nombre' , 'trim|required');
$postData['nombre'] =  $this->input->post('nombre');
 $this->form_validation->set_rules('categoria_idcategoria' , 'categoria_idcategoria' , 'trim|required');
$postData['categoria_idcategoria'] =  $this->input->post('categoria_idcategoria');
 $this->form_validation->set_rules('idproducto' , 'idproducto' , 'trim|required');
$postData['idproducto'] =  $this->input->post('idproducto');
  
                //old way to get id
                //$field['uri_segment_index']=$this->uri->segment(3);
                $get = $this->uri->uri_to_assoc();
           		$field['uri_segment_index']=$get['id'];                
                $rowsaffected=$this->Producto_Model->processUpdate($postData,$get['id']);
                redirect(base_url()."Producto/Producto_update/id/".$get['id']);
            }

            
     }
    