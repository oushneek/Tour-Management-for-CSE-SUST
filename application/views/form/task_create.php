<div class="row show-grid">
  <div class="col-lg-8" style="padding-left: 8%;padding-top: 2%;">
      
        <?php  
        $attributes = array('class' => 'form-horizontal');
        echo form_open('task/process', $attributes);
        ?>
        <fieldset>
        <?php //echo validation_errors('<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
        <legend>Create New Task</legend>

        <div class="form-group">
          <?php echo form_error('title','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="title" class="col-lg-2 control-label">Task*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="title" name="title"  value="<?php echo set_value('title'); ?>" placeholder="Type about the task">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('budget','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="budget" class="col-lg-2 control-label">Budget</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="budget" name="budget" value="<?php echo set_value('budget'); ?>" placeholder="Give your budget.">
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
      <div class="panel-heading">Registration Intruction</div>
      <div class="panel-body">
        <h4><b>*</b> marked fields must be fulfilled.</h4>
        </div>
      </div>
    </div>
</div>