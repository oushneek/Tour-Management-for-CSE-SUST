<?php

class Schedule extends CI_Controller{
	public function index(){
		$data['title']="Schedule";
		$this->load->view('common/header',$data);
		$this->load->view('list/schedule');
		$this->load->view('common/footer');	
	}

	public function create(){
		$data['title']="Create Schedule";
		$this->load->view('common/header',$data);
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				$this->load->view('form/schedule_create');
			}
			else
				$this->load->view('list/home');
			}
		else
			$this->load->view('list/home');
		
		$this->load->view('common/footer');
	}

	public function edit($id_schedule){

		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				$data['title']="Edit Schedule";
				$data['id_schedule']=$id_schedule;
				$this->load->view('common/header',$data);
				$this->load->view('edit_form/edit_schedule');
				$this->load->view('common/footer');
			}
			else{
				$this->load->view('common/header');
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

	public function update(){

		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
			
		//validation Rules
				$this->form_validation->set_rules('date', 'Date', 'required');

				//custom message for form validation
				$this->form_validation->set_message('required', '%s can\'t be Blank');
				//$this->form_validation->set_message('is_unique', 'This Tour Name was added Before, Please try with another name ');

				if ($this->form_validation->run() == FALSE)
				{
					$data['title']=" Schedule update error";
					$this->load->view('common/header',$data);
					$this->load->view('list/schedule');
					$this->load->view('common/footer');
				}
				else{
					$schedule = new Schedule_table();
					
					$schedule->get();
					
					$schedule_id=$this->input->post('id_schedule');
					$date_schedule=$this->input->post('date');
					$start_time_schedule=$this->input->post('start_time');
					$end_time_schedule=$this->input->post('end_time');
					$description_schedule=$this->input->post('description');

					$schedule->where('id_schedule',$schedule_id)->update(array('date'=>$date_schedule,'start_time'=>$start_time_schedule,'end_time'=>$end_time_schedule,'description'=>$description_schedule));
					
					if($schedule->db->affected_rows()>0){
						 $data['title']="Schedule Update Confirmation";
						 $data['name']=$this->input->post('date');
						 $this->load->view('common/header',$data);
						 $this->load->view('alert/schedule_updated',$data);
						 $this->load->view('list/schedule');
						 $this->load->view('common/footer');
					}
					else{
						$data['title']="Update failed";
						$this->load->view('common/header',$data);
						$this->load->view('list/schedule');
						$this->load->view('common/footer');
					}
				}
			}
			else
				$this->load->view('list/home');
			}
		else
			$this->load->view('list/home');
	
	}

	public function delete($id_schedule){
		//	$user = new User_table();
		//	$user->where('id_user', $id_user)->get();
			
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
			
				if($this->db->delete('schedule', array('id_schedule' => $id_schedule)) ){
					echo "<script>alert('Schedule Deletation Complete')</script>";
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


	public function process(){
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
			
				$tour_obj=new Tour_table();
		        $tour_obj->where('status',2);
		        $tour_obj->get();

		        $default_tour=$tour_obj->id_tour;

				//validation Rules
				$this->form_validation->set_rules('date', 'Date', 'required');
				$this->form_validation->set_rules('start_time', 'Start Time');
				$this->form_validation->set_rules('end_time', 'End Time');
				$this->form_validation->set_rules('description', 'Description', 'required');



				//custom message for form validation
				$this->form_validation->set_message('required', '%s can\'t be Blank');



				if ($this->form_validation->run() == FALSE)
				{
					$data['title']="Create Schedule";
					$this->load->view('common/header',$data);
					$this->load->view('form/schedule_create');
					$this->load->view('common/footer');
				}
				else{
					$schedule = new Schedule_table();
					$schedule->date=$this->input->post('date');
					$schedule->start_time=$this->input->post('start_time');
					$schedule->end_time=$this->input->post('end_time');
					$schedule->description=$this->input->post('description');
					$schedule->id_tour=$default_tour;


					if($schedule->save()){
						 $data['title']="Schedule confirmation";
						 $this->load->view('common/header',$data);
						 $this->load->view('alert/schedule_done',$data);
						 $this->load->view('form/schedule_create');
						 $this->load->view('common/footer');
					}
					else{
						$data['title']="Create Schedule";
						$this->load->view('common/header',$data);
						$this->load->view('form/schedule_create');
						$this->load->view('common/footer');
					}
				}
			}
			else
				$this->load->view('list/home');
			}
		else
			$this->load->view('list/home');
	}
}