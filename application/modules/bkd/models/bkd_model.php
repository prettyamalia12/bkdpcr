<?php
class bkd_model extends CI_Model {       
	function __construct(){            
	  	parent::__construct();
	}

  	/**
      * This function is used to select data form table  
      */
	function get_data_by($tableName='', $value='', $colum='',$condition='') {	
		if((!empty($value)) && (!empty($colum))) { 
			$this->db->where($colum, $value);
		}
		$this->db->select('*');
		$this->db->from($tableName);
		$query = $this->db->get();
		return $query->result();
  	}
	function get_data_by2($tableName='', $value='', $colum='', $value2='', $colum2='') {	
		if((!empty($value)) && (!empty($colum))) { 
			$this->db->where($colum, $value);
		}
		if((!empty($value2)) && (!empty($colum2))) { 
			$this->db->where($colum2, $value2);
		}
		$this->db->select('*');
		$this->db->from($tableName);
		$query = $this->db->get();
		return $query->result();
  	}

  	/**
      * This function is used to check user is alredy exist or not  
      */
	function check_exists($table='', $colom='',$colomValue=''){
		$this->db->where($colom, $colomValue);
		$res = $this->db->get($table)->row();
		if(!empty($res)){ return false;} else{ return true;}
 	}

	/**
      * This function is used to Insert record in table  
      */
  	public function insertRow($table, $data){
	  	$this->db->insert($table, $data);
	  	return  $this->db->insert_id();
	}

	/**
      * This function is used to Update record in table  
      */
  	public function updateRow($table, $col, $colVal, $data) {
  		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		return true;
  	}
}