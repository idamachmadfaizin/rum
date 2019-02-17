<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
    parent:: __construct();
    
		$this->load->model('profile_model');
	}

	public function index() {
    // $id = $this->session->id_customer;
    
    $data['profile']=$this->profile_model->getById();
    
		$this->load->view('profile', $data);
	}

	public function update() {
		$id = $this->session->id_customer;
		$profile = $this->profile_model;

		$validation=$this->form_validation;
		$validation->set_rules($profile->rules());

		if($validation->run()) {
			$profile->update();
			$this->session->set_flashdata('updated', 'Update Profile Success');
		}

		// redirect('/profile');
		$this->index();
	}

}
