<div class="row show-grid">
  <div class="col-lg-8" style="padding-left: 8%;padding-top: 2%;">
      
        <?php  
        $attributes = array('class' => 'form-horizontal');
        echo form_open('tour/process', $attributes);
        ?>
        <fieldset>
        <?php //echo validation_errors('<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
        <legend>Create New Tour</legend>

        <div class="form-group">
          <?php echo form_error('title','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="title" class="col-lg-2 control-label">Tour Title*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="title" name="title"  value="<?php echo set_value('title'); ?>" placeholder="Type Tour Title">
          </div>
        </div>


        <div class="form-group">
          <?php echo form_error('description','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="description" class="col-lg-2 control-label">Description</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="description" name="description"  value="<?php echo set_value('description'); ?>" placeholder="Type Description">
          </div>
        </div>


        <div class="form-group">
          <?php echo form_error('start_date','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="start_date" class="col-lg-2 control-label">Start Date*</label>
          <div class="col-lg-10">
            <input type="date" class="form-control" id="start_date" name="start_date"  value="<?php echo set_value('start_date'); ?>">
          </div>
        </div>


        <div class="form-group">
          <?php echo form_error('end_date','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="description" class="col-lg-2 control-label">End Date*</label>
          <div class="col-lg-10">
            <input type="date" class="form-control" id="end_date" name="end_date"  value="<?php echo set_value('end_date'); ?>">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('cost_student','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="description" class="col-lg-2 control-label">Cost Student*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="cost_student" name="cost_student"  value="<?php echo set_value('cost_student'); ?>">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('cost_teacher','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="description" class="col-lg-2 control-label">Cost Teacher*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="cost_teacher" name="cost_teacher"  value="<?php echo set_value('cost_teacher'); ?>">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('cost_alumni','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="description" class="col-lg-2 control-label">Cost Alumni*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="cost_alumni" name="cost_alumni"  value="<?php echo set_value('cost_alumni'); ?>">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('cost_guest','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="description" class="col-lg-2 control-label">Cost Guest*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="cost_guest" name="cost_guest"  value="<?php echo set_value('cost_guest'); ?>">
          </div>
        </div>
        
  
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </div>
  </fieldset>
</form>
  </div>
    <div class="col-lg-4" style="padding-top: 4%;padding-right: 2%;">
      <div class="panel panel-default">
      <div class="panel-heading">INSTRUCTION</div>
      <div class="panel-body">
        <h4><b>*</b> marked fields must be fulfilled.</h4>
        </div>
      </div>
    </div>
</div>