<div class="row show-grid">
  <div class="col-lg-12" style="padding-left: 8%;padding-top: 2%;padding-right:6%">
  <legend>Confirmed (<?php echo $type; ?>)</legend>
  <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Reg</th>
            <th>Mobile</th>
            <th>Home Phone</th>
            <th>Email</th>
            <th>T-Shirt</th>
            <th>Reg Date</th>
            <th>Delete</th>
          </tr>
      
        </thead>
        <tbody>
          <?php 

            $tour_obj=new Tour_table();
            $tour_obj->where('status',2);
            $tour_obj->get();

            $default_tour=$tour_obj->id_tour;

            $query=$this->db->query('Select * from user where id_user in(Select id_user from person_tour where id_tour='.$default_tour. ' and payment_confirm=1 and (user_type_id=1 or user_type_id=6))');


            $count=0;
            foreach ($query->result() as $student_obj)
            {
                echo "
                <tr>
                <td>".++$count."</td>
                <td>".$student_obj->name."</td>
                <td>".$student_obj->reg_no."</td>
                <td>".$student_obj->mobile."</td>
                <td>".$student_obj->home_phone."</td>
                <td>".$student_obj->email."</td>
                <td>".$student_obj->t_shirt_size."</td>
                <td>".$student_obj->create_date."</td>
                
                 <td>
                  <a href='".base_url()."confirmed_user/delete/".$student_obj->id_user."' class='btn btn-danger btn-sm'>Delete</a>
                </td>
               </tr>
               ";

            }
          ?>
        </tbody>
      </table>


  </div>
  
</div>
