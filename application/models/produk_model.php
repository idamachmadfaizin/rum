<?php

class produk_model extends CI_Model
{
    public function getAllTable($table_name)
    {
        return $this->db->get($table_name);
    }

    public function getProdukImage($cari, $sorting, $kategori, $limit, $offset)
    {
        $this->db->select('p.id_produk, p.nama_produk, p.harga_produk, p.deskripsi_produk, p.url_produk,p.produk_created_at, p.produk_updated_at, i.url_image');
        $this->db->from('produk p');
        $this->db->join('image i', 'i.id_produk = p.id_produk');
        if (isset($kategori)) {
          if (! $kategori == 0) {
            $this->db->where('p.id_kategori', $kategori);
          } 
        }
        if (isset($cari)) {
          $this->db->like('p.nama_produk', $cari);
        }
        if (isset($sorting)) {
          $this->db->order_by('p.harga_produk', $sorting);
        }else {
          $this->db->order_by('p.produk_updated_at', 'desc');
        }
        
        $this->db->group_by('p.id_produk');
        $this->db->limit($limit, $offset);
        
        return $this->db->get()->result();
    }
    public function getTotalProduk($cari, $kategori)
    {
        $this->db->select('id_produk, nama_produk, harga_produk, deskripsi_produk, url_produk,produk_created_at, produk_updated_at');
        $this->db->from('produk');
        if (isset($kategori)) {
          if ($kategori == 0) {
          } else {
            $this->db->where('id_kategori', $kategori);
          }
        }
        if (isset($cari)) {
          $this->db->like('nama_produk', $cari);
        }
        return $this->db->count_all_results();
    }

    public function addToCart($data)
    {
      $this->db->insert('cart', $data);
    }

    public function product_exist($where)
    {
      return $this->db->get_where('cart', $where)->result_array()[0]['id_cart'];
    }

    public function getQty($where)
    {
      $this->db->select('qty_cart');
      $this->db->where($where);
      return $this->db->get('cart')->result_array()[0]['qty_cart'];
    }

    public function tambah_qty($id_cart, $updateQty)
    {
      $this->db->where('id_cart', $id_cart);
      $this->db->update('cart', $updateQty);
      return $this->db->affected_rows();
    }
}
