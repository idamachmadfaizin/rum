<?php

class profile_model extends CI_Model
{
  private $_table = "customer";

  public $nama_customer;
  public $nomor_telp;
  public $provinsi;
  public $kabupaten;
  public $kota;
  public $address;
  public $jenis_kelamin;
  public $tanggal_lahir;
  public $id_pendidikan;
  public $id_agama;
  public $url_img_customer;

  public function rules()
  {
    return [
      [
        'field' => 'nama',
        'label' => 'Nama',
        'rules' => 'trim|required'
      ],

      [
        'field' => 'telp',
        'label' => 'Telephone',
        'rules' => 'trim|required|max_length[13]'
      ],

      [
        'field' => 'provinsi',
        'label' => 'Provinsi',
        'rules' => 'trim|required'
      ],

      [
        'field' => 'kabupaten',
        'label' => 'Kabupaten',
        'rules' => 'trim|required'
      ],

      [
        'field' => 'kota',
        'label' => 'Kota',
        'rules' => 'trim|required'
      ],

      [
        'field' => 'address',
        'label' => 'Address',
        'rules' => 'trim|required'
      ],

      [
        'field' => 'jenis_kelamin',
        'label' => 'Jenis Kelamin',
        'rules' => 'required'
      ],

      [
        'field' => 'tanggal_lahir',
        'label' => 'Tanggal Lahir',
        'rules' => 'required'
      ],

      [
        'field' => 'pendidikan',
        'label' => 'Pendidikan',
        'rules' => 'trim|required'
      ],

      [
        'field' => 'agama',
        'label' => 'Agama',
        'rules' => 'trim|required'
      ]
    ];
  }

  public function getById()
  {
    $id = $this->session->id_customer;
    return $this->db->get_where($this->_table, ["id_customer" => $id])->row();
  }

  public function masterAgama()
  {
    return $this->db->get('agama')->result();
  }

  public function masterPendidikan()
  {
    return $this->db->get('pendidikan')->result();
  }

  public function masterProvinsi()
  {
    return $this->db->get('provinsi')->result();
  }

  public function masterKabupaten()
  {
    return $this->db->get('kabupaten')->result();
  }

  public function masterKota()
  {
    return $this->db->get('kota')->result();
  }

  public function update()
  {
    $post = $this->input->post();

    $this->nama_customer = $post['nama'];
    $this->nomor_telp = $post['telp'];
    $this->provinsi = $post['provinsi'];
    $this->kabupaten = $post['kabupaten'];
    $this->kota = $post['kota'];
    $this->address = $post['address'];
    $this->jenis_kelamin = $post['jenis_kelamin'];
    $this->tanggal_lahir = $post['tanggal_lahir'];
    $this->id_pendidikan = $post['pendidikan'];
    $this->id_agama = $post['agama'];
    $this->url_img_customer = $this->_uploadImage();

    $this->db->update($this->_table, $this, array('id_customer' => $this->session->id_customer));
  }

  private function _uploadImage()
  {
    $config['upload_path']    = './upload/profile/';
    $config['allowed_types']  = 'jpg|png';
    $config['file_name']      = $this->session->id_customer . ".jpg";
    $config['overwrite']      = true;
    $config['max_size']       = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('userfile')) {
      return $this->upload->data();
    }

    $oldProfile = $this->getById();

    return $oldProfile->url_img_customer;
  }
}
