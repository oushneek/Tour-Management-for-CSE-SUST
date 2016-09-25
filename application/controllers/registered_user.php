<?php

class Registered_user extends CI_Controller{

		public function index(){
			$data['title']="Registered Users";
			$this->load->view('common/header',$data);
			if($this->session->userdata('logged_in')){
				if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
					$this->load->view('list/registered_student');
				}
				else
					$this->load->view('list/home');
			}
			else
				$this->load->view('list/home');

			$this->load->view('common/footer');	
		}

		public function confirm_student($id_user){

			if($this->session->userdata('logged_in')){
				if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				
					$tour_obj=new Tour_table();
		       		$tour_obj->where('status',2);
		        	$tour_obj->get();
					$default_tour=$tour_obj->id_tour;

					$person_tour_obj = new Person_tour_table();
					$person_tour_obj->where('id_tour',$default_tour);
					$person_tour_obj->get();
					$person_tour_obj->where('id_user',$id_user)->update('payment_confirm',1);

					if($this->db->affected_rows()>0){
						$data['title']="Registered Users";
						$data['type']="Student";
						$this->load->view('common/header',$data);
						$this->load->view('list/registered_student',$data);
						$this->load->view('common/footer');	
					}
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

		public function confirm_teacher($id_user){
			if($this->session->userdata('logged_in')){
				if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				
					$tour_obj=new Tour_table();
		       		$tour_obj->where('status',2);
		        	$tour_obj->get();
					$default_tour=$tour_obj->id_tour;

					$person_tour_obj = new Person_tour_table();
					$person_tour_obj->where('id_tour',$default_tour);
					$person_tour_obj->get();
					$person_tour_obj->where('id_user',$id_user)->update('payment_confirm',1);

					if($this->db->affected_rows()>0){
						$data['title']="Registered Users";
						$data['type']="Teacher";
						$this->load->view('common/header',$data);
						$this->load->view('list/registered_teacher',$data);
						$this->load->view('common/footer');	
					}
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

		public function confirm_alumni($id_user){
			if($this->session->userdata('logged_in')){
				if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
					$tour_obj=new Tour_table();
		       		$tour_obj->where('status',2);
		        	$tour_obj->get();
					$default_tour=$tour_obj->id_tour;

					$person_tour_obj = new Person_tour_table();
					$person_tour_obj->where('id_tour',$default_tour);
					$person_tour_obj->get();
					$person_tour_obj->where('id_user',$id_user)->update('payment_confirm',1);

					if($this->db->affected_rows()>0){
						$data['title']="Registered Users";
						$data['type']="Alumni";
						$this->load->view('common/header',$data);
						$this->load->view('list/registered_alumni',$data);
						$this->load->view('common/footer');	
					}
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

		public function confirm_guest($id_user){
			if($this->session->userdata('logged_in')){
				if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
					$tour_obj=new Tour_table();
		       		$tour_obj->where('status',2);
		        	$tour_obj->get();
					$default_tour=$tour_obj->id_tour;

					$person_tour_obj = new Person_tour_table();
					$person_tour_obj->where('id_tour',$default_tour);
					$person_tour_obj->get();
					$person_tour_obj->where('id_user',$id_user)->update('payment_confirm',1);

					if($this->db->affected_rows()>0){
						$data['title']="Registered Users";
						$data['type']="Guest";
						$this->load->view('common/header',$data);
						$this->load->view('list/registered_guest',$data);
						$this->load->view('common/footer');	
					}
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

		public function student(){

			$data['title']="Registered Users";
			$data['type']="Student";
			$this->load->view('common/header',$data);
			if($this->session->userdata('logged_in')){
				if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
					$this->load->view('list/registered_student');
				}
				else
					$this->load->view('list/home');
			}
			else
				$this->load->view('list/home');

			$this->load->view('common/footer');	
		}

		public function teacher(){
			$data['title']="Registered Users";
			$data['type']="Teacher";
			$this->load->view('common/header',$data);
			if($this->session->userdata('logged_in')){
				if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
					$this->load->view('list/registered_teacher',$data);
				}
				else
					$this->load->view('list/home');
			}
			else
				$this->load->view('list/home');
			
			$this->load->view('common/footer');	
		}

		public function alumni(){
			$data['title']="Registered Users";
			$data['type']="Alumni";
			$this->load->view('common/header',$data);
			if($this->session->userdata('logged_in')){
				if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
					$this->load->view('list/registered_alumni',$data);
				}
				else
					$this->load->view('list/home');
			}
			else
				$this->load->view('list/home');
			
			$this->load->view('common/footer');	
		}

		public function guest(){
			$data['title']="Registered Users";
			$data['type']="Guest";
			$this->load->view('common/header',$data);
			if($this->session->userdata('logged_in')){
				if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
					$this->load->view('list/registered_guest',$data);
				}
				else
					$this->load->view('list/home');
			}
			else
				$this->load->view('list/home');
			
			$this->load->view('common/footer');	
		}

		public function delete($id_user){
		
			if($this->session->userdata('logged_in')){
				if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				
		
					if($this->db->delete('user', array('id_user' => $id_user)) ){
						echo "<script>alert('User Deletation Complete')</script>";
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