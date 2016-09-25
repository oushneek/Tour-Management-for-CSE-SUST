
<div class="row show-grid">
  <div class="col-lg-12" style="padding-left: 8%;padding-top: 2%;padding-right:6%">
     
  <legend>All Tours</legend>
  <table class="table  table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Details</th>
            <th>Delete</th>
            <th>Set as Default</th>
            <th>Mark as Complete</th>
          </tr>
      
        </thead>
        <tbody>
          <?php 

            $tours_obj= new Tour_table();
            $tours_obj->order_by("status", "desc");
            $tours_obj->get();

            $count=0;
            foreach ($tours_obj as $tour_obj)
            {
                echo "
                <tr>
                <td>".++$count."</td>
                <td>".$tour_obj->tour_title."</td>
                <td>".$tour_obj->description."</td>
                <td>".$tour_obj->start_date."</td>
                <td>".$tour_obj->end_date."</td>";


                if($tour_obj->status==1){
                  echo"<td>Complete</td>
                  <td>
                  <a href='".base_url()."tour/details/".$tour_obj->id_tour."' class='btn btn-primary btn-sm '>Details</a>
                </td>
                 <td>
                  <a href='#' class='btn btn-danger btn-sm disabled'>Delete</a>
                </td>
                <td>
                  <a href='#' class='btn btn-success btn-sm disabled'>Set as Default</a>
                </td>
                <td>
                  <a href='#' class='btn btn-info btn-sm disabled'>Mark as Complete</a>
                </td>";
                }
                else if($tour_obj->status==0){
                  echo"<td>Incomplete</td>
                  <td>
                  <a href='".base_url()."tour/edit/".$tour_obj->id_tour."' class='btn btn-primary btn-sm'>Edit</a>
                </td>
                 <td>
                  <a href='".base_url()."tour/delete/".$tour_obj->id_tour."' class='btn btn-danger btn-sm'>Delete</a>
                </td>
                <td>
                  <a href='".base_url()."tour/set_default/".$tour_obj->id_tour."' class='btn btn-success btn-sm'>Set as Default</a>
                </td>
                <td>
                  <a href='".base_url()."tour/set_complete/".$tour_obj->id_tour."' class='btn btn-info btn-sm'>Mark as Complete</a>
                </td>";
                }

                  else if($tour_obj->status==2){
                  echo"<td>Default</td>
                  <td>
                  <a href='".base_url()."tour/edit/".$tour_obj->id_tour."' class='btn btn-primary btn-sm'>Edit</a>
                </td>
                 <td>
                  <a href='".base_url()."tour/delete/".$tour_obj->id_tour."' class='btn btn-danger btn-sm'>Delete</a>
                </td>
                <td>
                  <a href='3' class='btn btn-success btn-sm disabled'>Set as Default</a>
                </td>
                <td>
                  <a href='".base_url()."tour/set_complete/".$tour_obj->id_tour."' class='btn btn-info btn-sm'>Mark as Complete</a>
                </td>";
                
                }
                echo "
               </tr>
               ";

            }
          ?>
        </tbody>
          
        </tbody>
      </table>

      <?php  
        $attributes = array('class' => 'form-horizontal');
        echo form_open('tour/create', $attributes);
      ?>
      <fieldset>
        <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="submit" class="btn btn-primary">Add New Tour</button>
      </div>
    </div>
  </fieldset>
</form>

  </div>
  
</div>
