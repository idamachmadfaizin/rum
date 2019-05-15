<?php

class product_model extends CI_Model
{
  private $_table = "produk";
  private $_tImage = "image";

  public $id_kategori;
  public $nama_produk;
  public $harga_produk;
  public $deskripsi_produk;
  public $url_produk;

  public function rules()
  {
    return [
      ['field' => 'nama_produk',
       'label' => 'Nama Produk',
       'rules' => 'trim|required'],

      ['field' => 'harga_produk',
       'label' => 'Harga Produk',
       'rules' => 'trim|required'],

      ['field' => 'kategori_produk',
       'label' => 'Kategori Produk',
       'rules' => 'trim|required']
    ];
  }
  public function selectAll($limit, $offset)
  {
    $this->db->limit($limit, $offset);
    $this->db->from($this->_table);
    $this->db->join('image', 'image.id_produk = '.$this->_table.'.id_produk');
    $this->db->join('kategori', 'kategori.id_kategori = '.$this->_table.'.id_kategori');
    return $this->db->get()->result();
  }

  public function getTotalRow()
  {
    return $this->db->count_all($this->_table);
  }

  public function getKategori()
  {
    return $this->db->get('kategori')->result();
  }

  public function insert()
  {
    $post = $this->input->post();

    $this->id_kategori = $post['kategori_produk'];
    $this->nama_produk = $post['nama_produk'];
    $this->harga_produk = $post['harga_produk'];
    $this->deskripsi_produk = $post['deskripsi_produk'];
    $this->url_produk = str_replace(" ", "-", $post['nama_produk']);
    
    $id_produk = $this->db->insert($this->_table, $this);
    $this->insertToImage($id_produk);
  }

  public function update($id, $url_image_kategori)
  {
    $this->id_kategori = $post['kategori_produk'];
    $this->nama_produk = $post['nama_produk'];
    $this->harga_produk = $post['harga_produk'];
    $this->deskripsi_produk = $post['deskripsi_produk'];
    $this->url_produk = str_replace(" ", "-", $post['nama_produk']);

    if ($url_image_kategori) {
      $this->url_image_kategori = $url_image_kategori;
    }else {
      $this->url_image_kategori = $this->_uploadImage();
    }
    return $this->db->update($this->_table, $this, array('id_produk' => $id));
  }
  
  public function insertToImage($id_produk)
  {
    $data = new stdClass();
    $data->id_produk = $id_produk;
    $data->url_image = $this->_uploadImage();
    $this->db->insert($this->_tImage, $data);
  }

  private function _uploadImage()
  {
    $config['upload_path']    = './assets/img/produk/';
    $config['allowed_types']  = 'jpg|png';
    $config['file_name']      = str_replace(' ', '-', $this->input->post('nama_produk'));
    $config['overwrite']      = true;
    $config['max_size']       = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file-input')) {
      return $this->upload->data("file_name");
    }
  }
}
