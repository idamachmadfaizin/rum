<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller
{
  public function __construct() {
    parent:: __construct();

    $this->load->model('admin/customer_model');
  }

  public function index()
  {
    $this->load->view('admin/customer');
  }
}
