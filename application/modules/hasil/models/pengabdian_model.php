<?php
class pengabdian_model extends CI_Model {       
	function __construct(){            
	  	parent::__construct();
		$this->pengabdian_id =isset($this->session->get_pengabdiandata()['pengabdian_details'][0]->no)?$this->session->get_pengabdianndata()['pengabdian_details'][0]->no:'1';
	}


  	/**
     * This function is used to delete user
     * @param: $id - id of user table
     */
	function delete($no='') {
		$this->db->where('no', $no);  
		$this->db->delete('pengabdian'); 
	}
	

  	/**
      * This function is used to select data form table  
      */
	function get_data_by($tableName='pengabdian', $value='', $colum='',$condition='') {	
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
	function get_pengabdian($no = '') {
		//$this->db->where('is_deleted', '0');                  
		if(isset($no) && $no !='') {
			$this->db->where('user_id', $no); 
		} 
		else {
			//$this->db->where('pengabdian.no !=', '1'); 
		}
		$result = $this->db->get('pengabdian')->result();
		return $result;
  	}
	
	function get_skspengabdian($no = '') {
		if(isset($no) && $no !='') {
			$this->db->where('user_id', $no); 
		} 
		else {
			//$this->db->where('pengabdian.no !=', '1'); 
		}
		$this->db->select('sum(kinerja_sks) as sks');
		$result = $this->db->get('pengabdian')->result();
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