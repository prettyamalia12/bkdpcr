
<form action="<?php echo base_url()."penelitian/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">

    <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" value="<?php echo isset($penelitianData->nama_kegiatan)?$penelitianData->nama_kegiatan:'';?>" class="form-control" placeholder="Name">
              </div>
            </div>

            <div class="col-md-6">
          <div class="form-group">
            <label for="jenis_kegiatan">Jenis Kegiatan</label>
              <select name="jenis_kegiatan" id="" class="form-control">
                <option value="A" <?php echo (isset($penelitianData->jenis_kegiatan) && $penelitianData->jenis_kegiatan == 'A')?'selected':''; ?> >A Menghasilkan Karya Ilmiah</option>
                <option value="B" <?php echo (isset($penelitianData->jenis_kegiatan) && $penelitianData->jenis_kegiatan == 'B')?'selected':''; ?> >B Menerjemahkan / Penyaduran Buku Ilmiah</option>
                <option value="C" <?php echo (isset($penelitianData->jenis_kegiatan) && $penelitianData->jenis_kegiatan == 'C')?'selected':''; ?> >C Mengedit / Menyunting Karya Ilmiah</option>
                <option value="D" <?php echo (isset($penelitianData->jenis_kegiatan) && $penelitianData->jenis_kegiatan == 'D')?'selected':''; ?> >D Membuat Rencana dan Karya Teknologi yang dipatenkan</option>
                <option value="E" <?php echo (isset($penelitianData->jenis_kegiatan) && $penelitianData->jenis_kegiatan == 'E')?'selected':''; ?> >E Membuat Rancangan dan Karya Teknologi, Rancangan dan Karya Seni Monumental/Seni Pertunjukan/Karya Sastra</option>
              </select>
                  </div>
                </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Bukti Penugasan</label>
                <input type="file" name="bebankerja_bukti" value="<?php echo isset($penelitianData->bebankerja_bukti)?$penelitianData->bebankerja_bukti:'';?>" class="form-control">
              </div>
            </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="">SKS</label>
                <input type="text" name="bebankerja_sks" value="<?php echo isset($penelitianData->bebankerja_sks)?$penelitianData->bebankerja_sks:'';?>" class="form-control" placeholder="">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Masa Penugasan</label>
                <input type="text" name="masa_penugasan" value="<?php echo isset($penelitianData->masa_penugasan)?$penelitianData->masa_penugasan:'';?>" class="form-control" placeholder="">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Bukti Kinerja</label>
                <input type="file" name="kinerja_bukti" value="<?php echo isset($penelitianData->kinerja_bukti)?$penelitianData->kinerja_bukti:'';?>" class="form-control">
              </div>
            </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="">SKS</label>
                <input type="text" name="kinerja_sks" value="<?php echo isset($penelitianData->kinerja_sks)?$penelitianData->kinerja_sks:'';?>" class="form-control" placeholder="">
              </div>
            </div>
          

        <div class="col-md-6">
          <div class="form-group">
            <label for="rekomendasi">Rekomendasi</label>
              <select name="rekomendasi" id="" class="form-control">
                <option value="selesai" <?php echo (isset($penelitianData->rekomendasi) && $penelitianData->rekomendasi == 'selesai')?'selected':''; ?> >Selesai</option>
                <option value="lanjutkan" <?php echo (isset($penelitianData->rekomendasi) && $penelitianData->rekomendasi == 'lanjutkan')?'selected':''; ?> >Lanjutkan</option>
                <option value="gagal" <?php echo (isset($penelitianData->rekomendasi) && $penelitianData->rekomendasi == 'gagal')?'selected':''; ?> >Gagal</option>
                <option value="lainnya" <?php echo (isset($penelitianData->rekomendasi) && $penelitianData->rekomendasi == 'lainnya')?'selected':''; ?> >Lainnya</option>
                <option value="beban lebih" <?php echo (isset($penelitianData->rekomendasi) && $penelitianData->rekomendasi == 'beban lebih')?'selected':''; ?> >Beban lebih</option>
                  
                    </select>
                  </div>
                </div>
  </div>
</div>
<?php if(!empty($penelitianData->no)){?>
        <input type="hidden"  name="id" value="<?php echo isset($penelitianData->no)?$penelitianData->no:'';?>">
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
    $('#nameModal_penelitian')
      .find('div.col-md-offset-4')
      .removeClass('col-md-offset-4')
      .removeClass('col-md-4')
      .addClass('modal-dialog')
      .addClass('modal-lg');
  });
</script>