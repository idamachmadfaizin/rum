<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
		parent:: __construct();

    $this->load->model('register_model');
  }
  
  public function index()
  {
    $this->form_validation->set_rules('email_customer', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('telp', 'Telphone', 'trim|required|max_length[13]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[16]');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
    
    if ($this->form_validation->run()) {
      $data['email_customer'] = $this->input->post('email_customer');
      $data['nomor_telp'] = $this->input->post('telp');
      $data['password_customer'] = md5($this->input->post('password'));

      $where = array(
        'email_customer' => $data['email_customer']
      );

      $cek = $this->register_model->cek_exist($where)->num_rows();

      if($cek > 0){ //cek email exist?
        $this->session->set_flashdata('message', 'Email Sudah Terdaftar, <a href="login" class="alert-link">Login in here.</a>');
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