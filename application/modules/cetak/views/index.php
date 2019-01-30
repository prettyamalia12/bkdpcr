<!-- page content -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper settingPage">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">CETAK</h3>
        </div>
        <div class="box-body">
		<form action="<?php echo base_url()."cetak/prints"; ?>" method="post">
          <div class="row">
            <div class="col-lg-12">
                <p> 
				<div class="form-group has-feedback clear-both">
              <label for="exampleInputname">Jenis Cetak : </label>
              <select name="jeniscetak" class="form-control" required>
                      <option value="1">1. CETAK RENCANA BEBAN KERJA DOSEN</option>
                      <option value="2">2. CETAK LAPORAN KINERJA DOSEN<center></center></option>
                  </select>
           </div>
         </p>
         <p>
            <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">Kajur/Kaprodi/Kadep: </label>
              <input type="text" id="pts2" name="pts2" value="" required="required" class="form-control" placeholder="">
                </div>
                </p>
                <p><input name="CETAK" type="submit" id="" class="btn btn-success btn-md wdt-bg" value="CETAK"/></p>
            </div>
          </div>
		  </form>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->