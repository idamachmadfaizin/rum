<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/php-ml/vendor/autoload.php';
use Phpml\Clustering\KMeans;

class Detail_produk extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('Rum_model');
    }

	public function detail($uri)
	{
        // Get Detail Produk
        $query = $this->Rum_model->getDetailProduk($uri);
        $data['detailProduk'] = $query->result_array();

        $relatedP = $this->Rum_model->getRelatedProduk($uri);
        if (empty($relatedP)) {
            $data['relatedP'] = '';
        }else {
            $data['relatedP'] = $relatedP->result_array();
        }

        // print_r($data);
        $this->load->view('detail_product', $data);
    }
}
