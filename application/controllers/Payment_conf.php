<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_conf extends CI_Controller
{
  
  public function __construct() {
    parent:: __construct();
    
		$this->load->model('payment_conf_model');
  }
  
  public function index()
  {
    $payment= $this->payment_conf_model;
    
    $data['no_invoice'] = $payment->getOrders();

    if ($this->input->get('invoice')) {
      $data['total'] = $this->getSingle($this->input->get('invoice'));
    }
    $this->load->view('payment_conf', $data);
  }
  public function getSingle($id)
  {
    $payment = $this->payment_conf_model;

    return $payment->getSingleData('id_order', $id);
  }

  public function simpan()
  {
    $payment = $this->payment_conf_model;

    $validation = $this->form_validation;
    $validation->set_rules($payment->rules());

    if (empty($_FILES['buktitf']['name'])) {
      $this->form_validation->set_rules('buktitf', 'Bukti Transfer', 'required');
    }
    if ($validation->run()) {
      $cek = $payment->simpan();
      print_r($cek);
      $this->session->set_flashdata('sukses', 'Konfirmasi pembayaran berhasil disimpan');
    }
    $this->index();
  }
}
