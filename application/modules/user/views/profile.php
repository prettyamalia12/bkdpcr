<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper clearfix">
<!-- Main content -->
  <div class="col-md-12 form f-label">
  <?php if($this->session->flashdata("messagePr")){?>
    <div class="alert alert-<?php echo $this->session->flashdata("messageType")?>">      
      <?php echo $this->session->flashdata("messagePr")?>
    </div>
  <?php } ?>
    <!-- Profile Image -->
    <div class="box box-success pad-profile">
      <div class="box-header with-border">
        <h3 class="box-title">Identitas <small></small></h3>
      </div>
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'user/add_edit' ?>" class="form-label-left">
        <div class="box-body box-profile">
          <div class="col-md-3">
            <div class="pic_size" id="image-holder"> 
            <?php  
              if(file_exists('upload/profil/'.$user_data[0]->profile_pic) && isset($user_data[0]->profile_pic)){
              $profile_pic = $user_data[0]->profile_pic;
              }else{
              $profile_pic = 'user.png';}?>
              <center> <img class="thumb-image setpropileam" src="<?php echo base_url();?>/upload/profil/<?php echo isset($profile_pic)?$profile_pic:'user.png';?>" alt="User profile picture"></center>
            </div>
            <br>
            <div class="fileUpload btn btn-success wdt-bg">
                <span>Change Picture</span>
                <input id="fileUpload" class="upload" name="profile_pic" type="file" accept="image/*" /><br />
                <input type="hidden" name="fileOld" value="<?php echo isset($user_data[0]->profile_pic)?$user_data[0]->profile_pic:'';?>" />
            </div>
          </div>
          <div class="col-md-8">
            <h3>Personal Information:</h3>
            
			<?php if ($user_data[0]->user_type =='admin') {?>
			<!-- Halaman Admin -->
			<div class="form-group has-feedback clear-both">
                  <label for="exampleInputname">1. NAMA:</label>
                  <input type="text" id="name" name="name" value="<?php echo (isset($user_data[0]->name)?$user_data[0]->name:'');?>" required="required" class="form-control" placeholder="">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
	          <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">2. NO. HP</label>
              <input type="text" pattern= "[0-9]" maxlength="15" id="nohp" name="nohp" value="<?php echo (isset($user_data[0]->nohp)?$user_data[0]->nohp:'');?>" required="required" class="form-control" placeholder="">
                </div>
			  <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">3. E-MAIL</label>
              <input type="email" id="email" name="email" value="<?php echo (isset($user_data[0]->email)?$user_data[0]->email:'');?>" required="required" class="form-control" placeholder="">
                </div>
          
              <br>
            <h3>Change Password:</h3> 
            <div class="form-group has-feedback">
              <label for="exampleInputEmail1">Current Password:</label>
              <input id="pass11" class="form-control" pattern=".{6,}" type="password" placeholder="********" name="currentpassword" title="6-14 characters">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>                       
            <div class="form-group has-feedback">
              <label for="exampleInputEmail1">New Password:</label>
              <input type="password" class="form-control" placeholder="New Password" name="password">
              <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>                       
            <div class="form-group has-feedback">
              <label for="exampleInputEmail1">Confirm New Password:</label>
              <input type="password" class="form-control" placeholder="Confirm New Password" name="confirmPassword">
              <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>  
            <br>
            <div class="form-group has-feedback sub-btn-wdt" >
              <input type="hidden" name="users_id" value="<?php echo isset($user_data[0]->users_id)?$user_data[0]->users_id:''; ?>">
              <input type="hidden" name="user_type" value="<?php echo isset($user_data[0]->user_type)?$user_data[0]->user_type:''; ?>">
              <button name="submit1" type="button" id="profileSubmit" class="btn btn-success btn-md wdt-bg">Save</button>  
              <!-- <div class=" pull-right">
              </div> -->
            </div>
			<?php }else if ($user_data[0]->user_type == 'Asesor')  { ?>
			<!-- Halaman -	Pimpinan unit, institusi, asesor -->
			 <div class="form-group has-feedback ">
                  <label for="exampleInputnosertif">1. NIRA:</label>
                  <input type="text" id="noserti" maxlength="14"  name="noserti" value="<?php echo (isset($user_data[0]->noserti)?$user_data[0]->noserti:'');?>" required="required" class="form-control" placeholder="">
                  <span class="glyphicon glyphicon-certificate form-control-feedback"></span>
                </div>
                
          <div class="form-group pull-left">
            <label for="exampleInputname">2. NIP:</label>
                  <input type="text" id="nipdos" pattern= "[0-9]" maxlength="6" name="nipdos" value="<?php echo (isset($user_data[0]->nipdos)?$user_data[0]->nipdos:'');?>" required="required" class="form-control" placeholder="">
            </div>

            <div class="form-group col-md-3">
                  <label for="exampleInputname">NIDN:</label>
                  <input type="text" id="nidn" pattern= "[0-9]" maxlength="10" name="nidn" value="<?php echo (isset($user_data[0]->nidn)?$user_data[0]->nidn:'');?>" required="required" class="form-control" placeholder="">
            </div>

          <div class="form-group has-feedback clear-both">
                  <label for="exampleInputname">3. NAMA:</label>
                  <input type="text" id="name" name="name" value="<?php echo (isset($user_data[0]->name)?$user_data[0]->name:'');?>" required="required" class="form-control" placeholder="">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

          <div class="form-group pull-left">
                  <label for="exampleInputname">GELAR DEPAN:</label>
                  <input type="text" id="Gelar_dpn" name="Gelar_dpn" value="<?php echo (isset($user_data[0]->Gelar_dpn)?$user_data[0]->Gelar_dpn:'');?>" required="required" class="form-control" placeholder="">
                </div>

          <div class="form-group col-md-3">
                  <label for="exampleInputname">GELAR BELAKANG:</label>
                  <input type="text" id="Gelar_blkg" name="Gelar_blkg" value="<?php echo (isset($user_data[0]->Gelar_blkg)?$user_data[0]->Gelar_blkg:'');?>" required="required" class="form-control" placeholder="">
                </div>

          <div class="form-group has-feedback clear-both">
                  <label for="exampleInputname">4. NAMA PT:</label>
                  <input type="text" id="nmpt" name="nmpt" value="<?php echo (isset($user_data[0]->nmpt)?$user_data[0]->nmpt:'');?>" required="required" class="form-control" placeholder="">
                </div>

          <div class="form-group has-feedback clear-both">
                  <label for="exampleInputname">5. ALAMAT PT:</label>
                  <input type="text" id="almpt" name="almpt" value="<?php echo (isset($user_data[0]->almpt)?$user_data[0]->almpt:'');?>" required="required" class="form-control" placeholder="">
                </div>
          
         <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">6. PROG. STUDI</label>
                <select name="prodidos" class="form-control" required>
                      <option value="Teknik Komputer">Teknik Komputer</option>
                      <option value="Teknik Elektronika">Teknik Elektronika</option>
                      <option value="Teknik Mekatronika">Teknik Mekatronika</option>
                      <option value="Teknik Telekomunikasi">Teknik Telekomunikasi</option>
                      <option value="Akuntansi">Akuntansi</option>
                      <option value="Teknik Informatika">Teknik Informatika</option>
                      <option value="Sistem Informasi">Sistem Informasi</option>
                      <option value="Teknik Elektronika Telekomunikasi">Teknik Elektronika Telekomunikasi</option>
                      <option value="Teknik Mesin">Teknik Mesin</option>
                      <option value="Teknik Listrik">Teknik Listrik</option>
                  </select>

          </div>

          <div class="form-group pull-left">
              <label for="exampleInputname">7. JABATAN FUNGSIONAL</label>
              <input type="text" id="pangkat" name="pangkat" value="<?php echo (isset($user_data[0]->pangkat)?$user_data[0]->pangkat:'');?>" required="required" class="form-control" placeholder="">
                </div>

          <div class="form-group col-md-3">

              <label for="exampleInputname">GOLONGAN</label>
              <input type="text" id="gol" name="gol" value="<?php echo (isset($user_data[0]->gol)?$user_data[0]->gol:'');?>" required="required" class="form-control" placeholder="">
                </div>

          <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">8. NO. HP</label>
              <input type="text" id="nohp" pattern= "[0-9]" maxlength="14"  name="nohp" value="<?php echo (isset($user_data[0]->nohp)?$user_data[0]->nohp:'');?>" required="required" class="form-control" placeholder="">
                </div>


          <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">9. E-MAIL</label>
              <input type="email" id="email" name="email" value="<?php echo (isset($user_data[0]->email)?$user_data[0]->email:'');?>" required="required" style="width:100%;"  placeholder="">
                </div>
          
          
              <br>
            <h3>Change Password:</h3> 
            <div class="form-group has-feedback">
              <label for="exampleInputEmail1">Current Password:</label>
              <input id="pass11" class="form-control" pattern=".{6,}" type="password" placeholder="********" name="currentpassword" title="6-14 characters">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>                       
            <div class="form-group has-feedback">
              <label for="exampleInputEmail1">New Password:</label>
              <input type="password" class="form-control" placeholder="New Password" name="password">
              <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>                       
            <div class="form-group has-feedback">
              <label for="exampleInputEmail1">Confirm New Password:</label>
              <input type="password" class="form-control" placeholder="Confirm New Password" name="confirmPassword">
              <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>  
            <br>
            <div class="form-group has-feedback sub-btn-wdt" >
              <input type="hidden" name="users_id" value="<?php echo isset($user_data[0]->users_id)?$user_data[0]->users_id:''; ?>">
              <input type="hidden" name="user_type" value="<?php echo isset($user_data[0]->user_type)?$user_data[0]->user_type:''; ?>">
              <button name="submit1" type="button" id="profileSubmit" class="btn btn-success btn-md wdt-bg">Save</button>  
              <!-- <div class=" pull-right">
              </div> -->
            </div>
			<?php }else if( $user_data[0]->user_type == 'Pimpinan Unit'  || $user_data[0]->user_type == 'Pimpinan Institusi' ){ ?>
			
			<!-- Halaman -	Pimpinan unit, institusi, asesor -->
                
          <div class="form-group pull-left">
            <label for="exampleInputname">1. NIP:</label>
                  <input type="text" id="nipdos" pattern= "[0-9]" maxlength="6" name="nipdos" value="<?php echo (isset($user_data[0]->nipdos)?$user_data[0]->nipdos:'');?>" required="required" class="form-control" placeholder="">
            </div>

            <div class="form-group col-md-3">
                  <label for="exampleInputname">NIDN:</label>
                  <input type="text" id="nidn" pattern= "[0-9]" maxlength="10" name="nidn" value="<?php echo (isset($user_data[0]->nidn)?$user_data[0]->nidn:'');?>" required="required" class="form-control" placeholder="">
            </div>

          <div class="form-group has-feedback clear-both">
                  <label for="exampleInputname">2. NAMA:</label>
                  <input type="text" id="name" name="name" value="<?php echo (isset($user_data[0]->name)?$user_data[0]->name:'');?>" required="required" class="form-control" placeholder="">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

          
          <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">3. FAKULTAS/DEPARTEMEN</label>
              <select name="fakdos" class="form-control" required>
                      <option value="Elektronika">Elektronika</option>
                      <option value="Teknologi Informasi">Teknologi Informasi</option>
                      <option value="Akuntansi">Akuntansi</option>
              </select>
          </div>

         <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">4. PROG. STUDI</label>
                <select name="prodidos" class="form-control" required>
                      <option value="Teknik Komputer">Teknik Komputer</option>
                      <option value="Teknik Elektronika">Teknik Elektronika</option>
                      <option value="Teknik Mekatronika">Teknik Mekatronika</option>
                      <option value="Teknik Telekomunikasi">Teknik Telekomunikasi</option>
                      <option value="Akuntansi">Akuntansi</option>
                      <option value="Teknik Informatika">Teknik Informatika</option>
                      <option value="Sistem Informasi">Sistem Informasi</option>
                      <option value="Teknik Elektronika Telekomunikasi">Teknik Elektronika Telekomunikasi</option>
                      <option value="Teknik Mesin">Teknik Mesin</option>
                      <option value="Teknik Listrik">Teknik Listrik</option>
                  </select>
              </form>
          </div>
              <br>
            <h3>Change Password:</h3> 
            <div class="form-group has-feedback">
              <label for="exampleInputEmail1">Current Password:</label>
              <input id="pass11" class="form-control" pattern=".{6,}" type="password" placeholder="********" name="currentpassword" title="6-14 characters">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>                       
            <div class="form-group has-feedback">
              <label for="exampleInputEmail1">New Password:</label>
              <input type="password" class="form-control" placeholder="New Password" name="password">
              <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>                       
            <div class="form-group has-feedback">
              <label for="exampleInputEmail1">Confirm New Password:</label>
              <input type="password" class="form-control" placeholder="Confirm New Password" name="confirmPassword">
              <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>  
            <br>
            <div class="form-group has-feedback sub-btn-wdt" >
              <input type="hidden" name="users_id" value="<?php echo isset($user_data[0]->users_id)?$user_data[0]->users_id:''; ?>">
              <input type="hidden" name="user_type" value="<?php echo isset($user_data[0]->user_type)?$user_data[0]->user_type:''; ?>">
              <button name="submit1" type="button" id="profileSubmit" class="btn btn-success btn-md wdt-bg">Save</button>  
              <!-- <div class=" pull-right">
              </div> -->
            </div>
			<?php }else{ ?>
			<!-- Halaman Dosen -->
          <div class="form-group has-feedback ">
                  <label for="exampleInputnosertif">1. NO. SERTIFIKAT:</label>
                  <input type="text" id="noserti" maxlength="14" name="noserti" value="<?php echo (isset($user_data[0]->noserti)?$user_data[0]->noserti:'');?>" required="required" class="form-control" placeholder="">
                  <span class="glyphicon glyphicon-certificate form-control-feedback"></span>
                </div>
                <span>Upload Sertifikat</span>
				<?php if(isset($user_data[0]->sertifikat) && strlen($user_data[0]->sertifikat)>0){ ?>
				<a href="<?php echo base_url();?>upload/<?php echo isset($user_data[0]->sertifikat)?$user_data[0]->sertifikat:'';?>">
				<i class="blue fa fa-file"> File </i></a>
				<?php } ?>
                <input type="file" name='sertifikat' value="<?php echo isset($user_data[0]->sertifikat)?$user_data[0]->sertifikat:'';?>" />
                <br/>
                
          <div class="form-group pull-left">
            <label for="exampleInputname">2. NIP:</label>
                  <input type="text" id="nipdos" pattern= "[0-9]" maxlength="6" name="nipdos" value="<?php echo (isset($user_data[0]->nipdos)?$user_data[0]->nipdos:'');?>" required="required" class="form-control" placeholder="">
            </div>

            <div class="form-group col-md-3">
                  <label for="exampleInputname">NIDN:</label>
                  <input type="text" id="nidn" pattern= "[0-9]" maxlength="10" name="nidn" value="<?php echo (isset($user_data[0]->nidn)?$user_data[0]->nidn:'');?>" required="required" class="form-control" placeholder="">
            </div>

          <div class="form-group has-feedback clear-both">
                  <label for="exampleInputname">3. NAMA:</label>
                  <input type="text" id="name" name="name" value="<?php echo (isset($user_data[0]->name)?$user_data[0]->name:'');?>" required="required" class="form-control" placeholder="">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

          <div class="form-group pull-left">
                  <label for="exampleInputname">GELAR DEPAN:</label>
                  <input type="text" id="Gelar_dpn" name="Gelar_dpn" value="<?php echo (isset($user_data[0]->Gelar_dpn)?$user_data[0]->Gelar_dpn:'');?>" required="required" class="form-control" placeholder="">
                </div>

          <div class="form-group col-md-3">
                  <label for="exampleInputname">GELAR BELAKANG:</label>
                  <input type="text" id="Gelar_blkg" name="Gelar_blkg" value="<?php echo (isset($user_data[0]->Gelar_blkg)?$user_data[0]->Gelar_blkg:'');?>" required="required" class="form-control" placeholder="">
                </div>

          <div class="form-group has-feedback clear-both">
                  <label for="exampleInputname">4. NAMA PT:</label>
                  <input type="text" id="nmpt" name="nmpt" value="<?php echo (isset($user_data[0]->nmpt)?$user_data[0]->nmpt:'');?>" required="required" class="form-control" placeholder="">
                </div>

          <div class="form-group has-feedback clear-both">
                  <label for="exampleInputname">5. ALAMAT PT:</label>
                  <input type="text" id="almpt" name="almpt" value="<?php echo (isset($user_data[0]->almpt)?$user_data[0]->almpt:'');?>" required="required" class="form-control" placeholder="">
                </div>
          
          <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">6. FAKULTAS/DEPARTEMEN</label>
              <select name="fakdos" class="form-control" required>
                      <option value="Elektronika">Elektronika</option>
                      <option value="Teknologi Informasi">Teknologi Informasi</option>
                      <option value="Akuntansi">Akuntansi</option>
              </select>
          </div>

         <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">7. PROG. STUDI</label>
                <select name="prodidos" class="form-control" required>
                      <option value="Teknik Komputer">Teknik Komputer</option>
                      <option value="Teknik Elektronika">Teknik Elektronika</option>
                      <option value="Teknik Mekatronika">Teknik Mekatronika</option>
                      <option value="Teknik Telekomunikasi">Teknik Telekomunikasi</option>
                      <option value="Akuntansi">Akuntansi</option>
                      <option value="Teknik Informatika">Teknik Informatika</option>
                      <option value="Sistem Informasi">Sistem Informasi</option>
                      <option value="Teknik Elektronika Telekomunikasi">Teknik Elektronika Telekomunikasi</option>
                      <option value="Teknik Mesin">Teknik Mesin</option>
                      <option value="Teknik Listrik">Teknik Listrik</option>
                  </select>
              </form>
          </div>

          <div class="form-group pull-left">
              <label for="exampleInputname">8. JABATAN FUNGSIONAL</label>
              <input type="text" id="pangkat" name="pangkat" value="<?php echo (isset($user_data[0]->pangkat)?$user_data[0]->pangkat:'');?>" required="required" class="form-control" placeholder="">
                </div>

          <div class="form-group col-md-3">

              <label for="exampleInputname">GOLONGAN</label>
              <input type="text" id="gol" name="gol" value="<?php echo (isset($user_data[0]->gol)?$user_data[0]->gol:'');?>" required="required" class="form-control" placeholder="">
                </div>
          <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">9. TANGGAL LAHIR</label>
              <input type="date" id="tglhr" name="tglhr" value="<?php echo (isset($user_data[0]->tglhr)?$user_data[0]->tglhr:'');?>" required="required" class="form-control" placeholder="">
                </div>

          <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">TEMPAT LAHIR</label>
              <input type="text" id="tplhr" name="tplhr" value="<?php echo (isset($user_data[0]->tplhr)?$user_data[0]->tplhr:'');?>" required="required" class="form-control" placeholder="">
                </div>

          <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">10. PENDIDIKAN S1</label>
              <input type="text" id="pts1" name="pts1" value="<?php echo (isset($user_data[0]->pts1)?$user_data[0]->pts1:'');?>" required="required" class="form-control" placeholder="">
                </div>

          <span>Upload Ijazah s1</span>
		  				<?php if(isset($user_data[0]->izajahs1) && strlen($user_data[0]->izajahs1)>0){ ?>
				<a href="<?php echo base_url();?>upload/<?php echo isset($user_data[0]->izajahs1)?$user_data[0]->izajahs1:'';?>">
				<i class="blue fa fa-file"> File </i></a>
				<?php } ?>

                <input type="file" name='ijazahs1' value="<?php echo isset($user_data[0]->izajahs1)?$user_data[0]->izajahs1:'';?>" />
                <br/>

          <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">11. PENDIDIKAN S2</label>
              <input type="text" id="pts2" name="pts2" value="<?php echo (isset($user_data[0]->pts2)?$user_data[0]->pts2:'');?>" required="required" class="form-control" placeholder="">
                </div>
          <span>Upload Ijazah s2</span>
		  				<?php if(isset($user_data[0]->ijazahs2) && strlen($user_data[0]->ijazahs2)>0){ ?>
				<a href="<?php echo base_url();?>upload/<?php echo isset($user_data[0]->ijazahs2)?$user_data[0]->ijazahs2:'';?>">
				<i class="blue fa fa-file"> File </i></a>
				<?php } ?>

                <input type="file" name='ijazahs2' value="<?php echo isset($user_data[0]->ijazahs2)?$user_data[0]->ijazahs2:'';?>" />
                <br/>

          <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">12. PENDIDIKAN S3</label>
              <input type="text" id="pts3" name="pts3" value="<?php echo (isset($user_data[0]->pts3)?$user_data[0]->pts3:'');?>" required="required" class="form-control" placeholder="">
                </div>
          <span>Upload Ijazah s3</span>
		  		<?php if(isset($user_data[0]->ijazahs3) && strlen($user_data[0]->ijazahs3)>0){ ?>
				<a href="<?php echo base_url();?>upload/<?php echo isset($user_data[0]->ijazahs3)?$user_data[0]->ijazahs3:'';?>">
				<i class="blue fa fa-file"> File </i></a>
				<?php } ?>

                <input type="file" id="ijazahs3" name="ijazahs3" value="<?php echo isset($user_data[0]->ijazahs3)?$user_data[0]->ijazahs3:'';?>">
                <br/>

          <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">13. JENIS</label>
              <select name="katdos" class="form-control" required>
                      <option value="DS">DS (Dosen Biasa)</option>
                      <option value="DT">DT (Dosen dengan Tugas Tambahan)</option>
                  </select>
           </div>

          <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">14. BIDANG ILMU</label>
              <input type="text" id="bidildos" name="bidildos" value="<?php echo (isset($user_data[0]->bidildos)?$user_data[0]->bidildos:'');?>" required="required" class="form-control" placeholder="">
                </div>

          <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">15. NO. HP</label>
              <input type="text" id="nohp"pattern= "[0-9]" maxlength="14"  name="nohp" value="<?php echo (isset($user_data[0]->nohp)?$user_data[0]->nohp:'');?>" required="required" class="form-control" placeholder="">
                </div>

          <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">16. TAHUN AKADEMIK</label>
              <select name="smtpt" class="form-control" required>
                      <option value="2009/2010">2009/2010</option>
                      <option value="2010/2011">2010/2011</option>
                      <option value="2011/2012">2011/2012</option>
                      <option value="2012/2013">2012/2013</option>
                      <option value="2013/2014">2013/2014</option>
                      <option value="2014/2015">2014/2015</option>
                      <option value="2015/2016">2015/2016</option>
                      <option value="2016/2017">2016/2017</option>
                      <option value="2017/2018">2017/2018</option>
                      <option value="2018/2019">2018/2019</option>
                      <option value="2019/2020">2019/2020</option>
                      <option value="2020/2021">2020/2021</option>
                    </select>
                </div>

          <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">SEMESTER</label>
              <select name="sem" class="form-control" required>
                      <option value="GENAP">GENAP</option>
                      <option value="GANJIL">GANJIL</option>
                  </select>
                </div>

          <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">17. ASESOR 1</label>
				<?php if(count($asesor_data)>0){ ?>
			  <select name="noass1" class="form-control">
					  <option value="0">-</option>
                      <?php foreach($asesor_data as $as){ ?>
					  <option value="<?php echo $as->users_id;?>" <?php if($as->users_id==$user_data[0]->noass1)echo 'selected';?>><?php echo $as->noserti;?>-<?php echo $as->name;?></option>
					  <?php } ?>
                  </select>
				<?php } ?>
                </div>
          <div class="form-group has-feedback clear-both">
              <label for="exampleInputname">18. ASESOR 2</label>
              <?php if(count($asesor_data)>0){ ?>
			  <select name="noass2" class="form-control">
					  <option value="0">-</option>
                      <?php foreach($asesor_data as $as){ ?>
					  <option value="<?php echo $as->users_id;?>" <?php if($as->users_id==$user_data[0]->noass2)echo 'selected';?>><?php echo $as->noserti;?>-<?php echo $as->name;?></option>
					  <?php } ?>
                  </select>
				<?php } ?>
			</div>
   

          <div class="form-group has-feedback">
              <label for="exampleInputname">19. E-MAIL</label>
              <input type="email" id="email" name="email" value="<?php echo (isset($user_data[0]->email)?$user_data[0]->email:'');?>" required="required" style="width:100%;" placeholder="">
                </div>
          
          <span>20. KTP</span>
			<?php if(isset($user_data[0]->ktp) && strlen($user_data[0]->ktp)>0 ){ ?>
				<a href="<?php echo base_url();?>upload/<?php echo isset($user_data[0]->ktp)?$user_data[0]->ktp:'';?>">
				<i class="blue fa fa-file"> File </i></a>
				<?php } ?>
                  <input type="file" id="KTP" name="KTP"/>
                <br/>
          
              <br>
            <h3>Change Password:</h3> 
            <div class="form-group has-feedback">
              <label for="exampleInputEmail1">Current Password:</label>
              <input id="pass11" class="form-control" pattern=".{6,}" type="password" placeholder="********" name="currentpassword" title="6-14 characters">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>                       
            <div class="form-group has-feedback">
              <label for="exampleInputEmail1">New Password:</label>
              <input type="password" class="form-control" placeholder="New Password" name="password">
              <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>                       
            <div class="form-group has-feedback">
              <label for="exampleInputEmail1">Confirm New Password:</label>
              <input type="password" class="form-control" placeholder="Confirm New Password" name="confirmPassword">
              <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>  
            <br>
            <div class="form-group has-feedback sub-btn-wdt" >
              <input type="hidden" name="users_id" value="<?php echo isset($user_data[0]->users_id)?$user_data[0]->users_id:''; ?>">
              <input type="hidden" name="user_type" value="<?php echo isset($user_data[0]->user_type)?$user_data[0]->user_type:''; ?>">
              <button name="submit1" type="button" id="profileSubmit" class="btn btn-success btn-md wdt-bg">Save</button>  
              <!-- <div class=" pull-right">
              </div> -->
            </div>
			
			<?php } ?>
			
			
          </div>
         <!-- /.box-body -->
        </div>
      </form>                     
      <!-- /.box -->
    </div>
    <!-- /.content -->
  </div>
</div>
<!-- /.content-wrapper -->