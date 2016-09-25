<div class="row show-grid">
  <div class="col-lg-12" style="padding-left: 8%;padding-top: 2%;padding-right:6%">
     
  <legend>All Tasks</legend>
  <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Task</th>
            <th>Budget</th>
            <th>Cost</th>
            <th>Status</th>
            <th>Assigned To</th>
            <th>Assign Task</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
      
        </thead>
        <tbody>
          <?php 
            $tour_obj=new Tour_table();
            $tour_obj->where('status',2);
            $tour_obj->get();

            $default_tour=$tour_obj->id_tour;

            $tasks_obj= new Task_list_table();
            $tasks_obj->where('id_tour', $default_tour);
            $tasks_obj->get();

            $count=0;
            $status='pending';
            foreach ($tasks_obj as $task_obj)
            {
              $user_obj=new User_table();
              $user_obj->where('id_user',$task_obj->id_user);
              $user_obj->get();


              if($task_obj->status==0){
                $status='Pending';
              }elseif ($task_obj->status==1) {
                $status='Assigned';
              }elseif ($task_obj->status==2) {
                $status='Completed';}
              
              
                echo "
                <tr>
                <td>".++$count."</td>
                <td>".$task_obj->title."</td>
                <td>".$task_obj->budget."</td>
                <td>".$task_obj->cost."</td>
                <td>".$status."</td>";
                if ($task_obj->status==1 || $task_obj->status==2) {
                  echo "<td>".$user_obj->name."(".$user_obj->reg_no.")</td>";
                  echo "
                  <td>
                  <a href='".base_url()."task/assign/".$task_obj->id_task."' class='btn btn-info btn-sm disabled'>Assign</a>
                </td>";
                
                }
                else{
                  echo "<td>None</td>";
                  echo "
                  <td>
                    <a href='".base_url()."task/assign/".$task_obj->id_task."' class='btn btn-info btn-sm'>Assign</a>
                  </td>";
                  
              }
              if($this->session->userdata('id_user')==$task_obj->id_user || $this->session->userdata('user_type_id')==4){
                echo "<td>
                  <a href='".base_url()."task/edit/".$task_obj->id_task."' class='btn btn-primary btn-sm'>Edit</a>
                </td>
                 <td>
                  <a href='".base_url()."task/delete/".$task_obj->id_task."' class='btn btn-danger btn-sm'>Delete</a>
                </td>
               </tr>
               ";
             }
             else{
              echo "<td>
                  <a href='".base_url()."task/edit/".$task_obj->id_task."' class='btn btn-primary btn-sm' disabled>Edit</a>
                </td>
                 <td>
                  <a href='".base_url()."task/delete/".$task_obj->id_task."' class='btn btn-danger btn-sm' disabled>Delete</a>
                </td>
               </tr>
               ";
             }

            }
          ?>
        </tbody>
      </table>
<?php  
        $attributes = array('class' => 'form-horizontal');
        echo form_open('task/create', $attributes);
      ?>
      <fieldset>
        <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="submit" class="btn btn-primary">Add New Task</button>
      </div>
    </div>
  </fieldset>
</form>

  </div>
  
</div>
