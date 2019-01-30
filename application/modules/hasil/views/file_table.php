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
            <h3 class="box-title">Lembar Hasil Pengesahan</h3>
            <div class="box-tools">
              <a href="<?php echo base_url();?>hasil/addfile/"><button type="button" class="btn-sm  btn btn-success modalButtonUser" ><i class="glyphicon glyphicon-plus"></i>Tambah File</button><a/>
            </div>
          </div>
        </div>
          <!-- /.box-header -->
          <div class="box-body">           
		  
		  <table id="hasil" class="cell-border hasil table table-striped table1 delSelTable">
              <thead>
                <tr>
                  <th rowspan="2"><input type="checkbox" class="selAll"></th>
				<tr>
                  <td> <center> No</center></td>
                  <td> <center> File Name </center></td>
                  <td> <center> File Url </center></td>
                  <td> <center> Action </center></td>
                </tr>
              </thead>
              <tbody>
              </tbody> 
            </table>
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
<script type="text/javascript">
  $(document).ready(function() {  
    var url = '<?php echo base_url();?>';//$('.content-header').attr('rel');
    var table = $('#hasil').dataTable({ 
          "processing": true,
          "serverSide": true,
          "ajax": url+"hasil/fileTable/",
          "sPaginationType": "full_numbers",
          "language": {
            "search": "_INPUT_", 
            "searchPlaceholder": "Search",
            "paginate": {
                "next": '<i class="fa fa-angle-right"></i>',
                "previous": '<i class="fa fa-angle-left"></i>',
                "first": '<i class="fa fa-angle-double-left"></i>',
                "last": '<i class="fa fa-angle-double-right"></i>'
            }
          }, 
          "iDisplayLength": 10,
          "aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
      });
    
    setTimeout(function() {
      var add_width = $('.dataTables_filter').width()+$('.box-body .dt-buttons').width()+10;
      $('.table-date-range').css('right',add_width+'px');

        $('.dataTables_info').before('<button data-base-url="<?php echo base_url().'hasil/filedelete/'; ?>" rel="delSelTable" class="btn btn-default btn-sm delSelected pull-left btn-blk-del"> <i class="fa fa-trash"></i> </button><br><br>');  
    }, 300);
    $("button.closeTest, button.close").on("click", function (){});
  });
</script>                 