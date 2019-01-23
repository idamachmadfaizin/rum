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

    public function insMultiRows($table_name, $data)
    {
        $this->db->truncate($table_name);//to delete and reset autoincrement
        $this->db->insert_batch($table_name, $data);
        return $this->db->affected_rows();
    }

    public function getK_Produk()
    {
        $this->db->select('c.group_cluster, p.id_produk');
        $this->db->from('cluster c');
        $this->db->join('detail_kmeans dk', 'c.id_detail_kmeans = dk.id_detail_kmeans');
        $this->db->join('produk p', 'p.id_produk = dk.id_produk');
        $this->db->where('c.group_cluster', 0);
        $this->db->distinct();
        return $this->db->get();
    }
}