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
        print_r($data);
        $this->db->insert_batch($table_name, $data);
        return $this->db->affected_rows();
    }
}