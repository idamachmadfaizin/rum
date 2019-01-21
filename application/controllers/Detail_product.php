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
    
    public function kmeans()
    {
        $query = $this->Rum_model->getAllTable('detail_kmeans');
      
        $totKmeans = array();
        $totKmeans = $this->Rum_model->getTotalKmeans();
        $k_means = array();
        $k_means = $query->result_array();

        // Get length of  array $k_means
        $arrLength = 0;
        foreach ($k_means as $key => $value) {
            $arrLength += 1;
        };

        // Insert array from db format k-means
        $sample = array();
        $arr1 = array();
        $j = 0;
        foreach ($k_means as $key => $value) {
            if ($value['id_kmeans'] < $totKmeans) {
            $j++;
            array_push($arr1, $value['nilai']);
            }else {
            $j++;
            array_push($arr1, $value['nilai']);
            $sample[$j] = $arr1;
            $arr1 = array();
            }
        }

        $kmeans = new KMeans(2);
        print_r ($kmeans->cluster($sample));
    }
}
