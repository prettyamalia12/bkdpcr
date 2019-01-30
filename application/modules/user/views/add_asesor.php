<form role="form bor-rad" action="<?php echo base_url().'user/update_asesor'?>" method="post">
  <div class="box-body">
    <div class="row">
          
						<div class="col-md-6">
				          <div class="form-group">
				            <label for="status"> Asesor 1</label>
							<?php if(count($asesor)>0){?>
				            <select name="asesor1" id="" class="form-control">
							<option value=""></option>
							<?php foreach($asesor as $a){?>
		        			<option value="<?php echo $a->users_id;?>" <?php if($a->users_id==$Data[0]->noass1) echo 'selected';?>><?php if(isset($a->noserti)&&strlen($a->noserti>0))echo $a->noserti.'-';?><?php echo $a->name;?></option>
								<?php } ?>
				            </select>
							<?php } ?>
				          </div>
				        </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Asesor 2</label>
                <?php if(count($asesor)>0){?>
				            <select name="asesor2" id="" class="form-control">
							<option value=""></option>
							<?php foreach($asesor as $a){?>
		        			<option value="<?php echo $a->users_id;?>" <?php if($a->users_id==$Data[0]->noass2) echo 'selected';?>><?php if(isset($a->noserti)&&strlen($a->noserti>0))echo $a->noserti.'-';?><?php echo $a->name;?></option>
								<?php } ?>
				            </select>
							<?php } ?>
              </div>
            </div>
					
						
        <?php if(!empty($Data[0]->users_id)){?>
        <input type="hidden"  name="userid" value="<?php echo isset($Data[0]->users_id)?$Data[0]->users_id:'';?>">
        <div class="box-footer sub-btn-wdt">
          <button type="submit" name="edit" value="edit" class="btn btn-success wdt-bg">Update</button>
        </div>
              <!-- /.box-body -->
        <?php }?>
      </form>