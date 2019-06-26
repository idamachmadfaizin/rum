<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('login_model');
  }

  public function index()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run()) {
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $where = array(
        'email_customer' => $email,
        'password_customer' => md5($password)
      );

      $customer = $this->login_model->login($where)->row_array();

      if ($customer) {
        //cek status active email == NO
        if ($customer['active_status'] == 'N') {
          $_SESSION['id_customer'] = $customer['id_customer'];
          redirect('register/verify/' . $customer['id_customer']);
        } else {
          redirect();
        }
      } else {
        $this->session->set_flashdata('error_session', 'Email atau password salah!');
        redirect('/login');
      }
    }
    $this->load->view('login');
  }
}
