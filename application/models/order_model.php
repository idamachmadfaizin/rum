<?php

class order_model extends CI_Model
{
    private $_table = "orders";

    public function get($limit, $offset)
    {
        $id_customer = $this->session->id_customer;

        $this->db->limit($limit, $offset);
        $this->db->where('id_customer', $id_customer);
        $this->db->order_by('tgl_order', 'desc');
        return $this->db->get($this->_table)->result();
    }

    public function getTotalRow()
    {
        $id_customer = $this->session->id_customer;
        $this->db->where('id_customer', $id_customer);
        return $this->db->count_all_results($this->_table);
    }
}
