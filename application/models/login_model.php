<?php

class Login_model extends CI_Model
{

  public function login($where)
  {
    return $this->db->get_where('customer', $where);
  }
}
