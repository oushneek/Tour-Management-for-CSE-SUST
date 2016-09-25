<?php

class Task extends CI_Controller{
	public function index(){
		$data['title']="Task";
		$this->load->view('common/header',$data);
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				$this->load->view('list/task');
			}
			else
				$this->load->view('list/home');
		}
		else
			$this->load->view('list/home');
		
		$this->load->view('common/footer');	
	}

	public function create(){
		$data['title']="Create Task";
		$this->load->view('common/header',$data);

		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				$this->load->view('form/task_create');
			}
			else
				$this->load->view('list/home');
			}
		else
			$this->load->view('list/home');
		
		$this->load->view('common/footer');
	}

	public function edit($id_task){
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				
				$data['title']="Edit Task";
				$data['id_task']=$id_task;
				$this->load->view('common/header',$data);
				$this->load->view('edit_form/edit_task');
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
				$this->form_validation->set_rules('title', 'Task', 'required');

				//custom message for form validation
				$this->form_validation->set_message('required', '%s can\'t be Blank');
				//$this->form_validation->set_message('is_unique', 'This Tour Name was added Before, Please try with another name ');

				if ($this->form_validation->run() == FALSE)
				{
					$data['title']=" Task update error";
					$this->load->view('common/header',$data);
					$this->load->view('list/task');
					$this->load->view('common/footer');
				}
				else{
					$task = new Task_list_table();
					
					$task->get();
					
					$task_id=$this->input->post('id_task');
					$title_task=$this->input->post('title');
					$budget_task=$this->input->post('budget');
					$cost_task=$this->input->post('cost');
					$user_id=$this->input->post('user_select');

					$task->where('id_task',$task_id)->update(array('title'=>$title_task,'budget'=>$budget_task,'cost'=>$cost_task,'id_user'=>$user_id));
					
					if($task->db->affected_rows()>0){
						 $data['title']="Task Update Confirmation";
						 $data['name']=$this->input->post('title_task');
						 $this->load->view('common/header',$data);
						 $this->load->view('alert/task_updated',$data);
						 $this->load->view('list/task');
						 $this->load->view('common/footer');
					}
					else{
						$data['title']="Update failed";
						$this->load->view('common/header',$data);
						$this->load->view('list/task');
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

	public function delete($id_task){
		
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
			
				if($this->db->delete('task_list', array('id_task' => $id_task)) ){
					echo "<script>alert('Task Deletation Complete')</script>";
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

	public function assign($id_task){

		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				
				$data['title']="Assign Task";
				$data['id_task']=$id_task;
				$this->load->view('common/header',$data);
				$this->load->view('form/assign_task',$data);
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
	public function assign_final(){
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				
			
				$task_id=$this->input->post('id_task');
				$task = new Task_list_table();
				$task->where('id_task',$task_id);	
				$task->get();
					
				
				$user_id=$this->input->post('user_select');
				

					$task->where('id_task',$task_id)->update(array('id_user'=>$this->input->post('user_select'),'status'=>1));
					
					if($task->db->affected_rows()>0){
						 $data['title']="Task Update Confirmation";
						 $data['name']=$this->input->post('title_task');
						 $this->load->view('common/header',$data);
						 $this->load->view('list/task');
						 $this->load->view('common/footer');
					}
					else{
						$data['title']="Update failed";
						$this->load->view('common/header',$data);
						$this->load->view('list/task');
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

				//validation Rules
				$this->form_validation->set_rules('title', 'Title', 'required');
				$this->form_validation->set_rules('budget', 'Budget', 'numeric');



				//custom message for form validation
				$this->form_validation->set_message('required', '%s can\'t be Blank');



				if ($this->form_validation->run() == FALSE)
				{
					$data['title']="Task";
					$this->load->view('common/header',$data);
					$this->load->view('form/task_create');
					$this->load->view('common/footer');	
				}
				else{
					$task_list = new Task_list_table();
					$task_list->title=$this->input->post('title');
					$task_list->budget=$this->input->post('budget');
					$task_list->id_tour=$default_tour;


					if($task_list->save()){
						 $data['title']="Task confirmation";
						 $data['name']=$this->input->post('title');
						 $this->load->view('common/header',$data);
						 $this->load->view('alert/tour_done',$data);
						 $this->load->view('form/task_create');
						 $this->load->view('common/footer');
					}
					else{
						$data['title']="Task";
						$this->load->view('common/header',$data);
						$this->load->view('form/task_create');
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