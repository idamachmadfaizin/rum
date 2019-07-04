<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing_page extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('rum_model');
  }

  public function index()
  {
    $kategori = $this->rum_model->getKategori();
    $kategori = $kategori->result_array();
    $data['kategori'] = $kategori;

    $bestseller = $this->rum_model->selectProdukImage('bestseller');
    $bestseller = $bestseller->result_array();
    $data['bestseller'] = $bestseller;

    $new = $this->rum_model->selectProdukImage('new');
    $new = $new->result_array();
    $data['new'] = $new;

    $this->load->view('landing_page', $data);
  }

  public function addtocart($id_produk)
  {
    if ($this->session->id_customer) {
      $id_customer = $this->session->id_customer;

      $data['id_customer'] = $id_customer;
      $data['id_produk'] = $id_produk;
      $data['qty_cart'] = 1;

      // cek barang wes onok nang cart?
      $where = array(
        'id_customer' => $id_customer,
        'id_produk' => $id_produk
      );

      $id_cart = $this->rum_model->product_exist($where);

      if ($id_cart > 0) {
        $old_qty = $this->rum_model->getQty($where);
        $new_qty = $old_qty + 1; //qty tambah 1

        $updateQty['qty_cart'] = $new_qty;

        $this->rum_model->tambah_qty($id_cart, $updateQty);
        redirect();
      } else {
        $this->rum_model->addToCart($data);
        redirect();
      }
    } else {
      redirect('/login'); //kalau belum login
    }
  }
}
