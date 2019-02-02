<?php

class cart_model extends CI_Model 
{
  
  function get_detail_cart(){
    $this->db->select('dc.id_detail_cart, c.id_cart, dc.id_produk, dc.qty_detail_cart, c.total_harga_cart, p.nama_produk, p.harga_produk, p.url_produk, i.url_image');
    // $this->db->select('id_detail_cart, id_cart, dc.id_produk, dc.qty_detail_cart, p.nama_produk, p.harga_produk, url_produk, i.url_image');
    $this->db->from('detail_cart dc');
    $this->db->join('produk p', 'dc.id_produk = p.id_produk');
    $this->db->join('cart c', 'c.id_cart = dc.id_cart');
    $this->db->join('image i', 'i.id_produk = p.id_produk');
    $this->db->where('c.id_customer', '1');//edit id customer
    $this->db->group_by('dc.id_produk');
    // echo $this->db->get_compiled_select();

    // print_r ($this->db->get()->result_array());
    return $this->db->get();
  }

  public function update_qty($data_qty)
  {
    // $this->db->where_in('id_detail_cart', $id_details);
    $this->db->update_batch('detail_cart', $data_qty, 'id_detail_cart');
  }

  public function delete_produk($id_detail_cart)
  {
    $this->db->where('id_detail_cart', $id_detail_cart);
    $this->db->delete('detail_cart');
    return $this->db->affected_rows();
  }

  public function update_total_cart($id_customer)
  {
    $total_harga_cart = $this->get_grand_total()->result_array();
    $data['total_harga_cart'] = $total_harga_cart[0]['grand_total'];
    print_r($data);
    $this->db->where('id_customer', $id_customer);
    $this->db->update('cart', $data);
  }

  public function select_cart($id_customer = 1)
  {
    $this->db->where('id_customer', $id_customer);
    return $this->db->get('cart');
  }

  public function get_grand_total()
  {
    $query = "SELECT SUM(total) AS grand_total FROM (SELECT (qty_detail_cart*harga_produk) total FROM detail_cart JOIN produk ON detail_cart.id_produk = produk.id_produk) AS total";
    
    return $this->db->query($query);
  }

  public function coba_update_batch()
  {
    $data = array(
      array(
        'title' => 'My title' ,
        'name' => 'My Name 2' ,
        'date' => 'My date 2'
      ),
      array(
        'title' => 'Another title' ,
        'name' => 'Another Name 2' ,
        'date' => 'Another date 2'
      )
    );
    
    $this->db->update_batch('mytable', $data, 'title');
  }
}
