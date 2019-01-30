
<form action="<?php echo base_url()."profesor/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">

    <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" value="<?php echo isset($profesorData->nama_kegiatan)?$profesorData->nama_kegiatan:'';?>" class="form-control" placeholder="Name">
              </div>
            </div>

            <div class="col-md-6">
          <div class="form-group">
            <label for="jenis_kegiatan">Jenis Kegiatan</label>
              <select name="jenis_kegiatan" id="" class="form-control">
                <option value="A" <?php echo (isset($profesorData->jenis_kegiatan) && $profesorData->jenis_kegiatan == 'A')?'selected':''; ?> >A Menulis Buku</option>
                <option value="B" <?php echo (isset($profesorData->jenis_kegiatan) && $profesorData->jenis_kegiatan == 'B')?'selected':''; ?> >B Karya Ilmiah</option>
                <option value="C" <?php echo (isset($profesorData->jenis_kegiatan) && $profesorData->jenis_kegiatan == 'C')?'selected':''; ?> >C Menyebarluaskan Gagasan</option>
                
                    </select>
                  </div>
                </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Bukti Penugasan</label>
                <input type="file" name="bebankerja_bukti" value="<?php echo isset($profesorData->bebankerja_bukti)?$profesorData->bebankerja_bukti:'';?>" class="form-control">
              </div>
            </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="">SKS</label>
                <input type="text" name="bebankerja_sks" value="<?php echo isset($profesorData->bebankerja_sks)?$profesorData->bebankerja_sks:'';?>" class="form-control" placeholder="">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Masa Penugasan</label>
                <input type="text" name="masa_penugasan" value="<?php echo isset($profesorData->masa_penugasan)?$profesorData->masa_penugasan:'';?>" class="form-control" placeholder="">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Bukti Kinerja</label>
                <input type="file" name="kinerja_bukti" value="<?php echo isset($profesorData->kinerja_bukti)?$profesorData->kinerja_bukti:'';?>" class="form-control">
              </div>
            </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="">SKS</label>
                <input type="text" name="kinerja_sks" value="<?php echo isset($profesorData->kinerja_sks)?$profesorData->kinerja_sks:'';?>" class="form-control" placeholder="">
              </div>
            </div>
          
		<div class="col-md-6">
              <div class="form-group">
                <label for="">Tahun</label>
                <input type="text" name="tahun" value="<?php echo isset($profesorData->tahun)?$profesorData->tahun:date('Y');?>" class="form-control" placeholder="">
              </div>
            </div>
          
        <div class="col-md-6">
          <div class="form-group">
            <label for="rekomendasi">Rekomendasi</label>
              <select name="rekomendasi" id="" class="form-control">
                <option value="selesai" <?php echo (isset($profesorData->rekomendasi) && $profesorData->rekomendasi == 'selesai')?'selected':''; ?> >Selesai</option>
                <option value="lanjutkan" <?php echo (isset($profesorData->rekomendasi) && $profesorData->rekomendasi == 'lanjutkan')?'selected':''; ?> >Lanjutkan</option>
                <option value="gagal" <?php echo (isset($profesorData->rekomendasi) && $profesorData->rekomendasi == 'gagal')?'selected':''; ?> >Gagal</option>
                <option value="lainnya" <?php echo (isset($profesorData->rekomendasi) && $profesorData->rekomendasi == 'lainnya')?'selected':''; ?> >Lainnya</option>
                <option value="beban lebih" <?php echo (isset($profesorData->rekomendasi) && $profesorData->rekomendasi == 'beban lebih')?'selected':''; ?> >Beban lebih</option>
                  
                    </select>
                  </div>
                </div>
  </div>
</div>
<?php if(!empty($profesorData->no)){?>
        <input type="hidden"  name="id" value="<?php echo isset($profesorData->no)?$profesorData->no:'';?>">
        <div class="box-footer sub-btn-wdt">
          <button type="submit" name="edit" value="edit" class="btn btn-success wdt-bg">Update</button>
        </div>
              <!-- /.box-body -->
        <?php }else{?>
        <div class="modal-footer sub-btn-wdt">
          <button type="submit" name="submit" value="add" class="btn btn-success wdt-bg">Add</button>
        </div>
        <?php }?>
 </form>

 <script>
  var tt = $('textarea.ckeditor').ckeditor();
  CKEDITOR.config.allowedContent = true;
  $(document).ready(function() {
    $('#nameModal_profesor')
      .find('div.col-md-offset-4')
      .removeClass('col-md-offset-4')
      .removeClass('col-md-4')
      .addClass('modal-dialog')
      .addClass('modal-lg');
  });
</script>