<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    require_once('cart_header.php');

    $this->load->view("contact", $data);
  }
}
