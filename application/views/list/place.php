<div class="row show-grid">
  <div class="col-lg-12" style="padding-left: 8%;padding-top: 2%;padding-right:6%">
     
  <legend>All Places</legend>
  <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Place Name</th>
            <th>Place Description</th>
            <th>Place Photo</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Assign</th>
          </tr>
      
        </thead>
        <tbody>
          <?php 

            $places_obj= new Place_table();
            $places_obj->get();

            $tour_obj=new Tour_table();
            $tour_obj->where('status',2);
            $tour_obj->get();

            $default_tour=$tour_obj->id_tour;

            $tour_place_obj=new Tour_place_table();
            $tour_place_obj->where('id_tour',$default_tour);
            $tour_place_obj->get();

            $count=0;

            $flag=0;
            foreach ($places_obj as $place_obj)
            {
              
                echo "
                <tr>
                <td>".++$count."</td>
                <td>".$place_obj->name."</td>
                <td>".$place_obj->description."</td>
                <td><img src='".base_url()."uploads/".$place_obj->image."' height='100' width='150'/></td>

                <td>
                  <a href='".base_url()."place/edit/".$place_obj->id_place."' class='btn btn-primary btn-sm'>Edit</a>
                </td>
                 <td>
                  <a href='".base_url()."place/delete/".$place_obj->id_place."' class='btn btn-danger btn-sm'>Delete</a>
                </td>";
                foreach($tour_place_obj as $temp){
                  if($temp->id_place==$place_obj->id_place){
                    $flag=1;
                    break;
                    
                  }
                  else{
                    $flag=0;
                    
                  }
                }
                if($flag==1){
                  echo "
                    <td>
                      <a href='".base_url()."tour_place/assign/".$place_obj->id_place."' class='btn btn-info btn-sm disabled'>Assign to Default Tour</a>
                    </td>";
                }
                else{
                  echo 
                    "<td>
                      <a href='".base_url()."tour_place/assign/".$place_obj->id_place."' class='btn btn-info btn-sm'>Assign to Default Tour</a>
                    </td>";
                }
                echo"
               </tr>
               ";

            }
          ?>
        </tbody>
      </table>


  </div>
  
</div>
