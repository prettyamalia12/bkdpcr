<?php defined("BASEPATH") OR exit("No direct script access allowed");

class import extends CI_Controller {

  function __construct() {
    parent::__construct();
     $this->load->model('import_model');
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
  public function upload(){
		$userid = $this->session->userdata ('user_details')[0]->users_id;
		$jumimport=0;
	    
		
		$config['upload_path'] = './FileBKD/';
		$config['allowed_types'] = 'mdb|mde';
		$config['file_name'] = 'BKDimport.mdb';
		$config['max_size'] = '500000'; 
        $this->load->library('upload', $config);
		$path="./FileBKD/BKDimport.mdb";
		@unlink($path); 

		if($this->upload->do_upload('import')){
		
			$upload['files'] = $this->upload->data();

			$file = './FileBKD/'.$upload['files']['file_name'];

			if($upload['files']['file_name']!='BKDimport.mdb'){
				move_uploaded_file($upload["files"]["file_name"], "./FileBKD/BKDimport.mdb");
			}
			
		//MDOS->dosen,NIRA->ASESOR,TRAJAR->pendidikan,TRLAIN->penunjang,TRPBM-pengabdian,TRPEN->penelitian,TRPROF->prof
		$this->db2  = $this->load->database('import', TRUE);
		
		//dosen->MDOS
		$this->db2->select('*');
		$this->db2->from('MDOS');
		$query = $this->db2->get();
		$res=$query->result();
		
		//$this->import_model->delete('dosen'); 
		foreach($res as $r){
		if(empty($r->TGLHR))$tgllhr='0000-00-00';else $tgllhr=$r->TGLHR;
		
		$data = array(
		   'noserti' => $r->NOSERTI ,
		   'nipdos' => $r->NIPDOS ,
		   'name' => $r->NMDOS ,
		   'nmpt' => $r->NMPT ,
		   'nidn' => $r->NIDN ,
		   'ALMPT' => $r->ALMPT ,
		   'FAKDOS' => $r->FAKDOS ,
		   'PRODIDOS' => $r->PRODIDOS ,
		   'PANGKAT' => $r->PANGKAT ,
		   'GOL' => $r->GOL ,
		   'TGLHR' => $tgllhr ,
		   'TPLHR' => $r->TPLHR ,
		   'PTS1' => $r->PTS1 ,
		   'PTS2' => $r->PTS2 ,
		   'PTS3' => $r->PTS3 ,
		   'SMTPT' => $r->SMTPT ,
		   'KATDOS' => $r->KATDOS ,
		   'BIDILDOS' => $r->BIDILDOS ,
		   'NOHP' => $r->NOHP ,
		   'NOASS1' => $r->NOASS1 ,
		   'NMASS1' => $r->NMASS1 ,
		   'NOASS2' => $r->NOASS2 ,
		   'NMASS2' => $r->NMASS2 
		);
			if($this->import_model->check_exists('dosen','NIPDOS',$r->NIPDOS)){
				$jumimport++;
				$this->import_model->insertRow('dosen',$data);
			}
		}
		//NIRA->ASESOR
		$this->db2->select('*');
		$this->db2->from('NIRA');
		$query = $this->db2->get();
		$res=$query->result();
		
		$this->import_model->deleteall('asesor'); 
		foreach($res as $r){
		$nama=trim(preg_replace('/[^a-zA-Z0-9\s,.]/', '', str_replace("'"," ",$r->NAMA)));
		$data = array(
		   "NAMA" => $nama ,
		   'PT' => str_replace("'"," ",$r->PT) ,
		   'RUMPUN' => $r->RUMPUN ,
		   'ILMU' => $r->ILMU ,
		   'NIRA' => $r->NIRA 
		);
			if($this->import_model->check_exists('asesor','NIRA',$r->NIRA)){
				$jumimport++;
				$this->import_model->insertRow('asesor',$data);
			}
		}
		//TRAJAR->pendidikan
		$this->db2->select('*');
		$this->db2->from('TRAJAR');
		$query = $this->db2->get();
		$res=$query->result();
		
		//$this->import_model->delete('pendidikan'); 
		foreach($res as $r){
		
		$data = array(
		   'nama_kegiatan' => $r->NMPEND,
		   'bebankerja_bukti' => $r->BUKTIPEND ,
		   'bebankerja_sks' => $r->SKSPEND ,
		   'masa_penugasan' => $r->MASAPEND , 
		   'kinerja_bukti' => $r->DOKPEND , 
		   'kinerja_sks' => $r->SKSPEND2 , 
		   'rekomendasi' => $r->REKPEND	 , 
		   'no' => $r->IDTRAJAR , 
		   'user_id' => $userid , 
		   'jenis_kegiatan' => $r->JNS_AJAR 
		);
			if($this->import_model->check_exists('pendidikan','nama_kegiatan',$r->NMPEND)){
				$jumimport++;
				$this->import_model->insertRow('pendidikan',$data);
			}
		}
		
		//TRLAIN->penunjang
		
		$this->db2->select('*');
		$this->db2->from('TRLAIN');
		$query = $this->db2->get();
		$res=$query->result();
		
		//$this->import_model->delete('penunjang'); 
		foreach($res as $r){
		
		$data = array(
		   'nama_kegiatan' => $r->NMLAIN,
		   'bebankerja_bukti' => $r->BUKTILAIN ,
		   'bebankerja_sks' => $r->SKSLAIN,
		   'masa_penugasan' => $r->MASALAIN , 
		   'kinerja_bukti' => $r->DOKLAIN , 
		   'kinerja_sks' => $r->SKSLAIN2 , 
		   'rekomendasi' => $r->REKLAIN	 , 
		   'no' => $r->IDTRLAIN , 
		   'user_id' => $userid , 
		   'jenis_kegiatan' => $r->JNS_LAIN 
		);

			if($this->import_model->check_exists('penunjang','nama_kegiatan',$r->NMLAIN)){
				$jumimport++;
				$this->import_model->insertRow('penunjang',$data);
			}
		}
		
		//TRPBM-pengabdian
		
		$this->db2->select('*');
		$this->db2->from('TRPBM');
		$query = $this->db2->get();
		$res=$query->result();
		
		//$this->import_model->delete('pengabdian'); 
		foreach($res as $r){
		
		$data = array(
		   'nama_kegiatan' => $r->NMPBM,
		   'bebankerja_bukti' => $r->BUKTIPBM ,
		   'bebankerja_sks' => $r->SKSPBM,
		   'masa_penugasan' => $r->MASAPBM , 
		   'kinerja_bukti' => $r->DOKPBM , 
		   'kinerja_sks' => $r->SKSPBM2 , 
		   'rekomendasi' => $r->REKPBM	 , 
		   'no' => $r->IDTRPBM , 
		   'user_id' => $userid , 
		   'jenis_kegiatan' => $r->JNS_PBM 
		);
			if($this->import_model->check_exists('pengabdian','nama_kegiatan',$r->NMPBM)){
				$jumimport++;
				$this->import_model->insertRow('pengabdian',$data);
			}
		}
		
		//TRPEN->penelitian
		$this->db2->select('*');
		$this->db2->from('TRPEN');
		$query = $this->db2->get();
		$res=$query->result();
		
		//$this->import_model->delete('penelitian'); 
		foreach($res as $r){
		
		$data = array(
		   'nama_kegiatan' => $r->NMPEN,
		   'bebankerja_bukti' => $r->BUKTIPEN ,
		   'bebankerja_sks' => $r->SKSPEN,
		   'masa_penugasan' => $r->MASAPEN , 
		   'kinerja_bukti' => $r->DOKPEN , 
		   'kinerja_sks' => $r->SKSPEN2 , 
		   'rekomendasi' => $r->REKPEN	 , 
		   'no' => $r->IDTRPEN , 
		   'user_id' => $userid , 
		   'jenis_kegiatan' => $r->JNS_PEN 
		);
			if($this->import_model->check_exists('penelitian','nama_kegiatan',$r->NMPEN)){
				$jumimport++;
				$this->import_model->insertRow('penelitian',$data);
			}
		}
		
		//TRPROF->profesor
		$this->db2->select('*');
		$this->db2->from('TRPROF');
		$query = $this->db2->get();
		$res=$query->result();
		
		//$this->import_model->delete('profesor'); 
		foreach($res as $r){
		
		$data = array(
		   'nama_kegiatan' => $r->NMPROF,
		   'bebankerja_bukti' => $r->BUKTIPROF ,
		   'bebankerja_sks' => $r->SKSPROF,
		   'masa_penugasan' => $r->MASAPROF , 
		   'kinerja_bukti' => $r->DOKPROF , 
		   'kinerja_sks' => $r->SKSPROF2 , 
		   'rekomendasi' => $r->REKPROF	 , 
		   'no' => $r->IDTRPROF , 
		   'user_id' => $userid , 
		   'jenis_kegiatan' => $r->JNS
		);
			if($this->import_model->check_exists('profesor','nama_kegiatan',$r->NMPROF)){
				$jumimport++;
				$this->import_model->insertRow('profesor',$data);
			}
		}
		$this->db2->close();


		$this->session->set_flashdata('messagePr', 'Import FIle Sukses: '.$jumimport.' Data imported');

		redirect(base_url() . 'import/', 'refresh');
		
		}else{

		 $error = array('error' => $this->upload->display_errors());
		//$this->session->set_flashdata('error',$error['error']);
		$this->session->set_flashdata('messagePr', $error['error']);
		//$this->session->set_flashdata('messagePr', 'File Tidak Dikenali');


		redirect(base_url() . 'import/', 'refresh');

		}
		$this->load->view("include/header");
		$this->load->view("index");
		$this->load->view("include/footer");
  }
  public function clear(){
		$userid = $this->session->userdata ('user_details')[0]->users_id;
		//$this->import_model->deleteall('dosen'); 
		//$this->import_model->deleteall('asesor'); 
		$this->import_model->delete('pendidikan',$userid); 
		$this->import_model->delete('penunjang',$userid); 
		$this->import_model->delete('pengabdian',$userid); 
		$this->import_model->delete('penelitian',$userid); 
		$this->import_model->delete('profesor',$userid); 
		$this->load->view("include/header");
		$this->load->view("index");
		$this->load->view("include/footer");
  }
  public function export2(){

		$this->db2  = $this->load->database('access', TRUE);
		$this->db2->select('*');
		$this->db2->from('IVERSI');
		$query = $this->db2->get();
		$res=$query->result();
		foreach($res as $r){
		var_dump($r);
		echo '<br/>';
		}
		$this->db2->select('*');
		$this->db2->from('MDOS');
		$query = $this->db2->get();
		$res=$query->result();
		foreach($res as $r){
		var_dump($r);
		echo '<br/>';
		}
		$this->db2->close();
  }
  public function export(){

		$this->db2  = $this->load->database('access', TRUE);
		
		//IVERSI->users
		$res = $this->import_model->get_data_by('users');
		foreach($res as $r){
			$query = $this->db2->get_where('iversi', array('user_id' => $r->username));
			$dt=$query->result();
			
			if(count($dt)>0){

			}else{
			$data = array(
			   'IVERSI' => '2015'.$r->users_id ,
			   'USER_ID' => $r->username,
			   'USER_PWD' => '12345678' ,
			   'QLOGIN' => $r->users_id
				);
			$this->db2->insert('IVERSI', $data); 
			}
		}
		//MDOS->users
		$res = $this->import_model->get_data_by('users');
		foreach($res as $r){
			$query = $this->db2->get_where('MDOS', array('noserti' => $r->noserti));
			$dt=$query->result();
			
			if(count($dt)>0){

			}else{
				if(empty($r->TGLHR))$tgllhr='0000-00-00';else $tgllhr=$r->TGLHR;
				
//				$data = array(
//				   'NOSERTI' => $r->noserti ,
//				   'NIPDOS' => $r->nipdos ,
//				   'NMDOS' => $r->name ,
//				   'NMPT' => $r->nmpt ,
//				   'NIDN' => $r->nidn ,
//				   'ALMPT' => $r->almpt ,
//				   'FAKDOS' => $r->fakdos ,
//				   'PRODIDOS' => $r->prodidos ,
//				   'PANGKAT' => $r->pangkat ,
//				   'GOL' => $r->gol ,
//				   'TGLHR' => $tgllhr ,
//				   'TPLHR' => $r->tplhr ,
//				   'PTS1' => $r->pts1 ,
//				   'PTS2' => $r->pts2 ,
//				   'PTS3' => $r->pts3 ,
//				   'SMTPT' => $r->smtpt ,
//				   'KATDOS' => $r->katdos ,
//				   'BIDILDOS' => $r->bidildos ,
//				   'NOHP' => $r->nohp ,
//				   'NOASS1' => $r->noass1 ,
//				   'NMASS1' => $r->nmass1 ,
//				   'NOASS2' => $r->noass2 ,
//				   'NMASS2' => $r->nmass2 
//				);
//			$this->db2->insert('MDOS', $data); 
				
			}
		}
		
		
		//TRAJAR->pendidikan
		$res = $this->import_model->get_data_by('pendidikan');
		$this->db2->empty_table('TRAJAR'); 
		foreach($res as $r){
		
		$data = array(
		   'NOPEND' => 0 ,
		   'NMPEND' => $r->nama_kegiatan,
		   'BUKTIPEND' => $r->bebankerja_bukti ,
		   'SKSPEND' => $r->bebankerja_sks ,
		   'MASAPEND' => $r->masa_penugasan , 
		   'DOKPEND' => $r->kinerja_bukti , 
		   'SKSPEND2' => $r->kinerja_sks , 
		   'REKPEND' => $r->rekomendasi	 , 
		   'IDTRAJAR' => $r->no , 
		   'X' => 'X' , 
		   'X2' => 'A' ,
		   'JNS_AJAR' => $r->jenis_kegiatan 
		);

		$this->db2->insert('TRAJAR', $data); 
		}
		//TRLAIN->penunjang
		$res = $this->import_model->get_data_by('penunjang');
		$this->db2->empty_table('TRLAIN'); 
		foreach($res as $r){
		
		$data = array(
		   'NOLAIN' => 0 ,
		   'NMLAIN' => $r->nama_kegiatan,
		   'BUKTILAIN' => $r->bebankerja_bukti ,
		   'SKSLAIN' => $r->bebankerja_sks ,
		   'MASALAIN' => $r->masa_penugasan , 
		   'DOKLAIN' => $r->kinerja_bukti , 
		   'SKSLAIN2' => $r->kinerja_sks , 
		   'REKLAIN' => $r->rekomendasi	 , 
		   'IDTRLAIN' => $r->no , 
		   'JNS_LAIN' => $r->jenis_kegiatan 
		);

		$this->db2->insert('TRLAIN', $data); 
		}
		//TRPBM-pengabdian
		$res = $this->import_model->get_data_by('pengabdian');
		$this->db2->empty_table('TRPBM'); 
		foreach($res as $r){
		
		$data = array(
		   'NOPBM' => 0 ,
		   'NMPBM' => $r->nama_kegiatan,
		   'BUKTIPBM' => $r->bebankerja_bukti ,
		   'SKSPBM' => $r->bebankerja_sks ,
		   'MASAPBM' => $r->masa_penugasan , 
		   'DOKPBM' => $r->kinerja_bukti , 
		   'SKSPBM2' => $r->kinerja_sks , 
		   'REKPBM' => $r->rekomendasi	 , 
		   'IDTRPBM' => $r->no , 
		   'JNS_PBM' => $r->jenis_kegiatan 
		);

		$this->db2->insert('TRPBM', $data); 
		}
		//TRPEN->penelitian
		$res = $this->import_model->get_data_by('penelitian');
		$this->db2->empty_table('TRPEN'); 
		foreach($res as $r){
		
		$data = array(
		   'NOPEN' => 0 ,
		   'NMPEN' => $r->nama_kegiatan,
		   'BUKTIPEN' => $r->bebankerja_bukti ,
		   'SKSPEN' => $r->bebankerja_sks ,
		   'MASAPEN' => $r->masa_penugasan , 
		   'DOKPEN' => $r->kinerja_bukti , 
		   'SKSPEN2' => $r->kinerja_sks , 
		   'REKPEN' => $r->rekomendasi	 , 
		   'IDTRPEN' => $r->no , 
		   'X' => 'X' , 
		   'X2' => 'B' , 
		   'JNS_PEN' => $r->jenis_kegiatan 
		);

		$this->db2->insert('TRPEN', $data); 
		}
		//TRPROF->profesor
		$res = $this->import_model->get_data_by('profesor');
		$this->db2->empty_table('TRPROF'); 
		foreach($res as $r){
		
		$data = array(
		   'NOPROF' => 0 ,
		   'NMPROF' => $r->nama_kegiatan,
		   'BUKTIPROF' => $r->bebankerja_bukti ,
		   'SKSPROF' => $r->bebankerja_sks ,
		   'MASAPROF' => $r->masa_penugasan , 
		   'DOKPROF' => $r->kinerja_bukti , 
		   'SKSPROF2' => $r->kinerja_sks , 
		   'REKPROF' => $r->rekomendasi	 , 
		   'IDTRPROF' => $r->no , 
		   'JNS' => $r->jenis_kegiatan 
		);

		$this->db2->insert('TRPROF', $data); 
		}
		$this->db2->close();
		
		redirect(base_url().'FileBKD/BKDDB.mdb', 'refresh');
  }
}
?>