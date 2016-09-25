<?php

class Organizer extends CI_Controller{
	public function index(){
		$data['title']="Organizer";
		$this->load->view('common/header',$data);
		$this->load->view('list/organizer');
		$this->load->view('common/footer');	
	}

	public function create(){
		$data['title']="Create Organizer";
		$this->load->view('common/header',$data);
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				$this->load->view('form/organizer_new');
			}
			else
				$this->load->view('list/home');
		}
		else
			$this->load->view('list/home');
		
		$this->load->view('common/footer');
	}

	public function delete_from_org($id_user){
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				
			
				$person=new Person_tour_table();
				$person->get();
				// 2 = default, 0= pending , 1 = complete
				$person->where('id_user',$id_user)->update(array('user_type_id'=>1));
					
				if($person->db->affected_rows()>0){
						 $data['title']="User Update Confirmation";
						 $data['name']='User';
						 $this->load->view('common/header',$data);
						 $this->load->view('list/organizer');
						 $this->load->view('common/footer');
					}
					else{
						$data['title']="Update failed";
						$this->load->view('common/header',$data);
						$this->load->view('list/organizer');
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
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				
			
				$tour_obj=new Tour_table();
		        $tour_obj->where('status',2);
		        $tour_obj->get();

		       	$default_tour=$tour_obj->id_tour;

				$this->form_validation->set_rules('user_select', 'Organizer', 'required');

				if ($this->form_validation->run() == FALSE)
				{
					$data['title']="Create Organizer";
					$this->load->view('common/header',$data);
					$this->load->view('form/organizer_new');
					$this->load->view('common/footer');
				}
				else{
					$user_obj = new User_table();
					$user_obj->where('reg_no',$this->input->post('user_select') );
					$user_obj->get();

					$id=$user_obj->id_user;

					$person_tour_obj=new Person_tour_table();
					$person_tour_obj->where('id_user',$id);
					$person_tour_obj->where('id_tour',$default_tour);


					if($person_tour_obj->update('user_type_id', 6)){
						 $data['title']="Organizer confirmation";
						 $data['name']=$this->input->post('user_select');
						 $this->load->view('common/header',$data);
						 $this->load->view('alert/organizer_done',$data);
						 $this->load->view('form/organizer_new');
						 $this->load->view('common/footer');
					}
					else{
						$data['title']="Create Organizer";
						$this->load->view('common/header',$data);
						$this->load->view('form/organizer_new');
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