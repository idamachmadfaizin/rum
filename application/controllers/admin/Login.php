<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __constructor()
    {
        parent::__construct();

        $this->load->model('admin/adminLogin_model');
    }

    public function index()
    {
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

            $admin = $this->adminLogin_model->login($where)->row_array();
            die(var_dump($admin));
            if ($admin) {
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('error_session', 'Email atau password salah!');
                redirect('admin/login');
            }
        }
    }
}
