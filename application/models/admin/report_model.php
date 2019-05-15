<?php
class report_model extends CI_Model
{
  private $_tOrder = "orders";
  private $_tDO = "detail_order";
  private $_tCustomer = "customer";
  private $_tProduk = "produk";
  
  public function getTableContent()
  {
    $this->db->from($this->_tOrder);
    $this->db->join($this->_tDO, $this->_tDO.'.id_order = '.$this->_tOrder.'.id_order');
    $this->db->join($this->_tCustomer, $this->_tCustomer.'.id_customer = '.$this->_tOrder.'.id_customer');
    $this->db->join($this->_tProduk, $this->_tProduk.'.id_produk = '.$this->_tDO.'.id_produk');
    return $this->db->get()->result();
  }
}
