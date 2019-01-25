<?php

class produk_model extends CI_Model
{
    public function getAllTable($table_name)
    {
        return $this->db->get($table_name);
    }

    // $this->db->like('title', $filter);
    // $this->db->limit($limit, $offset);
    // $this->db->order_by('date', 'desc');
    // return $this->db->get("blog");

    public function getProdukImage($cari, $limit, $offset)
    {
        $this->db->select('p.id_produk, p.nama_produk, p.harga_produk, p.deskripsi_produk, p.url_produk,p.produk_created_at, p.produk_updated_at, i.url_image');
        $this->db->from('produk p');
        $this->db->join('image i', 'i.id_produk = p.id_produk');
        $this->db->group_by('p.id_produk');

        $this->db->like('p.nama_produk', $cari);
        $this->db->limit($limit, $offset);
        $this->db->order_by('p.produk_updated_at', 'desc');
        
        return $this->db->get();
    }
    public function getTotalProduk($cari)
    {
        $this->db->like('nama_produk', $cari);
        return $this->db->count_all("produk");
    }
}
