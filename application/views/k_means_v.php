<?php 

// require_once __DIR__ . '/php-ml/vendor/autoload.php';

// use Phpml\Clustering\KMeans;

// // $contoh = [ 'Produk1' => [1, 1], 'Produk2' => [8, 7], 'Produk3' => [1, 2], 'Produk1' => [2, 1]];

// // Get length of  array $k_means
// $arrLength = 0;
// foreach ($k_means as $key => $value) {
//     $arrLength += 1;
// };

// // Insert array from db format k-means
// $sample = array();
// $arr1 = array();
// $j = 0;
// foreach ($k_means as $key => $value) {
//     if ($value['id_kmeans'] < $totKmeans) {
//         $j++;
//         array_push($arr1, $value['nilai']);
//     }else {
//         $j++;
//         array_push($arr1, $value['nilai']);
//         $sample[$j] = $arr1;
//         $arr1 = array();
//     }
// }

// $kmeans = new KMeans(2);
// print_r ($kmeans->cluster($sample));