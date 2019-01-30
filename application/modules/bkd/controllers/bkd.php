<?php defined("BASEPATH") OR exit("No direct script access allowed");

class bkd extends CI_Controller {

  function __construct() {
    parent::__construct();
	$this->load->model('User_model');
	$this->load->model('bkd_model');
	 $this->user_id = isset($this->session->get_userdata()['user_details'][0]->users_id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	$this->user_type = isset($this->session->get_userdata()['user_details'][0]->user_type)?$this->session->get_userdata()['user_details'][0]->user_type:'1';
  }

  /**
     * This function is used to load page view
     * @return Void
     */
  public function index(){   
	$this->load->view('include/header');
    $this->load->view('bkd_table');                
    $this->load->view('include/footer');    
  }
  public function modal_bkd() {
        if($this->input->post('id')){
			$id=$this->input->post('id');
            $Data = $this->bkd_model->get_data_by('bkd',$id,'id'); 
            $data['id'] = $id;
			$users =$this->User_model->get_users($id);
            if($this->user_type=='admin') {
				$data['approved'] = $Data[0]->approved1;
				$data['status'] = $Data[0]->approval1;
			}else if($users[0]->noass1==$this->user_id	) { 
				$data['approved'] = $Data[0]->approved2;
				$data['status'] = $Data[0]->approval2;
			}else if($users[0]->noass2==$this->user_id	) { 
				$data['approved'] = $Data[0]->approved3;
				$data['status'] = $Data[0]->approval3;
			}else{
				$data['approved'] = '';
				$data['status'] = '';
			}
            echo $this->load->view('add_approve', $data, true);
        }
        exit;
    }
	 public function modal_bkdStatus() {
        if($this->input->post('id')){
			$id=$this->input->post('id');
            $data['Data'] = $this->bkd_model->get_data_by('bkd',$id,'id'); 
            $data['id'] = $id;
			
            echo $this->load->view('status', $data, true);
        }
        exit;
    }
    /**
     * This function is used to create datatable in users list page
     * @return Void
     */
     public function dataTable (){
        $table = 'bkd';
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array( 'db' => 'id', 'dt' => 1 ),
            array( 'db' => 'user_id', 'dt' => 2 ),
            array( 'db' => 'status', 'dt' => 3 ),
            array( 'db' => 'approval1', 'dt' => 4),
            array( 'db' => 'approval2', 'dt' => 5 ),
            array( 'db' => 'approval3', 'dt' => 6 ),
            array( 'db' => 'user_id', 'dt' => 7 ),
        );
		$curuser =$this->User_model->get_users($this->user_id);
		$where="";
			if($curuser[0]->noass1==$this->user_id || $curuser[0]->noass2==$this->user_id	) { 
			$where=" status != 'Approved' and status != 'Reject' ";
			$where=$where." and (status='Approval2' or status='Approval3')";
			}
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
			$id=$output_arr['data'][$key][2];
			$users =$this->User_model->get_users($id);
			if(is_array($users)){
			$output_arr['data'][$key][2]=$users[0]->username;
			}
			
            //$id = $output_arr['data'][$key][count($output_arr['data'][$key])  - 1];
            $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] = '';
 
            $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a target="_blank" href="'.base_url().'cetak/view/'.$id.'/1" type="button" data-src="'.$id.'" title="File"><i class="fa fa-file" data-id="">Beban Kerja</i></a>    ';
            $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a target="_blank" href="'.base_url().'cetak/view/'.$id.'/2" type="button" data-src="'.$id.'" title="File"><i class="fa fa-file" data-id="">Kinerja</i></a>        ';
            $output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a target="_blank" href="'.base_url().'kesimpulan/view/'.$id.'" type="button" data-src="'.$id.'" title="File"><i class="fa fa-file" data-id="">Kesimpulan</i></a>    ';
			if($this->user_type!='admin'){
			$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<button type="button" class="btn-sm  btn btn-success modalButtonBKD" data-toggle="modal" data-src="'.$output_arr['data'][$key][0].'"  data-target="#nameModal_bkd"><i class="glyphicon glyphicon-plus"></i>Approve</button>';
			}
			if($this->user_type=='admin' && $output_arr['data'][$key][3]=='Approval1'){
			$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnAddFile" href="'.base_url().'bkd/file/'.$id.'" type="button" data-src="'.$id.'" title="File"><i class="fa fa-file" data-id=""> File Pengesahan</i></a>';
            }
			$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<button type="button" class="btn-sm  btn btn-success modalButtonBKDStatus" data-toggle="modal" data-src="'.$output_arr['data'][$key][0].'"  data-target="#nameModal_bkdStatus"><i class="glyphicon glyphicon-search"></i>Detail</button>    ';
            $output_arr['data'][$key][0] = '<input type="checkbox" name="selData" value="'.$output_arr['data'][$key][0].'">';
			}
        
        echo json_encode($output_arr);
    }
  public function add_edit(){
		if(!isset($id) || $id == '') {
            $id = $this->user_id;
        }else{
			redirect( base_url(), 'refresh');
		}
		$bkdid=$this->input->post('bkdid');

			if($bkdid>0){
			//update
			$status=$this->input->post('status');
			$bkd=$this->bkd_model->get_data_by('bkd',$bkdid,'id'); 
			$users =$this->User_model->get_users($bkd[0]->user_id);

            if($this->user_type=='admin' && $bkd[0]->status=='Approval1') {
				$update['approval1']=$status;
				$update['approved1']=$this->input->post('keterangan');

				if($status=='Approve')$update['status']='Approval2';
				else $update['status']='Reject';
			}else if($users[0]->noass1==$this->user_id || $users[0]->noass2==$this->user_id) {
				if($bkd[0]->status=='Approval2'){
					$update['approval2']=$status;
					$update['approved2']=$this->input->post('keterangan');
					
					if($status=='Approve')$update['status']='Approval3';
					else $update['status']='Reject';
				}else if($bkd[0]->status=='Approval3'){
					$update['approval3']=$status;
					$update['approved3']=$this->input->post('keterangan');
					
					if($status=='Approve')$update['status']='Approved';
					else $update['status']='Reject';
				}
			}else{
				$this->session->set_flashdata('messagePr', 'Data BKD tidak ditemukan');
				redirect(base_url() . 'bkd/', 'refresh');
			}
				$this->bkd_model->updateRow('bkd', 'id', $bkdid, $update);	
				$this->session->set_flashdata('messagePr', 'BKD Berhasil di review');

				redirect(base_url() . 'bkd/', 'refresh');
			}else{
			$this->session->set_flashdata('messagePr', 'Data BKD tidak ditemukan');

			redirect(base_url() . 'bkd/', 'refresh');
			}
	}
 public function modal_bkdfile() {
        if($this->input->post('id')){
			$id=$this->input->post('id');
            $Data = $this->bkd_model->get_data_by('bkd',$id,'user_id'); 
            $data['id'] = $Data[0]->id;
			$users =$this->User_model->get_users($id);
            if($this->user_type=='admin') {
				$data['approved'] = $Data[0]->approved1;
				$data['status'] = $Data[0]->approval1;
			}else{
				$data['approved'] = '';
				$data['status'] = '';
			}
            echo $this->load->view('add_approve', $data, true);
        }
        exit;
    }
	public function fileTable($param1='',$param2 =''){
        $table = 'file';
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array( 'db' => 'id', 'dt' => 1 ),
            array( 'db' => 'filename', 'dt' => 2 ),
            array( 'db' => 'fileurl', 'dt' => 3 ),
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
			}
        
        echo json_encode($output_arr);
    }
	
	public function file($param1 ='') {
            $this->load->view('include/header');
			$page_parameter['Title'] = "File BKD";
			$page_parameter['id'] = $param1;
            $this->load->view('filebkd_table',$page_parameter);                
            $this->load->view('include/footer');   
        }
}		
?>