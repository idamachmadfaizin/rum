<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{
  public function __construct() {
    parent:: __construct();

    $this->load->model('admin/product_model');
    $this->load->library('pagination');
  }

  public function index($offset= 0)
  {
    $produk = $this->product_model;

    $config['base_url'] = site_url('admin/product/index');
    $config['total_rows'] = $produk->getTotalRow();
    $config['per_page'] = 10;
    
    // tag pagination
    $config['full_tag_open'] = '<nav aria-label="Page navigation produk" class="d-flex justify-content-end pr-5"><ul class="pagination pagination-sm">';
    $config['full_tag_close'] = '</ul></nav>';
    
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';
    
    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
    $config['cur_tag_close'] = '</a></li>';
    
    $config['next_link'] = '<li class="page-item">Next</li>';
    $config['prev_link'] = '<li class="page-item">Previous</li>';
    
    $config['attributes'] = array('class' => 'page-link');
    
    $this->pagination->initialize($config);
    // end tag pagination
    
    
    $limit = $config['per_page'];
    $produks = $produk->selectAll(3, $offset);
    $data['produk'] = $produks;

    $kategori = $produk->getKategori();
    $data['kategori'] = $kategori;

    $this->load->view('admin/product', $data);
  }

  public function insert()
  {
    $produk = $this->product_model;

    $validation = $this->form_validation;
    $validation->set_rules($produk->rules());

    if (empty($_FILES['file-input']['name'])) {
      $this->form_validation->set_rules('file-input', 'Gambar produk', 'required');
    }

    if ($validation->run()) {
      $produk->insert();
      $this->session->set_flashdata('sukses', 'Produk berhasil disimpan');
    }

    redirect("admin/product");
  }
}
