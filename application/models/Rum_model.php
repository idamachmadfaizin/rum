<?php 

class Rum_model extends CI_Model
{
    public function getAllTable($table_name)
    {
        return $this->db->get($table_name);
    }

    public function getTotalKmeans()
    {
        return $this->db->count_all('k_means');
    }
    public function arrKmeans()
    {
        // $query = "SELECT n1, n2 FROM (SELECT id_detail_kmeans AS idk, nilai AS n1 FROM detail_kmeans WHERE id_detail_kmeans %2 <> 0) AS nilai1 JOIN (SELECT (id_detail_kmeans-1) AS idGanjil, nilai AS n2 FROM detail_kmeans WHERE id_detail_kmeans %2 = 0) AS nilai2 ON nilai1.idk = nilai2.idGanjil";
        
        return $this->db->query($query);
    }
    public function getDetailProduk($id_produk)
    {
        $this->db->select('produk.id_produk, nama_kategori, nama_produk, harga_produk, deskripsi_produk, url_image');
        $this->db->from('produk');
        $this->db->join('image', 'image.id_produk = produk.id_produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_produk');
        $this->db->where('produk.id_produk', $id_produk);
        // $this->db->where('produk.nama_produk', $id_produk);

        $query = $this->db->get();
        return $query;
    }
}