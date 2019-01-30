<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Cetak extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('penelitian_model');
    $this->load->model('pendidikan_model');
    $this->load->model('User_model');
    $this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';

  }

  /**
     * This function is used to load page view
     * @return Void
     */
  public function index(){   
	$this->load->view("include/header");
    $this->load->view("index");
    $this->load->view("include/footer");
  }
  	public function prints(){
		if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->users_id;
        }
		$jeniscetak=$this->input->post('jeniscetak');
		$pts2=$this->input->post('pts2');
		
		$user_data = $this->User_model->get_users($id);
		$pendidikan = $this->pendidikan_model->get_pendidikan($id);
		$penelitian = $this->penelitian_model->get_penelitian($id);
		if(count($user_data)>0){
			$page_parameter['user_data'] = $user_data;
			$page_parameter['pendidikan'] = $pendidikan;
			$page_parameter['penelitian'] = $penelitian;
			$page_parameter['jeniscetak'] = $jeniscetak;
			$page_parameter['pts2'] = $pts2;
			$noass1=$page_parameter['user_data'][0]->noass1;
			$noass2=$page_parameter['user_data'][0]->noass2;
			if($noass1>0){
			$page_parameter['ass1']=$this->User_model->get_data_by('users',$noass1,'users_id');
			}
			if($noass2>0){
			$page_parameter['ass2']=$this->User_model->get_data_by('users',$noass2,'users_id');
			}
		$this->load->helper(array('dompdf', 'file'));
		$html = $this->load->view('laporan', $page_parameter,true);
		 $rand = substr(md5(microtime()),rand(0,26),5);
		 $name='Rencana Beban Kerja Dosen';
		 if($jeniscetak=='2')$name='Laporan Kinerja Dosen';
		 pdf_create($html, $name.'-'.$rand);
		
		 //view as html
		//$this->load->view('laporan',$page_parameter);                

		}else{
		redirect( base_url().'cetak/', 'refresh');
		}
	}
	public function view($param1 = '',$param2=''){
        $id = $param1;
		$jeniscetak=$param2;
		
		$user_data = $this->User_model->get_users($id);
		$pendidikan = $this->pendidikan_model->get_pendidikan($id);
		$penelitian = $this->penelitian_model->get_penelitian($id);
		if(count($user_data)>0){
			$page_parameter['user_data'] = $user_data;
			$page_parameter['pendidikan'] = $pendidikan;
			$page_parameter['penelitian'] = $penelitian;
			$page_parameter['jeniscetak'] = $jeniscetak;
			$page_parameter['pts2'] = ' ';
			$noass1=$page_parameter['user_data'][0]->noass1;
			$noass2=$page_parameter['user_data'][0]->noass2;
			if($noass1>0){
			$page_parameter['ass1']=$this->User_model->get_data_by('users',$noass1,'users_id');
			}
			if($noass2>0){
			$page_parameter['ass2']=$this->User_model->get_data_by('users',$noass2,'users_id');
			}
		$this->load->helper(array('dompdf', 'file'));
		$html = $this->load->view('laporan', $page_parameter,true);
		 $rand = substr(md5(microtime()),rand(0,26),5);
		 $name='Rencana Beban Kerja Dosen';
		 if($jeniscetak=='2')$name='Laporan Kinerja Dosen';
		 pdf_create($html, $name.'-'.$rand);
		
		 //view as html
		//$this->load->view('laporan',$page_parameter);                

		}
	}
}
?>