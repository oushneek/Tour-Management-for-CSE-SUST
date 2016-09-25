<div class="row show-grid">
  <div class="col-lg-12" style="padding-left: 8%;padding-top: 2%;padding-right:6%">
     
  <legend>All Organizers</legend>
  <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Reg</th>
            <th>Phone</th>
            <th>Email</th>
            <?php 
            if($this->session->userdata('logged_in') && ($this->session->userdata('user_type_id') == 4 || $this->session->userdata('user_type_id') == 6)){

              echo "<th>Delete</th>";
            }?>
          </tr>
      
        </thead>
        <tbody>
          <?php 
            $tour_obj=new Tour_table();
            $tour_obj->where('status',2);
            $tour_obj->get();

            $default_tour=$tour_obj->id_tour;

            $query=$this->db->query('Select * from user where id_user in(Select id_user from person_tour where id_tour='.$default_tour. ' and user_type_id=6)');

            $count=0;
            foreach ($query->result() as $organizer_obj)
            {
                echo "
                <tr>
                <td>".++$count."</td>
                <td>".$organizer_obj->name."</td>
                <td>".$organizer_obj->reg_no."</td>
                <td>".$organizer_obj->mobile."</td>
                <td>".$organizer_obj->email."</td>";
                
                if($this->session->userdata('logged_in') && ($this->session->userdata('user_type_id') == 4 || $this->session->userdata('user_type_id') == 6)){

                echo "<td>
                  <a href='".base_url()."organizer/delete_from_org/".$organizer_obj->id_user."' class='btn btn-danger btn-sm'>Delete</a>
                </td>";
              }
               echo "</tr>";

            }
          ?>
        </tbody>
      </table>


  </div>
  
</div>
