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

  public function insDetailOrder($data)
  {
    return $this->db->insert_batch('detail_order', $data);
  }
  public function delete_cart()
  {
    $id = $this->session->id_customer;
    $this->db->where('id_customer', $id);
    $this->db->delete('cart');
  }
  
  // group fun Kmeans
  public function getKmeans()
  {
    return $this->db->get("k_means")->result();
  }
  
  public function insDetailKmeans($data)
  {
    return $this->db->insert_batch("detail_kmeans", $data);
  }
  
  public function getBirthDayCust()
  {
    $id = $this->session->id_customer;
    $this->db->select("tanggal_lahir");
    $this->db->where('id_customer', $id);
    return $this->db->get("customer")->row_object();
  }

  public function getProvinsiCust() //get provinsi customer
  {
    $id = $this->session->id_customer;
    $this->db->select("provinsi");
    $this->db->where('id_customer', $id);
    return $this->db->get("customer")->row_object();
  }

  public function getAllProvinsi()
  {
    return $this->db->get("provinsi")->result();
  }
}
