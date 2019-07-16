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
  public $pendapatan;
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
        'field' => 'pendapatan',
        'label' => 'Pendapatan',
        'rules' => 'trim|required'
      ]
    ];
  }

  public function getById()
  {
    $id = $this->session->id_customer;

    $this->db->where("id_customer", $id);
    $this->db->join("kabupaten", "kabupaten.id_kabupaten = customer.kabupaten", "left");
    $this->db->join("kota", "kota.id_kota = customer.kota", "left");
    return $this->db->get($this->_table)->row();
  }

  // public function masterAgama()
  // {
  //   $this->db->order_by('nama_agama', 'asc');
  //   return $this->db->get('agama')->result();
  // }

  public function masterPendidikan()
  {
    // $this->db->order_by('nama_pendidikan', 'asc');
    return $this->db->get('pendidikan')->result();
  }

  public function masterProvinsi()
  {
    $this->db->order_by('nama_provinsi', 'asc');
    return $this->db->get('provinsi')->result();
  }

  public function getKabupaten($id)
  {
    $this->db->order_by('nama_kabupaten', 'asc');
    return $this->db->get_where('kabupaten', ['id_provinsi' => $id])->result();
  }

  public function getKota($id)
  {
    $this->db->order_by('nama_kota', 'asc');
    return $this->db->get_where('kota', ['id_kabupaten' => $id])->result();
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
    $this->pendapatan = $post['pendapatan'];
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
      return $this->upload->data()['file_name'];
    }

    $oldProfile = $this->getById();

    return $oldProfile->url_img_customer;
  }
}
