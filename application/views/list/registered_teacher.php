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
            
            
            $query=$this->db->query('Select * from user where id_user in(Select id_user from person_tour where id_tour='.$default_tour. ' and payment_confirm=0 and user_type_id=3)');


            $count=0;
            foreach ($query->result() as $teacher_obj)
            {
                echo "
                <tr>
                <td>".++$count."</td>
                <td>".$teacher_obj->name."</td>
                <td>".$teacher_obj->mobile."</td>
                <td>".$teacher_obj->home_phone."</td>
                <td>".$teacher_obj->email."</td>
                <td>".$teacher_obj->t_shirt_size."</td>
                <td>".$teacher_obj->create_date."</td>
                <td>
                  <a href='".base_url()."registered_user/confirm_teacher/".$teacher_obj->id_user."' class='btn btn-primary btn-sm'>Payment Confirm</a>
                </td>
                 <td>
                  <a href='".base_url()."registered_user/delete/".$teacher_obj->id_user."' class='btn btn-danger btn-sm'>Delete</a>
                </td>
               </tr>
               ";

            }
          ?>
        </tbody>
      </table>

  </div>
  
</div>
