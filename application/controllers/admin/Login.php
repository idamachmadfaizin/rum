<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/loginAdmin_model');
        // $this->load->model('login_model');
    }

    public function index()
    {
        if ($this->session->id_admin) {
            redirect('admin/dashboard');
        }
        $this->load->view('admin/login');
    }

    public function submit()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $where = array(
                'email_admin' => $email,
                'password_admin' => md5($password)
            );

            $admin = $this->loginAdmin_model->login($where)->row_array();

            if ($admin) {
                $_SESSION['id_admin'] = $admin['id_admin'];
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('error_session', 'Email atau password salah!');
                $this->index();
            }
        }
        $this->index();
    }
}
