<?php
class penunjang_model extends CI_Model {       
	function __construct(){            
	  	parent::__construct();
		$this->penunjang_id =isset($this->session->get_penunjangdata()['penunjang_details'][0]->no)?$this->session->get_penunjangndata()['penunjang_details'][0]->no:'1';
	}


  	/**
     * This function is used to delete user
     * @param: $id - id of user table
     */
	function delete($no='') {
		$this->db->where('no', $no);  
		$this->db->delete('penunjang'); 
	}
	

  	/**
      * This function is used to select data form table  
      */
	function get_data_by($tableName='penunjang', $value='', $colum='',$condition='') {	
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
	function get_penunjang($no = '') {
		if(isset($no) && $no !='') {
			$this->db->where('user_id', $no); 
		} 
		else {
			//$this->db->where('penunjang.no !=', '1'); 
		}
		$result = $this->db->get('penunjang')->result();
		return $result;
  	}
		function get_skspenunjang($no = '') {
		if(isset($no) && $no !='') {
			$this->db->where('user_id', $no); 
		} 
		else {
			//$this->db->where('penunjang.no !=', '1'); 
		}
		$this->db->select('sum(kinerja_sks) as sks');
		$result = $this->db->get('penunjang')->result();
		if(count($result)>0){
			return $result[0]->sks;
		}else{
			return 0;
		}
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