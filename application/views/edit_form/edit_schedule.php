<div class="row show-grid">
  <div class="col-lg-8" style="padding-left: 8%;padding-top: 2%;">
      
        <?php  
        $attributes = array('class' => 'form-horizontal');
        echo form_open('schedule/update', $attributes);
        ?>
        <fieldset>
        <?php //echo validation_errors('<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
        <legend>Edit Schedule</legend>

        <?php

          $schedule_obj=new Schedule_table();
          $schedule_obj->where('id_schedule',$id_schedule);
          $schedule_obj->get();

        ?>   

        <input type="hidden" name="id_schedule" value="<?php echo $id_schedule; ?>">


        <div class="form-group">
          <?php echo form_error('date','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="date" class="col-lg-2 control-label">Date*</label>
          <div class="col-lg-10">
            <input type="date" class="form-control" id="date" name="date"  value="<?php echo $schedule_obj->date;?>">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('start_time','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="start_time" class="col-lg-2 control-label">Sart Time</label>
          <div class="col-lg-10">
            <input type="time" class="form-control" id="start_time" name="start_time" value="<?php echo $schedule_obj->start_time;?>">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('end_time','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="end_time" class="col-lg-2 control-label">End Time</label>
          <div class="col-lg-10">
            <input type="time" class="form-control" id="end_time" name="end_time" value="<?php echo $schedule_obj->end_time;?>">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('description','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="description" class="col-lg-2 control-label">Description*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="description" name="description" value="<?php echo $schedule_obj->description;?>">
          </div>
        </div>

        
  
  
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="submit" class="btn btn-primary">Save</button>
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