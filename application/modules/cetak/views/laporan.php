<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <?php $setting = setting_all();?>
  
  <link rel="icon" href="<?php echo base_url((setting_all('favicon'))?'assets/images/'.setting_all('favicon'):'assets/images/favicon.ico');?>">
  <title><?php echo (setting_all('website'))?setting_all('website'):'Dasboard';?></title>
  </head>
<?php 
$no=0;
if($jeniscetak =='1'){ ?>
<center>
<img src="<?php echo base_url();?>assets/images/tutwuri.jpg" />
<div style="page-break-after: always;">
<table cellpadding=25 width="100%">
<tr><td align="CENTER">
<h1>RENCANA BEBAN KERJA DOSEN</h1>
</td></tr>
<tr><td>
<table>
<tr><td>Nama</td><td>:</td><td><?php echo $user_data[0]->name;?></td></tr>
<tr><td>Nomor Sertifikat</td><td>:</td><td><?php echo $user_data[0]->noserti;?></td></tr>
<tr><td>Fakultas</td><td>:</td><td><?php echo $user_data[0]->fakdos;?></td></tr>
<tr><td>Perguruan Tinggi</td><td>:</td><td><?php echo $user_data[0]->nmpt;?></td></tr>
<tr><td>Semester</td><td>:</td><td><?php echo $user_data[0]->sem;?> - <?php echo $user_data[0]->smtpt;?></td></tr>
</table>
</td></tr>
<tr><td align="center">
<h1>KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN <br/>REPUBLIK INDONESIA</h1>
</td></tr>
</table>
</div>

<div style="width:100%">
<table>
<tr><td align="left">
<h1>I. IDENTITAS</h1>
</td></tr>
<tr><td>
	<table width="1000px">
	<tr><td>Nama</td><td>:</td><td><?php echo $user_data[0]->name;?></td></tr>
	<tr><td>Nomor Sertifikat</td><td>:</td><td><?php echo $user_data[0]->noserti;?></td></tr>
	<tr><td>Perguruan Tinggi</td><td>:</td><td><?php echo $user_data[0]->nmpt;?></td></tr>
	<tr><td>Status</td><td>:</td><td><?php echo $user_data[0]->katdos?></td></tr>
	<tr><td>Alamat PT</td><td>:</td><td><?php echo $user_data[0]->almpt;?></td></tr>
	<tr><td>Jurusan</td><td>:</td><td><?php echo $user_data[0]->fakdos;?></td></tr>
	<tr><td>Program Studi</td><td>:</td><td><?php echo $user_data[0]->prodidos;?></td></tr>
	<tr><td>Jab. Fungsional / Gol.</td><td>:</td><td><?php echo $user_data[0]->gol;?></td></tr>
	<tr><td>Tempat - Tgl. Lahir</td><td>:</td><td><?php echo $user_data[0]->tplhr;?> <?php if($user_data[0]->tglhr!='0000-00-00') echo '/'.$user_data[0]->tglhr;?></td></tr>
	<tr><td>S1</td><td>:</td><td><?php echo $user_data[0]->pts1;?></td></tr>
	<tr><td>S2</td><td>:</td><td><?php echo $user_data[0]->pts2;?></td></tr>
	<tr><td>S3</td><td>:</td><td><?php echo $user_data[0]->pts3;?></td></tr>
	<tr><td>Ilmu Yang Ditekuni</td><td>:</td><td><?php echo $user_data[0]->bidildos;?></td></tr>
	<tr><td>No. HP</td><td>:</td><td><?php echo $user_data[0]->nohp;?></td></tr>
	</table>
</td>
</tr>
<tr>
	<td align="left">
		<table border=1>
		<tr>
		<td align="center" valign="center" rowspan="2" width="50px">No.</td>
		<td align="center" valign="center" rowspan="2" width="450px">Kegiatan</td>
		<td align="center" valign="center" colspan="2">Beban Kerja</td>
		<td align="center" valign="center" rowspan="2" width="200px">Masa Pelaksanaan Tugas</td>
		</tr>
		<tr>
		<td  align="center" valign="center" width="250px">Bukti Penugasan</td>
		<td  align="center" valign="center" width="50px">SKS</td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td align="left">
		<?php if(isset($pendidikan)){?>
		II. BIDANG PENDIDIKAN
		<table border="0" width="1000px">
			<?php
				
			foreach($pendidikan as $p){
				$no+=1;
				?>
		<tr>
			<td align="center" valign="center" width="50px"><?php echo $no;?></td>
			<td align="left" valign="center" width="450px"><?php echo $p->nama_kegiatan;?></td>
			<td align="left" valign="center" width="250px"><?php echo $p->bebankerja_bukti;?></td>
			<td align="center" valign="center" width="50px"><?php echo $p->bebankerja_sks;?></td>
			<td align="center" valign="center" width="200px"><?php echo $p->masa_penugasan;?></td>
		</tr>
			<?php } ?>
		<?php } ?>
		</table>
	</td>
</tr>
<tr>
	<td align="left">
		<?php if(isset($penelitian)){?>
		III. BIDANG PENELITIAN DAN PENGEMBANGAN ILMU 
		<table border="0" width="1000px">
			<?php
			foreach($penelitian as $p){
				$no+=1;
				?>
		<tr>
			<td align="center" valign="center" width="50px"><?php echo $no;?></td>
			<td align="left" valign="center" width="450px"><?php echo $p->nama_kegiatan;?></td>
			<td align="left" valign="center" width="250px"><?php echo $p->bebankerja_bukti;?></td>
			<td align="center" valign="center" width="50px"><?php echo $p->bebankerja_sks;?></td>
			<td align="center" valign="center" width="200px"><?php echo $p->masa_penugasan;?></td>
		</tr>
			<?php } ?>
		<?php } ?>
		</table>
	</td>
</tr>
<tr>
	<td align="left">
		<table >
		<tr>
			<td align="center" valign="center" width="500px">
			Pekanbaru, <?php echo date("d M Y");?><br/>
			Dosen Yang Membuat<br/><br/>
			<?php echo $user_data[0]->name;?><br/>
			<?php echo $user_data[0]->nipdos;?>
			</td>
			<td align="center" valign="top" width="500px">
			Menyetujui,<br/>
			Ketua Jurusan/Prodi/Departemen<br/></br>
			<?php echo $pts2;?>
			</td>
		</tr>
		</table>
	</td>
</tr>

</table>
</div>
</center>
<?php }else if($jeniscetak =='2'){ ?>
<center>
<img src="<?php echo base_url();?>assets/images/tutwuri.jpg" />
<div style="page-break-after: always;">
<table cellpadding="25" width="100%">
<tr><td align="CENTER">
<h1>LAPORAN KINERJA DOSEN</h1>
</td></tr>
<tr><td>
<table>
<tr><td>Nama</td><td>:</td><td><?php echo $user_data[0]->name;?></td></tr>
<tr><td>Nomor Sertifikat</td><td>:</td><td><?php echo $user_data[0]->noserti;?></td></tr>
<tr><td>Fakultas</td><td>:</td><td><?php echo $user_data[0]->fakdos;?></td></tr>
<tr><td>Perguruan Tinggi</td><td>:</td><td><?php echo $user_data[0]->nmpt;?></td></tr>
<tr><td>Semester</td><td>:</td><td><?php echo $user_data[0]->sem;?> - <?php echo $user_data[0]->smtpt;?></td></tr>
</table>
</td></tr>
<tr><td align="center">
<h1>KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN <br/>REPUBLIK INDONESIA</h1>
</td></tr>
</table>
</div>

<div>
<table>
<tr><td align="left">
<h1>I. IDENTITAS</h1>
</td></tr>
<tr><td>
	<table width="1000px">
	<tr><td>Nama</td><td>:</td><td><?php echo $user_data[0]->name;?></td></tr>
	<tr><td>Nomor Sertifikat</td><td>:</td><td><?php echo $user_data[0]->noserti;?></td></tr>
	<tr><td>Perguruan Tinggi</td><td>:</td><td><?php echo $user_data[0]->nmpt;?></td></tr>
	<tr><td>Status</td><td>:</td><td><?php echo $user_data[0]->katdos?></td></tr>
	<tr><td>Alamat PT</td><td>:</td><td><?php echo $user_data[0]->almpt;?></td></tr>
	<tr><td>Jurusan</td><td>:</td><td><?php echo $user_data[0]->fakdos;?></td></tr>
	<tr><td>Program Studi</td><td>:</td><td><?php echo $user_data[0]->prodidos;?></td></tr>
	<tr><td>Jab. Fungsional / Gol.</td><td>:</td><td><?php echo $user_data[0]->gol;?></td></tr>
	<tr><td>Tempat - Tgl. Lahir</td><td>:</td><td><?php echo $user_data[0]->tplhr;?> <?php if($user_data[0]->tglhr!='0000-00-00') echo '/'.$user_data[0]->tglhr;?></td></tr>
	<tr><td>S1</td><td>:</td><td><?php echo $user_data[0]->pts1;?></td></tr>
	<tr><td>S2</td><td>:</td><td><?php echo $user_data[0]->pts2;?></td></tr>
	<tr><td>S3</td><td>:</td><td><?php echo $user_data[0]->pts3;?></td></tr>
	<tr><td>Ilmu Yang Ditekuni</td><td>:</td><td><?php echo $user_data[0]->bidildos;?></td></tr>
	<tr><td>No. HP</td><td>:</td><td><?php echo $user_data[0]->nohp;?></td></tr>
	</table>
</td>
</tr>
<tr>
	<td align="left">
		<table border=1>
		<tr>
		<td align="center" valign="center" rowspan="2" width="50px">No.</td>
		<td align="center" valign="center" rowspan="2" width="250px">Kegiatan</td>
		<td align="center" valign="center" colspan="2">Beban Kerja</td>
		<td align="center" valign="center" rowspan="2" width="100px">Masa Pelaksanaan Tugas</td>
		<td align="center" valign="center" colspan="2">Kinerja</td>
		<td align="center" valign="center" rowspan="2" width="100px">Penilaian / Rekomendasi Asesor</td>
		</tr>
		<tr>
		<td  align="center" valign="center" width="200px">Bukti Penugasan</td>
		<td  align="center" valign="center" width="50px">SKS</td>
		<td  align="center" valign="center" width="200px">Bukti Kinerja</td>
		<td  align="center" valign="center" width="50px">SKS</td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td align="left">
		<?php if(isset($pendidikan)){?>
		II. BIDANG PENDIDIKAN
		<table border="0" width="1000px">
			<?php
			foreach($pendidikan as $p){
				$no+=1;
				?>
		<tr>
			<td align="center" valign="center" width="50px"><?php echo $no;?></td>
			<td align="left" valign="center" width="250px"><?php echo $p->nama_kegiatan;?></td>
			<td align="left" valign="center" width="200px"><?php echo $p->bebankerja_bukti;?></td>
			<td align="center" valign="center" width="50px"><?php echo $p->bebankerja_sks;?></td>
			<td align="center" valign="center" width="100px"><?php echo $p->masa_penugasan;?></td>
			<td align="left" valign="center" width="200px"><?php echo $p->kinerja_bukti;?></td>
			<td align="center" valign="center" width="50px"><?php echo $p->kinerja_sks;?></td>
			<td align="center" valign="center" width="100px"><?php echo $p->rekomendasi;?></td>
		</tr>
			<?php } ?>
		<?php } ?>
		</table>
	</td>
</tr>
<tr>
	<td align="left">
		<?php if(isset($penelitian)){?>
		III. BIDANG PENELITIAN DAN PENGEMBANGAN ILMU 
		<table border="0" width="1000px">
			<?php
			foreach($penelitian as $p){
				$no+=1;
				?>
		<tr>
			<td align="center" valign="center" width="50px"><?php echo $no;?></td>
			<td align="left" valign="center" width="250px"><?php echo $p->nama_kegiatan;?></td>
			<td align="left" valign="center" width="200px"><?php echo $p->bebankerja_bukti;?></td>
			<td align="center" valign="center" width="50px"><?php echo $p->bebankerja_sks;?></td>
			<td align="center" valign="center" width="100px"><?php echo $p->masa_penugasan;?></td>
			<td align="left" valign="center" width="200px"><?php echo $p->kinerja_bukti;?></td>
			<td align="center" valign="center" width="50px"><?php echo $p->kinerja_sks;?></td>
			<td align="center" valign="center" width="100px"><?php echo $p->rekomendasi;?></td>
		</tr>
			<?php } ?>
		<?php } ?>
		</table>
	</td>
</tr>
<tr>
	<td align="left">
		<table border="1">
		<tr>
		<td align="center" valign="center" width="1000px" colspan="2">
		PERNYATAAN DOSEN<br/>
		<p><b>
		Saya dosen yang membuat laporan kinerja ini menyatakan bahwa semua aktivitas dan bukti pendukungnya adalah benar<br/>
		aktivitas saya dan saya sanggup menerima sanksi apapun termasuk penghentian tunjangan dan mengembalikan yang sudah</br>
		saya terima apabila pernyataan ini dikemudian hari terbukti tidak benar.</b><br/>
		<br/>
			Pekanbaru, <?php echo date("d M Y");?><br/>
			Dosen Yang Membuat<br/><br/>
			<?php echo $user_data[0]->name;?><br/>
			<?php echo $user_data[0]->nipdos;?>
		</p>
		</td>
		</tr>
		<tr>
		<td align="center" valign="center" width="1000px" colspan="2">
		PERNYATAAN Asesor<br/>
		<p>
		Saya sudah memeriksa kebenaran dokumen yang ditunjukkan dan bisa menyetujui laporan evaluasi ini.
		</p>
		</td>
		</tr>
		<tr>
			<td align="center" valign="center" width="500px">
				Asesor I<br/><br/><br/>
				<?php echo $ass1[0]->name;?><br/>
				<?php echo $ass1[0]->noserti;?>
				</td>
				<td align="center" valign="top" width="500px">
				Asesor II<br/><br/><br/>
				<?php echo $ass2[0]->name;?><br/>
				<?php echo $ass1[0]->noserti;?>
				</td>
		</tr>
		</table>
	</td>
</tr>

</table>
</div>
</center>
<?php } ?>