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

        // Func K-means -> Return Array
        $kmeans = $this->kmeans();
        
        $this->load->view('detail_product', $data);
    }
    
    public function kmeans()
    {
        // get total k-means
        $totKmeans = $this->Rum_model->getTotalKmeans();
        // get all data from table detail_kmeans
        $query = $this->Rum_model->getAllTable('detail_kmeans');
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

        // Number of cluster
        $numCluster = 2;
        $k_means = new KMeans($numCluster);
        // cluster result in array
        $cluster = $k_means->cluster($sample);

        $query = $this->Rum_model->getAllTable('detail_kmeans');
        $detail_kmeans = $query->result_array();

        
        // convert id_detail_kmeans to id_produk
        for ($i=0; $i < $numCluster; $i++) {
            echo 'cluster ' . $i . '<br>';
            foreach ($cluster[$i] as $key => $value) {
                $j = 0;
                while ($key-1 != $detail_kmeans[$j]['id_detail_kmeans']) {
                    $j++;
                }
                // echo 'j=' . $j.'<br>';
                $idpro = $detail_kmeans[$j]['id_produk'];
                // echo 'id produk = ' . $idpro .'<br>';
                // print_r($key);
                // echo '<br>';
            }
            // $arr[$newkey] = $arr[$oldkey];
            $cluster[$i][$idpro] = $cluster[$i][$key];
            // unset($arr[$oldkey]);
            unset($cluster[$i][$key]);
        }
        echo 'cluster ini';
        print_r($cluster);
        // distinct array
        // for ($i=0; $i < $numCluster; $i++) { 
        //     array_unique($cluster[$i]);
        // }
        // print_r($cluster);

        // find $id_produk in array cluster
        // select from produk where id_produk = $id_produk in array
        // show all data
    }
}
