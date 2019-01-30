<div class="content-wrapper">
<!-- Content Header (Page header) -->
<!-- Main content -->
  <section class="content">
  <?php if($this->session->flashdata("messagePr")){?>
    <div class="alert alert-info">      
      <?php echo $this->session->flashdata("messagePr")?>
    </div>
  <?php } ?>
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="modal-header">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $Title;?></h3>
           
          </div>
        </div>
          <!-- /.box-header -->
          <div class="box-body">           
				<form action="<?php echo base_url()."penelitian/addfile/upload/".$id; ?>" method="post"  id="filesform" enctype="multipart/form-data" style="padding: 0px 30px">
						<div class="form-body">
								<input type='file' id="imgInp" name="files" />
								  <img id="files" src="#" alt="" width="400" height="400" />
						</div>
				<div class="form-actions">
					<div class="row">
							<div class="col-md-offset-3 col-md-9">
							<button type="submit" class="btn green"><i class="fa fa-check"></i> Submit</button>
							<input type="reset" class="btn default"></input>
						</div>
					</div>
				</div>
				</form>
										
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>  

</div><!--End Modal Crud --> 

 <script>
      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#files').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>