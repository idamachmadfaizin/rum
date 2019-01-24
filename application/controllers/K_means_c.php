<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/php-ml/vendor/autoload.php';
use Phpml\Clustering\KMeans;

class K_means_c extends CI_Controller {
   public function __construct()
   {
      parent::__construct();
      
      $this->load->model('Rum_model');   
   }

   // This func to
    public function index()
    {
        // get total k-means
        $totKmeans = $this->Rum_model->getTotalKmeans();
        // get all data from table detail_kmeans
        $query = $this->Rum_model->getAllTable('detail_kmeans');
        $k_means = $query->result_array();

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
                // Push to arr $sample
                $sample[$j] = $arr1;
                // reset $arr1
                $arr1 = array();
            }
        }
        
        // Script to clustering
        // Number of cluster
        $numCluster = 2;
        $k_means = new KMeans($numCluster);
        // cluster result in array
        $cluster = $k_means->cluster($sample);
        
        // script for passing data $insT_Cluster to Model
        $insT_Cluster = array();
        $arr1 = array('group_cluster' => '', 'id_detail_kmeans' => '');
        for ($numC=0; $numC < $numCluster; $numC++) {
            foreach ($cluster[$numC] as $key => $iddetail) {
                $arr1['group_cluster'] = $numC;
                $arr1['id_detail_kmeans'] = $key;
                array_push($insT_Cluster, $arr1);
            }
        }

        // $affected = $this->Rum_model->insMultiRows('cluster', $insT_Cluster);
        $this->Rum_model->insMultiRows('cluster', $insT_Cluster);
        // $produk = $this->Rum_model->getK_Produk();

        $this->load->view('blank');






        // COOOKKK
        // $query = $this->Rum_model->getAllTable('detail_kmeans');
        // $detail_kmeans = $query->result_array();

        
        // // convert id_detail_kmeans to id_produk
        // for ($i=0; $i < $numCluster; $i++) {
        //     echo 'cluster ' . $i . '<br>';
        //     foreach ($cluster[$i] as $key => $value) {
        //         $j = 0;
        //         while ($key-1 != $detail_kmeans[$j]['id_detail_kmeans']) {
        //             $j++;
        //         }
        //         // echo 'j=' . $j.'<br>';
        //         $idpro = $detail_kmeans[$j]['id_produk'];
        //         // echo 'id produk = ' . $idpro .'<br>';
        //         // print_r($key);
        //         // echo '<br>';
        //     }
        //     // $arr[$newkey] = $arr[$oldkey];
        //     $cluster[$i][$idpro] = $cluster[$i][$key];
        //     // unset($arr[$oldkey]);
        //     unset($cluster[$i][$key]);
        // }
        // echo 'cluster ini';
        // print_r($cluster);

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
