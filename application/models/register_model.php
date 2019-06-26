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

  public function getEmail($id)
  {
    $this->db->select('email_customer');
    $this->db->where('id_customer', $id);
    return $this->db->get('customer')->result()[0]->email_customer;
  }

  public function updateVerficationCode($id, $data)
  {
    $this->db->where('id_customer', $id);
    $this->db->update('customer', $data);
    return $this->db->affected_rows();
  }

  public function activatingAccount($code)
  {
    $customer = $this->db->get_where('customer', ['email_verification_code' => $code])->result()[0];
    if ($customer) {
      //clear chache db helper
      $this->db->flush_cache();

      $this->db->where('id_customer', $customer->id_customer);
      return $this->db->update('customer', ['active_status' => 'Y']);
    } else {
      return false;
    }
  }
}
