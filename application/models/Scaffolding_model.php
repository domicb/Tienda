<?php class Scaffolding_Model extends CI_Model {
 
 	private $POSTGRESCONSTRAINTS ="SELECT
     	tc.constraint_type as constraint_type, 
     	kcu.table_name as local_table,
     	kcu.column_name as local_column,
    	ccu.table_name as foreing_table, 
     	ccu.column_name as foreing_column
 	FROM
     	information_schema.table_constraints AS tc
     	JOIN information_schema.key_column_usage AS kcu ON
 		tc.constraint_name = kcu.constraint_name
    JOIN 
    	information_schema.constraint_column_usage AS ccu ON
 		ccu.constraint_name = tc.constraint_name";
 		
 	private $MYSQLCONSTRAINTS="SELECT 
  		CONSTRAINT_NAME AS constraint_type, 
  		TABLE_NAME AS local_table, 
  		COLUMN_NAME AS local_column, 
  		REFERENCED_TABLE_NAME AS foreing_table, 
  		REFERENCED_COLUMN_NAME AS foreing_column
	FROM 
		INFORMATION_SCHEMA.KEY_COLUMN_USAGE";
 
 
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }
  
  public function listTables(){
  	$tables = $this->db->list_tables();
	/*foreach ($tables as $table){
        echo $table."<br/>";
	}*/
	return $tables;
  }
  
  public function listFieldsOfTable($table){
  	$fields = $this->db->list_fields($table);
	/*foreach ($fields as $field){
        echo $field;
	}*/
	return $fields;
  }
  
  	/***
  	******************************************************************************
 	* Detect Constraints
 	******************************************************************************
 	**/
  
  public function getConstraintsInTable($table){  	
  	if($this->db->dbdriver=="mysqli"){
  		return $this->getConstraintsInTableMYSQL($table);
  	}elseif($this->db->dbdriver=="postgre"){
  		return $this->getConstraintsInTablePOSTGRE($table);
  	}else{
  		return array();
  	}  
  }
  
  public function getConstraintsInTableMYSQL($table){
  	$query = $this->db->query($this->MYSQLCONSTRAINTS."
	WHERE 
		TABLE_NAME = '".$table."' and 
		CONSTRAINT_SCHEMA = '".$this->db->database."'");

	/*foreach ($query->result() as $row){
        echo $row->constraint_type;
        echo $row->local_table;
        echo $row->local_column;
        echo $row->foreing_table;
        echo $row->foreing_column;
	}*/
	return $query;
  }
  
  public function getConstraintsInTablePOSTGRE($table){
  	$query = $this->db->query($this->POSTGRESCONSTRAINTS."
  	
 	WHERE
 	   tc.table_name ilike '".$table."' ");

	/*foreach ($query->result() as $row){
       	echo $row->constraint_type;
        echo $row->local_table;
        echo $row->local_column;
        echo $row->foreing_table;
        echo $row->foreing_column;
	}*/
	return $query;
  }
  /***
  	******************************************************************************
 	* Detect Constraints For Fields
 	******************************************************************************
 	**/
  
  public function getConstraintsInTableField($table,$field){  	
  	if($this->db->dbdriver=="mysqli"){
  		return $this->getConstraintsInTableFieldMYSQL($table,$field);
  	}elseif($this->db->dbdriver=="postgre"){
  		return $this->getConstraintsInTableFieldPOSTGRE($table,$field);
  	}else{
  		return array();
  	}  
  }
  
  public function getConstraintsInTableFieldMYSQL($table,$field){
  	$query = $this->db->query($this->MYSQLCONSTRAINTS."
	WHERE 
		TABLE_NAME = '".$table."' and 
		COLUMN_NAME = '".$field."' and
		CONSTRAINT_SCHEMA = '".$this->db->database."'");
	return $query;
  }
  
  public function getConstraintsInTableFieldPOSTGRE($table,$field){
  	$query = $this->db->query($this->POSTGRESCONSTRAINTS."
  	
 	WHERE
 		kcu.column_name ilike '".$field."' and
 	   	tc.table_name ilike '".$table."' ");
	return $query;
  }
  
  
  	/***
  	******************************************************************************
 	* Detect Primary
 	******************************************************************************
 	**/
  
 	public function fieldIsPrimary($table,$field){
 		if($this->db->dbdriver=="mysqli"){
  			return $this->fieldIsPrimaryMYSQL($table,$field);
  		}elseif($this->db->dbdriver=="postgre"){
  			return $this->fieldIsPrimaryPOSTGRE($table,$field);
  		}else{
  			return false;
  		}
 	}
 	
 	public function fieldIsPrimaryMYSQL($table,$field){
 		$query = $this->db->query($this->MYSQLCONSTRAINTS."
		WHERE 
			TABLE_NAME = '".$table."' and
			COLUMN_NAME = '".$field."' and
			CONSTRAINT_NAME = 'PRIMARY' and
			CONSTRAINT_SCHEMA = '".$this->db->database."'");
			
		if($query->num_rows()>0){
			return true;
		}else{
			return false;
		}	
 	}
 	
 	public function fieldIsPrimaryPOSTGRE($table,$field){
 		$query = $this->db->query($this->POSTGRESCONSTRAINTS."  		
 		WHERE
 	   		tc.table_name ilike '".$table."' and 
 	   		kcu.column_name ilike '".$field."' and
 	   		tc.constraint_type ilike 'PRIMARY KEY' 	   		
 	   		");
			
		if($query->num_rows()>0){
			return true;
		}else{
			return false;
		}	
 	}
 	
 	/***
 	******************************************************************************
 	* Detect Foreign
 	******************************************************************************
 	**/
 	
 	
 	public function fieldIsForeing($table,$field){
 		if($this->db->dbdriver=="mysqli"){
  			return $this->fieldIsForeingMYSQL($table,$field);
  		}elseif($this->db->dbdriver=="postgre"){
  			return $this->fieldIsForeingPOSTGRE($table,$field);
  		}else{
  			return false;
  		}
 	}
 	
 	public function fieldIsForeingMYSQL($table,$field){
 		$query = $this->db->query($this->MYSQLCONSTRAINTS."
		WHERE 
			TABLE_NAME = '".$table."' and
			COLUMN_NAME = '".$field."' and
			CONSTRAINT_NAME != 'PRIMARY' and
			REFERENCED_TABLE_NAME is NOT NULL and
			CONSTRAINT_SCHEMA = '".$this->db->database."'");
			
		if($query->num_rows()>0){
			return true;
		}else{
			return false;
		}	
 	}
 	
 	
 	public function fieldIsForeingPOSTGRE($table,$field){
 		$query = $this->db->query($this->POSTGRESCONSTRAINTS."  		
 		WHERE
 	   		tc.table_name ilike '".$table."' and 
 	   		kcu.column_name ilike '".$field."' and
 	   		tc.constraint_type ilike 'FOREIGN KEY' 	   		
 	   		");		
		if($query->num_rows()>0){
			return true;
		}else{
			return false;
		}	
 	}
}