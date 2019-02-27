<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_conf extends CI_Controller
{
  
  public function __construct() {
    parent:: __construct();
    
		$this->load->model('payment_conf_model');
  }
  
  public function index()
  {
    $this->load->view('payment_conf');
  }
}
