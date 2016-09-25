<div class="row show-grid">
  <div class="col-lg-8" style="padding-left: 8%;padding-top: 2%;">
      
    <legend>User Profile</legend>

   <?php
   	
   	$user_obj=new User_table();
   	$user_obj->where('id_user',$this->session->userdata('id_user'));
   	$user_obj->get();

   ?> 

    <h4 class="col-lg-2">Full Name:</h4>
    <h4 class="col-lg-10"><strong><?php echo $user_obj->name;?></strong></h4>
    <?php
    	if($this->session->userdata('logged_in') && ($this->session->userdata('user_type_id') == 1 || $this->session->userdata('user_type_id') == 6 || $this->session->userdata('user_type_id') == 5)){
	?>
	<h4 class="col-lg-2">Reg No:</h4>
    <h4 class="col-lg-10"><strong><?php echo $user_obj->reg_no;?></strong></h4>
    <?php     	
       
       }
    
    ?>
    <h4 class="col-lg-2">Email:</h4>
    <h4 class="col-lg-10"><strong><?php echo $user_obj->email;?></strong></h4>

    <h4 class="col-lg-2">Password:</h4>
    <h4 class="col-lg-10"><strong><?php echo $user_obj->password;?></strong></h4>

    <h4 class="col-lg-2">Mobile:</h4>
    <h4 class="col-lg-10"><strong><?php echo $user_obj->mobile;?></strong></h4>

    <h4 class="col-lg-2">Home:</h4>
    <h4 class="col-lg-10"><strong><?php echo $user_obj->home_phone;?></strong></h4>

    <h4 class="col-lg-2">T-shirt:</h4>
    <h4 class="col-lg-10"><strong><?php echo $user_obj->t_shirt_size;?></strong></h4>

    <?php
    echo "<a href='".base_url()."user_profile/edit/".$user_obj->id_user."' class='btn btn-primary btn-sm'>Edit</a></br>";

    $tour=new Tour_table();
    $tour->where('status',2);
    $tour->get();

    $default_tour=$tour->id_tour;

    $person_tour =new Person_tour_table();
    $person_tour->where('id_user',$this->session->userdata('id_user'));
    $person_tour->get();
    
    $flag=0;
    foreach ($person_tour as $persons_tour) {
        
        if($persons_tour->id_tour==$default_tour){
          $flag=0;
          break;
        }
        else{
          $flag=1;
        }
    }


    if($flag==1){
      echo"<h4 class='col-lg-4'>Register for Cureent Tour :</h4>";
      echo "<a href='".base_url()."user_profile/register_current_tour/".$user_obj->id_user."/1' class='btn btn-primary btn-sm '>Student</a>";
      echo "<a href='".base_url()."user_profile/register_current_tour/".$user_obj->id_user."/3' class='btn btn-primary btn-sm '>Teacher</a>";
      echo "<a href='".base_url()."user_profile/register_current_tour/".$user_obj->id_user."/5' class='btn btn-primary btn-sm '>Alumni</a>";
      echo "<a href='".base_url()."user_profile/register_current_tour/".$user_obj->id_user."/2' class='btn btn-primary btn-sm '>Guest</a>";

    }

    ?>


  </div>


</div>
  
  