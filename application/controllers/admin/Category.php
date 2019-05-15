<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller
{
  public function __construct() {
    parent:: __construct();

    $this->load->model('admin/category_model');
    $this->load->library('pagination');
  }
  
  public function index($id = 0)
  {
    $kategori = $this->category_model;

    // $config['base_url'] = site_url('admin/category/index');
    // $config['total_rows'] = $kategori->getTotalRow();
    // $config['per_page'] = 10;
    
    // // tag pagination
    // $config['full_tag_open'] = '<nav aria-label="Page navigation kategori" class="d-flex justify-content-end pr-5"><ul class="pagination pagination-sm">';
    // $config['full_tag_close'] = '</ul></nav>';
    
    // $config['num_tag_open'] = '<li class="page-item">';
    // $config['num_tag_close'] = '</li>';
    
    // $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
    // $config['cur_tag_close'] = '</a></li>';
    
    // $config['next_link'] = '<li class="page-item">Next</li>';
    // $config['prev_link'] = '<li class="page-item">Previous</li>';
    
    // $config['attributes'] = array('class' => 'page-link');
    
    // $this->pagination->initialize($config);
    // // end tag pagination
    
    
    // $limit = $config['per_page'];
    $kategoris = $kategori->selectAll();
    $data['kategori'] = $kategoris;
    
    if ($id != 0) {
      $data['singleCategory'] = $kategori->getSingle($id);
    }else {
      $data['singleCategory'] = "";
    }

    $this->load->view('admin/category', $data);
  }
  public function insertUpdate()
  {
    $kategori = $this->category_model;
    $post = $this->input->post();

    $id = $post['id_kategori'];

    $validation = $this->form_validation;
    $validation->set_rules($kategori->rules());

    // get old url image from db
    $url_image_kategori = $this->url_image_kategori = $kategori->getSingle($id);
    $url_image_kategori = $url_image_kategori[0]->url_image_kategori;

    if (empty($_FILES['file-input']['name'])) { //cek form input image
      if (!$url_image_kategori) {
        // var_dump($url_image_kategori);
        $this->form_validation->set_rules('file-input', 'Gambar Kategori', 'required');
      }
    }else {
      $url_image_kategori = false;
    }

    if ($validation->run()) {
      if ($id) {
        $update = $kategori->update($id, $url_image_kategori);
        if ($update) {
          $this->session->set_flashdata('sukses', 'Kategori berhasi diupdate');
        }
      } else {
        if ($kategori->insert()) {
          $this->session->set_flashdata('sukses', 'Kategori berhasil disimpan');
        }
      }
    }
    
    redirect("admin/category");
  }
  
  public function disable($id)
  {
    $kategori = $this->category_model;
    
    $disable = $kategori->disable($id);
    if ($disable) {
      $this->session->set_flashdata('sukses', 'Kategori berhasil dinonaktifkan');
    }
    redirect("admin/category");
  }

  public function enable($id)
  {
    $kategori = $this->category_model;
    
    $enable = $kategori->enable($id);
    if ($enable) {
      $this->session->set_flashdata('sukses', 'Kategori berhasil diaktifkan');
    }
    redirect("admin/category");
  }
}
