<div class="row show-grid">
  <div class="col-lg-12" style="padding-left: 8%;padding-top: 2%;padding-right:6%">
     
  <legend>All Schedules</legend>
  <table class="table  table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Schedule</th>
            <?php 
            if($this->session->userdata('logged_in') && ($this->session->userdata('user_type_id') == 4 || $this->session->userdata('user_type_id') == 6)){
              echo "<th>Edit</th>
              <th>Delete</th>";
            }
            ?>
          </tr>
      
        </thead>
        <tbody>
          <?php 
            $tour_obj=new Tour_table();
            $tour_obj->where('status',2);
            $tour_obj->get();

            $default_tour=$tour_obj->id_tour;

            $schedules_obj= new Schedule_table();
            $schedules_obj->where('id_tour', $default_tour);
            $schedules_obj->get();

            $count=0;
            foreach ($schedules_obj as $schedule_obj)
            {
                echo "
                <tr>
                <td>".++$count."</td>
                <td>".$schedule_obj->date."</td>
                <td>".$schedule_obj->start_time."</td>
                <td>".$schedule_obj->end_time."</td>
                <td>".$schedule_obj->description."</td>";
                if($this->session->userdata('logged_in') && ($this->session->userdata('user_type_id') == 4 || $this->session->userdata('user_type_id') == 6)){
                
                    echo "<td>
                      <a href='".base_url()."schedule/edit/".$schedule_obj->id_schedule."' class='btn btn-primary btn-sm'>Edit</a>
                    </td>
                     <td>
                      <a href='".base_url()."schedule/delete/".$schedule_obj->id_schedule."' class='btn btn-danger btn-sm'>Delete</a>
                    </td>";
                  }
               echo "</tr>";

            }
          ?>
        </tbody>
          
        </tbody>
      </table>

      <?php  
        $attributes = array('class' => 'form-horizontal');
        echo form_open('schedule/create', $attributes);
      ?>
      <fieldset>
        <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <?php
        if($this->session->userdata('logged_in') && ($this->session->userdata('user_type_id') == 4 || $this->session->userdata('user_type_id') == 6)){
?>
        <button type="submit" class="btn btn-primary">Add New Schedule</button>
      <?php
    }?>
      </div>
    </div>
  </fieldset>
</form>

  </div>
  
</div>