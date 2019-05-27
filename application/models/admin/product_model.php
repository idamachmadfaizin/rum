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
    // $this->db->select('distinct produk.id_produk, produk.id_kategori, produk.nama_produk, produk.harga_produk, produk.deskripsi_produk, produk.url_produk, produk.produk_created_at, produk.produk_updated_at, image.id_image, image.id_produk, image.url_image, kategori.id_kategori, kategori.nama_kategori, kategori.url_image_kategori, kategori.status_kategori');
    $this->db->limit($limit, $offset);
    $this->db->from($this->_table);
    $this->db->join('image', 'image.id_produk = '.$this->_table.'.id_produk');
    $this->db->join('kategori', 'kategori.id_kategori = '.$this->_table.'.id_kategori');
    $this->db->group_by('produk.id_produk');
    // echo $this->db->get_compiled_select();
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

  public function getImageProduk($id_produk)
  {
    $this->db->where("id_produk", $id_produk);
    return $this->db->get($this->_tImage)->result();
  }

  public function getSingleProduk($id)
  {
    $this->db->where('id_produk', $id);
    return $this->db->get($this->_table)->result();
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
  
  public function update($id_produk, $url_image)
  {
    $post = $this->input->post();
    
    $this->id_kategori = $post['kategori_produk'];
    $this->nama_produk = $post['nama_produk'];
    $this->harga_produk = $post['harga_produk'];
    $this->deskripsi_produk = $post['deskripsi_produk'];
    $this->url_produk = str_replace(" ", "-", $post['nama_produk']);
    
    if (!$url_image) {
      $this->url_image = $this->_uploadImage();
    }
    
    // $this->insertToImage($id_produk);
    return $this->db->update($this->_table, $this, array('id_produk' => $id_produk));
  }

  public function disable($id_produk)
  {
    $this->db->where('id_produk', $id_produk);
    return $this->db->update($this->_table, array('status_produk' => 1));
  }
  
  public function enable($id_produk)
  {
    $this->db->where('id_produk', $id_produk);
    return $this->db->update($this->_table, array('status_produk' => 0));
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
    }else{
      return "default.jpg";
    }
  }
}
