<?php 

require_once __DIR__ . '/php-ml/vendor/autoload.php';

use Phpml\Clustering\KMeans;

$samples = [ 'Produk1' => [1, 1], 'Produk2' => [8, 7], 'Produk3' => [1, 2], 'Produk1' => [2, 1]];
print_r($samples);
print_r($k_means);

// $arrLength = 0;
// foreach ($k_means as $key => $value) {
//     $arrLength += 1;
// }
// $j =0;
// for ($i=0; $i < $arrLength; $i++) {
//     $j++;
//     $k_means["Product" . $j] = $k_means[$i];
//     unset($k_means[$i]);
// }

// print_r($samples);
// print_r($k_means);

// $samples = array();
// array_push($samples, 1);
// $samples = ['Produk1' => [1,1]];
// $samples = ['Produk2' => [2,2]];
// $samples = ['Produk3' => [3,3]];

// print_r($samples);

// $kmeans = new KMeans(2);
// print_r ($kmeans->cluster($k_means));
 