<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_received extends CI_Controller
{
  
  public function __construct() {
    parent:: __construct();
    
		$this->load->model('order_received_model');
  }
  
  public function index()
  {

    $this->load->view('order_received');
  }
}
