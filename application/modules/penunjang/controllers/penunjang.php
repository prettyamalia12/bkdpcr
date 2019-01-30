<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class penunjang extends CI_Controller {

    function __construct() {
        parent::__construct(); 
        $this->load->model('penunjang_model');
        $this->load->model('file_model');
        $this->penunjang_id = isset($this->session->get_penunjangdata()['penunjang_details'][0]->id)?$this->session->get_penunjangdata()['penunjang_details'][0]->no:'1';
    $this->load->model('User_model');
    $this->user_id = isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
    }

    /**
      * This function is redirect to users profile page
      * @return Void
      */
    public function index() {
            $this->load->view('include/header');
            $this->load->view('penunjang_table');                
            $this->load->view('include/footer');   
        } 

    
    /**
     * This function is used to create datatable in users list page
     * @return Void
     */
    public function dataTable (){
        $table = 'penunjang';
        $primaryKey = 'no';
        $columns = array(
            array( 'db' => 'no', 'dt' => 0 ),
            array( 'db' => 'no', 'dt' => 1 ),
            array( 'db' => 'nama_kegiatan', 'dt' => 2 ),
            array( 'db' => 'jenis_kegiatan', 'dt' => 3 ),
            array( 'db' => 'bebankerja_bukti', 'dt' => 4 ),
            array( 'db' => 'bebankerja_sks', 'dt' => 5 ),
            array( 'db' => 'masa_penugasan', 'dt' => 6 ),
            array( 'db' => 'kinerja_bukti', 'dt' => 7 ),
            array( 'db' => 'kinerja_sks', 'dt' => 8 ),
            array( 'db' => 'rekomendasi', 'dt' => 9 ),
            array( 'db' => 'no', 'dt' => 10 ),
        );

		$userid = $this->session->userdata ('user_details')[0]->users_id;
		$where=" user_id=".$userid;
		$sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
       
        $output_arr = SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, $where);
        foreach ($output_arr['data'] as $key => $value) {
            $id = $output_arr['data'][$key][count($output_arr['data'][$key])  - 1];
            $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] = '';
 
            $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnAddFile" href="'.base_url().'penunjang/file/'.$id.'" type="button" data-src="'.$id.'" title="File"><i class="fa fa-file" data-id=""></i></a>';
            $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" data-toggle="modal" data-target="#nameModal_penunjang" class="modalButtonPenunjang mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
            
            
            $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'penunjang\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';
			
		    $output_arr['data'][$key][0] = '<input type="checkbox" name="selData" value="'.$output_arr['data'][$key][0].'">';
        }
            
        
        echo json_encode($output_arr);
    }

  /**
     * This function is used to show popup of user to add and update
     * @return Void
     */
    public function get_modal() {
        //is_login();
        if($this->input->post('id')){
            $data['penunjangData'] = getDataByid('penunjang',$this->input->post('id'),'no'); 
            echo $this->load->view('add_penunjang', $data, true);
        } else {
            echo $this->load->view('add_penunjang', '', true);
        }
        exit;
    }

    
    /**
     * This function is used to upload file
     * @return Void
     */
    function upload() {
        foreach($_FILES as $name => $fileInfo)
        {
            $filename=$_FILES[$name]['name'];
            $tmpname=$_FILES[$name]['tmp_name'];
            $exp=explode('.', $filename);
            $ext=end($exp);
            $newname=  $exp[0].'_'.time().".".$ext; 
            $config['upload_path'] = 'assets/images/';
            $config['upload_url'] =  base_url().'assets/images/';
            $config['allowed_types'] = "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp";
            $config['max_size'] = '500000'; 
            $config['file_name'] = $newname;
            $this->load->library('upload', $config);
            move_uploaded_file($tmpname,"assets/images/".$newname);
            return $newname;
        }
    }

    public function modal_penunjang() {
        //is_login();
        if($this->input->post('id')){
            $data['penunjangData'] = getDataByid('penunjang',$this->input->post('id'),'no'); 
            echo $this->load->view('add_penunjang', $data, true);
        } else {
            echo $this->load->view('add_penunjang', '', true);
        }
        exit;
    }

    
    public function add_edit($id='') {
			$config['upload_path'] = './upload/';

			$config['allowed_types'] = 'jpeg|jpg|png|doc|pdf|xls|ppt|csv|docx|xlsx';
			$this->load->library('upload', $config);


			$data = $this->input->post();
            if($this->input->post('jenis_kegiatan') != '') {
                        $data['jenis_kegiatan'] = $this->input->post('jenis_kegiatan');
              }
            if($this->input->post('rekomendasi') != '') {
                        $data['rekomendasi'] = $this->input->post('rekomendasi');
              }

        if($id = $this->input->post('id')) {
			
			$update['nama_kegiatan']=$data['nama_kegiatan'];
			$update['jenis_kegiatan']=$data['jenis_kegiatan'];
			$update['bebankerja_sks']=$data['bebankerja_sks'];
			$update['masa_penugasan']=$data['masa_penugasan'];
			$update['kinerja_sks']=$data['kinerja_sks'];
			$update['rekomendasi']=$data['rekomendasi'];
			
				if($this->upload->do_upload('bebankerja_bukti')){
					$files['id_modul']=$id;
					$files['modul']='penunjang';
					$files['filename'] = $_FILES['bebankerja_bukti']['name'];
					$files['fileurl'] = 'upload/'.$_FILES['bebankerja_bukti']['name'];
					$this->file_model->insertRow('file',$files);
					$update['bebankerja_bukti']=$files['filename'];
				}
				if($this->upload->do_upload('kinerja_bukti')){
					$files['id_modul']=$id;
					$files['modul']='penunjang';
					$files['filename'] = $_FILES['kinerja_bukti']['name'];
					$files['fileurl'] = 'upload/'.$_FILES['kinerja_bukti']['name'];

					$this->file_model->insertRow('file',$files);
					$update['kinerja_bukti']=$files['filename'];
				}
			 $this->penunjang_model->updateRow('penunjang', 'no', $id, $update);	

            $this->session->set_flashdata('messagePr', 'Your data updated Successfully..');
            redirect(base_url().'penunjang/', 'refresh'); 
        } else { 
            $userid = $this->session->userdata ('user_details')[0]->users_id;
			$insert['user_id']=$userid;
			$insert['nama_kegiatan']=$data['nama_kegiatan'];
			$insert['jenis_kegiatan']=$data['jenis_kegiatan'];
			$insert['bebankerja_sks']=$data['bebankerja_sks'];
			$insert['masa_penugasan']=$data['masa_penugasan'];
			$insert['kinerja_sks']=$data['kinerja_sks'];
			$insert['rekomendasi']=$data['rekomendasi'];
			
			$id=$this->penunjang_model->insertRow('penunjang',$insert);
				$ins=0;
				if($this->upload->do_upload('bebankerja_bukti')){
					$ins++;
					$files['id_modul']=$id;
					$files['modul']='penunjang';
					$files['filename'] = $_FILES['bebankerja_bukti']['name'];
					$files['fileurl'] = 'upload/'.$_FILES['bebankerja_bukti']['name'];
					$this->file_model->insertRow('file',$files);
					$update['bebankerja_bukti']=$files['filename'];
				}
				if($this->upload->do_upload('kinerja_bukti')){
					$ins++;
					$files['id_modul']=$id;
					$files['modul']='penunjang';
					$files['filename'] = $_FILES['kinerja_bukti']['name'];
					$files['fileurl'] = 'upload/'.$_FILES['kinerja_bukti']['name'];

					$this->file_model->insertRow('file',$files);
					$update['kinerja_bukti']=$files['filename'];
				}
			 if($ins>0)$this->penunjang_model->updateRow('penunjang', 'no', $id, $update);	
			 
            $this->session->set_flashdata('message', 'Your data inserted Successfully..');
            redirect(base_url().'penunjang/', 'refresh'); 
        }
    
    }
        public function delete($id){
 
        $ids = explode('-', $id);
        foreach ($ids as $id) {
            $this->penunjang_model->delete($id); 
        }
       redirect(base_url().'penunjang', 'refresh');
    }

		public function deletefile($id){
 
        $ids = explode('-', $id);
        foreach ($ids as $id) {
            $this->file_model->delete($id); 
        }
		$this->session->set_flashdata('messagePr', 'Sukses Menghapus File');
       redirect(base_url().'penunjang/index', 'refresh');
    }
	
	public function fileTable($param1='',$param2 =''){
        $table = 'file';
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array( 'db' => 'id', 'dt' => 1 ),
            array( 'db' => 'filename', 'dt' => 2 ),
            array( 'db' => 'filename', 'dt' => 3 ),
            array( 'db' => 'id', 'dt' =>4 ),
        );
		$where=" modul='".$param1."' and id_modul=".$param2;

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
            
			$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="delFile('.$id.',\'penunjang\')" data-target="#cnfrm_delete" title="delete"><button type="button" class="btn-sm  btn btn-danger modalButtonPenunjang" ><i class="fa fa-trash-o" ></i>  Delete File</button></a>';
		    $output_arr['data'][$key][0] = '<input type="checkbox" name="selData" value="'.$output_arr['data'][$key][0].'">';
        	}
            
        
        echo json_encode($output_arr);
    }
	
	public function file($param1 ='') {
            $this->load->view('include/header');
			$page_parameter['Title'] = "File ".$param1;
			$page_parameter['id'] = $param1;
            $this->load->view('filepenunjang_table',$page_parameter);                
            $this->load->view('include/footer');   
        } 
		
	public function addfile($param1 ='',$param2='') {
			if($param1=='upload' && $param2 !=''){
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

				$data['id_modul']=$param2;
				$data['modul']='penunjang';
				
				$data['filename'] = $upload['files']['file_name'];

				$data['fileurl'] = 'upload/'.$upload['files']['file_name'];


				$this->file_model->insertRow('file',$data);
				

				$this->session->set_flashdata('messagePr', 'Penambahan File Baru Sukses');

				redirect(base_url() . 'penunjang/file/'.$param2, 'refresh');
				}else{
				$this->session->set_flashdata('messagePr', 'Penambahan File Baru Gagal');

				redirect(base_url() . 'penunjang/file/'.$param2, 'refresh');
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