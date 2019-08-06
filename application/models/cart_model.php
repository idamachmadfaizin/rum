<?php

class Cart_model extends CI_Model
{

  function get_cart()
  {
    $id_customer = $this->session->id_customer;

    $this->db->select('c.id_cart, p.nama_produk, c.qty_cart, p.harga_produk, (p.harga_produk * c.qty_cart) AS total_harga_produk, p.id_produk, p.url_produk, i.url_image');

    $this->db->from('cart c');
    $this->db->join('produk p', 'c.id_produk = p.id_produk');
    // $this->db->join('cart c', 'c.id_cart = dc.id_cart');
    $this->db->join('image i', 'i.id_produk = p.id_produk');
    $this->db->where('c.id_customer', $id_customer);
    $this->db->group_by('c.id_produk');

    return $this->db->get()->result();
  }

  function update_qty($data_qty)
  {
    // $this->db->where_in('id_detail_cart', $id_details);
    $this->db->update_batch('cart', $data_qty, 'id_cart');
  }

  function delete_produk($id_cart)
  {
    $this->db->where('id_cart', $id_cart);
    $this->db->delete('cart');
    return $this->db->affected_rows();
  }

  function update_total_cart($id_customer)
  {
    $total_harga_cart = $this->grand_total()->result_array();
    $data['grand_total'] = $total_harga_cart[0]['grand_total'];
    // print_r($data);
    $this->db->where('id_customer', $id_customer);
    $this->db->update('cart', $data);
  }

  function grand_total()
  {
    $id_customer = $this->session->id_customer;

    $this->db->select('sum(harga_produk * qty_cart) as grand_total');
    $this->db->from('cart c');
    $this->db->join('produk p', 'c.id_produk = p.id_produk');
    $this->db->where('id_customer', $id_customer);
    return $this->db->get();
  }

  function get_grand_total()
  {
    $query = "SELECT SUM(total) AS grand_total FROM (SELECT (qty_cart*harga_produk) total FROM cart JOIN produk ON cart.id_produk = produk.id_produk) AS total";

    return $this->db->query($query);
  }

  function count()
  {
    $id_customer = $this->session->id_customer;

    $this->db->where('id_customer', $id_customer);
    return $this->db->count_all_results('cart');
  }
}
