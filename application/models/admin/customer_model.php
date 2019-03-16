<?php

class customer_model extends CI_Model
{
  private $_table = "customer";

  public function selectAll($limit, $offset)
  {
    $this->db->limit($limit, $offset);
    return $this->db->get($this->_table)->result();
  }

  public function getTotalCustomer()
  {
    return $this->db->count_all($this->_table);
  }
}
