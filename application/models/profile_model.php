<?php

class profile_model extends CI_Model
{
  private $_table = "customer";
  
  public $nama_customer;
  public $nomor_telp;
  public $address;
  public $jenis_kelamin;
  public $tanggal_lahir;
  public $url_img_customer;

  public function rules()
  {
    return [
      ['field' => 'telp',
      'label' => 'Telephone',
      'rules' => 'trim|required|max_length[13]'],
      
      ['field' => 'nama',
      'label' => 'Nama',
      'rules' => 'trim|required'],
      
      ['field' => 'jenis_kelamin',
      'label' => 'Jenis Kelamin',
      'rules' => 'required'],
      
      ['field' => 'tanggal_lahir',
      'label' => 'Tanggal Lahir',
      'rules' => 'required'],
      
      ['field' => 'address',
      'label' => 'Address',
      'rules' => 'trim|required']
    ];
  }

  public function getById()
  {
    $id = $this->session->id_customer;
    return $this->db->get_where($this->_table, ["id_customer" => $id])->row();
  }

  public function update()
  {
    $post = $this->input->post();

    $this->nomor_telp = $post['telp'];
    $this->nama_customer = $post['nama'];
    $this->jenis_kelamin = $post['jenis_kelamin'];
    $this->tanggal_lahir = $post['tanggal_lahir'];
    $this->address = $post['address'];
    $this->url_img_customer = $this->_uploadImage();

    $this->db->update($this->_table, $this, array('id_customer' => $this->session->id_customer));
  }

  private function _uploadImage()
  {
    $config['upload_path']    = './upload/profile/';
    $config['allowed_types']  = 'jpg|png';
    $config['file_name']      = $this->session->id_customer;
    $config['overwrite']      = true;
    $config['max_size']       = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('userfile')) {
      return $this->upload->data("file_name");
    }
    
    return "default.jpg";
  }
}