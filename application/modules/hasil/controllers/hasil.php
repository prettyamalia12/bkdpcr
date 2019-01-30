<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class hasil extends CI_Controller {

    function __construct() {
        parent::__construct(); 
        $this->load->model('bkd_model');
        $this->load->model('file_model');			
		$this->load->model('penelitian_model');
		$this->load->model('pendidikan_model');
		$this->load->model('pengabdian_model');
		$this->load->model('penunjang_model');
		$this->load->model('User_model');
		 $this->user_id = isset($this->session->get_userdata()['user_details'][0]->users_id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
    }

    /**
      * This function is redirect to users profile page
      * @return Void
      */
    public function index() {
		  if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->users_id;
        }else{
			redirect( base_url(), 'refresh');
		}
		/*
		$page_parameter['enable'] = false;
		$page_parameter['submit'] = false;
		$page_parameter['bid'] = 0;
		$user_data = $this->User_model->get_users($id);
		$bkd_data = $this->bkd_model->get_data_by('bkd',$id,'user_id'); 
		if(count($bkd_data)>0){
		$status=$bkd_data[0]->status;
		$page_parameter['bid'] =$bkd_data[0]->id;
			$filebkd = $this->bkd_model->get_data_by2('file',$id,'id_modul','hasil','modul'); 
			if($status=='Reject'||$status=='FileReject'){
				//sudah diapprove ke 2 asesor
				$page_parameter['enable'] = true;
				if(count($filebkd)>0){
					//sudah mengupload file
					$page_parameter['submit'] = true;
				}
			}
		}else{
			$filebkd = $this->bkd_model->get_data_by2('file',$id,'id_modul','hasil','modul'); 
				if(count($filebkd)>0){
					//sudah mengupload file
					$page_parameter['submit'] = true;
				}
				$page_parameter['enable'] = true;
		}
				if(is_array($bkd_data) && empty($bkd_data)) {
				}else{
				$page_parameter['bkd'] = $bkd_data;
				}
				*/
            $this->load->view('include/header');
//            $this->load->view('file_table',$page_parameter);
            $this->load->view('file_table');
            $this->load->view('include/footer');   
        } 
	
    
        public function delete($id){
 
        $ids = explode('-', $id);
        foreach ($ids as $id) {
            $this->file_model->delete($id); 
        }
       redirect(base_url().'hasil/index', 'refresh');
    }
	public function deletefile($id){
 
        $ids = explode('-', $id);
        foreach ($ids as $id) {
            $this->file_model->delete($id); 
        }
		$this->session->set_flashdata('messagePr', 'Sukses Menghapus File');
       redirect(base_url().'hasil/index', 'refresh');
    }
	public function ceksyarat(){
		if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->users_id;
        
			$user_data = $this->User_model->get_users($id);
			$pendidikan = $this->pendidikan_model->get_skspendidikan($id);
			$penelitian = $this->penelitian_model->get_skspenelitian($id);
			$pengabidan = $this->pengabdian_model->get_skspengabdian($id);
			$penunjang = $this->penunjang_model->get_skspenunjang($id);
			$siap=0;
			
			if(count($user_data)>0){
				$usrdata = $user_data;
				$tipe=$usrdata[0]->katdos;
				if($tipe=='DS'){
					if($pendidikan>3){$siap++;}
					if($penelitian>0){$siap++;}
					$s3=$pendidikan+$penelitian;
					$s4=$pengabidan+$penunjang;
					if($s3>=9){$siap++;}
					if($s4>=0){$siap++;}
					$s5=$s3+$s4;
					if($s5>=12 && $s5 <=16) {$siap++;}
					if($siap==5){
					return true;
					}
				}else{
					if($pendidikan>0){$siap++;}
					if($penelitian>=0){$siap++;}
					$s3=$pendidikan+$penelitian;
					$s4=$pengabidan+$penunjang;
					if($s3>=9){$siap++;}
					if($s4>=0){$siap++;}
					$s5=$s3+$s4;
					if($s5>=12 && $s5 <=16) {$st5='M'; $siap++;}
					if($siap==5){
						return true;
					}
				}
			}
		}else{
		return false;
		}
	}
	 public function submitfile($param1=''){
		if(!isset($id) || $id == '') {
            $id = $this->user_id;
        }else{
			redirect( base_url(), 'refresh');
		}
		$bid=$param1;
		$syarat=$this->ceksyarat();
		$syarat=true;
			if($bid>0){
			//update
			$bkd=$this->bkd_model->get_data_by('bkd',$bid,'id'); 
			$users =$this->User_model->get_users($bkd[0]->user_id);
            $filebkd = $this->bkd_model->get_data_by2('file',$id,'id_modul','hasil','modul'); 
			if(count($bkd)==0 && $syarat && count($filebkd)>0){
				$bkd['user_id']=$id;
				$bkd['approval1']='review';
				$bkd['status']='Approval1';
				$this->bkd_model->insertRow('bkd',$bkd);
				$this->session->set_flashdata('messagePr', 'Submit BKD Sukses');

				redirect(base_url() . 'hasil/', 'refresh');
			}else if(count($filebkd)>0 && $bkd[0]->status=='Reject') {
				$update['status']='Approval1';
				$this->bkd_model->updateRow('bkd', 'id', $bid, $update);	
				$this->session->set_flashdata('messagePr', 'Submit BKD Sukses');

				redirect(base_url() . 'hasil/', 'refresh');
			}else{
			$this->session->set_flashdata('messagePr', 'Data BKD tidak ditemukan');

			redirect(base_url() . 'hasil/', 'refresh');
			}
		  }else{
			 $filebkd = $this->bkd_model->get_data_by2('file',$id,'id_modul','hasil','modul'); 
			 if($syarat && count($filebkd)>0){
				$bkd['user_id']=$id;
				$bkd['approval1']='review';
				$bkd['status']='Approval1';
				$this->bkd_model->insertRow('bkd',$bkd);
				$this->session->set_flashdata('messagePr', 'Submit BKD Sukses');

				redirect(base_url() . 'hasil/', 'refresh');
			}else{
				 $this->session->set_flashdata('messagePr', 'Submit BKD Gagal');

				redirect(base_url() . 'hasil/', 'refresh');
			}
		  }
		}
	public function fileTable(){
		 if(!isset($bid) || $bid == '') {
            $bid = $this->session->userdata ('user_details')[0]->users_id;
        }
        $table = 'file';
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array( 'db' => 'id', 'dt' => 1 ),
            array( 'db' => 'filename', 'dt' => 2 ),
            array( 'db' => 'fileurl', 'dt' => 3 ),
            array( 'db' => 'id', 'dt' =>4 ),
        );
		$where=" modul='data' and id_modul='".$bid."'";

		$sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
       
        $output_arr = SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, $where);
		$num=0;
        foreach ($output_arr['data'] as $key => $value) {
			$num++;
			$output_arr['data'][$key][1]=$num;
			$output_arr['data'][$key][3]=base_url().'upload/'.$output_arr['data'][$key][3];
			
            $id = $output_arr['data'][$key][count($output_arr['data'][$key])  - 1];
            $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] = '';
 
            $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a target="_blank" href="'.base_url().'upload/'.$output_arr['data'][$key][2].'"><button type="button" class="btn-sm  btn btn-success modalButtonPengabdian" ><i class="fa fa-file"></i>  Open File</button></a>';
            
			//$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="delFile('.$id.',\'hasil\')" data-target="#cnfrm_delete" title="delete"><button type="button" class="btn-sm  btn btn-danger modalButtonPendidikan" ><i class="fa fa-trash-o" ></i>  Delete File</button></a>';
            
            $output_arr['data'][$key][0] = '<input type="checkbox" name="selData" value="'.$output_arr['data'][$key][0].'">';
			}
        
        echo json_encode($output_arr);
    }
	
	public function addfile($param1 ='',$param2='') {
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

				$data['id_modul']=$bid;
				$data['modul']='data';
				
				$data['filename'] = $upload['files']['file_name'];

				$data['fileurl'] = 'upload/'.$upload['files']['file_name'];


				$this->file_model->insertRow('file',$data);
				

				$this->session->set_flashdata('messagePr', 'Penambahan File Baru Sukses');

				redirect(base_url() . 'hasil/', 'refresh');
				}else{
				$this->session->set_flashdata('messagePr', 'Penambahan File Baru Gagal');

				redirect(base_url() . 'hasil/', 'refresh');
				}
			}else{
            $this->load->view('include/header');
			$page_parameter['Title'] = "Tambah File ";
			$page_parameter['id'] = $param1;
            $this->load->view('add_file',$page_parameter);                
            $this->load->view('include/footer');   
			}
        } 
		
}
?>