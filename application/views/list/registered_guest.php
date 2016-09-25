<div class="row show-grid">
  <div class="col-lg-12" style="padding-left: 8%;padding-top: 2%;padding-right:6%">
     
  <legend>Registered (<?php echo $type; ?>)</legend>
  <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Home Phone</th>
            <th>Email</th>
            <th>T-Shirt</th>
            <th>Reg Date</th>
            <th>Confirm</th>
            <th>Delete</th>
          </tr>
      
        </thead>
        <tbody>
          <?php 
            $tour_obj=new Tour_table();
            $tour_obj->where('status',2);
            $tour_obj->get();

            $default_tour=$tour_obj->id_tour;
            
            
            $query=$this->db->query('Select * from user where id_user in(Select id_user from person_tour where user_type_id=2 and id_tour='.$default_tour. ' and payment_confirm=0)');

            $count=0;
            foreach ($query->result() as $guest_obj)
            {
                echo "
                <tr>
                <td>".++$count."</td>
                <td>".$guest_obj->name."</td>
                <td>".$guest_obj->mobile."</td>
                <td>".$guest_obj->home_phone."</td>
                <td>".$guest_obj->email."</td>
                <td>".$guest_obj->t_shirt_size."</td>
                <td>".$guest_obj->create_date."</td>
                <td>
                  <a href='".base_url()."registered_user/confirm_guest/".$guest_obj->id_user."' class='btn btn-primary btn-sm'>Payment Confirm</a>
                </td>
                 <td>
                  <a href='".base_url()."registered_user/delete/".$guest_obj->id_user."' class='btn btn-danger btn-sm'>Delete</a>
                </td>
               </tr>
               ";

            }
          ?>
        </tbody>
      </table>


  </div>
  
</div>
