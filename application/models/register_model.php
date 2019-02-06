<?php

class register_model extends CI_Model 
{

  public function register($data)
  {
    $this->db->insert('customer', $data);
    return $this->db->insert_id();
  }

  public function cek_exist($where)
  {
    return $this->db->get_where('customer', $where);
  }
}