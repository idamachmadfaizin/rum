<?php

class order_model extends CI_Model
{
  private $_tOrders = 'orders';
  private $_tKP = 'konfirmasi_pembayaran';
  private $_tCustomer = 'customer';
  private $_tDO = 'detail_order';
  private $_tProduk = 'produk';

  public $status;

  public function getTotalRow()
  {
    return $this->db->count_all($this->_tOrders);
  }

  public function getOrders($limit, $offset)
  {
    $this->db->from($this->_tOrders);
    $this->db->join($this->_tCustomer, $this->_tCustomer.'.id_customer = '.$this->_tOrders.'.id_customer');
    $this->db->join($this->_tKP, $this->_tKP.'.id_order = '.$this->_tOrders.'.id_order', 'left');
    $this->db->limit($limit, $offset);
    // echo $this->db->get_compiled_select();
    
    return $this->db->get()->result();
  }

  public function getDetailOrder($id_orders)
  {
    $this->db->from($this->_tDO);
    $this->db->join($this->_tProduk, $this->_tProduk.'.id_produk = '.$this->_tDO.'.id_produk');
    $this->db->where_in('id_order', $id_orders);

    return $this->db->get()->result();
  }

  public function updateStatus()
  {
    $get = $this->input->get();
    
    $id = $get['id'];
    $this->status = $get['status'];

    return $this->db->update($this->_tOrders, $this, array("id_order" => $id));
  }
}
