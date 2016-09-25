<?php

class Confirmed_user extends CI_Controller{

	public function index(){
			$data['title']="Confirmed Users";
			$this->load->view('common/header',$data);
			if($this->session->userdata('logged_in')){
				if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
					$this->load->view('list/confirmed_student');
				}
				else
					$this->load->view('list/home');
			}
			else
				$this->load->view('list/home');
			
			$this->load->view('common/footer');	
		}

	public function student(){
			$data['title']="Confirmed Users";
			$data['type']="Student";
			$this->load->view('common/header',$data);
			if($this->session->userdata('logged_in')){
				if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
					$this->load->view('list/confirmed_student');
				}
				else
					$this->load->view('list/home');
			}
			else
				$this->load->view('list/home');
			$this->load->view('common/footer');	
		}

		public function teacher(){
			$data['title']="Confirmed Users";
			$data['type']="Teacher";
			$this->load->view('common/header',$data);
			if($this->session->userdata('logged_in')){
				if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
					$this->load->view('list/confirmed_teacher',$data);
				}
				else
					$this->load->view('list/home');
			}
			else
				$this->load->view('list/home');
			
			$this->load->view('common/footer');	
		}

		public function alumni(){
			$data['title']="Confirmed Users";
			$data['type']="Alumni";
			$this->load->view('common/header',$data);
			if($this->session->userdata('logged_in')){
				if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
					$this->load->view('list/confirmed_alumni',$data);
				}
				else
					$this->load->view('list/home');
			}
			else
				$this->load->view('list/home');
			
			$this->load->view('common/footer');	
		}

		public function guest(){
			$data['title']="Confirmed Users";
			$data['type']="Guest";
			$this->load->view('common/header',$data);
			if($this->session->userdata('logged_in')){
				if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
					$this->load->view('list/confirmed_guest',$data);
				}
				else
					$this->load->view('list/home');
			}
			else
				$this->load->view('list/home');
			
			$this->load->view('common/footer');	
		}

		public function delete($id_user){
		//	$user = new User_table();
		//	$user->where('id_user', $id_user)->get();
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