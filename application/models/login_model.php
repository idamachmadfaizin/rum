<?php

class login_model extends CI_Model 
{

  public function login($where)
  {
    // user this //
    // $this->db->select('id_customer');
    // $this->db->where($where);
    // return $this->db->get('customer')->row_array();

    // or this //

    return $this->db->get_where('customer', $where);
  }
}