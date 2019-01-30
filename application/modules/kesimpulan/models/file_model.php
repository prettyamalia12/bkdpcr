<?php
class file_model extends CI_Model {       
	function __construct(){            
	    parent::__construct();
	    $this->load->database();
	}


  	/**
     * This function is used to delete user
     * @param: $id - id of user table
     */
	function delete($no='') {
		$this->db->where('id', $no);  
		$this->db->delete('file'); 
	}
	

	public function get_allfilebymodul($id='',$modul='') {
		 $this->db->select('*');
		 $this->db->from('file');
		 $this->db->where('id_modul' , $id);
		 $this->db->where('modul' , $modul);
		 $query = $this->db->get();
		 return $result = $query->row();
	}
	public function get_file($id='') {
		 $this->db->select('*');
		 $this->db->from('file');
		 $this->db->where('id' , $id);
		 $query = $this->db->get();
		 return $result = $query->row();
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