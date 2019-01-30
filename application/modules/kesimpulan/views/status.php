

    <div class="row">

            <div class="col-md-6">
          <div class="form-group">
            <label for="status">Approval 1</label>
               <input type="text" name="keterangan" value="<?php echo isset($Data[0]->approval1)?$Data[0]->approval1:'';?>" class="form-control" placeholder="" readonly>
                  </div>
                </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" name="keterangan" value="<?php echo isset($Data[0]->approved1)?$Data[0]->approved1:'';?>" class="form-control" placeholder="" readonly>
              </div>
            </div>
			 <div class="col-md-6">
          <div class="form-group">
            <label for="status">Approval 2</label>
              <input type="text" name="keterangan" value="<?php echo isset($Data[0]->approval2)?$Data[0]->approval2:'';?>" class="form-control" placeholder="" readonly>
                  </div>
                </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" name="keterangan" value="<?php echo isset($Data[0]->approved2)?$Data[0]->approved2:'';?>" class="form-control" placeholder="" readonly>
              </div>
            </div>
			 <div class="col-md-6">
          <div class="form-group">
            <label for="status">Approval 3</label>
               <input type="text" name="keterangan" value="<?php echo isset($Data[0]->approval3)?$Data[0]->approval3:'';?>" class="form-control" placeholder="" readonly>
                  </div>
                </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" name="keterangan" value="<?php echo isset($Data[0]->approved3)?$Data[0]->approved3:'';?>" class="form-control" placeholder="" readonly>
              </div>
            </div>
			 <div class="col-md-6">
          <div class="form-group">
            <label for="status">Approval 4</label>
              <input type="text" name="keterangan" value="<?php echo isset($Data[0]->approval4)?$Data[0]->approval4:'';?>" class="form-control" placeholder="" readonly>
                  </div>
                </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" name="keterangan" value="<?php echo isset($Data[0]->approved4)?$Data[0]->approved4:'';?>" class="form-control" placeholder="" readonly>
              </div>
            </div>
  </div>
</div>

 <script>
  var tt = $('textarea.ckeditor').ckeditor();
  CKEDITOR.config.allowedContent = true;
  $(document).ready(function() {
    $('#nameModal_bkdStatus')
      .find('div.col-md-offset-4')
      .removeClass('col-md-offset-4')
      .removeClass('col-md-4')
      .addClass('modal-dialog')
      .addClass('modal-lg');
  });
</script>