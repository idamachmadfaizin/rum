<?php

class Order_model extends CI_Model
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
    $this->db->select('orders.id_order, orders.id_customer, orders.tgl_order, orders.total_harga, orders.status, customer.email_customer, customer.nama_customer, customer.nomor_telp, customer.address, customer.jenis_kelamin, customer.tanggal_lahir, konfirmasi_pembayaran.id_konfirmasi, konfirmasi_pembayaran.tanggal_tf, konfirmasi_pembayaran.bukti_tf, konfirmasi_pembayaran.nama_bank, konfirmasi_pembayaran.bank_owner, konfirmasi_pembayaran.note');
    $this->db->from($this->_tOrders);
    $this->db->join($this->_tCustomer, $this->_tCustomer . '.id_customer = ' . $this->_tOrders . '.id_customer');
    $this->db->join($this->_tKP, $this->_tKP . '.id_order = ' . $this->_tOrders . '.id_order', 'left');
    $this->db->limit($limit, $offset);
    $this->db->order_by('orders.tgl_order', 'desc');
    // echo $this->db->get_compiled_select();

    return $this->db->get()->result();
  }

  public function getDetailOrder($id_orders)
  {
    $this->db->from($this->_tDO);
    $this->db->join($this->_tProduk, $this->_tProduk . '.id_produk = ' . $this->_tDO . '.id_produk');
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
