<div class="row show-grid">
  <div class="col-lg-12" style="padding-left: 8%;padding-top: 2%;padding-right:6%">
     <?php 

            $tour_obj=new Tour_table();
            $tour_obj->where('status',2);
            $tour_obj->get();

            $default_tour=$tour_obj->id_tour;

            $person_cost_obj=new Person_cost_table();
            $person_cost_obj->where('id_tour',$default_tour);
            $person_cost_obj->get();
            $count=0;
     ?>
     <h4 class="text-info"><strong>Welcome to <?php echo $tour_obj->tour_title; ?></strong></h4>
     <p><?php echo $tour_obj->description; ?></p>
     <br>
     <h4 class="text-info"><strong>Cost per person</strong></h4>
     <?php 
            echo "<p>";

           foreach ($person_cost_obj as $new_obj)
            {

              if($new_obj->user_type_id==1)
                echo "<span class='badge' >Student : ".$new_obj->cost."Tk.</span> , ";
              elseif($new_obj->user_type_id==3)
                echo "<span class='badge' >Teacher : ".$new_obj->cost."Tk.</span> , ";
              elseif($new_obj->user_type_id==5)
                echo "<span class='badge' >Alumni : ".$new_obj->cost."Tk.</span> , ";
              elseif($new_obj->user_type_id==2)
                echo "<span class='badge' >Guest : ".$new_obj->cost."Tk.</span>";
              

            }
            echo "</p>";
          ?>
          <br>

  <h4 class="text-info"><strong>Places we are visiting this year</strong></h4>
  <table class="table table-hover">
        
        <tbody>
          <?php 

            $query=$this->db->query('Select * from place where id_place in(Select id_place from tour_place where id_tour='.$default_tour.')');


            foreach ($query->result() as $place_obj)
            {
              
                echo "
                <tr>
                <td><h4 class='text-info'><b>".$place_obj->name."</b></h4><br><img src='".base_url()."uploads/".$place_obj->image."' height='100' width='150'/></td>
                <td>".$place_obj->description."</td>
               </tr>
               ";

            }
          ?>
        </tbody>
      </table>


  </div>
  
</div>
