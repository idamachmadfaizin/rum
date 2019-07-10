<?php
class report_model extends CI_Model
{
  private $_tOrder = "orders";
  private $_tDO = "detail_order";
  private $_tCustomer = "customer";
  private $_tProduk = "produk";

  public function getTableContent($limit, $offset)
  {
    if ($this->input->get('startDate') && $this->input->get('endDate')) {
      $startDate = $this->input->get('startDate');
      $endDate = $this->input->get('endDate');
      $this->db->where('tgl_order >=', $startDate);
      $this->db->where('tgl_order <=', $endDate);
    }
    $this->db->from($this->_tOrder);
    $this->db->join($this->_tDO, $this->_tDO . '.id_order = ' . $this->_tOrder . '.id_order');
    $this->db->join($this->_tCustomer, $this->_tCustomer . '.id_customer = ' . $this->_tOrder . '.id_customer');
    $this->db->join($this->_tProduk, $this->_tProduk . '.id_produk = ' . $this->_tDO . '.id_produk');

    $this->db->limit($limit, $offset);

    return $this->db->get()->result();
  }

  public function getTotalRow()
  {
    if ($this->input->get('startDate') && $this->input->get('endDate')) {
      $startDate = $this->input->get('startDate');
      $endDate = $this->input->get('endDate');
      $this->db->where('tgl_order >=', $startDate);
      $this->db->where('tgl_order <=', $endDate);
    }
    $this->db->from($this->_tOrder);
    $this->db->join($this->_tDO, $this->_tDO . '.id_order = ' . $this->_tOrder . '.id_order');
    $this->db->join($this->_tCustomer, $this->_tCustomer . '.id_customer = ' . $this->_tOrder . '.id_customer');
    $this->db->join($this->_tProduk, $this->_tProduk . '.id_produk = ' . $this->_tDO . '.id_produk');

    return $this->db->count_all_results();
  }

  public function getTableContentPdf()
  {
    if ($this->input->get('startDate') && $this->input->get('endDate')) {
      $startDate = $this->input->get('startDate');
      $endDate = $this->input->get('endDate');
      $this->db->where('tgl_order >=', $startDate);
      $this->db->where('tgl_order <=', $endDate);
    }
    $this->db->from($this->_tOrder);
    $this->db->join($this->_tDO, $this->_tDO . '.id_order = ' . $this->_tOrder . '.id_order');
    $this->db->join($this->_tCustomer, $this->_tCustomer . '.id_customer = ' . $this->_tOrder . '.id_customer');
    $this->db->join($this->_tProduk, $this->_tProduk . '.id_produk = ' . $this->_tDO . '.id_produk');

    return $this->db->get()->result();
  }
}
