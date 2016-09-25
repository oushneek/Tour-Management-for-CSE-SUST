<?php

class Home extends CI_Controller{
	public function index(){
		$data['title']="Home";
		$this->load->view('common/header',$data);
		$this->load->view('list/home');
		$this->load->view('common/footer');	
	}

	public function cost(){
		$data['title']="Cost";
		$this->load->view('common/header',$data);
		$this->load->view('list/cost');
		$this->load->view('common/footer');	
	}
}