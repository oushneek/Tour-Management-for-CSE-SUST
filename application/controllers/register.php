<?php

class Register extends CI_Controller{
	public function index(){
		$data['title']="Register";
		$this->load->view('common/header',$data);
		$this->load->view('form/user_registration');
		$this->load->view('common/footer');
	}


	public function student_process(){
		$tour_obj=new Tour_table();
       	$tour_obj->where('status',2);
        $tour_obj->get();

        $person_tour_obj=new Person_tour_table();

        $default_tour=$tour_obj->id_tour;

		//validation Rules
		$this->form_validation->set_rules('student_name', 'Full Name', 'required');
		$this->form_validation->set_rules('student_pass', 'Password', 'required');
		$this->form_validation->set_rules('student_reg', 'Registration No','required|numeric|exact_length[10]|is_unique[user.reg_no]');
		$this->form_validation->set_rules('student_email', 'Email','required|valid_email');
		$this->form_validation->set_rules('student_mobile', 'Mobile', 'required|numeric|exact_length[11]');
		$this->form_validation->set_rules('student_home_mobile', 'Home Phone', 'required|numeric');
		$this->form_validation->set_rules('student_t_shirt', 'T shirt size', 'required');


		//custom message for form validation
		$this->form_validation->set_message('required', '%s can\'t be Blank');



		if ($this->form_validation->run() == FALSE)
		{
			$data['title']="Register";
			$this->load->view('common/header',$data);
			$this->load->view('form/user_registration');
			$this->load->view('common/footer');
		}
		else{
			$user_obj = new User_table();
			$user_obj->name=$this->input->post('student_name');
			$user_obj->password=$this->input->post('student_pass');
			$user_obj->email=$this->input->post('student_email');
			$user_obj->mobile=$this->input->post('student_mobile');
			$user_obj->home_phone=$this->input->post('student_home_mobile');
			$user_obj->reg_no=$this->input->post('student_reg');
			$user_obj->t_shirt_size=$this->input->post('student_t_shirt');
			


			if($user_obj->save()){

				$user_obj->where('email',$this->input->post('student_email'));
				$user_obj->get();

				 $person_tour_obj->user_type_id=1;
				 $person_tour_obj->id_tour=$default_tour;
				 $person_tour_obj->id_user=$user_obj->id_user;
				 $person_tour_obj->save();


				 $data['title']="Registration confirmation";
				 $data['name']=$this->input->post('student_name');
				 $this->load->view('common/header',$data);
				 $this->load->view('alert/registration_done',$data);
				 $this->load->view('form/user_registration');
				 $this->load->view('common/footer');
			}
			else{
				$data['title']="Register";
				$this->load->view('common/header',$data);
				$this->load->view('form/user_registration');
				$this->load->view('common/footer');
			}
		}
	}

	public function teacher_process(){


		$tour_obj=new Tour_table();
       	$tour_obj->where('status',2);
        $tour_obj->get();

        $person_tour_obj=new Person_tour_table();

        $default_tour=$tour_obj->id_tour;

		//validation Rules
		$this->form_validation->set_rules('teacher_name', 'Full Name', 'required');
		$this->form_validation->set_rules('teacher_pass', 'Password', 'required');
		$this->form_validation->set_rules('teacher_email', 'Email','required|valid_email');
		$this->form_validation->set_rules('teacher_mobile', 'Mobile', 'required|numeric|exact_length[11]');
		$this->form_validation->set_rules('teacher_home_mobile', 'Home Phone', 'required|numeric');
		$this->form_validation->set_rules('teacher_t_shirt', 'T shirt size', 'required');


		//custom message for form validation
		$this->form_validation->set_message('required', '%s can\'t be Blank');



		if ($this->form_validation->run() == FALSE)
		{
			$data['title']="Register";
			//redirect_back();
			 $this->load->view('common/header',$data);
			 $this->load->view('form/user_registration');
			 $this->load->view('common/footer');
		}
		else{
			$user_obj = new User_table();
			$user_obj->name=$this->input->post('teacher_name');
			$user_obj->password=$this->input->post('teacher_pass');
			$user_obj->email=$this->input->post('teacher_email');
			$user_obj->mobile=$this->input->post('teacher_mobile');
			$user_obj->home_phone=$this->input->post('teacher_home_mobile');
			$user_obj->t_shirt_size=$this->input->post('teacher_t_shirt');


			if($user_obj->save()){

				$user_obj->where('email',$this->input->post('teacher_email'));
				$user_obj->get();

				 $person_tour_obj->user_type_id=3;
				 $person_tour_obj->id_tour=$default_tour;
				 $person_tour_obj->id_user=$user_obj->id_user;
				 $person_tour_obj->save();

				 $data['title']="Register";
				 $data['name']=$this->input->post('teacher_name');
				 $this->load->view('common/header',$data);
				 $this->load->view('alert/registration_done',$data);
				 $this->load->view('form/user_registration');
				 $this->load->view('common/footer');
			}
			else{
				$data['title']="Register";
				$this->load->view('common/header',$data);
				$this->load->view('form/user_registration');
				$this->load->view('common/footer');
			}
		}
	}

	public function alumni_process(){

		$tour_obj=new Tour_table();
       	$tour_obj->where('status',2);
        $tour_obj->get();

        $person_tour_obj=new Person_tour_table();

        $default_tour=$tour_obj->id_tour;

		//validation Rules
		$this->form_validation->set_rules('alumni_name', 'Full Name', 'required');
		$this->form_validation->set_rules('alumni_pass', 'Password', 'required');
		$this->form_validation->set_rules('alumni_reg', 'Registration No','required|numeric|exact_length[10]|is_unique[user.reg_no]');
		$this->form_validation->set_rules('alumni_email', 'Email','required|valid_email');
		$this->form_validation->set_rules('alumni_mobile', 'Mobile', 'required|numeric|exact_length[11]');
		$this->form_validation->set_rules('alumni_home_mobile', 'Home Phone', 'required|numeric');
		$this->form_validation->set_rules('alumni_t_shirt', 'T shirt size', 'required');


		//custom message for form validation
		$this->form_validation->set_message('required', '%s can\'t be Blank');



		if ($this->form_validation->run() == FALSE)
		{
			$data['title']="Register";
			$this->load->view('common/header',$data);
			$this->load->view('form/user_registration');
			$this->load->view('common/footer');
		}
		else{
			$user_obj = new User_table();
			$user_obj->name=$this->input->post('alumni_name');
			$user_obj->reg_no=$this->input->post('alumni_reg');
			$user_obj->password=$this->input->post('alumni_pass');
			$user_obj->email=$this->input->post('alumni_email');
			$user_obj->mobile=$this->input->post('alumni_mobile');
			$user_obj->home_phone=$this->input->post('alumni_home_mobile');
			$user_obj->t_shirt_size=$this->input->post('alumni_t_shirt');


			if($user_obj->save()){


				$user_obj->where('email',$this->input->post('alumni_email'));
				$user_obj->get();

				 $person_tour_obj->user_type_id=5;

				 $person_tour_obj->id_tour=$default_tour;
				 $person_tour_obj->id_user=$user_obj->id_user;
				 $person_tour_obj->save();

				 $data['title']="Register";
				 $data['name']=$this->input->post('alumni_name');
				 $this->load->view('common/header',$data);
				 $this->load->view('alert/registration_done',$data);
				 $this->load->view('form/user_registration');
				 $this->load->view('common/footer');
			}
			else{
				$data['title']="Register";
				$this->load->view('common/header',$data);
				$this->load->view('form/user_registration');
				$this->load->view('common/footer');
			}
		}
	}

	public function guest_process(){
		$tour_obj=new Tour_table();
       	$tour_obj->where('status',2);
        $tour_obj->get();

        $person_tour_obj=new Person_tour_table();

        $default_tour=$tour_obj->id_tour;

		//validation Rules
		$this->form_validation->set_rules('guest_name', 'Full Name', 'required');
		$this->form_validation->set_rules('guest_pass', 'Password', 'required');
		$this->form_validation->set_rules('guest_email', 'Email','required|valid_email');
		$this->form_validation->set_rules('guest_mobile', 'Mobile', 'required|numeric|exact_length[11]');
		$this->form_validation->set_rules('guest_home_mobile', 'Home Phone', 'required|numeric');
		$this->form_validation->set_rules('guest_t_shirt', 'T shirt size', 'required');


		//custom message for form validation
		$this->form_validation->set_message('required', '%s can\'t be Blank');



		if ($this->form_validation->run() == FALSE)
		{
			$data['title']="Register";
			redirect_back();
			// $this->load->view('common/header',$data);
			// $this->load->view('form/user_registration');
			// $this->load->view('common/footer');
		}
		else{
			$user_obj = new User_table();
			$user_obj->name=$this->input->post('guest_name');
			$user_obj->password=$this->input->post('guest_pass');
			$user_obj->email=$this->input->post('guest_email');
			$user_obj->mobile=$this->input->post('guest_mobile');
			$user_obj->home_phone=$this->input->post('guest_home_mobile');
			$user_obj->t_shirt_size=$this->input->post('guest_t_shirt');


			if($user_obj->save()){

				$user_obj->where('email',$this->input->post('guest_email'));
				$user_obj->get();


				 $person_tour_obj->user_type_id=2;
				 $person_tour_obj->id_tour=$default_tour;
				 $person_tour_obj->id_user=$user_obj->id_user;
				 $person_tour_obj->save();

				 $data['title']="Register";
				 $data['name']=$this->input->post('guest_name');
				 $this->load->view('common/header',$data);
				 $this->load->view('alert/registration_done',$data);
				 $this->load->view('form/user_registration');
				 $this->load->view('common/footer');
			}
			else{
				$data['title']="Register";
				$this->load->view('common/header',$data);
				$this->load->view('form/user_registration');
				$this->load->view('common/footer');
			}
		}
	}

}
