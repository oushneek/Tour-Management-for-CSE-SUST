<?php

class Place extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	public function index(){
		//$this->load->view('create_place', array('error' => ' ' ));
		$data['title']="Place";
		$this->load->view('common/header',$data);
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				$this->load->view('list/place');
			}
			else
				$this->load->view('list/home');
		}
		else
			$this->load->view('list/home');
		
		$this->load->view('common/footer');	
	}

	public function create(){
		$data['title']="Create Place";
		$this->load->view('common/header',$data);
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				$this->load->view('form/create_place');
			}
			else
				$this->load->view('list/home');
		}
		else
			$this->load->view('list/home');
		
		$this->load->view('common/footer');
	}

	public function edit($id_place){
		$data['title']="Edit Place";
		$data['id_place']=$id_place;
		$this->load->view('common/header',$data);
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				$this->load->view('edit_form/edit_place');
			}
			else
				$this->load->view('list/home');
		}
		else
			$this->load->view('list/home');
		
		$this->load->view('common/footer');
	}


	public function update(){

		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				
			
				//validation Rules
				$this->form_validation->set_rules('place', 'Place Name', 'required');

				//custom message for form validation
				$this->form_validation->set_message('required', '%s can\'t be Blank');
				//$this->form_validation->set_message('is_unique', 'This Tour Name was added Before, Please try with another name ');

				if ($this->form_validation->run() == FALSE)
				{
					$data['title']=" Place update error";
					$this->load->view('common/header',$data);
					$this->load->view('list/place');
					$this->load->view('common/footer');
				}
				else{
					$place = new Place_table();
					
					$place->get();
					
					$place_id=$this->input->post('id_place');
					$name_place=$this->input->post('place');
					$description_place=$this->input->post('description');
					$image_place=$this->input->post('image');

					$place->where('id_place',$place_id)->update(array('name'=>$name_place,'description'=>$description_place,'image'=>$image_place));
					
					if($place->db->affected_rows()>0){
						 $data['title']="Place Update Confirmation";
						 $data['name']=$name_place;
						 $this->load->view('common/header',$data);
						 $this->load->view('alert/place_updated',$data);
						 $this->load->view('list/place');
						 $this->load->view('common/footer');
					}
					else{
						$data['title']="Update failed";
						$this->load->view('common/header',$data);
						$this->load->view('list/place');
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

	public function delete($id_place){
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				
			
				if($this->db->delete('place', array('id_place' => $id_place)) ){
					echo "<script>alert('Place Deletation Complete')</script>";
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

	function do_upload(){

		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				
			

				$this->form_validation->set_rules('place', 'Place name', 'required');
				$this->form_validation->set_rules('description', 'Description', 'required');

				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'jpg';
				$config['max_size']	= '100';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
				$config['file_name']=$this->input->post('place');

				$this->load->library('upload', $config);

				

				if ( (! $this->upload->do_upload()) || $this->form_validation->run() == FALSE)
				{
					$error = array('error' => $this->upload->display_errors());
					
					$data['title']="Create Place";
					$this->load->view('common/header',$data);
					$this->load->view('form/create_place');
					$this->load->view('common/footer');		

					$this->load->view('create_place', $error);
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$place_obj = new Place_table();
					$place_obj->name=$this->input->post('place');
					$place_obj->description=$this->input->post('description');

					 /*pass all the upload data to the $img_data array*/
		          	$img_data = $this->upload->data();
					$place_obj->image=$img_data['file_name'];

					//$this->load->view('upload_success', $data);
					if($place_obj->save()){
						 $data['title']="Place add confirmation";
						 $this->load->view('common/header',$data);
						 $this->load->view('alert/place_done',$data);
						 $this->load->view('form/create_place');
						 $this->load->view('common/footer');
					}
					else{
						$data['title']="Create Place";
						$this->load->view('common/header',$data);
						$this->load->view('form/create_place');
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

	public function process(){
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				
			
				//validation Rules
				$this->form_validation->set_rules('place', 'Place name', 'required');
				$this->form_validation->set_rules('description', 'Description', 'required');



				//custom message for form validation
				//$this->form_validation->set_message('required', '%s can\'t be Blank');



				if ($this->form_validation->run() == FALSE)
				{
					$data['title']="Create Place";
					$this->load->view('common/header',$data);
					$this->load->view('form/create_place');
					$this->load->view('common/footer');		
				}
				else{

						$place_obj = new Place_table();
						$place_obj->name=$this->input->post('place');
						$place_obj->description=$this->input->post('description');
						$place_obj->image=$this->input->post('image');


					if($place_obj->save()){
						 $data['title']="Place add confirmation";
						 $this->load->view('common/header',$data);
						 $this->load->view('alert/place_done',$data);
						 $this->load->view('form/create_place');
						 $this->load->view('common/footer');
					}
					else{
						$data['title']="Create Place";
						$this->load->view('common/header',$data);
						$this->load->view('form/create_place');
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