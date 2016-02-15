<?php class Categoria_Model extends CI_Model {
        private $array_or_where= array();
        private $paramSearch="";
  	public function __construct() {
    	parent::__construct();
    	$this->load->database();
        
  	}
 
  	public function processNew($postData){
    	$this->db->insert('categoria',$postData);
    	$last_id = $this->db->insert_id();
    	return $last_id;
  	}

  	public function processUpdate($postData,$id){
     	$this->db->where("id=",$id);
    	$this->db->update('categoria',$postData);
    	return $this->db->affected_rows();
  	}
  
  	public function processDelete($id){
   		$this->db->query("Update categoria set is_deleted='true' where id=".$id);
    	return $this->db->affected_rows();
  	}

  	public function getAll(){
   		$this->db->where("is_deleted =",'false');
    	$query = $this->db->get('categoria');
    	if ($query->num_rows() > 0){
        	foreach($query->result() as $row){
            	$result[]	=	$row;
        	}
        return $result;
    	}
  	}
  
  	public function getByID($id){
  	  	$query = $this->db->get_where('categoria', array('id' => $id,'is_deleted'=>'false' ));
    	return $query->row();
  	}  
  
  	public function getSelectData(){
    	$this->db->where("is_deleted =",'false');
        $haveName=name_exist_for_table($this,'categoria');
        if($haveName==true){
           $this->db->order_by("name", "asc");
        }


    	$query = $this->db->get('categoria');
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
	//$consulta = $this->db->get('categoria');
            $this->db->select('*');
            $this->db->from('categoria');
            $this->db->where(array('is_deleted'=>'false' ));
            if(count($this->array_or_where)>0){            
                $this->db->where(returnSearch($this->paramSearch,$this->array_or_where));
            }
            
            $consulta=$this->db->get();
			return  $consulta->num_rows() ;
		}
		
	public	function total_paginados($por_pagina,$segmento){
            //$consulta = $this->db->get('categoria',$por_pagina,$segmento);
            $this->db->select('*');
            $this->db->from('categoria');
            $this->db->where(array('is_deleted'=>'false' ));
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
		}