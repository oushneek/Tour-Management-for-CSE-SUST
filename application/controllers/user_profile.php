<?php

class User_profile extends CI_Controller{
	public function index(){
		$data['title']="My Profile";
		$this->load->view('common/header',$data);
		if($this->session->userdata('logged_in')){
			$this->load->view('list/User_profile');
		}
		else
			$this->load->view('list/home');
		
		$this->load->view('common/footer');	
	}

	public function edit($id_user){
		$data['title']="Edit Profile";
		$data['id_user']=$id_user;
		$this->load->view('common/header',$data);
		if($this->session->userdata('logged_in')){
			$this->load->view('edit_form/edit_profile');
		}
		else
			$this->load->view('list/home');
		
		$this->load->view('common/footer');
	}

	public function update(){
		if($this->session->userdata('logged_in')){
			
		
			$user=new User_table();
			$user->get();

			$user_id=$this->input->post('id_user');
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$password=$this->input->post('pass');
			$mobile=$this->input->post('mobile');
			$home=$this->input->post('home_phone');
			$tshirt=$this->input->post('t_shirt');
			if($this->session->userdata('user_type_id')==1 || $this->session->userdata('user_type_id')==5 || $this->session->userdata('user_type_id')==6)
			{	
				$reg=$this->input->post('reg');
				$user->where('id_user',$user_id)->update(array('name'=>$name,'email'=>$email,'password'=>$password,'mobile'=>$mobile,'home_phone'=>$home,'t_shirt_size'=>$tshirt,'reg_no'=>$reg));
			
			}
			else{
				$user->where('id_user',$user_id)->update(array('name'=>$name,'email'=>$email,'password'=>$password,'mobile'=>$mobile,'home_phone'=>$home,'t_shirt_size'=>$tshirt));
			}

			$data['title']="User Profile Update";
			$data['name']=$this->input->post('name');
			$this->load->view('common/header',$data);
			$this->load->view('alert/user_updated',$data);
			$this->load->view('list/User_profile');
			$this->load->view('common/footer');
		}
		else
			$this->load->view('list/home');

	}

	public function register_current_tour($id_user,$type){
		if($this->session->userdata('logged_in')){
			
			
			$tour=new Tour_table();
			$tour->where('status',2);
			$tour->get();
			$default_tour=$tour->id_tour;

			$person_tour=new Person_tour_table();
			$person_tour->id_user=$id_user;
			$person_tour->id_tour=$default_tour;
			$person_tour->user_type_id=$type;

			
			if($person_tour->save()){
				 $data['title']="Registration confirmation";
				 $data['name']=$this->input->post('student_name');
				 $this->load->view('common/header',$data);
				 $this->load->view('alert/registration_done',$data);
				 $this->load->view('list/user_profile');
				 $this->load->view('common/footer');
			}

		}
		else
			$this->load->view('list/home');


	}


}
