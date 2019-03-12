<?php 

class order_received_model extends CI_Model
{
  private $_table = "orders";

  public $id_order;
  public $id_customer;
  public $total_harga;

  public function getIdOrder()
  {
    $id = $this->session->id_customer;
    return $this->db->get_where($this->_table, ["id_customer" => $id])->row();
  }
}
