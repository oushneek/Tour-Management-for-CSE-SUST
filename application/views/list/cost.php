<div class="row show-grid">
  <div class="col-lg-8" style="padding-left: 8%;padding-top: 2%;">
  
  	<legend>Cost Details</legend>
  	<?php

  		$tour_obj=new Tour_table();
        $tour_obj->where('status',2);
        $tour_obj->get();
	
	?>
	<h4 class="text-info"><strong>Payment Confirmed :</strong></h4>
	<ul clas="list-group">

		<?php
		$gotmoney=0;
		$query=$this->db->query('Select count(*)*cost as total from person_tour join person_cost using(id_tour) where id_tour='.$tour_obj->id_tour.' and payment_confirm=1 and (person_tour.user_type_id=1 or person_tour.user_type_id=6) and person_cost.user_type_id=1');

		foreach ($query->result() as $count) {
			echo "<li class='list-group-item'> Student : ".$count->total."</li>";
			$gotmoney+=$count->total;
		}
		$query=$this->db->query('Select count(*)*cost as total from person_tour join person_cost using(id_tour) where id_tour='.$tour_obj->id_tour.' and payment_confirm=1 and person_tour.user_type_id=3 and person_cost.user_type_id=3');

		foreach ($query->result() as $count) {
			echo "<li class='list-group-item'> Teacher : ".$count->total."</li>";
			$gotmoney+=$count->total;
		}
		$query=$this->db->query('Select count(*)*cost as total from person_tour join person_cost using(id_tour) where id_tour='.$tour_obj->id_tour.' and payment_confirm=1 and person_tour.user_type_id=5 and person_cost.user_type_id=5');

		foreach ($query->result() as $count) {
			echo "<li class='list-group-item'> Alumni : ".$count->total."</li>";
			$gotmoney+=$count->total;
		}
		$query=$this->db->query('Select count(*)*cost as total from person_tour join person_cost using(id_tour) where id_tour='.$tour_obj->id_tour.' and payment_confirm=1 and person_tour.user_type_id=2 and person_cost.user_type_id=2');

		foreach ($query->result() as $count) {
			echo "<li class='list-group-item'> Guest : ".$count->total."</li>";
			$gotmoney+=$count->total;
		}
		echo "<li class='list-group-item'> Total : ".$gotmoney."</li>";


		?>
	</ul>

		<h4 class="text-info"><strong>Money to be paid :</strong></h4>
	<ul clas="list-group">

		<?php
		$money=0;
		$query=$this->db->query('Select count(*)*cost as total from person_tour join person_cost using(id_tour) where id_tour='.$tour_obj->id_tour.' and payment_confirm=0 and (person_tour.user_type_id=1 or person_tour.user_type_id=6) and person_cost.user_type_id=1');

		foreach ($query->result() as $count) {
			echo "<li class='list-group-item'> Student : ".$count->total."</li>";
			$money+=$count->total;
		}
		$query=$this->db->query('Select count(*)*cost as total from person_tour join person_cost using(id_tour) where id_tour='.$tour_obj->id_tour.' and payment_confirm=0 and person_tour.user_type_id=3 and person_cost.user_type_id=3');

		foreach ($query->result() as $count) {
			echo "<li class='list-group-item'> Teacher : ".$count->total."</li>";
			$money+=$count->total;
		}
		$query=$this->db->query('Select count(*)*cost as total from person_tour join person_cost using(id_tour) where id_tour='.$tour_obj->id_tour.' and payment_confirm=0 and person_tour.user_type_id=5 and person_cost.user_type_id=5');

		foreach ($query->result() as $count) {
			echo "<li class='list-group-item'> Alumni : ".$count->total."</li>";
			$money+=$count->total;
		}
		$query=$this->db->query('Select count(*)*cost as total from person_tour join person_cost using(id_tour) where id_tour='.$tour_obj->id_tour.' and payment_confirm=0 and person_tour.user_type_id=2 and person_cost.user_type_id=2');

		foreach ($query->result() as $count) {
			echo "<li class='list-group-item'> Guest : ".$count->total."</li>";
			$money+=$count->total;
		}
		echo "<li class='list-group-item'> Total : ".$money."</li>";
		?>
		</ul>

        <h4 class="text-info"><strong>Budget :</strong></h4>
        <ul clas="list-group">
		<?php
		$budget=0;
		$query=$this->db->query('Select * from task_list where id_tour='.$tour_obj->id_tour);

		foreach ($query->result() as $task) {
			echo "<li class='list-group-item'>".$task->title." : ".$task->budget."</li>";
			$budget+=$task->budget;
		}
		echo "<li class='list-group-item'>Total : ".$budget."</li>";
		?>
		</ul>
		<h4 class="text-info"><strong>Cost :</strong></h4>
        <ul clas="list-group">
		<?php
		$cost=0;
		$query=$this->db->query('Select * from task_list where id_tour='.$tour_obj->id_tour);

		foreach ($query->result() as $task) {
			echo "<li class='list-group-item'>".$task->title." : ".$task->cost."</li>";
			$cost+=$task->cost;
		}
		echo "<li class='list-group-item'>Total : ".$cost."</li>";
		?>
		</ul>
	

		<h4 class="text-info"><strong>Total Estimated Income :<?php echo " ".$gotmoney+$money." Tk."; ?></strong></h4>
		<h4 class="text-info"><strong>Total Budget :<?php echo " ".$budget." Tk."; ?></strong></h4>
		<h4 class="text-info"><strong>Total Cost :<?php echo " ".$cost." Tk."; ?></strong></h4>


  </div>
</div>