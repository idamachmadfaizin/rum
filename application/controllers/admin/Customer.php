<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('admin/Customer_model');
    $this->load->library('pagination');
  }

  public function index($offset = 0)
  {
    $customer = $this->Customer_model;

    $config['base_url'] = site_url('admin/customer/index');
    $config['total_rows'] = $customer->getTotalRow();
    $config['per_page'] = 10;

    // tag pagination
    $config['full_tag_open'] = '<nav aria-label="Page navigation customer" class="d-flex justify-content-end pr-5"><ul class="pagination pagination-sm">';
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
    $customer = $customer->selectAll($limit, $offset);
    $data['customer'] = $customer;

    $this->load->view('admin/customer', $data);
  }
}
