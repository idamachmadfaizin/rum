<?php

class dashboard_model extends CI_Model
{
  private $_tOrders = 'orders';
  private $_tKP = 'konfirmasi_pembayaran';
  private $_tCustomer = 'customer';
  private $_tDO = 'detail_order';
  private $_tProduk = 'produk';

  public $status;

  public function orderToday($dateNow)
  {
    $this->db->where('tgl_order', $dateNow);
    return $this->db->count_all_results($this->_tOrders);
  }

  public function getWidget($dateNow, $value)
  {
    $this->db->where('tgl_order', $dateNow);
    $this->db->where('status', $value);
    $this->db->from($this->_tOrders);
    return $this->db->count_all();
  }
  
  public function totCustomer()
  {
    return $this->db->count_all('customer');
  }

  public function getOrders($dateNow)
  {
    $this->db->from($this->_tOrders);
    $this->db->join($this->_tCustomer, $this->_tCustomer.'.id_customer = '.$this->_tOrders.'.id_customer');
    // $this->db->join($this->_tKP, $this->_tKP.'.id_order = '.$this->_tOrders.'.id_order', 'left');
    $this->db->where('tgl_order', $dateNow);
    return $this->db->get()->result();
  }

  public function getDetailOrder()
  {
    $this->db->from($this->_tDO);
    $this->db->join($this->_tProduk, $this->_tProduk.'.id_produk = '.$this->_tDO.'.id_produk');
    // $this->db->where('id_order', $id_order);

    return $this->db->get()->result();
  }

  public function getKP($dateNow)
  {
    // $this->db->where('tanggal_tf', $dateNow);
    return $this->db->get($this->_tKP)->result();
  }

  public function updateStatus()
  {
    $get = $this->input->get();
    
    $id = $get['id'];
    $this->status = $get['status'];

    return $this->db->update($this->_tOrders, $this, array("id_order" => $id));
  }
}
