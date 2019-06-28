<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('profile_model');
		$this->load->library('upload');
	}

	public function index()
	{
		//get master select options    
		$data['agamas'] = $this->profile_model->masterAgama();
		$data['pendidikans'] = $this->profile_model->masterPendidikan();
		$data['provinsis'] = $this->profile_model->masterProvinsi();
		$data['kabupatens'] = $this->profile_model->masterKabupaten();
		$data['kotas'] = $this->profile_model->masterKota();
		//end

		//get profile customer
		$data['profile'] = $this->profile_model->getById();

		$this->load->view('profile', $data);
	}

	public function update()
	{
		$profile = $this->profile_model;

		$validation = $this->form_validation;
		$validation->set_rules($profile->rules());

		if ($validation->run()) {
			$profile->update();
			$this->session->set_flashdata('updated', 'Update Profile Success');
		}

		redirect('/profile');
	}

	public function getKabupaten()
	{
		$id = $this->input->post('provinsi');
		$regencies = $this->profile_model->getKabupaten($id);
		$profile = $this->profile_model->getById();

		// var_dump($regencies);
		// var_dump($profile);
		// die();

		$output = "";
		foreach ($regencies as $regency) {
			// $selected = "";
			// if ($profile->kabupaten == $regency->id_kabupaten) {
			// 	$selected = "selected";
			// }
			$output .= "<option value='" . $regency->id_kabupaten . "'>" . $regency->nama_kabupaten . "</option>";
		}
		// 
		echo $output;
	}
}
