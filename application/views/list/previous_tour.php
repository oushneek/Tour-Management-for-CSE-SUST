<div class="row show-grid">
  <div class="col-lg-8" style="padding-left: 8%;padding-top: 2%;">
  
  	<legend>Previous Tour Details</legend>
  	<?php

  		$tour_obj=new Tour_table();
        $tour_obj->where('id_tour',$id_tour);
        $tour_obj->get();

        
	
	?>

        <h4 class="text-info"><strong>Tour Title : </strong><?php echo $tour_obj->tour_title; ?></h4>
     	<h4 class="text-info"><strong>Tour Description : </strong><h4><p><?php echo $tour_obj->description; ?></p>
		<h4 class="text-info"><strong>Date :</strong></h4><h4><?php echo date('d/m/y',strtotime($tour_obj->start_date))." - ".date('d/m/y',strtotime($tour_obj->end_date)) ?></h4>
		<h4 class="text-info"><strong>Places :</strong></h4>
		
		<ul clas="list-group">
		<?php
		$query=$this->db->query('Select * from place where id_place in(Select id_place from tour_place where id_tour='.$id_tour.')');

		foreach ($query->result() as $places) {
			echo "<li class='list-group-item'>".$places->name."</li>";
		}

		?>
		</ul>

		<h4 class="text-info"><strong>Cost Per Person : </strong></h4>
		<ul clas="list-group">
		<?php

		$person_cost=new Person_cost_table();
		
		$person_cost->where('user_type_id',1);
		$person_cost->where('id_tour',$id_tour);
		$person_cost->get();


		echo "<li class='list-group-item'>Student : ".$person_cost->cost." Tk.</li>";
		
		$person_cost->where('user_type_id',3);
		$person_cost->where('id_tour',$id_tour);
		$person_cost->get();

		echo "<li class='list-group-item'>Teacher : ".$person_cost->cost." Tk.</li>";
		
		$person_cost->where('user_type_id',5);
		$person_cost->where('id_tour',$id_tour);
		$person_cost->get();

		echo "<li class='list-group-item'>Alumni : ".$person_cost->cost." Tk.</li>";
		
		$person_cost->where('user_type_id',2);
		$person_cost->where('id_tour',$id_tour);
		$person_cost->get();

		echo "<li class='list-group-item'>Guest : ".$person_cost->cost." Tk.</li>";
		


		?>
		</ul>
		<h4 class="text-info"><strong>Persons Confirmed :</strong></h4>

		<ul clas="list-group">
		<?php
		
		$query=$this->db->query('Select count(id_user) as total from person_tour where id_tour='.$id_tour.' and (user_type_id=1 or user_type_id=6)');

		foreach ($query->result() as $tot) {
		
			echo "<li class='list-group-item'>Student : ".$tot->total." </li>";
		}

		$query=$this->db->query('Select count(id_user) as total from person_tour where id_tour='.$id_tour.' and user_type_id=3');

		foreach ($query->result() as $tot) {
		
			echo "<li class='list-group-item'>Teacher : ".$tot->total." </li>";
		}
		
		$query=$this->db->query('Select count(id_user) as total from person_tour where id_tour='.$id_tour.' and user_type_id=5');

		foreach ($query->result() as $tot) {
		
			echo "<li class='list-group-item'>Alumni : ".$tot->total." </li>";
		}

		$query=$this->db->query('Select count(id_user) as total from person_tour where id_tour='.$id_tour.' and user_type_id=2');

		foreach ($query->result() as $tot) {
		
			echo "<li class='list-group-item'>Guest : ".$tot->total." </li>";
		}


		?>
		</ul>


		<h4 class="text-info"><strong></strong></h4>
		<h4 class="text-info"><strong></strong></h4>
  	


  </div>
</div>