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

    if (empty($data['carts']) ) {
      redirect('/produk');
    }
    $cart = $this->cart_model->get_cart()->result();

    $this->load->view('checkout', $data);
  }

  public function makeorder()
  {
    $checkout = $this->checkout_model;

    // get grand total
    $grand_total = $this->cart_model->grand_total()->row();
    // get id order inserted
    $id_order = $checkout->make_order($grand_total->grand_total);
    
    $data['id_order'] = $id_order;
    $data['grand_total'] = $this->cart_model->grand_total()->row();

    // insert to _detail_order
    $cart = $this->cart_model->get_cart()->result();
    $detail = array();
    foreach ($cart as $cart) {
      $arr['id_order'] = $id_order;
      $arr['id_produk'] = $cart->id_produk;
      $arr['jumlah'] = $cart->qty_cart;
      $arr['harga_satuan'] = $cart->harga_produk;
      array_push($detail, $arr);
    }
    $check = $this->checkout_model->insDetailCart($detail);
    print_r($check);
    // end

    $checkout->delete_cart();

    // $this->load->view('order_received', $data);
  }
}
