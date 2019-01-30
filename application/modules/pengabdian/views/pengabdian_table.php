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
            <h3 class="box-title">Kinerja Bidang pengabdian</h3>
            <div class="box-tools">
              <button type="button" class="btn-sm  btn btn-success modalButtonPengabdian" data-toggle="modal" data-target="#nameModal_pengabdian" ><i class="glyphicon glyphicon-plus"></i>Add Kinerja</button>
            </div>
          </div>
        </div>
          <!-- /.box-header -->
          <div class="box-body">           
            <table id="pengabdian" class="cell-border pengabdian table table-striped table1 delSelTable">
              <thead>
                <tr>
            
                <tr>
                  <th rowspan="2"><input type="checkbox" class="selAll"></th>
                  <th rowspan="2"><center>NO</center></th>
                  <th rowspan="2"><center>NAMA KEGIATAN</center></th>
                  <th rowspan="2"><center>JENIS KEGIATAN</center></th>
                  <th colspan="2"><center>BEBAN KERJA</center></th>
                  <th rowspan="2"><center>MASA PENUGASAN</center></th>
                  <th colspan="2"><center>KINERJA</center></th>
                  <th rowspan="2"><center>REKOMENDASI</center></th>
                  <th rowspan="2"><center>Action</center></th>
                  </tr>
                <tr>

                  <td> <center> BUKTI PENUGASAN </center></td>
                  <td> <center> SKS </center></td>
                  <td> <center> BUKTI KINERJA </center></td>
                  <td> <center> SKS </center></td>
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

<!-- Modal Crud Start-->
<div class="modal fade" id="nameModal_pengabdian" role="dialog">
  <div class="modal-dialog">
    <div class="box box-primary popup" >
      <div class="box-header with-border formsize">
        <h3 class="box-title">Add Kinerja pengabdian</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>

      <!-- /.box-header -->
      <div class="modal-body" style="padding: 0px 0px 0px 0px;"></div>
    </div>
  </div>
</div><!--End Modal Crud --> 
<script type="text/javascript">
  $(document).ready(function() {  
    var url = '<?php echo base_url();?>';//$('.content-header').attr('rel');
    var table = $('#pengabdian').dataTable({ 
          dom: 'lfBrtip',
          buttons: [
              'copy', 'excel', 'pdf', 'print'
          ],
          "processing": true,
          "serverSide": true,
          "ajax": url+"pengabdian/dataTable",
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

        $('.dataTables_info').before('<button data-base-url="<?php echo base_url().'pengabdian/delete/'; ?>" rel="delSelTable" class="btn btn-default btn-sm delSelected pull-left btn-blk-del"> <i class="fa fa-trash"></i> </button><br><br>');  
    }, 300);
    $("button.closeTest, button.close").on("click", function (){});
  });
</script>                 