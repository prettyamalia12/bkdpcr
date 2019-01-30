
<form action="<?php echo base_url()."pengabdian/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">

    <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" value="<?php echo isset($pengabdianData->nama_kegiatan)?$pengabdianData->nama_kegiatan:'';?>" class="form-control" placeholder="Name">
              </div>
            </div>

            <div class="col-md-6">
          <div class="form-group">
            <label for="jenis_kegiatan">Jenis Kegiatan</label>
              <select name="jenis_kegiatan" id="" class="form-control">
                <option value="A" <?php echo (isset($pengabdianData->jenis_kegiatan) && $pengabdianData->jenis_kegiatan == 'A')?'selected':''; ?> >A Menduduki Jabatan Pimpinan</option>
                <option value="B" <?php echo (isset($pengabdianData->jenis_kegiatan) && $pengabdianData->jenis_kegiatan == 'B')?'selected':''; ?> >B Melaksanakan Pengembangan Hasil Pendidikan dan Penelitian</option>
                <option value="C" <?php echo (isset($pengabdianData->jenis_kegiatan) && $pengabdianData->jenis_kegiatan == 'C')?'selected':''; ?> >C Memberi Latihan/Penyuluhan/Penataran/Ceramah pada Masyarakat</option>
                <option value="D" <?php echo (isset($pengabdianData->jenis_kegiatan) && $pengabdianData->jenis_kegiatan == 'D')?'selected':''; ?> >D Memberi Pelayanan Kepada Masyarakat atau Kegiatan Lain yang Menunjang Pelaksanaan Tugas Umum Pemerintah dan Pembangunan</option>
                <option value="E" <?php echo (isset($pengabdianData->jenis_kegiatan) && $pengabdianData->jenis_kegiatan == 'E')?'selected':''; ?> >E Membuat/Menulis Karya Pengabdian</option>
                
                    </select>
                  </div>
                </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Bukti Penugasan</label>
                <input type="file" name="bebankerja_bukti" value="<?php echo isset($pengabdianData->bebankerja_bukti)?$pengabdianData->bebankerja_bukti:'';?>" class="form-control">
              </div>
            </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="">SKS</label>
                <input type="text" name="bebankerja_sks" value="<?php echo isset($pengabdianData->bebankerja_sks)?$pengabdianData->bebankerja_sks:'';?>" class="form-control" placeholder="">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Masa Penugasan</label>
                <input type="text" name="masa_penugasan" value="<?php echo isset($pengabdianData->masa_penugasan)?$pengabdianData->masa_penugasan:'';?>" class="form-control" placeholder="">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Bukti Kinerja</label>
                <input type="file" name="kinerja_bukti" value="<?php echo isset($pengabdianData->kinerja_bukti)?$pengabdianData->kinerja_bukti:'';?>" class="form-control">
              </div>
            </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="">SKS</label>
                <input type="text" name="kinerja_sks" value="<?php echo isset($pengabdianData->kinerja_sks)?$pengabdianData->kinerja_sks:'';?>" class="form-control" placeholder="">
              </div>
            </div>
          

        <div class="col-md-6">
          <div class="form-group">
            <label for="rekomendasi">Rekomendasi</label>
              <select name="rekomendasi" id="" class="form-control">
                <option value="selesai" <?php echo (isset($pengabdianData->rekomendasi) && $pengabdianData->rekomendasi == 'selesai')?'selected':''; ?> >Selesai</option>
                <option value="lanjutkan" <?php echo (isset($pengabdianData->rekomendasi) && $pengabdianData->rekomendasi == 'lanjutkan')?'selected':''; ?> >Lanjutkan</option>
                <option value="gagal" <?php echo (isset($pengabdianData->rekomendasi) && $pengabdianData->rekomendasi == 'gagal')?'selected':''; ?> >Gagal</option>
                <option value="lainnya" <?php echo (isset($pengabdianData->rekomendasi) && $pengabdianData->rekomendasi == 'lainnya')?'selected':''; ?> >Lainnya</option>
                <option value="beban lebih" <?php echo (isset($pengabdianData->rekomendasi) && $pengabdianData->rekomendasi == 'beban lebih')?'selected':''; ?> >Beban lebih</option>
                  
                    </select>
                  </div>
                </div>
  </div>
</div>
<?php if(!empty($pengabdianData->no)){?>
        <input type="hidden"  name="id" value="<?php echo isset($pengabdianData->no)?$pengabdianData->no:'';?>">
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
    $('#nameModal_pengabdian')
      .find('div.col-md-offset-4')
      .removeClass('col-md-offset-4')
      .removeClass('col-md-4')
      .addClass('modal-dialog')
      .addClass('modal-lg');
  });
</script>