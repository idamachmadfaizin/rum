<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller 
{
  public function __construct() {
    parent:: __construct();

    $this->load->model('admin/order_model');
    $this->load->library('pagination');
  }

  public function index($offset = 0)
  {
    $order = $this->order_model;

    // Pagination
    $config['base_url'] = site_url('admin/order/index');
    $config['total_rows'] = $order->getTotalRow();
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
    // .tag Pagination
    
    $this->pagination->initialize($config);
    // .Pagination
    
    $limit = $config['per_page'];

    $data['order'] = $order->getOrders($limit, $offset);

    // get where in for detail order
    foreach ($data['order'] as $orders) {
      $id_orders[] = $orders->id_order;
    }
    $data['detail_order'] = $order->getDetailOrder($id_orders);

    $this->load->view('admin/order', $data);
  }

  public function updateStatus()
  {
    $order = $this->order_model;

    $id = $order->updateStatus();

    redirect('admin/order/');
  }
}
