<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller
{
  public function __construct() {
    parent:: __construct();

    $this->load->model('admin/category_model');
  }
  
  public function index()
  {
    $this->load->view('admin/category');
  }
}
