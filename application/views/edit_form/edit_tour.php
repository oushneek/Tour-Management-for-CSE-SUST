<div class="row show-grid">
  <div class="col-lg-8" style="padding-left: 8%;padding-top: 2%;">
      
        <?php  
        $attributes = array('class' => 'form-horizontal');
        echo form_open('tour/update/', $attributes);
        ?>
        
        <fieldset>
        <?php //echo validation_errors('<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
        <legend>Edit Tour</legend>

        <?php

           $tour_obj=new Tour_table();
           $tour_obj->where('id_tour',$id_tour);
           $tour_obj->get();

           $cost_student=new Person_cost_table();
           $cost_student->where('id_tour',$id_tour);
           $cost_student->where('user_type_id',1);
           $cost_student->get();

           $cost_teacher=new Person_cost_table();
           $cost_teacher->where('id_tour',$id_tour);
           $cost_teacher->where('user_type_id',3);
           $cost_teacher->get();

           $cost_alumni=new Person_cost_table();
           $cost_alumni->where('id_tour',$id_tour);
           $cost_alumni->where('user_type_id',5);
           $cost_alumni->get();

           $cost_guest=new Person_cost_table();
           $cost_guest->where('id_tour',$id_tour);
           $cost_guest->where('user_type_id',2);
           $cost_guest->get();

          // $tour_place_obj=new Tour_place_table();
          // $tour_place_obj->where('id_tour',$id_tour);
          // $tour_place_obj->get();

          // $place_obj=new Place_table();
          // $place_obj->where('id_place',$tour_place_obj->id_place);
          // $place_obj->get();
        

        $this->db->select('*');
        $this->db->from('tour AS t')->where('t.id_tour',$id_tour);// I use aliasing make joins easier
        $this->db->join('tour_place AS t_p', 't.id_tour = t_p.id_tour', 'INNER');
        $this->db->join('place AS p', 'p.id_place = t_p.id_place', 'INNER');
        $result = $this->db->get();

        ?>

        <input type="hidden" name="id_tour" value="<?php echo $id_tour; ?>">

        
        <div class="form-group">
          <?php echo form_error('title','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="title" class="col-lg-2 control-label">Tour Title*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="title" name="title"  value="<?php echo $tour_obj->tour_title;?>">
          </div>
        </div>


        <div class="form-group">
          <?php echo form_error('description','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="description" class="col-lg-2 control-label">Description*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="description" name="description"  value="<?php echo $tour_obj->description;?>">
          </div>
        </div>


        <div class="form-group">
          <?php echo form_error('start_date','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="start_date" class="col-lg-2 control-label">Start Date*</label>
          <div class="col-lg-10">
            <input type="date" class="form-control" id="start_date" name="start_date"  value="<?php echo $tour_obj->start_date;?>">
          </div>
        </div>


        <div class="form-group">
          <?php echo form_error('end_date','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="description" class="col-lg-2 control-label">End Date*</label>
          <div class="col-lg-10">
            <input type="date" class="form-control" id="end_date" name="end_date"  value="<?php echo $tour_obj->end_date;?>">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('cost_student','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="description" class="col-lg-2 control-label">Cost Student*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="cost_student" name="cost_student"  value="<?php echo $cost_student->cost;?>">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('cost_teacher','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="description" class="col-lg-2 control-label">Cost Teacher*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="cost_teacher" name="cost_teacher"  value="<?php echo $cost_teacher->cost; ?>">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('cost_alumni','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="description" class="col-lg-2 control-label">Cost Alumni*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="cost_alumni" name="cost_alumni"  value="<?php echo $cost_alumni->cost; ?>">
          </div>
        </div>

        <div class="form-group">
          <?php echo form_error('cost_guest','<div class="alert alert-dismissable alert-danger">', '</div>'); ?>
          <label for="description" class="col-lg-2 control-label">Cost Guest*</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="cost_guest" name="cost_guest"  value="<?php echo $cost_guest->cost; ?>">
          </div>
        </div>

          <table class="table table-hover">
        <thead>
          <tr>
            <th>Places</th>
            <th>Remove</th>
          </tr>
      
        </thead>
        <tbody>
          <?php 

            $count=0;
            foreach ($result->result_array() as $res)
            {
              
                echo "
                <tr>
                
                <td>".$res['name']."</td>";
                $temp=$res["id_place"];
                echo"<td>
                  <a href='".base_url()."tour_place/delete/".$temp."' class='btn btn-danger btn-sm'>Remove</a>
                </td>
                
               </tr>
               ";

            }
          ?>
        </tbody>
      </table>


        
  
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
      <div class="panel-heading">INSTRUCTION</div>
      <div class="panel-body">
        <h4><b>*</b> marked fields must be fulfilled.</h4>
        </div>
      </div>
    </div>
</div>