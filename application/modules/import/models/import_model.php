<?php
class import_model extends CI_Model {       
	function __construct(){            
	  	parent::__construct();
	}

  	/**
     * This function is used to delete user
     * @param: $id - id of user table
     */
	function delete($tableName='',$id='') {
		$this->db->where('user_id', $id);  
		$this->db->delete($tableName); 
	}
	function deleteall($tableName='') {
		
		$this->db->empty_table($tableName); 
	}

	function get_data_by($tableName='', $value='', $colum='',$condition='') {	
		if((!empty($value)) && (!empty($colum))) { 
			$this->db->where($colum, $value);
		}
		$this->db->select('*');
		$this->db->from($tableName);
		$query = $this->db->get();
		return $query->result();
  	}

	function check_exists($table='', $colom='',$colomValue=''){
		$this->db->where($colom, $colomValue);
		$res = $this->db->get($table)->row();
		if(!empty($res)){ return false;} else{ return true;}
 	}


  	public function insertRow($table, $data){
	  	$this->db->insert($table, $data);
	  	return  $this->db->insert_id();
	}

  	public function updateRow($table, $col, $colVal, $data) {
  		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		return true;
  	}
}