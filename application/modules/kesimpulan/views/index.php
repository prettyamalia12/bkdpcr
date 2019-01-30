<!-- page content -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper settingPage">
    <!-- Main content -->
    <section class="content">
	  <?php if($this->session->flashdata("messagePr")){?>
    <div class="alert alert-info">      
      <?php echo $this->session->flashdata("messagePr")?>
    </div>
  <?php } ?>
      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">KESIMPULAN</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="col-md-6 col-md-offset-1 aboutshift">
                <p>
                  <table>
                    <tr>
                      <th>NIP/No Sertifikat</th>
                      <th>:</th>
                      <th><?php echo $user_data[0]->nipdos;?>/<?php echo $user_data[0]->noserti;?></th>
                    </tr>
                    <tr>
                      <th>Nama Lengkap</th>
                      <th>:</th>
                      <th><?php echo $user_data[0]->name;?></th>
                    </tr>
                    <tr>
                      <th>Status</th>
                      <th>:</th>
                      <th><?php echo $user_data[0]->katdos?></th>
                    </tr>
                    <tr>
                      <th>Tahun Akademik</th>
                      <th>:</th>
                      <th><?php echo $user_data[0]->sem;?> - <?php echo $user_data[0]->smtpt;?></th>
                    </tr>
                 </table>
                 <br/>
                   <table style="width:100%" border="2px">
                    <tr>
                      <th><center>Keterangan</center></th>
                      <th><center>Syarat(PP 37 thn 2009)</center></th> 
                      <th><center>Kinerja</center></th>
                      <th><center>Kesimpulan</center></th>
                    </tr>
                    <tr>
                      <td>Pendidikan</td>
                      <td><?php if($user_data[0]->katdos=='DS')echo 'TIDAK BOLEH KOSONG';?></td> 
                      <td><?php echo $s1;?> SKS</td>
                      <td><?php if($st1=='T')echo '<font color="red">T</font>'; else echo $st1;?></td>
                    </tr>
                    <tr>
                      <td>Penelitian</td>
                      <td><?php if($user_data[0]->katdos=='DS')echo 'TIDAK BOLEH KOSONG';?></td> 
                      <td><?php echo $s2;?> SKS</td>
                      <td><?php if($st2=='T')echo '<font color="red">T</font>'; else echo $st2;?></td>
                    </tr>
                    <tr>
                      <td>Pendidikan + Penelitian</td>
                      <td>MIN 9 SKS</td>
                      <td><?php echo $s3;?> SKS</td>
                      <td><?php if($st3=='T')echo '<font color="red">T</font>'; else echo $st3;?></td>
                    </tr>
                    <tr>
                      <td>Pengabdian + Tambahan</td>
                      <td><?php if($user_data[0]->katdos=='DS')echo 'MIN 3 SKS';?></td>
                      <td><?php echo $s4;?> SKS</td>
                      <td><?php if($st4=='T')echo '<font color="red">T</font>'; else echo $st4;?></td>
                    </tr>
                    <tr>
                      <td>Total Kinerja</td>
                      <td>Min 12SKS, Max. 16SKS</td>
                      <td><?php echo $s5;?> SKS</td>
                      <td><?php if($st5=='T')echo '<font color="red">T</font>'; else echo $st5;?></td>
                    </tr>
                  </table>
                  <br/>
				  <center><font color="<?php if($st5=='T')echo 'red'; ?>"><?php echo $kesimpulan;?></font></center>
				  <br/>
                  <table>
        				   <tr>
                      <td><img src="assets/images/upload.png" width=15 height=15>Upload Pernyataan</td>
                      <td>
            					  <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'kesimpulan/submit/upload' ?>" class="form-label-left">
            					  <input type="file" id="files" name="files" value="Upload"><input  class="btn-sm  btn btn-success " type="submit" value="Submit File" />
            					  </form>
                        </button>
                      </td>
                  </tr>
                  
				           <form action="<?php echo base_url()."kesimpulan/cetak"; ?>" method="post">
                    <tr>
                      <td><img src="assets/images/download.png" width=15 height=15>Simpan Pernyataan Asesor</td>
                      <td><input type="submit" id="download" name="type" value="Download">
                        </button>
                      </td> 
                      <td>
                        File Dokumen Kesimpulan  
                        
                      </td>
                      
                    </tr> 
                    <tr>
                      <td><img src="assets/images/print.png" width=15 height=15>Print Pernyataan Asesor</td>
                    
                      <td><input target="_blank" type="submit" id="download" name="type" value="Cetak" <?php if($st5=='T')echo 'disabled'; ?>>
                        </button>
                      </td>
                      <td>

                          <select name="katdos" class="form-control" required>
                                  <option value="Swasta">SWASTA</option>
                                  <option value="Negeri">NEGERI<center></center></option>
                          </select>
                        </td>

                    </tr>
                      
                   
                   
                    <tr>
                      <td>Nama Pimpinan PT yang mengesahkan</td>
                      <td><input type="text" name="pipt"/></td>
                    </tr>
                    <tr>
                      <td>Nama Pimpinan Kopertis</td>
                      <td><input type="text" name="pikop"/></td>
                    </tr>
                    </table>
					</form>
					
					<?php
          if(isset($bkd)){
          
          ?>
          <button type="button" class="btn-sm  btn btn-<?php if($bkd[0]->status=='Reject' ||$bkd[0]->status=='FileReject'){echo 'warning';}else{ echo 'success';}?> modalButtonBKDStatus" data-toggle="modal" data-src="<?php echo $bkd[0]->id?>"  data-target="#nameModal_bkdStatus"><i class="glyphicon glyphicon-search"></i>Status : <?php echo $bkd[0]->status;?></button>&nbsp;
          &nbsp;
          <?php }  ?>
          <form action="kesimpulan/submit">
          <?php 
          if(isset($bkd)){
            
            if($bkd[0]->status=='Reject'){
          ?>
          <input  class="btn-sm  btn btn-success modalButtonBKDStatus" type="submit" value="Submit BKD" />
          <?php 
            }
          }else{ ?>
            <?php if(isset($filebkd) && count($filebkd)>0){ ?>
              <input  class="btn-sm  btn btn-success modalButtonBKDStatus" type="submit" value="Submit BKD" />
            <?php } ?>
          <?php } ?>
					</form>
                  </table>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>

<div class="modal fade" id="nameModal_bkdStatus" role="dialog">
  <div class="modal-dialog">
    <div class="box box-primary popup" >
      <div class="box-header with-border formsize">
        <h3 class="box-title">Detail BKD</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
<!-- /.box-header -->
      <div class="modal-body" style="padding: 0px 0px 0px 0px;"></div>
      </div>

    </div>
  </div>
<!-- /.content-wrapper -->