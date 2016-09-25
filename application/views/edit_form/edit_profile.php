<div class="row show-grid">
  <div class="col-lg-8" style="padding-left: 8%;padding-top: 2%;">
  
  <?php  
    $attributes = array('class' => 'form-horizontal');
    echo form_open_multipart('user_profile/update', $attributes);
   ?>
  <legend>Edit Profile</legend>

  <fieldset>

  <?php

          $user_obj=new User_table();
          $user_obj->where('id_user',$id_user);
          $user_obj->get();

  ?>    
        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">



     <div class="form-group">
          <?php echo form_error('name','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="name" class="col-lg-2 control-label">Full Name*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $user_obj->name; ?>">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('pass','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="pass" class="col-lg-2 control-label">Password*</label>
          <div class="col-lg-10">
            <input type="password" class="form-control" id="pass" name="pass" value="<?php echo $user_obj->password; ?>">
          </div>
        </div>

        <?php 
        if($this->session->userdata('user_type_id') == 1 || $this->session->userdata('user_type_id') == 6 || $this->session->userdata('user_type_id') == 5){

        	?>
        <div class="form-group">
          <?php echo form_error('reg','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="reg" class="col-lg-2 control-label">Reg No*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="reg" name="reg" value="<?php echo $user_obj->reg_no; ?>" >
          </div>
        </div>
        <?php 
    		}
        ?>

        <div class="form-group">
          <?php echo form_error('email','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="email" class="col-lg-2 control-label">Email*</label>
          <div class="col-lg-10">
            <input type="email" class="form-control" id="email" name="email"  value="<?php echo $user_obj->email; ?>" >
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('mobile','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="mobile" class="col-lg-2 control-label">Mobile*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="mobile" name="mobile"  value="<?php echo $user_obj->mobile; ?>" >
          </div>
        </div>

         <div class="form-group">
          <?php echo form_error('home_mobile','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="home_mobile" class="col-lg-2 control-label">Home Phone*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="home_mobile" name="home_mobile"  value="<?php echo $user_obj->home_phone; ?>" >
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('t_shirt','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="t_shirt" class="col-lg-2 control-label">T-Shirt Size</label>
          <div class="col-lg-10">
            <select class="form-control" id="t_shirt" name="t_shirt">
              <option value="">Select</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
            </select>
            </div>
        </div>


        <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
      </fieldset>

  </div>
</div>