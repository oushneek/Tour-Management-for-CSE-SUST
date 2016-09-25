<?php

class Tour extends CI_Controller{
	public function index(){
		$data['title']="Tour";
		$this->load->view('common/header',$data);
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4){
				$this->load->view('list/tour');
			}
			else
				$this->load->view('list/home');
		}
		else
			$this->load->view('list/home');
		$this->load->view('common/footer');	
	}

	public function create(){
		$data['title']="Create Tour";
		$this->load->view('common/header',$data);
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4){
				$this->load->view('form/tour_create');
			}
			else
				$this->load->view('list/home');
		}
		else
			$this->load->view('list/home');
		
		$this->load->view('common/footer');
	}

	public function details($id_tour){
		$data['title']="Previous Tour";
		$data['id_tour']=$id_tour;
		$this->load->view('common/header',$data);
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4){
				$this->load->view('list/previous_tour');
			}
			else
				$this->load->view('list/home');
		}
		else
			$this->load->view('list/home');
		
		$this->load->view('common/footer');
	}

	public function edit($id_tour){
		$data['title']="Edit Tour";
		$data['id_tour']=$id_tour;
		$this->load->view('common/header',$data);
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4){
				$this->load->view('edit_form/edit_tour');
			}
			else
				$this->load->view('list/home');
		}
		else
			$this->load->view('list/home');
		
		$this->load->view('common/footer');
	}

	public function update(){

		//validation Rules
		// $this->form_validation->set_rules('title', 'Title', 'required');
		//  $this->form_validation->set_rules('start_date', 'Start Date', 'required');
		//  $this->form_validation->set_rules('end_date', 'End Date', 'required');
		//  $this->form_validation->set_rules('cost_student', 'Cost', 'required');
		//  $this->form_validation->set_rules('cost_teacher', 'Cost', 'required');
		//  $this->form_validation->set_rules('cost_guest', 'Cost', 'required');
		//  $this->form_validation->set_rules('cost_alumni', 'Cost', 'required');
		// //custom message for form validation
		// $this->form_validation->set_message('required', '%s can\'t be Blank');
		//$this->form_validation->set_message('is_unique', 'This Tour Name was added Before, Please try with another name ');

		// if ($this->form_validation->run() == FALSE)
		// {
		// 	$data['title']=" Tour update error";
		// 	$this->load->view('common/header',$data);
		// 	$this->load->view('list/tour');
		// 	$this->load->view('common/footer');
		// }
		// else{
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4){
			
			$tour = new Tour_table();
			
			$tour->get();
			
			$tour_id=$this->input->post('id_tour');
			$title_tour=$this->input->post('title');
			$description_tour=$this->input->post('description');
			$start_date_tour=$this->input->post('start_date');
			$end_date_tour=$this->input->post('end_date');

			$tour->where('id_tour',$tour_id)->update(array('tour_title'=>$title_tour,'description'=>$description_tour,'start_date'=>$start_date_tour,'end_date'=>$end_date_tour));
			

			$cost = new Person_cost_table();
			$cost->where('id_tour',$tour_id);
			$cost->get();

			$student=$this->input->post('cost_student');
			$teacher=$this->input->post('cost_teacher');
			$alumni=$this->input->post('cost_alumni');
			$guest=$this->input->post('cost_guest');

			$cost->where(array('user_type_id'=>1,'id_tour'=>$tour_id))->update('cost',$student);
			$cost->where(array('user_type_id'=>3,'id_tour'=>$tour_id))->update('cost',$teacher);
			$cost->where(array('user_type_id'=>5,'id_tour'=>$tour_id))->update('cost',$alumni);
			$cost->where(array('user_type_id'=>2,'id_tour'=>$tour_id))->update('cost',$guest);

			//if($tour->db->affected_rows()>0 || $cost->db->affected_rows()>0){
				
				 $data['title']="Tour Update Confirmation";
				 $data['name']=$this->input->post('title');
				 $this->load->view('common/header',$data);
				 $this->load->view('alert/tour_updated',$data);
				 $this->load->view('list/tour');
				 $this->load->view('common/footer');

				 }
			else{
				$this->load->view('common/header',$data);
				$this->load->view('list/home');
				$this->load->view('common/footer');
			}
		}
		else{
				$this->load->view('common/header');
				$this->load->view('list/home');
				$this->load->view('common/footer');
			}
	
	}
	public function delete($id_tour){
		//	$user = new User_table();
		//	$user->where('id_user', $id_user)->get();
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4){
			
		
				if($this->db->delete('tour', array('id_tour' => $id_tour)) ){
					echo "<script>alert('Tour Deletation Complete')</script>";
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
				else{
					echo "<script>alert('Please Try Again')</script>";
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
			}
			else
				$this->load->view('list/home');
		}
		else
			$this->load->view('list/home');
			
	}
	public function set_default($id_tour){

		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4){
			
				$tour = new Tour_table();
					
				$tour->get();
				// 2 = default, 0= pending , 1 = complete
				$tour->where('status',2)->update(array('status'=>0));
				$tour->where('id_tour',$id_tour)->update(array('status'=>2));
					
				if($tour->db->affected_rows()>0){
					 $data['title']="Tour Update Confirmation";
					 $data['name']='Tour';
					 $this->load->view('common/header',$data);
					 $this->load->view('alert/tour_updated',$data);
					 $this->load->view('list/tour');
					 $this->load->view('common/footer');
				}
					else{
						$data['title']="Update failed";
						$this->load->view('common/header',$data);
						$this->load->view('list/tour');
						$this->load->view('common/footer');
					}
			}
			else
				$this->load->view('list/home');
		}
		else
			$this->load->view('list/home');

	}
	public function set_complete($id_tour){
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4){
			
				$tour = new Tour_table();
					
				$tour->get();
				// 2 = default, 0= pending , 1 = complete
				$tour->where('id_tour',$id_tour)->update(array('status'=>1));
					
				if($tour->db->affected_rows()>0){
					 $data['title']="Tour Update Confirmation";
					 $data['name']='Tour';
					 $this->load->view('common/header',$data);
					 $this->load->view('alert/tour_updated',$data);
					 $this->load->view('list/tour');
					 $this->load->view('common/footer');
				}
				else{
					$data['title']="Update failed";
					$this->load->view('common/header',$data);
					$this->load->view('list/tour');
					$this->load->view('common/footer');
				}

			}
			else
				$this->load->view('list/home');
		}
		else
			$this->load->view('list/home');

	}
	public function process(){
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4){
			
		//validation Rules
				 $this->form_validation->set_rules('title', 'Title', 'required|is_unique[tour.tour_title]');
				 $this->form_validation->set_rules('start_date', 'Start Date', 'required');
				 $this->form_validation->set_rules('end_date', 'End Date', 'required');
				 $this->form_validation->set_rules('cost_student', 'Cost', 'required');
				 $this->form_validation->set_rules('cost_teacher', 'Cost', 'required');
				 $this->form_validation->set_rules('cost_guest', 'Cost', 'required');
				 $this->form_validation->set_rules('cost_alumni', 'Cost', 'required');



				//custom message for form validation
				$this->form_validation->set_message('required', '%s can\'t be Blank');
				$this->form_validation->set_message('is_unique', 'This Tour Name was added Before, Please try with another name ');

				if ($this->form_validation->run() == FALSE)
				{
					$data['title']="Create Tour false";
					$this->load->view('common/header',$data);
					$this->load->view('form/tour_create');
					$this->load->view('common/footer');
				}
				else{
					$tour = new Tour_table();
					$tour->tour_title=$this->input->post('title');
					$tour->description=$this->input->post('description');
					$tour->start_date=$this->input->post('start_date');
					$tour->end_date=$this->input->post('end_date');

					if($tour->save()){
						 
						 $tour_obj=new Tour_table();
						 $tour_obj->select_max('id_tour');
						 $tour_obj->get();

						 $set_id_tour=$tour_obj->id_tour;

						 $cost_obj=new Person_cost_table();
						 $cost_obj->id_tour=$set_id_tour;
						 $cost_obj->user_type_id=1;
						 $cost_obj->cost=$this->input->post('cost_student');
						 $cost_obj->save();

						 $cost_obj=new Person_cost_table();
						 $cost_obj->id_tour=$set_id_tour;
						 $cost_obj->user_type_id=3;
						 $cost_obj->cost=$this->input->post('cost_teacher');
						 $cost_obj->save();

						 $cost_obj=new Person_cost_table();
						 $cost_obj->id_tour=$set_id_tour;
						 $cost_obj->user_type_id=5;
						 $cost_obj->cost=$this->input->post('cost_alumni');
						 $cost_obj->save();

						 $cost_obj=new Person_cost_table();
						 $cost_obj->id_tour=$set_id_tour;
						 $cost_obj->user_type_id=2;
						 $cost_obj->cost=$this->input->post('cost_guest');
						 $cost_obj->save();

						 $person_tour=new Person_tour_table();
						 $person_tour->id_user=1;
						 $person_tour->id_tour=$set_id_tour;
						 $person_tour->payment_confirm=0;
						 $person_tour->user_type_id=4;
						 $person_tour->save();


						 $data['title']="Tour Add Confirmation";
						 $data['name']=$this->input->post('title');
						 $this->load->view('common/header',$data);
						 $this->load->view('alert/tour_done',$data);
						 $this->load->view('form/tour_create');
						 $this->load->view('common/footer');
					}
					else{
						$data['title']="Create Tour";
						$this->load->view('common/header',$data);
						$this->load->view('form/tour_create');
						$this->load->view('common/footer');
					}
				}
		}
			else{
				$this->load->view('common/header',$data);
				$this->load->view('list/home');
				$this->load->view('common/footer');
			}
		}
		else{
			$this->load->view('common/header',$data);
			$this->load->view('list/home');
			$this->load->view('common/footer');
		}
	}
}