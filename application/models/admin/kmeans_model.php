<?php

class kmeans_model extends CI_Model
{
  private $_table = "k_means";
  private $_tDK = "detail_kmeans";
  private $_tProduk = "produk";

  public $nama_variable;

  public function rules()
  {
    return [
      [
        'field' => 'nama_variable',
        'label' => 'Nama variable',
        'rules' => 'trim|required'
      ]
    ];
  }
  public function getAllKmeans()
  {
    return $this->db->get($this->_table)->result();
  }

  public function getCluster()
  {
    $this->db->select('group_cluster, nama_produk');
    $this->db->from('cluster');
    $this->db->join('detail_kmeans', 'detail_kmeans.id_detail_kmeans = cluster.id_detail_kmeans');
    $this->db->join('produk', 'produk.id_produk = detail_kmeans.id_produk');
    return $this->db->get()->result();
  }

  public function getSingle($id)
  {
    $this->db->where('id_kmeans', $id);

    return $this->db->get($this->_table)->result();
  }

  public function insertKmeans()
  {
    $post = $this->input->post();

    $this->nama_variable = $post['nama_variable'];

    $this->db->insert($this->_table, $this);
    return $this->db->insert_id();
  }

  public function updateKmeans($id)
  {
    $this->nama_variable = $this->input->post('nama_variable');
    return $this->db->update($this->_table, $this, array('id_kmeans' => $id));
  }

  public function deleteDetailKmeans($id_kmeans)
  {
    $this->db->truncate("cluster");

    $this->db->where("id_kmeans", $id_kmeans);
    return $this->db->delete($this->_tDK);
  }

  public function deleteKmeans($id)
  {
    $this->db->where('id_kmeans', $id);
    $this->db->delete($this->_table);
    return $this->db->affected_rows();
  }

  public function getAllDetailKmeans()
  {
    $this->db->select('id_kmeans, id_produk, nilai');
    return $this->db->get($this->_tDK);
  }

  public function countKmeans()
  {
    return $this->db->count_all($this->_table);
  }

  public function updateDetailKmeans()
  {
    $post = $this->input->post();

    $object = new stdClass();
    $object->nilai = $post['text'];

    $id = $post['id'];

    return $this->db->update($this->_tDK, $object, array("id_detail_kmeans" => $id));
  }

  // update detail kmeans after added kmeans
  public function detailKmeans($limit, $offset)
  {
    // $this->db->select($this->_table.'.nama_variable, '.$this->_tProduk.'.nama_produk, '.$this->_tDK.'.nilai');
    $this->db->limit($limit, $offset);
    $this->db->from($this->_tDK);
    $this->db->join($this->_tProduk, $this->_tProduk . '.id_produk = ' . $this->_tDK . '.id_produk');
    $this->db->join($this->_table, $this->_table . '.id_kmeans = ' . $this->_tDK . '.id_kmeans');
    $this->db->order_by($this->_tDK . '.id_detail_kmeans');

    return $this->db->get()->result();
  }

  public function countDetailKmeans()
  {
    $this->db->from($this->_tDK);
    $this->db->join($this->_tProduk, $this->_tProduk . '.id_produk = ' . $this->_tDK . '.id_produk');
    $this->db->join($this->_table, $this->_table . '.id_kmeans = ' . $this->_tDK . '.id_kmeans');
    $this->db->order_by($this->_tDK . '.id_detail_kmeans');

    return $this->db->count_all_results();
  }

  public function reAllocate($data)
  {
    $this->db->query('alter table cluster drop foreign key cluster_ibfk_1');
    $this->db->truncate("cluster");
    $this->db->truncate($this->_tDK);
    $this->db->query('alter table cluster add CONSTRAINT `cluster_ibfk_1` FOREIGN KEY (`id_detail_kmeans`) REFERENCES `detail_kmeans` (`id_detail_kmeans`)');
    $this->db->insert_batch($this->_tDK, $data);
  }

  // public function countProduk()
  // {
  //   return $this->db->count_all($this->_tProduk);
  // }
}
