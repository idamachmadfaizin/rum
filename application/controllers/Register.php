<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
		parent:: __construct();

    $this->load->model('register_model');
  }
  
  public function index()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('telp', 'Telphone', 'trim|required|max_length[13]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[16]');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
    
    if ($this->form_validation->run()) {
      $data['email'] = $this->input->post('email');
      $data['nomor_telp'] = $this->input->post('telp');
      $data['password_customer'] = md5($this->input->post('password'));

      $where = array(
        'email_customer' => $data['email'],
        'password_customer' => $data['password_customer']
      );

      $cek = $this->register_model->cek_exist($where)->num_rows();

      if($cek > 0){ //cek email exist?
        $this->session->set_flashdata('message', 'Email Sudah Terdaftar!');
        redirect('/register');
      } else {
        $id = $this->register_model->register($data);
        
        if ($id) {
          $_SESSION['id_customer'] = $id;
          redirect();
        } else {
          $this->session->set_flashdata('message', 'Registration failed!');
          redirect('/register');
        }
      }

    }

    $this->load->view('register');
  }
}