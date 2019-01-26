<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->library('pagination');
    $this->load->model('produk_model');
  }
    
	public function index($offset = 0)
	{
    $cari = $this->input->get('search-product');

    $config['base_url'] = site_url('produk/index');
    $config['total_rows'] = $this->produk_model->getTotalProduk($cari);
    $config['per_page'] = 9;

    // Pagination
    // <div class="pagination flex-m flex-w p-t-26">
    // <span>
    //   <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
    // </span>
    // <span>
    //   <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
    // </span>
    // </div>

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
    // end tag pagination

    $this->pagination->initialize($config);

    $kategori = $this->produk_model->getAllTable('kategori');
    $kategori = $kategori->result_array();
    $data['kategori'] = $kategori;
        
    $limit = $config['per_page'];
    $produk = $this->produk_model->getProdukImage($cari, $limit, $offset);
    $produk = $produk->result_array();
    $data['produk'] = $produk;

		$this->load->view('produk', $data);
	}
}
