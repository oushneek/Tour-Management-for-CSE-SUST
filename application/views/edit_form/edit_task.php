<div class="row show-grid">
  <div class="col-lg-8" style="padding-left: 8%;padding-top: 2%;">
      
        <?php  
        $attributes = array('class' => 'form-horizontal');
        echo form_open('task/update', $attributes);
        ?>
        <fieldset>
        <?php //echo validation_errors('<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
        <legend>Edit Task</legend>

        <?php

          $task_obj=new Task_list_table();
          $task_obj->where('id_task',$id_task);
          $task_obj->get();

        ?>   

        <input type="hidden" name="id_task" value="<?php echo $id_task; ?>">

        <div class="form-group">
          <?php echo form_error('title','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="title" class="col-lg-2 control-label">Task*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="title" name="title"  value="<?php echo $task_obj->title;?>">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('budget','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="budget" class="col-lg-2 control-label">Budget</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="budget" name="budget" value="<?php echo $task_obj->budget;?>">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('cost','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="cost" class="col-lg-2 control-label">Cost</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="cost" name="cost" value="<?php echo $task_obj->cost;?>">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('user_select','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          
          <label for="select" class="col-lg-2 control-label">Organizer</label>
          <div class="col-lg-10">
            <select class="form-control" id="select" name="user_select">
              
              <?php

                // //get the dafault tour
                $tour_obj = new Tour_table();
                $tour_obj->where('status',2);
                $tour_obj->get();

                $default_tour=$tour_obj->id_tour;

              
                $query=$this->db->query('Select reg_no,name from user where id_user in(Select id_user from person_tour where id_tour='.$default_tour. ' and user_type_id=6)');

                foreach ($query->result() as $user_obj){
                  if($user_obj->id_user == $task_obj->id_user )
                  {
                    echo "<option selected value=".$user_obj->id_user.">".$user_obj->name."(".$user_obj->reg_no.")</option>";

                  }
                  else{
                    echo "<option value=".$user_obj->id_user.">".$user_obj->name."(".$user_obj->reg_no.")</option>";
                  }
                }

              ?>
              
            </select>
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