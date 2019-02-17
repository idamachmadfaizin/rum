<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Checkout extends CI_Controller
{
  
  public function __construct()
  {
    parent:: __construct();

    $this->load->model('checkout_model');
    $this->load->model('cart_model');
    $this->load->model('profile_model');
  }

  public function index()
  {
    $data['profile'] = $this->profile_model->getById();
    $data['carts'] = $this->cart_model->get_cart()->result();
    $data['grand_total'] = $this->cart_model->grand_total()->row();

    $this->load->view('checkout', $data);
  }

  public function makeorder()
  {
    
  }
}
