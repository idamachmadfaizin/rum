<?php

class change_password_model extends CI_Model
{
  private $_table = "customer";
  private $id;
  private $oldpass;
  private $oldpassdb;

  public $password_customer;

  public function rules()
  {
    return[
      ['field' => 'newpass',
      'label' => 'New Password',
      'rules' => 'trim|required|min_length[8]|max_length[16]'],
      
      ['field' => 'passconf',
      'label' => 'Password Confirmation',
      'rules' => 'trim|required|matches[newpass]'],
      
      ['field' => 'oldpass',
      'label' => 'Old Password',
      'rules' => 'trim|required']
    ];
  }

  public function update()
  {
    $this->id = $this->session->id_customer;
    $this->oldpassdb = $this->db->get_where($this->_table, ["id_customer" => $this->id])->row()->password_customer;

    $post = $this->input->post();
    
    $this->password_customer = md5($post['newpass']);
    $this->oldpass = md5($post['oldpass']);

    if ($this->oldpass == $this->oldpassdb) {
      $this->db->update($this->_table, $this, array('id_customer' => $this->id));
    }
  }
}
