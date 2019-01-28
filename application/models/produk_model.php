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
        
        return $this->db->get();
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
}
