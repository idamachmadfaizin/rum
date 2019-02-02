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
    $search = $this->input->get('search-product');
    $sorting = $this->input->get('sorting');
    $kategori2 = $this->input->get('kategori');

    
    $config['base_url'] = site_url('produk/index');
    $config['total_rows'] = $this->produk_model->getTotalProduk($search, $kategori2);
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
    $kategori = $this->produk_model->getAllTable('kategori');
    $kategori = $kategori->result_array();
    $data['kategori'] = $kategori;
    array_unshift($data['kategori'], array("id_kategori" => "0", "nama_kategori" => "All", "url_image_kategori" => "0"));
        
    $produk = $this->produk_model->getProdukImage($search, $sorting, $kategori2, $limit, $offset);
    $produk = $produk->result_array();
    $data['produk'] = $produk;

		$this->load->view('produk', $data);
  }
  
  public function addtocart()
  {
    
  }
}
