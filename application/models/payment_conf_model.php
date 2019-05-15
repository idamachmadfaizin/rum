<?php

class payment_conf_model extends CI_Model
{
  private $_table = 'konfirmasi_pembayaran';

  // public $id_order;
  public $tanggal_tf;
  public $bukti_tf;
  public $nama_bank;
  public $bank_owner;
  public $note;

  public function rules()
  {
    return [
      [
        'field' => 'noinvoice',
        'label' => 'No Invoice',
        'rules' => 'required'
      ],
      [
        'field' => 'tanggal',
        'label' => 'Tanggal Transfer',
        'rules' => 'required'
      ],
      [
        'field' => 'bankname',
        'label' => 'Bank Name',
        'rules' => 'required'
      ],
      [
        'field' => 'bankowner',
        'label' => 'Name of bank owner',
        'rules' => 'required'
      ]
    ];
  }
  public function getOrders()
  {
    $id = $this->session->id_customer;

    $this->db->where('id_customer', $id);
    $this->db->where('status', 'Menunggu');
    return $this->db->get('orders')->result();
  }

  public function getSingleData($field, $value)
  {
    $this->db->where($field, $value);
    return $this->db->get("orders")->result();
  }

  public function cekBuktiTf()
  {
    $post = $this->input->post();

    $id = $post['noinvoice'];

    $this->db->where('id_order', $id);
    return $this->db->count_all_results($this->_table);
  }

  public function simpan()
  {
    $post = $this->input->post();

    $this->id_order = $post['noinvoice'];
    $this->tanggal_tf = $post['tanggal'];
    $this->bukti_tf = $this->_uploadImage();
    $this->nama_bank = $post['bankname'];
    $this->bank_owner = $post['bankowner'];
    $this->note = $post['note'];

    print_r($this);
    $this->db->insert($this->_table, $this);
  }

  public function update()
  {
    $post = $this->input->post();

    // $this->id_order = $post['noinvoice'];
    $this->tanggal_tf = $post['tanggal'];
    $this->bukti_tf = $this->_uploadImage();
    $this->nama_bank = $post['bankname'];
    $this->bank_owner = $post['bankowner'];
    $this->note = $post['note'];

    $id_order = $post['noinvoice'];
    
    $this->db->where('id_order', $id_order);
    $this->db->update($this->_table, $this);
  }

  public function getImagePath()
  {
    $post = $this->input->post();
    
    $id_order = $post['noinvoice'];

    $this->db->where('id_order', $id_order);
    return $this->db->get($this->_table)->result();
  }

  private function _uploadImage()
  {
    $post = $this->input->post();

    $config['upload_path']    = './upload/bukti_tf/';
    $config['allowed_types']  = 'jpg|png';
    $config['file_name']      = $post['noinvoice'].'-'.$this->tanggal_tf;
    $config['overwrite']      = true;
    $config['max_size']       = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('buktitf')) {
      return $this->upload->data("file_name");
    } else {
      echo $this->upload->display_errors();
    }
  }

}
