<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_produk extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('rum_model');   
    }

	public function detail($url_produk)
	{
        // Get Detail Produk
        $query = $this->rum_model->getDetailProduk($url_produk);
        $data['detailProduk'] = $query->result_array();

        $relatedP = $this->rum_model->getRelatedProduk($url_produk);
        if (empty($relatedP)) {
            $data['relatedP'] = '';
        }else {
            $data['relatedP'] = $relatedP->result_array();
        }

        // print_r($data);
        $this->load->view('detail_product', $data);
    }
}
