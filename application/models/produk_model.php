<?php

class produk_model extends CI_Model
{
    public function getAllTable($table_name)
    {
        return $this->db->get($table_name);
    }
}
