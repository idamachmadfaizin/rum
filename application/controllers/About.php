<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    require_once('cart_header.php');
    $this->load->view("about", $data);
  }
}
