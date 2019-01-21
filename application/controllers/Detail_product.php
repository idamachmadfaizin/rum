<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_product extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('Rum_model');   
    }

	public function detail($id_produk)
	{
        $query = $this->Rum_model->getDetailProduk($id_produk);
        $data['detailProduk'] = $query->result_array();

        $this->load->view('detail_product', $data);
	}
}
