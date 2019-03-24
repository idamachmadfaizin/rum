<?php

class category_model extends CI_Model
{
  private $_table = "kategori";

  public $nama_kategori;
  public $url_image_kategori;

  public function rules()
  {
    return [
      ['field' => 'nama_kategori',
       'label' => 'Nama Kategori',
       'rules' => 'trim|required']
    ];
  }
  public function selectAll($limit, $offset)
  {
    $this->db->limit($limit, $offset);
    return $this->db->get($this->_table)->result();
  }

  public function getTotalRow()
  {
    return $this->db->count_all($this->_table);
  }

  public function insert()
  {
    $post = $this->input->post();

    $this->nama_kategori = $post['nama_kategori'];
    $this->url_image_kategori = "assets/img/kategori/".$this->_uploadImage();

    $this->db->insert($this->_table, $this);
  }
  private function _uploadImage()
  {
    $config['upload_path']    = './assets/img/kategori/';
    $config['allowed_types']  = 'jpg|png';
    $config['file_name']      = str_replace(' ', '-', $this->input->post('nama_kategori'));
    $config['overwrite']      = true;
    $config['max_size']       = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file-input')) {
      return $this->upload->data("file_name");
    }
    
    // return "default.jpg";
  }
}
