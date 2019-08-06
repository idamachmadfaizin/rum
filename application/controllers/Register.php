<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('register_model');
    $this->load->helper('string');
  }

  public function index()
  {
    require_once('cart_header.php');

    $this->load->view('register', $data);
  }

  //func for redirect user not verifed
  public function verify($id = null)
  {
    require_once('cart_header.php');

    if ($id == null) {
      $id = $this->session->id_customer;
    }

    if ($this->session->flashdata('messageEmail')) {
      $data['message'] = $this->session->flashdata('messageEmail');
    } else {
      $data['message'] = "Registration Successfully, please check your email for a verification link. If you did not receive the email, <a href='" . site_url("register/resend/" . $id) . "'>click here to request another</a>";
    }

    $this->load->view('verify', $data);
  }

  public function submit()
  {
    $this->form_validation->set_rules('email_customer', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('telp', 'Telphone', 'trim|required|max_length[13]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[16]');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');

    //cek validation
    if ($this->form_validation->run()) {
      $customer['email_customer'] = $this->input->post('email_customer');
      $customer['nomor_telp'] = $this->input->post('telp');
      $customer['password_customer'] = md5($this->input->post('password'));

      $where = array(
        'email_customer' => $customer['email_customer']
      );

      $cek = $this->register_model->cek_exist($where)->num_rows();

      //cek email exist?
      if ($cek > 0) {
        $this->session->set_flashdata('message', 'Email Sudah Terdaftar, <a href="login" class="alert-link">Login in here.</a>');
        redirect('/register');
      } else {
        //generate verification code
        $verificationText = random_string('alnum', 45);
        $customer['email_verification_code'] = $verificationText;

        //insert data register and get id
        $id = $this->register_model->register($customer);

        //make session id_customer
        if ($id) {
          $_SESSION['id_customer'] = $id;
        } else {
          $this->session->set_flashdata('message', 'Registration failed!');
          redirect('/register');
        }

        //call function config email
        $this->configEmail();

        // konfigurasi pengiriman
        $this->email->set_newline("\r\n");
        $this->email->set_mailtype('html');
        $this->email->from("doublebunny76@gmail.com", "RUM Seafood");
        $this->email->to($customer['email_customer']); //email customer
        $this->email->subject("Verification account");
        $this->email->message(
          "Dear User,<br>
          Please click on below URL or paste into your browser to verify your Email Address<br><br><a href='" . site_url("register/verifyEmail/$verificationText") . "'>Verify Email Address</a>"
            . "<br><br>Thanks<br>RUM Seafood"
        );

        //send email and check if sended
        if ($this->email->send()) {
          $messageEmail = "Registration Successfully, please check your email for a verification link. If you did not receive the email, <a href='" . site_url("register/resend/" . $id) . "'>click here to request another</a>";
        } else {
          $messageEmail = "Registration Successfully, but failed to send email verification!, <a href='" . site_url("register/resend" . $id) . "'>please click here to request another!</a>";
        }

        //set flashdata to message in function register/verify
        $this->session->set_flashdata('messageEmail', $messageEmail);

        redirect('register/verify/' . $id);
      }
    } else {
      // redirect('register');
      $this->index();
    }
  }

  public function resend($id)
  {
    $this->configEmail();

    //generate verification code
    $verificationText = random_string('alnum', 45);

    //get email customer
    $email = $this->register_model->getEmail($id);

    //update verification code
    $update['email_verification_code'] = $verificationText;
    $this->register_model->updateVerficationCode($id, $update);

    // konfigurasi pengiriman
    $this->email->set_newline("\r\n");
    $this->email->set_mailtype('html');
    $this->email->from("doublebunny76@gmail.com", "RUM Seafood");
    $this->email->to($email); //email customer
    $this->email->subject("Verification account");
    $mailMessage = "<html><head><meta name='viewport' content='width=device-width, initial-scale=1.0'><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'></head><body>";
    $mailMessage .= "Dear User,<br>
    Please click on below URL or paste into your browser to verify your Email Address<br><br><a href='" . site_url("register/verifyEmail/$verificationText") . "'style='box-sizing: border-box; border-radius: 3px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); color: #FFF; display: inline-block; text-decoration: none; -webkit-text-size-adjust: none; background-color: #3490DC; border-top: 10px solid #3490DC; border-right: 18px solid #3490DC; border-bottom: 10px solid #3490DC; border-left: 18px solid #3490DC;'>Verify Email Address</a>" . "<br><br>Thanks<br>RUM Seafoody";
    $mailMessage .= "</body></html>";
    $this->email->message($mailMessage);

    if ($this->email->send()) {
      $messageEmail = "Request Verification Successfully, please check your email for a verification link. If you did not receive the email, <a href='" . site_url("register/resend/" . $id) . "'>click here to request another</a>";
    } else {
      $messageEmail = "Request Verification Failed, please try again!, <a href='" . site_url("register/resend" . $id) . "'>please click here to request another!</a>";
    }

    //set flashdata to message in function register/verify
    $this->session->set_flashdata('messageEmail', $messageEmail);

    redirect('register/verify/' . $id);
  }

  public function configEmail()
  {
    $this->load->library('email');
    //email config
    // $config['charset'] = 'utf-8';
    // $config['useragent'] = 'Codeigniter';
    // $config['protocol'] = 'smtp';
    // $config['mailtype'] = 'html';
    // $config['smtp_host'] = 'smtp.gmail.com';
    // $config['smtp_port'] = '465';
    // $config['smtp_timeout'] = '7';
    // $config['smtp_user'] = 'doublebunny76@gmail.com';
    // $config['smtp_pass'] = 'DoubleBunny123';
    // $config['crlf'] = '\r\n';
    // $config['newline'] = '\r\n';
    // $config['wordwrap'] = TRUE;
    // $config['smtp_crypto'] = "ssl";

    $config = array(
      'protocol' => 'smtp',
      'smtp_host' => 'smtp.mailtrap.io',
      'smtp_port' => 2525,
      'smtp_user' => '16ef3c199dc945',
      'smtp_pass' => '5569c6b859347a',
      'crlf' => "\r\n",
      'newline' => "\r\n"
    );

    // initialize email
    $this->email->initialize($config);
  }

  function verifyEmail($code)
  {
    $result = $this->register_model->activatingAccount($code);
    if ($result != false) {
      redirect();
    } else {
      show_404();
    }
  }
}
