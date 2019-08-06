<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function Home()
    {
        parent::Controller();
        $this->load->model('home_model');
        $this->load->model('email_model');
    }

    function index()
    { }

    function verify($verificationText = NULL)
    {
        $noRecords = $this->home_model->verifyEmailAddress($verificationText);
        if ($noRecords > 0) {
            $error = array("success" => "Email Verified Successfully!");
        } else {
            $error = array("error" => "Sorry Unable to Verify Your Email!");
        }
        $data['errormsg'] = $error;
        $this->load->view('', $data);
    }

    function senVerificationEmail()
    {
        $customer = $this->email_model->getCustomer();
        $this->email_model->sendVerificationEmail($customer->email_cutomer, $customer->email_verification_code);
        $this->load->view('index.php', $data);
    }
}
