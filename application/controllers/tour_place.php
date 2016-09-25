<?php

class Tour_place extends CI_Controller{
	public function index(){
		//$this->load->view('create_place', array('error' => ' ' ));
		$data['title']="Tour Place";
		$this->load->view('common/header',$data);
		$this->load->view('list/place');
		$this->load->view('common/footer');	
	}
	public function assign($place_id){

		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				
			

				$tour_obj=new Tour_table();
		        $tour_obj->where('status',2);
		        $tour_obj->get();

		        $default_tour=$tour_obj->id_tour;

				//validation Rules
				// $this->form_validation->set_rules('date', 'Date', 'required');
				// $this->form_validation->set_rules('start_time', 'Start Time');
				// $this->form_validation->set_rules('end_time', 'End Time');
				// $this->form_validation->set_rules('description', 'Description', 'required');



				//custom message for form validation
				//$this->form_validation->set_message('required', '%s can\'t be Blank');



				// if ($this->form_validation->run() == FALSE)
				// {
				// 	$data['title']="Create Schedule";
				// 	$this->load->view('common/header',$data);
				// 	$this->load->view('form/schedule_create');
				// 	$this->load->view('common/footer');
				// }
				//else{
					$tour_place = new Tour_place_table();
					$tour_place->id_place=$place_id;
					$tour_place->id_tour=$default_tour;


					if($tour_place->save()){
						 $data['title']="Place assign confirmation";
						 $this->load->view('common/header',$data);
						 $this->load->view('alert/tour_place_done',$data);
						 $this->load->view('list/place');
						 $this->load->view('common/footer');
					}
					else{
						$data['title']="Place";
						$this->load->view('common/header',$data);
						$this->load->view('list/place');
						$this->load->view('common/footer');
					}
				//}
			}
			else
				$this->load->view('list/home');
		}
		else
			$this->load->view('list/home');
	}

	public function delete($id_place){
		//	$user = new User_table();
		//	$user->where('id_user', $id_user)->get();
			
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				
			
				if($this->db->delete('tour_place', array('id_place' => $id_place)) ){
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
}