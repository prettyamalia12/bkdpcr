
<form action="<?php echo base_url()."pendidikan/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">

    <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" value="<?php echo isset($pendidikanData->nama_kegiatan)?$pendidikanData->nama_kegiatan:'';?>" class="form-control" placeholder="Name">
              </div>
            </div>

            <div class="col-md-6">
          <div class="form-group">
            <label for="jenis_kegiatan">Jenis Kegiatan</label>
              <select name="jenis_kegiatan" id="" class="form-control">
                <option value="A" <?php echo (isset($pendidikanData->jenis_kegiatan) && $pendidikanData->jenis_kegiatan == 'A')?'selected':''; ?> >A Melaksanakan Perkuliahan / Tutorial dan Membimbing, Menguji, serta Menyelenggarakan Pendidikan di Laboraturium, Praktek Keguruan Bengkel / Studio / Kebun Percobaan / Teknologi Pengajaran dan Praktek Lapangan</option>
                <option value="B" <?php echo (isset($pendidikanData->jenis_kegiatan) && $pendidikanData->jenis_kegiatan == 'B')?'selected':''; ?> >B Membimbing Seminar</option>
                <option value="C" <?php echo (isset($pendidikanData->jenis_kegiatan) && $pendidikanData->jenis_kegiatan == 'C')?'selected':''; ?> >C Membimbing Kuliah Kerja Nyata, Praktek Kerja Nyata, Praktek Kerja Lapangan</option>
                <option value="D" <?php echo (isset($pendidikanData->jenis_kegiatan) && $pendidikanData->jenis_kegiatan == 'D')?'selected':''; ?> >D Membimbing dan Ikut Membimbing dalam Menghasilkan Disertasi, Tesis, Skripsi, dan Laporan Akhir Studi</option>
                <option value="E" <?php echo (isset($pendidikanData->jenis_kegiatan) && $pendidikanData->jenis_kegiatan == 'E')?'selected':''; ?> >E Bertugas Sebagai Penguji pada Ujian Akhir</option>
                <option value="F" <?php echo (isset($pendidikanData->jenis_kegiatan) && $pendidikanData->jenis_kegiatan == 'F')?'selected':''; ?> >F Membina Kegiatan Mahasiswa</option>
                <option value="G" <?php echo (isset($pendidikanData->jenis_kegiatan) && $pendidikanData->jenis_kegiatan == 'G')?'selected':''; ?> >G Mengembangkan Program Kuliah</option>
                <option value="H" <?php echo (isset($pendidikanData->jenis_kegiatan) && $pendidikanData->jenis_kegiatan == 'H')?'selected':''; ?> >H Mengembangkan Bahan Pengajaran</option>
                <option value="I" <?php echo (isset($pendidikanData->jenis_kegiatan) && $pendidikanData->jenis_kegiatan == 'I')?'selected':''; ?> >I Menyampaikan Orasi Ilmiah</option>
                <option value="J" <?php echo (isset($pendidikanData->jenis_kegiatan) && $pendidikanData->jenis_kegiatan == 'J')?'selected':''; ?> >J</option>
                <option value="K" <?php echo (isset($pendidikanData->jenis_kegiatan) && $pendidikanData->jenis_kegiatan == 'K')?'selected':''; ?> >K Membimbing Akademik Dosen yang Lebih Rendah Jabatannya</option>
                <option value="L" <?php echo (isset($pendidikanData->jenis_kegiatan) && $pendidikanData->jenis_kegiatan == 'L')?'selected':''; ?> >L Melaksanakan Kegiatan Datasering dan Pencangkokan Akademik Dosen</option>
                <option value="M" <?php echo (isset($pendidikanData->jenis_kegiatan) && $pendidikanData->jenis_kegiatan == 'M')?'selected':''; ?> >M Melakukan Kegiatan Pengembangan Diri untuk Meningkatkan Kompetensi</option>  
                    </select>
                  </div>
                </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Bukti Penugasan</label>
                <input type="file" name="bebankerja_bukti" value="<?php echo isset($pendidikanData->bebankerja_bukti)?$pendidikanData->bebankerja_bukti:'';?>" class="form-control">
              </div>
            </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="">SKS</label>
                <input type="text" name="bebankerja_sks" value="<?php echo isset($pendidikanData->bebankerja_sks)?$pendidikanData->bebankerja_sks:'';?>" class="form-control" placeholder="">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Masa Penugasan</label>
                <input type="text" name="masa_penugasan" value="<?php echo isset($pendidikanData->masa_penugasan)?$pendidikanData->masa_penugasan:'';?>" class="form-control" placeholder="">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Bukti Kinerja</label>
                <input type="file" name="kinerja_bukti" value="<?php echo isset($pendidikanData->kinerja_bukti)?$pendidikanData->kinerja_bukti:'';?>" class="form-control">
              </div>
            </div>
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="">SKS</label>
                <input type="text" name="kinerja_sks" value="<?php echo isset($pendidikanData->kinerja_sks)?$pendidikanData->kinerja_sks:'';?>" class="form-control" placeholder="">
              </div>
            </div>
          

        <div class="col-md-6">
          <div class="form-group">
            <label for="rekomendasi">Rekomendasi</label>
              <select name="rekomendasi" id="" class="form-control">
                <option value="selesai" <?php echo (isset($pendidikanData->rekomendasi) && $pendidikanData->rekomendasi == 'selesai')?'selected':''; ?> >Selesai</option>
                <option value="lanjutkan" <?php echo (isset($pendidikanData->rekomendasi) && $pendidikanData->rekomendasi == 'lanjutkan')?'selected':''; ?> >Lanjutkan</option>
                <option value="gagal" <?php echo (isset($pendidikanData->rekomendasi) && $pendidikanData->rekomendasi == 'gagal')?'selected':''; ?> >Gagal</option>
                <option value="lainnya" <?php echo (isset($pendidikanData->rekomendasi) && $pendidikanData->rekomendasi == 'lainnya')?'selected':''; ?> >Lainnya</option>
                <option value="beban lebih" <?php echo (isset($pendidikanData->rekomendasi) && $pendidikanData->rekomendasi == 'beban lebih')?'selected':''; ?> >Beban lebih</option>
                  
                    </select>
                  </div>
                </div>
  </div>
</div>
<?php if(!empty($pendidikanData->no)){?>
        <input type="hidden"  name="id" value="<?php echo isset($pendidikanData->no)?$pendidikanData->no:'';?>">
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
    $('#nameModal_pendidikan')
      .find('div.col-md-offset-4')
      .removeClass('col-md-offset-4')
      .removeClass('col-md-4')
      .addClass('modal-dialog')
      .addClass('modal-lg');
  });
</script>