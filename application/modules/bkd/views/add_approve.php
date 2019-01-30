
<form action="<?php echo base_url()."bkd/add_edit"; ?>" method="post" role="form" id="form" style="padding: 0px 30px">

    <div class="row">


            <div class="col-md-6">
          <div class="form-group">
            <label for="status">Status</label>
              <select name="status" id="status" class="form-control">
                <option value="Approve" <?php if((isset($status) && $status == 'Approve'))echo 'selected'; ?> >Approve</option>
                <option value="Reject" <?php if((isset($status) && $status == 'Reject'))echo 'selected'; ?> >Reject</option>
                    </select>
                  </div>
                </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" name="keterangan" value="<?php if(isset($approved))echo $approved;?>" class="form-control" placeholder="">
              </div>
            </div>
  </div>
</div>
        <input type="hidden"  name="bkdid" value="<?php echo $id?>">
        <div class="box-footer sub-btn-wdt">
          <button type="submit" name="edit" value="edit" class="btn btn-success wdt-bg">submit</button>
        </div>
 </form>

 <script>
  var tt = $('textarea.ckeditor').ckeditor();
  CKEDITOR.config.allowedContent = true;
  $(document).ready(function() {
    $('#nameModal_bkd')
      .find('div.col-md-offset-4')
      .removeClass('col-md-offset-4')
      .removeClass('col-md-4')
      .addClass('modal-dialog')
      .addClass('modal-lg');
  });
</script>