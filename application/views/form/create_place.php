<div class="row show-grid">
  <div class="col-lg-8" style="padding-left: 8%;padding-top: 2%;">
      
        <?php  
        $attributes = array('class' => 'form-horizontal');
        echo form_open_multipart('place/do_upload', $attributes);
        ?>
        <fieldset>
        <?php //echo validation_errors('<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
        <legend>Add New Place</legend>

        <div class="form-group">
          <?php echo form_error('place','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="place" class="col-lg-2 control-label">Place*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="place" name="place"  value="<?php echo set_value('place'); ?>" placeholder="Name of the Place">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('description','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="description" class="col-lg-2 control-label">Description*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="description" name="description" value="<?php echo set_value('description'); ?>" placeholder="Description of the place">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('image','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="image" class="col-lg-2 control-label">Image*</label>
          <div class="col-lg-10">
            <input type="file" name="userfile" size="20" />
          </div>
        </div>
  
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </div>
  </fieldset>
</form>
  </div>
    <div class="col-lg-4" style="padding-top: 4%;padding-right: 2%;">
      <div class="panel panel-default">
      <div class="panel-heading">Registration Intruction</div>
      <div class="panel-body">
        <h4><b>*</b> marked fields must be fulfilled.</h4>
        </div>
      </div>
    </div>
</div>