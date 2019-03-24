<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller
{
  public function __construct() {
    parent:: __construct();

    $this->load->model('admin/category_model');
    $this->load->library('pagination');
  }
  
  public function index($offset = 0)
  {
    $kategori = $this->category_model;

    $config['base_url'] = site_url('admin/category/index');
    $config['total_rows'] = $kategori->getTotalRow();
    $config['per_page'] = 10;
    
    // tag pagination
    $config['full_tag_open'] = '<nav aria-label="Page navigation kategori" class="d-flex justify-content-end pr-5"><ul class="pagination pagination-sm">';
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
    $kategoris = $kategori->selectAll($limit, $offset);
    $data['kategori'] = $kategoris;

    $this->load->view('admin/category', $data);
  }
  public function insert()
  {
    $kategori = $this->category_model;

    $validation = $this->form_validation;
    $validation->set_rules($kategori->rules());

    if (empty($_FILES['file-input']['name'])) {
      $this->form_validation->set_rules('file-input', 'Gambar Kategori', 'required');
    }

    if ($validation->run()) {
      $kategori->insert();
      $this->session->set_flashdata('sukses', 'Kategori berhasil disimpan');
    }

    redirect("admin/category");
  }
}
