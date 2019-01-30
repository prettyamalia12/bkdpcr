<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Kesimpulan extends CI_Controller {

  function __construct() {
    parent::__construct();
	$this->load->model('User_model');
    $this->load->model('penelitian_model');
    $this->load->model('pendidikan_model');
    $this->load->model('pengabdian_model');
    $this->load->model('penunjang_model');
	$this->load->model('bkd_model');
    $this->load->model('file_model');
    $this->user_id = isset($this->session->get_userdata()['user_details'][0]->users_id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';

  }

  /**
     * This function is used to load page view
     * @return Void
     */
  public function index(){
	  if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->users_id;
        }else{
			redirect( base_url(), 'refresh');
		}
		$user_data = $this->User_model->get_users($id);
		$pendidikan = $this->pendidikan_model->get_skspendidikan($id);
		$penelitian = $this->penelitian_model->get_skspenelitian($id);
		$pengabidan = $this->pengabdian_model->get_skspengabdian($id);
		$penunjang = $this->penunjang_model->get_skspenunjang($id);
		
		$st1='T';
		$st2='T';
		$st3='T';
		$st4='T';
		$st5='T';
		$siap=0;
		$kesimpulan='KESIMPULAN : TIDAK MEMENUHI SYARAT UU';
		
		if(count($user_data)>0){
			$page_parameter['user_data'] = $user_data;
			$tipe=$page_parameter['user_data'][0]->katdos;
			if($tipe=='DS'){
				$page_parameter['s1'] = $pendidikan;
				$page_parameter['s2'] = $penelitian;
				if($pendidikan>3){$st1='M';$siap++;}
				if($penelitian>0){$st2='M';$siap++;}
				$s3=$pendidikan+$penelitian;
				$s4=$pengabidan+$penunjang;
				if($s3>=9){$st3='M';$siap++;}
				if($s4>=0){$st4='M';$siap++;}
				$page_parameter['s3'] = $s3;
				$page_parameter['s4'] = $s4;
				$s5=$s3+$s4;
				$page_parameter['s5'] = $s5;
				if($s5>=12 && $s5 <=16) {$st5='M'; $siap++;}
				if($siap==5){
				$kesimpulan='KESIMPULAN : MEMENUHI SYARAT UU';
				}
			}else{
				$page_parameter['s1'] = $pendidikan;
				$page_parameter['s2'] = $penelitian;
				if($pendidikan>0){$st1='M';$siap++;}
				if($penelitian>=0){$st2='M';$siap++;}
				$s3=$pendidikan+$penelitian;
				$s4=$pengabidan+$penunjang;
				if($s3>=9){$st3='M';$siap++;}
				if($s4>=0){$st4='M';$siap++;}
				$page_parameter['s3'] = $s3;
				$page_parameter['s4'] = $s4;
				$s5=$s3+$s4;
				$page_parameter['s5'] = $s5;
				if($s5>=12 && $s5 <=16) {$st5='M'; $siap++;}
				if($siap==5){
				$kesimpulan='KESIMPULAN : MEMENUHI SYARAT UU';
				}
			}
			$page_parameter['st1'] = $st1;
			$page_parameter['st2'] = $st2;
			$page_parameter['st3'] = $st3;
			$page_parameter['st4'] = $st4;
			$page_parameter['st5'] = $st5;
			$page_parameter['kesimpulan'] = $kesimpulan;
				$res = $this->bkd_model->get_data_by('bkd', $id, 'user_id');
				if(is_array($res) && empty($res)) {
				}else{
				$page_parameter['bkd'] = $res;
				}
				
			$filebkd = $this->bkd_model->get_data_by2('file',$id,'id_modul','hasil','modul'); 
				if(is_array($res) && empty($res)) {
				}else{
				$page_parameter['filebkd'] = $res;
				}
			
			$this->load->view("include/header");
			$this->load->view('index',$page_parameter);                
			$this->load->view("include/footer");
		}else{
		redirect( base_url(), 'refresh');
		}
  }
    public function submit(){
	  if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->users_id;
        }else{
			redirect( base_url(), 'refresh');
		}
		$user_data = $this->User_model->get_users($id);
		$pendidikan = $this->pendidikan_model->get_skspendidikan($id);
		$penelitian = $this->penelitian_model->get_skspenelitian($id);
		$pengabidan = $this->pengabdian_model->get_skspengabdian($id);
		$penunjang = $this->penunjang_model->get_skspenunjang($id);
		
		$st1='T';
		$st2='T';
		$st3='T';
		$st4='T';
		$st5='T';
		$siap=0;
		$kesimpulan='KESIMPULAN : TIDAK MEMENUHI SYARAT UU';
		
		if(count($user_data)>0){
			$page_parameter['user_data'] = $user_data;
			$tipe=$page_parameter['user_data'][0]->katdos;
			if($tipe=='DS'){
				$page_parameter['s1'] = $pendidikan;
				$page_parameter['s2'] = $penelitian;
				if($pendidikan>3){$st1='M';$siap++;}
				if($penelitian>0){$st2='M';$siap++;}
				$s3=$pendidikan+$penelitian;
				$s4=$pengabidan+$penunjang;
				if($s3>=9){$st3='M';$siap++;}
				if($s4>=0){$st4='M';$siap++;}
				$page_parameter['s3'] = $s3;
				$page_parameter['s4'] = $s4;
				$s5=$s3+$s4;
				$page_parameter['s5'] = $s5;
				if($s5>=12 && $s5 <=16) {$st5='M'; $siap++;}
				if($siap==5){
				$kesimpulan='KESIMPULAN : MEMENUHI SYARAT UU';
				}
			}else{
				$page_parameter['s1'] = $pendidikan;
				$page_parameter['s2'] = $penelitian;
				if($pendidikan>0){$st1='M';$siap++;}
				if($penelitian>=0){$st2='M';$siap++;}
				$s3=$pendidikan+$penelitian;
				$s4=$pengabidan+$penunjang;
				if($s3>=9){$st3='M';$siap++;}
				if($s4>=0){$st4='M';$siap++;}
				$page_parameter['s3'] = $s3;
				$page_parameter['s4'] = $s4;
				$s5=$s3+$s4;
				$page_parameter['s5'] = $s5;
				if($s5>=12 && $s5 <=16) {$st5='M'; $siap++;}
				if($siap==5){
				$kesimpulan='KESIMPULAN : MEMENUHI SYARAT UU';
				}
			}
			if($st5=='M' || $st5=='T'){
			$res = $this->bkd_model->get_data_by('bkd', $id, 'user_id');
				 if(is_array($res) && empty($res)) {
					$bkd['user_id']=$id;
					$bkd['approval1']='review';
					$bkd['status']='Approval1';
					$this->bkd_model->insertRow('bkd',$bkd);
					$this->session->set_flashdata('messagePr', 'BKD Berhasil disubmit');

					redirect(base_url() . 'kesimpulan/', 'refresh');
				 }else{
					$update['status']='Approval1';
					$this->bkd_model->updateRow('bkd', 'id', $res[0]->id, $update);	
					$this->session->set_flashdata('messagePr', 'BKD Berhasil direvisi');

					redirect(base_url() . 'kesimpulan/', 'refresh');
				 }
			}else{
				
			$this->session->set_flashdata('messagePr', 'Syarat Belum Lengkap');

			redirect(base_url() . 'kesimpulan/', 'refresh');
			}
			$page_parameter['st1'] = $st1;
			$page_parameter['st2'] = $st2;
			$page_parameter['st3'] = $st3;
			$page_parameter['st4'] = $st4;
			$page_parameter['st5'] = $st5;
			$page_parameter['kesimpulan'] = $kesimpulan;
			
			$this->load->view("include/header");
			$this->load->view('index',$page_parameter);                
			$this->load->view("include/footer");
		}else{
		redirect( base_url(), 'refresh');
		}
  }
		public function view($param1=''){
        $id = $param1;
		$type=$this->input->post('type');
		$pipt=$this->input->post('pipt');
		$pikop=$this->input->post('pikop');
		
		$user_data = $this->User_model->get_users($id);
		$pendidikan = $this->pendidikan_model->get_skspendidikan($id);
		$penelitian = $this->penelitian_model->get_skspenelitian($id);
		$pengabidan = $this->pengabdian_model->get_skspengabdian($id);
		$penunjang = $this->penunjang_model->get_skspenunjang($id);
		
		$st1='T';
		$st2='T';
		$st3='T';
		$st4='T';
		$st5='T';
		$siap=0;
		$kesimpulan='KESIMPULAN : TIDAK MEMENUHI SYARAT UU';
		
		if(count($user_data)>0){
			$page_parameter['user_data'] = $user_data;
			$tipe=$page_parameter['user_data'][0]->katdos;
			if($tipe=='DS'){
				$page_parameter['s1'] = $pendidikan;
				$page_parameter['s2'] = $penelitian;
				if($pendidikan>3){$st1='M';$siap++;}
				if($penelitian>0){$st2='M';$siap++;}
				$s3=$pendidikan+$penelitian;
				$s4=$pengabidan+$penunjang;
				if($s3>=9){$st3='M';$siap++;}
				if($s4>=0){$st4='M';$siap++;}
				$page_parameter['s3'] = $s3;
				$page_parameter['s4'] = $s4;
				$s5=$s3+$s4;
				$page_parameter['s5'] = $s5;
				if($s5>=12 && $s5 <=16) {$st5='M'; $siap++;}
				if($siap==5){
				$kesimpulan='KESIMPULAN : MEMENUHI SYARAT UU';
				}
			}else{
				$page_parameter['s1'] = $pendidikan;
				$page_parameter['s2'] = $penelitian;
				if($pendidikan>0){$st1='M';$siap++;}
				if($penelitian>=0){$st2='M';$siap++;}
				$s3=$pendidikan+$penelitian;
				$s4=$pengabidan+$penunjang;
				if($s3>=9){$st3='M';$siap++;}
				if($s4>=0){$st4='M';$siap++;}
				$page_parameter['s3'] = $s3;
				$page_parameter['s4'] = $s4;
				$s5=$s3+$s4;
				$page_parameter['s5'] = $s5;
				if($s5>=12 && $s5 <=16) {$st5='M'; $siap++;}
				if($siap==5){
				$kesimpulan='KESIMPULAN : MEMENUHI SYARAT UU';
				}
			}
			$page_parameter['st1'] = $st1;
			$page_parameter['st2'] = $st2;
			$page_parameter['st3'] = $st3;
			$page_parameter['st4'] = $st4;
			$page_parameter['st5'] = $st5;
			$page_parameter['kesimpulan'] = $kesimpulan;
			
			$page_parameter['pipt'] = $pipt;
			$page_parameter['pikop'] = $pikop;
			
			$noass1=$page_parameter['user_data'][0]->noass1;
			$noass2=$page_parameter['user_data'][0]->noass2;
			if($noass1>0){
			$page_parameter['ass1']=$this->User_model->get_data_by('users',$noass1,'users_id');
			}
			if($noass2>0){
			$page_parameter['ass2']=$this->User_model->get_data_by('users',$noass2,'users_id');
			}
			if($type=='Download'){
	    	$this->load->helper(array('dompdf', 'file'));

			$html = $this->load->view('laporan', $page_parameter,true);

			$rand = substr(md5(microtime()),rand(0,26),5);

			$name='Kesimpulan';
			pdf_create($html, $name.'-'.$rand);
			}else{
			//view as html
			$this->load->view('laporan',$page_parameter);                
			}
		}else{
		redirect( base_url(), 'refresh');
		}
	}
	public function cetak(){
		if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->users_id;
        }
		$type=$this->input->post('type');
		$pipt=$this->input->post('pipt');
		$pikop=$this->input->post('pikop');
		
		$user_data = $this->User_model->get_users($id);
		$pendidikan = $this->pendidikan_model->get_skspendidikan($id);
		$penelitian = $this->penelitian_model->get_skspenelitian($id);
		$pengabidan = $this->pengabdian_model->get_skspengabdian($id);
		$penunjang = $this->penunjang_model->get_skspenunjang($id);
		
		$st1='T';
		$st2='T';
		$st3='T';
		$st4='T';
		$st5='T';
		$siap=0;
		$kesimpulan='KESIMPULAN : TIDAK MEMENUHI SYARAT UU';
		
		if(count($user_data)>0){
			$page_parameter['user_data'] = $user_data;
			$tipe=$page_parameter['user_data'][0]->katdos;
			if($tipe=='DS'){
				$page_parameter['s1'] = $pendidikan;
				$page_parameter['s2'] = $penelitian;
				if($pendidikan>3){$st1='M';$siap++;}
				if($penelitian>0){$st2='M';$siap++;}
				$s3=$pendidikan+$penelitian;
				$s4=$pengabidan+$penunjang;
				if($s3>=9){$st3='M';$siap++;}
				if($s4>=0){$st4='M';$siap++;}
				$page_parameter['s3'] = $s3;
				$page_parameter['s4'] = $s4;
				$s5=$s3+$s4;
				$page_parameter['s5'] = $s5;
				if($s5>=12 && $s5 <=16) {$st5='M'; $siap++;}
				if($siap==5){
				$kesimpulan='KESIMPULAN : MEMENUHI SYARAT UU';
				}
			}else{
				$page_parameter['s1'] = $pendidikan;
				$page_parameter['s2'] = $penelitian;
				if($pendidikan>0){$st1='M';$siap++;}
				if($penelitian>=0){$st2='M';$siap++;}
				$s3=$pendidikan+$penelitian;
				$s4=$pengabidan+$penunjang;
				if($s3>=9){$st3='M';$siap++;}
				if($s4>=0){$st4='M';$siap++;}
				$page_parameter['s3'] = $s3;
				$page_parameter['s4'] = $s4;
				$s5=$s3+$s4;
				$page_parameter['s5'] = $s5;
				if($s5>=12 && $s5 <=16) {$st5='M'; $siap++;}
				if($siap==5){
				$kesimpulan='KESIMPULAN : MEMENUHI SYARAT UU';
				}
			}
			$page_parameter['st1'] = $st1;
			$page_parameter['st2'] = $st2;
			$page_parameter['st3'] = $st3;
			$page_parameter['st4'] = $st4;
			$page_parameter['st5'] = $st5;
			$page_parameter['kesimpulan'] = $kesimpulan;
			
			$page_parameter['pipt'] = $pipt;
			$page_parameter['pikop'] = $pikop;
			
			$noass1=$page_parameter['user_data'][0]->noass1;
			$noass2=$page_parameter['user_data'][0]->noass2;
			if($noass1>0){
			$page_parameter['ass1']=$this->User_model->get_data_by('users',$noass1,'users_id');
			}
			if($noass2>0){
			$page_parameter['ass2']=$this->User_model->get_data_by('users',$noass2,'users_id');
			}
			if($type=='Download'){
	    	$this->load->helper(array('dompdf', 'file'));

			$html = $this->load->view('laporan', $page_parameter,true);

			$rand = substr(md5(microtime()),rand(0,26),5);

			$name='Kesimpulan';
			pdf_create($html, $name.'-'.$rand);
			}else{
			//view as html
			$this->load->view('laporan',$page_parameter);                
			}
		}else{
		redirect( base_url(), 'refresh');
		}
	}
	
	public function addfile($param1 ='') {
			if($param1=='upload'){
				if(!isset($bid) || $bid == '') {
					$bid = $this->session->userdata ('user_details')[0]->users_id;
				}
				$config['upload_path'] = './upload/';

				$config['allowed_types'] = 'jpeg|jpg|png|doc|pdf|xls|ppt|csv|docx|xlsx';
				$this->load->library('upload', $config);

				$img = array("jpeg", "jpg", "png");

				if($this->upload->do_upload('files')){

					$upload['files'] = $this->upload->data();

				$file = './upload/'.$upload['files']['file_name'];

				$file_ext = pathinfo($upload['files']['file_name'],PATHINFO_EXTENSION);
				
				if(in_array($file_ext,$img)){
				$config['image_library'] = 'gd2';

				$config['source_image'] = $file;

				$config['create_thumb'] = TRUE;

				$config['maintain_ratio'] = TRUE;

				$config['width'] = 200;

				$config['height'] = 200;

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				}

				$filebkd = $this->bkd_model->get_data_by2('file',$bid,'id_modul','hasil','modul'); 
				$data['id_modul']=$bid;
				$data['modul']='hasil';
				
				$data['filename'] = $upload['files']['file_name'];

				$data['fileurl'] = 'upload/'.$upload['files']['file_name'];

				if(count($filebkd)>0){
				$this->file_model->updateRow('file', 'id', $bid, $data);	
				
				$this->session->set_flashdata('messagePr', 'Update File Baru Sukses');
				}else{
				$this->file_model->insertRow('file',$data);
				$this->session->set_flashdata('messagePr', 'Penambahan File Baru Sukses');
				}

				redirect(base_url() . 'kesimpulan/', 'refresh');
				}else{
				$this->session->set_flashdata('messagePr', 'Penambahan File Baru Gagal');

				redirect(base_url() . 'kesimpulan/', 'refresh');
				}
			}else{
            $this->session->set_flashdata('messagePr', 'Wrong Method');

			redirect(base_url() . 'kesimpulan/', 'refresh');
			}
        } 
}
?>