<?php 

class rum_model extends CI_Model
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
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
        $this->db->where('produk.id_produk', $id_produk);

        // echo $this->db->get_compiled_select();
        return $this->db->get();
    }

    // using in landing page our produk
    public function selectProdukImage($our)
    {
        $this->db->select('p.id_produk, p.id_kategori, p.nama_produk, p.harga_produk, p.deskripsi_produk, p.url_produk, p.produk_created_at, p.produk_updated_at, i.url_image');
        $this->db->from('produk p');
        $this->db->join('image i', 'i.id_produk = p.id_produk');
        $this->db->group_by('1');
        $this->db->limit(8);
        if ($our == 'new') {
            $this->db->order_by('p.produk_updated_at', 'desc');
        }

        return $this->db->get();
    }


    // insert to cluster
    public function insMultiRows($table_name, $data)
    {
        $this->db->truncate($table_name);//to delete and reset autoincrement
        $this->db->insert_batch($table_name, $data);
        return $this->db->affected_rows();
    }

    // Select join distinct id_produk
    public function getRelatedProduk($id_produk)
    {
        // get group_cluster
        $this->db->select('group_cluster');
        $this->db->from('cluster c');
        $this->db->join('detail_kmeans dk', 'c.id_detail_kmeans = dk.id_detail_kmeans');
        $this->db->join('produk p', 'p.id_produk = dk.id_produk');
        $this->db->where('p.id_produk', $id_produk);
        $gcluster = $this->db->get();
        $gcluster = $gcluster->row_array();
        
        $this->db->reset_query();

        // get semua id_produk dalam cluster
        $this->db->select('p.id_produk');
        $this->db->from('cluster c');
        $this->db->join('detail_kmeans dk', 'c.id_detail_kmeans = dk.id_detail_kmeans');
        $this->db->join('produk p', 'p.id_produk = dk.id_produk');
        $this->db->where($gcluster);
        $this->db->where('dk.id_produk <>', $id_produk);
        // echo $this->db->get_compiled_select();
        $this->db->distinct();
        $id = $this->db->get();
        
        $this->db->reset_query();
        
        // Cek if group cluster hanya satu produk
        if (empty($id->result_array())) {
            $kosong = array();
            return $kosong;
        }else {
            $this->db->select('produk.id_produk, nama_produk, harga_produk, deskripsi_produk, url_image');
            $this->db->from('produk');
            $this->db->join('image', 'image.id_produk = produk.id_produk');
            $wherein = array();
            foreach ($id->result_array() as $key => $value) {
                array_push($wherein, $value['id_produk']);
            }
            $this->db->where_in('produk.id_produk', $wherein);
            $this->db->group_by('produk.id_produk');
            // echo $this->db->get_compiled_select();
            return $this->db->get();
        }
    }
}