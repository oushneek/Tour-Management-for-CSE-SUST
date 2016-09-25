<?php

class Login extends CI_Controller{
	public function index(){
		$data['title']="Login";
		$this->load->view('common/header',$data);
		$this->load->view('form/admin_login');
		$this->load->view('common/footer');
	}

	public function process(){
		
		//validation Rules
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['title']="Login";
			$this->load->view('common/header',$data);
			$this->load->view('form/admin_login');
			$this->load->view('common/footer');	
		}
		else{

			$user = new User_table();
			$user->where('email',$this->input->post('email'));
			$user->where('password',$this->input->post('password'));
			$user->get();


			$tour_obj=new Tour_table();
            $tour_obj->where('status',2);
            $tour_obj->get();

            $default_tour=$tour_obj->id_tour;
			
			if($user->name != NULL){

				$person_tour=new Person_tour_table();
				$person_tour->where('id_user',$user->id_user);
				$person_tour->where('id_tour',$default_tour);
				$person_tour->get();


				$newdata = array(
                   'name'  => $user->name,
                   'email'     => $user->email,
                   'user_type_id'	=> $person_tour->user_type_id,
                   'id_user'	=> $user->id_user,
                   'logged_in' => TRUE
                );

			   $this->session->set_userdata($newdata);
			   redirect(base_url()."home", 'refresh');

			}
			else{
				$data['title']="Login";
				$this->load->view('common/header',$data);
				$this->load->view('form/admin_login');
				$this->load->view('common/footer');	
				//$this->session->sess_destroy();
			}
		}
	}

}