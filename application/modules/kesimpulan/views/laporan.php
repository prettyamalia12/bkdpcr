  <?php $setting = setting_all();?>
  <link rel="icon" href="<?php echo base_url((setting_all('favicon'))?'assets/images/'.setting_all('favicon'):'assets/images/favicon.ico');?>">
  <title><?php echo (setting_all('website'))?setting_all('website'):'Dasboard';?></title>
  </head>
<center><div style="page-break-after: always;">
	<h1>LEMBAR KOREKSI ASESOR DAN PENGESAHAN <br/>PIMPINAN PERGURUAN TINGGI</h1>
	<hr>
	<table>
	<tr><td>Nama</td><td>:</td><td><?php echo $user_data[0]->name;?></td></tr>
<tr><td>Nomor Sertifikat</td><td>:</td><td><?php echo $user_data[0]->noserti;?></td></tr>
<tr><td>Fakultas</td><td>:</td><td><?php echo $user_data[0]->fakdos;?></td></tr>
<tr><td>Perguruan Tinggi</td><td>:</td><td><?php echo $user_data[0]->nmpt;?></td></tr>
<tr><td>Semester</td><td>:</td><td><?php echo $user_data[0]->sem;?> - <?php echo $user_data[0]->smtpt;?></td></tr>
	</table>
	<table>
	<tr>
		<td align="left">
			<table border=1>
			<tr>
			<td  align="center" valign="center" width="50px">&nbsp;</td>
			<td  align="center" valign="center" width="200px">Keterangan</td>
			<td  align="center" valign="center" width="200px">Syarat(PP37 TH 2009)</td>
			<td  align="center" valign="center" width="200px">Kinerja</td>
			<td  align="center" valign="center" width="200px">Kesimpulan</td>
			</tr>
                    <tr>
					  <td>1</td>
                      <td>Pendidikan</td>
                      <td><?php if($user_data[0]->katdos=='DS')echo 'MIN 3SKS';?></td> 
                      <td><?php echo $s1;?> SKS</td>
                      <td><?php if($st1=='T')echo '<font color="red">TIDAK MEMENUHI</font>'; else echo 'MEMENUHI';?></td>
                    </tr>
                    <tr>
					  <td>2</td>
                      <td>Penelitian</td>
                     <td><?php if($user_data[0]->katdos=='DS')echo 'TIDAK BOLEH KOSONG';?></td> 
                      <td><?php echo $s2;?> SKS</td>
                      <td><?php if($st2=='T')echo '<font color="red">TIDAK MEMENUHI</font>'; else echo 'MEMENUHI';?></td>
                    </tr>
                    <tr>
					  <td>3</td>
                      <td>Pendidikan + Penelitian</td>
                      <td>MIN 9 SKS</td>
                      <td><?php echo $s3;?> SKS</td>
                      <td><?php if($st3=='T')echo '<font color="red">TIDAK MEMENUHI</font>'; else echo 'MEMENUHI';?></td>
                    </tr>
                    <tr>
					  <td>4</td>
                      <td>Pengabdian + Tambahan</td>
                      <td><?php if($user_data[0]->katdos=='DS')echo 'TIDAK BOLEH KOSONG';?></td>
                      <td><?php echo $s4;?> SKS</td>
                      <td><?php if($st4=='T')echo '<font color="red">TIDAK MEMENUHI</font>'; else echo 'MEMENUHI';?></td>
                    </tr>
                    <tr>
					  <td>&nbsp;</td>
                      <td>Kesimpulan Akhir</td>
                      <td>Min 12SKS, Max. 16SKS</td>
                      <td><?php echo $s3+$s4;?> SKS</td>
                      <td><?php if($st5=='T')echo '<font color="red">TIDAK MEMENUHI</font>'; else echo 'MEMENUHI';?></td>
                    </tr>
					<tr>
					  <td colspan="5" align="center"><font color="<?php if($st5=='T')echo 'red'; ?>"><?php echo $kesimpulan;?></font></td>
                    </tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="left">
			<table border="1">
			<tr>
			<td align="center" valign="center" width="880px" colspan="2">
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
			<td align="center" valign="center" width="880px" colspan="2">
			PERNYATAAN ASESOR<br/>
			<p>
			Saya sudah memeriksa kebenaran dokumen yang ditunjukkan dan bisa menyetujui laporan evaluasi ini.
			</p>
			</td>
			</tr>
			<tr>
				<td align="center" valign="center" width="440px">
				ASESOR I<br/><br/><br/>
				<?php echo $ass1[0]->name;?><br/>
				<?php echo $ass1[0]->noserti;?>
				</td>
				<td align="center" valign="top" width="440px">
				ASESOR II<br/><br/><br/>
				<?php echo $ass2[0]->name;?><br/>
				<?php echo $ass1[0]->noserti;?>
				</td>
			</tr>
			<tr>
				<td align="center" valign="center" width="440px">
				PIMPINAN KOPERTIS<br/><br/><br/>
				<?php echo $pipt;?><br/>
				</td>
				<td align="center" valign="top" width="440px">
				PIMPINAN PERGURUAN TINGGI<br/><br/><br/>
				<?php echo $pikop;?><br/>
				</td>
			</tr>
</table></td></tr></table></div>