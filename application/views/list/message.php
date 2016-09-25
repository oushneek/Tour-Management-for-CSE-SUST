<div class="row show-grid">
  <div class="col-lg-12" style="padding-left: 8%;padding-top: 2%;padding-right:6%">
     
  <legend>All Messages</legend>
  <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Message</th>
            <th>Date</th>
            <th>Time</th>
            <?php 

            if($this->session->userdata('logged_in') && ($this->session->userdata('user_type_id') == 4 || $this->session->userdata('user_type_id') == 6)){
              echo "<th>Sent by</th>";
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
        
            $messages_obj=new Message_table();
            $messages_obj->where('id_tour',$default_tour);
            $messages_obj->get();

            $sender=new User_table();

            $count=0;
            foreach ($messages_obj as $message_obj) {
              
              $sender->where('id_user',$message_obj->id_user);
              $sender->get();

              $count++;
              echo 
              "<tr>
                <td>".++$count."</td>
                <td>".$message_obj->description."</td>
                <td>".date("m/d/y",strtotime($message_obj->date))."</td>
                <td>".date("h:m:s",strtotime($message_obj->date))."</td>";
                if($this->session->userdata('logged_in') && ($this->session->userdata('user_type_id') == 4 || $this->session->userdata('user_type_id') == 6)){
                  echo "<td>".$sender->name."</td>";
                }
              echo "</tr>";

            }



        ?>

          
          
        </tbody>
      </table>


  </div>
  
</div>
