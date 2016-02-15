<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	function factoryViewStringMenu($stringMenu){
		return '<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="" class="navbar-brand">Name System</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">                
                <li class="dropdown">
                    <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">Profile<span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">                        
                        <li><a href="#">Edit Profile</a></li>
                        <li><a href="#">View Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Change Password</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Sign out</a></li>
                    </ul>
                </li>
                <li><a href="#">Help</a></li>
            </ul>
            <?php search($active); ?>
        </div>
    </div><!--/.container-fluid -->
</nav>
      <div class="container-fluid">
          <div class="row">
          
          <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            '.$stringMenu.'
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-color: #ffffff">
            <h1 class="page-header" style="float:left"><?php echo $h1 ?></h1>
            <h2 class="sub-header"  style="float:left"><?php echo $h2 ?></h2>
            <div style="clear:both"></div>
            <?php echo error_boostrap(validation_errors("",""));  ?>   ';
	}
	
	
	
	
	function factoryViewStringCreate($table,$fieldViewNew){
	$table=formatName($table);
		return '    
            <?=form_open(base_url()."'.$table.'/'.$table.'process_new/")?>
            <table>
             '.$fieldViewNew.'
             </table>
            <?=form_submit("submit", "Create")?>';
	}
	
	function factoryViewStringUpdate($table,$fieldViewNew){
	$table=formatName($table);
		return '           
            <?=form_open(base_url()."'.$table.'/'.$table.'process_update/id/".$uri_segment_index)?>
            <table>
            '.$fieldViewNew.'
            </table>
            <?=form_submit("submit", "Update")?>';
	
	}
	
	function factoryViewStringList($table,$tdForHeaderList,$tdForBodyList){
	$table=formatName($table);
		return '
    
    <div class="content"><a class="btn btn-primary" role="button" href="<?php echo base_url().\''.$table.'/'.$table.'_new/\'; ?>">New</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>                
                    <tr>                       
                          '.$tdForHeaderList.'
                              <th></th>
                              <th></th>
                    <tr>
                </thead>
                <tbody>
                    <?php if($dataLists!=null){ foreach($dataLists as $dataList) : ?> 
                    <tr>
                         '.$tdForBodyList.'
                        <td>                   
                            <a class="btn btn-warning" role="button" href="<?php echo base_url().\''.$table.'/'.$table.'_update/id/\'.$dataList->id; ?>">Update</a>
                        </td>
                        <td>                   
                            <a class="btn btn-danger" role="button" href="<?php echo base_url().\''.$table.'/'.$table.'_delete/id/\'.$dataList->id; ?>">Delete</a>
                        </td>
                    </tr>     
                    <?php endforeach; } ?>
                </tbody>        
            </table>
            <div class="pagination">
                <?php //echo pagination ?>
                <?=$this->pagination->create_links();?>		
            </div>
        </div>
    </div>';
	}
	
	
	function factoryControllerString($table,$modelsAditionals,$fieldController,$fieldControllerNew,$postReceiver){
	$table=formatName($table);
		return '<?php if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');
    class '.$table.' extends CI_Controller {
            public function __construct(){
                    parent::__construct();
                    $this->load->model(\''.$table.'_Model\'); 
                        
                    $paramSearch=initSessionSearch($this->uri->segment(1));
                    $this->'.$table.'_Model->setParamSearch($paramSearch);
                    '.$modelsAditionals.'            
            }
            

           public function index(){
           
                    $data[\'title\'] = \'Paginacion_ci\';
                    $pages=10; //Número de registros mostrados por páginas
                    $this->load->library(\'pagination\'); //Cargamos la librería de paginación
                    $config[\'base_url\'] = base_url().\''.$table.'/index/page/\'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
                    $config[\'total_rows\'] = $this->'.$table.'_Model->filas();//calcula el número de filas  
                    $config[\'per_page\'] = $pages; //Número de registros mostrados por páginas
                    $config[\'num_links\'] = 20; //Número de links mostrados en la paginación
                    $config[\'first_link\'] = \'First\';//primer link
                    $config[\'last_link\'] = \'Last\';//último link
                    
                    $get = $this->uri->uri_to_assoc();
                     $get[\'page\']=(isset($get[\'page\']))?$get[\'page\']:0;
                    $config[\'uri_segment\'] = 4;//el segmento de la paginación
                    $config[\'next_link\'] = \'Next\';//siguiente link
                    $config[\'prev_link\'] = \'Prev\';//anterior link
                    $config[\'full_tag_open\'] = \'<div id="pagination">\';//el div que debemos maquetar
                    $config[\'full_tag_close\'] = \'</div>\';//el cierre del div de la paginación
                    $this->pagination->initialize($config); //inicializamos la paginación          
           
           
           
                    $data[\'dataLists\'] = $this->'.$table.'_Model->total_paginados($config[\'per_page\'],$get[\'page\']);
                    $dataTitle[\'_titlePage\']="Records '.$table.'";
                    $menu_active[\'active\'] = $this->uri->segment(1);
                    $menu_active[\'h1\']=$this->uri->segment(1);;
                    $menu_active[\'h2\']="&nbsp;>>&nbsp;List";
                    $this->load->view(\'header\', $dataTitle);
                    $this->load->view(\'menu\', $menu_active);
                    $this->load->view(\''.$table.'_index\', $data);
                    $this->output->enable_profiler(TRUE);
                    $this->load->view(\'footer\');
            }
            
            public function '.$table.'_new(){            		
                    '. $fieldControllerNew.'
                    $field[\'field\']=$field;
                    $dataTitle[\'_titlePage\']="Records '.$table.'";
                    $menu_active[\'active\'] = $this->uri->segment(1);
                    $menu_active[\'h1\']=$this->uri->segment(1);;
                    $menu_active[\'h2\']="&nbsp;>>&nbsp;New";
                    $this->load->view(\'header\', $dataTitle);
                    $this->load->view(\'menu\', $menu_active);
                    $this->load->view(\''.$table.'_new\',$field);
                    $this->load->view(\'footer\');
            }
            
            public function '.$table.'_update($id){
                    //old way to get id
                    //$field[\'uri_segment_index\']=$this->uri->segment(3);
                    
                    $get = $this->uri->uri_to_assoc();
           			$field[\'uri_segment_index\']=$get[\'id\'];
                    $data = $this->'.$table.'_Model->getByID($get[\'id\']);
                    '. $fieldController.'
                    
           			
                    $field[\'field\']=$field;
                    $field[\'data\']=$data;
                    $dataTitle[\'_titlePage\']="Records '.$table.'";
                    $menu_active[\'active\'] = $this->uri->segment(1);
                    $menu_active[\'h1\']=$this->uri->segment(1);;
                    $menu_active[\'h2\']="&nbsp;>>&nbsp;Update";
                    $this->load->view(\'header\', $dataTitle);
                    $this->load->view(\'menu\', $menu_active);
                    $this->load->view(\''.$table.'_update\',$field);
                    $this->load->view(\'footer\');
            }

            public function '.$table.'process_new(){                    
                   $postData = array();
                        '.$postReceiver.' 
                                    
                $rowsaffected=$this->'.$table.'_Model->processNew($postData);
                if($rowsaffected>0){
                	redirect(base_url()."'.$table.'/'.$table.'_update/id/".$rowsaffected);
                }else{
                	redirect(base_url()."'.$table.'/'.$table.'_new");
                }
                
                
            }
            
            public function '.$table.'process_update($id){                    
                   $postData = array();  
                   '.$postReceiver.' 
                //old way to get id
                //$field[\'uri_segment_index\']=$this->uri->segment(3);
                $get = $this->uri->uri_to_assoc();
           		$field[\'uri_segment_index\']=$get[\'id\'];                
                $rowsaffected=$this->'.$table.'_Model->processUpdate($postData,$get[\'id\']);
                redirect(base_url()."'.$table.'/'.$table.'_update/id/".$get[\'id\']);
            }

            
     }
    ';
	
	}
	
	function factoryModelString($table){	

	return '<?php class '.ucwords(strtolower($table)).'_Model extends CI_Model {
        private $array_or_where= array();
        private $paramSearch="";
  	public function __construct() {
    	parent::__construct();
    	$this->load->database();
        
  	}
 
  	public function processNew($postData){
    	$this->db->insert(\''.$table.'\',$postData);
    	$last_id = $this->db->insert_id();
    	return $last_id;
  	}

  	public function processUpdate($postData,$id){
     	$this->db->where("id=",$id);
    	$this->db->update(\''.$table.'\',$postData);
    	return $this->db->affected_rows();
  	}
  
  	public function processDelete($id){
   		$this->db->query("Update '.$table.' set is_deleted=\'true\' where id=".$id);
    	return $this->db->affected_rows();
  	}

  	public function getAll(){
   		$this->db->where("is_deleted =",\'false\');
    	$query = $this->db->get(\''.$table.'\');
    	if ($query->num_rows() > 0){
        	foreach($query->result() as $row){
            	$result[]	=	$row;
        	}
        return $result;
    	}
  	}
  
  	public function getByID($id){
  	  	$query = $this->db->get_where(\''.$table.'\', array(\'id\' => $id,\'is_deleted\'=>\'false\' ));
    	return $query->row();
  	}  
  
  	public function getSelectData(){
    	$this->db->where("is_deleted =",\'false\');
        $haveName=name_exist_for_table($this,\''.$table.'\');
        if($haveName==true){
           $this->db->order_by("name", "asc");
        }


    	$query = $this->db->get(\''.$table.'\');
    	if ($query->num_rows() > 0){
        	foreach($query->result() as $row){
            	if($haveName==true){
                    $result[$row->id] = $row->name;
                }else{
                    $result[$row->id] = $row->id;
                }
        	}
        	return $result;
    		}
 	 	}
  
 	public	function filas(){
	//$consulta = $this->db->get(\''.$table.'\');
            $this->db->select(\'*\');
            $this->db->from(\''.$table.'\');
            $this->db->where(array(\'is_deleted\'=>\'false\' ));
            if(count($this->array_or_where)>0){            
                $this->db->where(returnSearch($this->paramSearch,$this->array_or_where));
            }
            
            $consulta=$this->db->get();
			return  $consulta->num_rows() ;
		}
		
	public	function total_paginados($por_pagina,$segmento){
            //$consulta = $this->db->get(\''.$table.'\',$por_pagina,$segmento);
            $this->db->select(\'*\');
            $this->db->from(\''.$table.'\');
            $this->db->where(array(\'is_deleted\'=>\'false\' ));
            if(count($this->array_or_where)>0){            
                $this->db->where(returnSearch($this->paramSearch,$this->array_or_where));
            }
            $this->db->limit($por_pagina, $segmento);
            $consulta=$this->db->get();
            if($consulta->num_rows()>0){
                foreach($consulta->result() as $fila){
		            $data[] = $fila;
		        }
                return $data;
            }
		}

            public function setParamSearch($paramSearch){
                $this->paramSearch=$paramSearch;
            }
		}';
	}