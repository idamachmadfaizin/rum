<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/php-ml/vendor/autoload.php';
use Phpml\Clustering\KMeans;

class Detail_product extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('Rum_model');   
    }

	public function detail($id_produk)
	{
        // Get Detail Produk
        $query = $this->Rum_model->getDetailProduk($id_produk);
        $data['detailProduk'] = $query->result_array();

        $relatedP = $this->Rum_model->getRelatedProduk($id_produk);
        if (empty($relatedP)) {
            $data['relatedP'] = '';
        }else {
            $data['relatedP'] = $relatedP->result_array();
        }

        // print_r($data);
        $this->load->view('detail_product', $data);
    }
}
