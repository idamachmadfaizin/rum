<?php

class LoginAdmin_model extends CI_Model
{
    public function login($where)
    {
        return $this->db->get_where('admin', $where);
    }
}
