<?php
class profesor_model extends CI_Model {       
	function __construct(){            
	  	parent::__construct();
		$this->profesor_id =isset($this->session->get_profesordata()['profesor_details'][0]->no)?$this->session->get_profesorndata()['profesor_details'][0]->no:'1';
	}


  	/**
     * This function is used to delete user
     * @param: $id - id of user table
     */
	function delete($no='') {
		$this->db->where('no', $no);  
		$this->db->delete('profesor'); 
	}
	

  	/**
      * This function is used to select data form table  
      */
	function get_data_by($tableName='profesor', $value='', $colum='',$condition='') {	
		if((!empty($value)) && (!empty($colum))) { 
			$this->db->where($colum, $value);
		}
		$this->db->select('*');
		$this->db->from($tableName);
		$query = $this->db->get();
		return $query->result();
  	}


 	/**
      * This function is used to get users detail  
      */
	function get_profesor($no = '') {
		$this->db->where('is_deleted', '0');                  
		if(isset($no) && $no !='') {
			$this->db->where('user_id', $no); 
		} 
		else {
			$this->db->where('profesor.no !=', '1'); 
		}
		$result = $this->db->get('profesor')->result();
		return $result;
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