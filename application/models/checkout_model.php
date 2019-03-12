<?php

class checkout_model extends CI_Model
{
  private $_table = "orders";
  
  public $id_customer;
  public $tgl_order;
  public $total_harga;

  public function make_order($grand_total)
  {
    $this->id_customer = $this->session->id_customer;
    $this->tgl_order = date("o-m-d");
    $this->total_harga = $grand_total;

    $this->db->insert($this->_table, $this);
    return $this->db->insert_id();
  }

  public function insDetailCart($data)
  {
    $this->db->insert_batch('detail_order', $data);
  }
  public function delete_cart()
  {
    $id = $this->session->id_customer;
    $this->db->where('id_customer', $id);
    $this->db->delete('cart');
  }
}
