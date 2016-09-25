<div class="row show-grid">
  <div class="col-lg-8" style="padding-left: 8%;padding-top: 2%;">
      
        <?php  
        $attributes = array('class' => 'form-horizontal');
        echo form_open('login/process', $attributes);
        ?>
        <fieldset>
        <?php //echo validation_errors('<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
        <legend>Login</legend>

        <div class="form-group">
          <?php echo form_error('email','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="email" class="col-lg-2 control-label">Email*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="email" name="email"  value="<?php echo set_value('email'); ?>" placeholder="Type your Email ID">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('password','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="password" class="col-lg-2 control-label">Password*</label>
          <div class="col-lg-10">
            <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Type your Password">
          </div>
        </div>

      
  
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </div>
  </fieldset>
</form>
  </div>
    <div class="col-lg-4" style="padding-top: 4%;padding-right: 2%;">
      <div class="panel panel-default">
      <div class="panel-heading">Forget Password</div>
        <div class="panel-body">
              <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Email</span>
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Button</button>
                    </span>
                  </div>
                </div>
        </div>
      </div>
    </div>
</div>