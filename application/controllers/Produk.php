<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->library('pagination');
    $this->load->model('Produk_model');
  }

  public function index($offset = 0)
  {
    $search = $this->input->get('search-product');
    $sorting = $this->input->get('sorting');
    $kategori2 = $this->input->get('kategori');


    $config['base_url'] = site_url('produk/index');
    $config['total_rows'] = $this->Produk_model->getTotalProduk($search, $kategori2);
    $config['per_page'] = 9;

    // tag pagination
    $config['full_tag_open'] = '<div class="pagination flex-m flex-w p-t-26">';
    $config['full_tag_close'] = '</div>';

    $config['num_tag_open'] = false;
    $config['num_tag_close'] = false;

    $config['cur_tag_open'] = '<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">';
    $config['cur_tag_close'] = '</a>';

    $config['next_link'] = false;
    $config['prev_link'] = false;

    $config['attributes'] = array('class' => 'item-pagination flex-c-m trans-0-4');

    $this->pagination->initialize($config);
    // end tag pagination


    $limit = $config['per_page'];
    $kategori = $this->Produk_model->getAllTable('kategori');
    $kategori = $kategori->result_array();
    $data['kategori'] = $kategori;
    array_unshift($data['kategori'], array("id_kategori" => "0", "nama_kategori" => "All", "url_image_kategori" => "0"));

    $produk = $this->Produk_model->getProdukImage($search, $sorting, $kategori2, $limit, $offset);
    $data['produk'] = $produk;

    $this->load->view('produk', $data);
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

      $id_cart = $this->Produk_model->product_exist($where);

      if ($id_cart > 0) {
        $old_qty = $this->Produk_model->getQty($where);
        $new_qty = $old_qty + 1;

        $updateQty['qty_cart'] = $new_qty;

        $this->Produk_model->tambah_qty($id_cart, $updateQty);
        redirect('/produk');
      } else {
        $this->Produk_model->addToCart($data);
        redirect('/produk');
      }
    } else {
      redirect('/login');
    }
  }
}
