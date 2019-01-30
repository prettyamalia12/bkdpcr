
<form action="<?php echo base_url()."penunjang/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">

    <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" value="<?php echo isset($penunjangData->nama_kegiatan)?$penunjangData->nama_kegiatan:'';?>" class="form-control" placeholder="Name">
              </div>
            </div>

            <div class="col-md-6">
          <div class="form-group">
            <label for="jenis_kegiatan">Jenis Kegiatan</label>
              <select name="jenis_kegiatan" id="" class="form-control">
                <option value="A" <?php echo (isset($penunjangData->jenis_kegiatan) && $penunjangData->jenis_kegiatan == 'A')?'selected':''; ?> >A Menjadi Anggota dalam Suatu Panitia/Badan pada Perguruan Tinggi</option>
                <option value="B" <?php echo (isset($penunjangData->jenis_kegiatan) && $penunjangData->jenis_kegiatan == 'B')?'selected':''; ?> >B Menjadi Anggota Panitia/Badan Pada Lembaga Pemerintah</option>
                <option value="C" <?php echo (isset($penunjangData->jenis_kegiatan) && $penunjangData->jenis_kegiatan == 'C')?'selected':''; ?> >C Menjadi Anggota Organisasi Profesi</option>
                <option value="D" <?php echo (isset($penunjangData->jenis_kegiatan) && $penunjangData->jenis_kegiatan == 'D')?'selected':''; ?> >D Mewakili Perguruan Tinggi/Lembaga Pemerintah</option>
                <option value="E" <?php echo (isset($penunjangData->jenis_kegiatan) && $penunjangData->jenis_kegiatan == 'E')?'selected':''; ?> >E Menjadi Anggota Delegasi Nasional ke Pertemuan Internasional</option>
                <option value="F" <?php echo (isset($penunjangData->jenis_kegiatan) && $penunjangData->jenis_kegiatan == 'F')?'selected':''; ?> >F Berperan serta Aktif dalam Pertemuan Ilmiah</option>
                <option value="G" <?php echo (isset($penunjangData->jenis_kegiatan) && $penunjangData->jenis_kegiatan == 'G')?'selected':''; ?> >G Mempunyai Prestasi di Bidang Olahraga/Humaniora</option>
                <option value="H" <?php echo (isset($penunjangData->jenis_kegiatan) && $penunjangData->jenis_kegiatan == 'H')?'selected':''; ?> >H Keanggotaan dalam Organisasi Profesi Dosen</option>
                <option value="I" <?php echo (isset($penunjangData->jenis_kegiatan) && $penunjangData->jenis_kegiatan == 'I')?'selected':''; ?> >I Keanggotaan dalam Tim Penilaian</option>
                
                    </select>
                  </div>
                </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Bukti Penugasan</label>
                <input type="file" name="bebankerja_bukti" value="<?php echo isset($penunjangData->bebankerja_bukti)?$penunjangData->bebankerja_bukti:'';?>" class="form-control">
              </div>
            </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="">SKS</label>
                <input type="text" name="bebankerja_sks" value="<?php echo isset($penunjangData->bebankerja_sks)?$penunjangData->bebankerja_sks:'';?>" class="form-control" placeholder="">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Masa Penugasan</label>
                <input type="text" name="masa_penugasan" value="<?php echo isset($penunjangData->masa_penugasan)?$penunjangData->masa_penugasan:'';?>" class="form-control" placeholder="">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Bukti Kinerja</label>
                <input type="file" name="kinerja_bukti" value="<?php echo isset($penunjangData->kinerja_bukti)?$penunjangData->kinerja_bukti:'';?>" class="form-control">
              </div>
            </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="">SKS</label>
                <input type="text" name="kinerja_sks" value="<?php echo isset($penunjangData->kinerja_sks)?$penunjangData->kinerja_sks:'';?>" class="form-control" placeholder="">
              </div>
            </div>
          

        <div class="col-md-6">
          <div class="form-group">
            <label for="rekomendasi">Rekomendasi</label>
              <select name="rekomendasi" id="" class="form-control">
                <option value="selesai" <?php echo (isset($penunjangData->rekomendasi) && $penunjangData->rekomendasi == 'selesai')?'selected':''; ?> >Selesai</option>
                <option value="lanjutkan" <?php echo (isset($penunjangData->rekomendasi) && $penunjangData->rekomendasi == 'lanjutkan')?'selected':''; ?> >Lanjutkan</option>
                <option value="gagal" <?php echo (isset($penunjangData->rekomendasi) && $penunjangData->rekomendasi == 'gagal')?'selected':''; ?> >Gagal</option>
                <option value="lainnya" <?php echo (isset($penunjangData->rekomendasi) && $penunjangData->rekomendasi == 'lainnya')?'selected':''; ?> >Lainnya</option>
                <option value="beban lebih" <?php echo (isset($penunjangData->rekomendasi) && $penunjangData->rekomendasi == 'beban lebih')?'selected':''; ?> >Beban lebih</option>
                  
                    </select>
                  </div>
                </div>
  </div>
</div>
<?php if(!empty($penunjangData->no)){?>
        <input type="hidden"  name="id" value="<?php echo isset($penunjangData->no)?$penunjangData->no:'';?>">
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
    $('#nameModal_penunjang')
      .find('div.col-md-offset-4')
      .removeClass('col-md-offset-4')
      .removeClass('col-md-4')
      .addClass('modal-dialog')
      .addClass('modal-lg');
  });
</script>