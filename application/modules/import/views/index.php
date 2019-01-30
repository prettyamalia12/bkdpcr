<!-- page content -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper settingPage">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">IMPORT/CLEAR DATA </h3>
        </div>
        <div class="box-body">
          <div class="row">
		  <?php if($this->session->flashdata("messagePr")){?>
			<div class="alert alert-info">      
			  <?php echo $this->session->flashdata("messagePr")?>
			</div>
		  <?php } ?>
            <div class="col-lg-12">
              <div class="col-md-6 col-md-offset-1 aboutshift">
                <p>
				<form action="<?php echo base_url()."import/upload/"; ?>" method="post"  id="filesform" enctype="multipart/form-data">
				
                   <div class="fileUpload btn btn-success wdt-bg">
                <span>Pilih File Biodata</span>
                <input id="fileUpload" class="upload" name="import" type="file" /><br />
                <input type="hidden" name="fileOld" value="" />
               </div>
                </p>
                 <p>
                  <input onclick="return confirm('Yakin melakukan import data?')" type="submit" name="search" id="" class="btn btn-success btn-md wdt-bg" value="Search" /> 
                </p>
				</form>
                <p><a  onclick="return confirm('Yakin melakukan clear data?')" href="<?php echo base_url()."import/clear/"; ?>" target="_blank"><button name="clear" type="button" id="" class="btn btn-success btn-md wdt-bg">Clear Data</button><a/></p>
                <p><a  onclick="return confirm('Yakin melakukan export data?')" href="<?php echo base_url()."import/export/"; ?>" target="_blank"><button name="clear" type="button" id="" class="btn btn-success btn-md wdt-bg">Export Data</button></a></p>
                <!--<p><a  onclick="return confirm('Yakin melakukan export data?')" href="<?php echo base_url()."import/export/"; ?>" target="_blank"><button name="clear" type="button" id="" class="btn btn-success btn-md wdt-bg">Look</button></a></p>-->

              </div>
                              <p>
1. Import dari data lama : Klik tombol "Pilih File", kemudian pilih/sorot file BKD lama. Setelah itu tekan tombol "Search", maka semua data yang ada dalam file lama akan dipindah ke dalam file (program) ini.
<br/> <br/> 
2. Clear Data : Klik tombol "Clear Data", maka data yang ada dalam file (program) ini akan di hapus
3. Export Data : Klik tombol "Export Data", maka data untuk menyimpan file microsoft access
                </p>
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
<!-- /.content-wrapper -->