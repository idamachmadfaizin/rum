<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/php-ml/vendor/autoload.php';

use Phpml\Clustering\KMeans;

class Checkout extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('checkout_model');
		$this->load->model('cart_model');
		$this->load->model('profile_model');
		$this->load->model('Rum_model');
	}

	public function index()
	{
		//get data profile
		$data['profile'] = $this->profile_model->getById();

		// cek data is completed
		foreach ($data['profile'] as $coloumnProfile) {
			if (empty($coloumnProfile)) {
				$this->session->set_flashdata('incompleteData', 'Please complete the data first');
				redirect('/profile');
			}
		}

		$data['carts'] = $this->cart_model->get_cart();
		$data['grand_total'] = $this->cart_model->grand_total()->row();

		if (empty($data['carts'])) {
			redirect('/produk');
		}

		$this->load->view('checkout', $data);
	}

	public function makeorder()
	{
		$checkout = $this->checkout_model;

		// get grand total
		$grand_total = $this->cart_model->grand_total()->row();
		// get id order inserted
		$id_order = $checkout->make_order($grand_total->grand_total);

		$data['id_order'] = $id_order;
		$data['grand_total'] = $this->cart_model->grand_total()->row();

		// insert to _detail_order
		$cart = $this->cart_model->get_cart();
		$detail = array();
		$id_produks = array();

		foreach ($cart as $cart) {
			$arr['id_order'] = $id_order;
			$arr['id_produk'] = $cart->id_produk;
			$arr['jumlah'] = $cart->qty_cart;
			$arr['harga_satuan'] = $cart->harga_produk;


			array_push($detail, $arr); // push to arr $detail

			$id_produks[] = ["id_produk" => $arr['id_produk'] = $cart->id_produk]; // push to arr $id_produks
		}


		$check = $this->checkout_model->insDetailOrder($detail); //insert into detail order
		$this->insDetailKmeans($id_produks); //insert into detail kmeans
		$this->cluster(); //run function k-means clustering
		// end
		$checkout->delete_cart(); //delete cart

		$this->load->view('order_received', $data);
	}


	// Group Fun K-means 
	public function insDetailKmeans($id_produks)
	{
		// sorted checkout_model
		$checkout = $this->checkout_model;

		// Get Bahan-bahan k-means
		// Data customer for clustering
		$birth = $checkout->getBirthDayCust(); //get birth day customer from DB
		$age = $this->getAge($birth->tanggal_lahir); //get umur customer using function
		$jenisKelamin = $checkout->getJenisKelamin(); //get provinsi customer
		$pendidikan = $checkout->getPendidikan(); //get pendidikan customer
		$pendapatan = $checkout->getPendapatan(); //get agama customer

		//convert data usia customer to angka [1-5]
		if ($age < 18) {
			$dk_usia = 3;
		} elseif ($age < 34) {
			$dk_usia = 1;
		} elseif ($age < 50) {
			$dk_usia = 2;
		} elseif ($age < 66) {
			$dk_usia = 4;
		} else {
			$dk_usia = 5;
		}

		// convert data jenis kelamin customer to angka [1, 2]
		$jenisKelamin = $jenisKelamin->jenis_kelamin;
		if ($jenisKelamin == 'Pria') {
			$dk_jenisKelamin = 1;
		} elseif ($age == 'Wanita') {
			$dk_jenisKelamin = 2;
		}

		//convert data pendapatan customer to angka [1-5]
		$dk_pendapatan = (int) $pendapatan->pendapatan;

		//convert data pendidikan customer to angka [1-5]
		$pendidikan = $pendidikan->id_pendidikan; //get object
		if ($pendidikan == 9 || $pendidikan == 10) {
			$dk_pendidikan = 1;
		} elseif ($pendidikan == 7 || $pendidikan == 8) {
			$dk_pendidikan = 2;
		} elseif ($pendidikan == 5 || $pendidikan == 6) {
			$dk_pendidikan = 3;
		} elseif ($pendidikan == 3 || $pendidikan == 4) {
			$dk_pendidikan = 4;
		} elseif ($pendidikan == 1 || $pendidikan == 2) {
			$dk_pendidikan = 5;
		}

		$kmeans = $checkout->getKmeans(); //get kmeans variable
		// Insert Into array batch
		// $cart=$this->cart_model->get_cart();
		$arrInsert1 = array(); // var for passing to model
		foreach ($id_produks as $keyId_produks) { // insert produk dan nilai
			foreach ($kmeans as $keyKmeans) {
				$arrInsert2 = array();
				$arrInsert2["id_kmeans"] = $keyKmeans->id_kmeans;
				$arrInsert2["id_produk"] = $keyId_produks["id_produk"];
				if ($keyKmeans->id_kmeans == 1) { //jika idkmeans == 1(usia)
					$arrInsert2["nilai"] = $dk_usia;
				} elseif ($keyKmeans->id_kmeans == 2) { //jika idkmeans == 2(jenis kelamin)
					$arrInsert2["nilai"] = $dk_jenisKelamin;
				} elseif ($keyKmeans->id_kmeans == 3) { //jika idkmeans == 3(pendapatan)
					$arrInsert2["nilai"] = $dk_pendapatan;
				} elseif ($keyKmeans->id_kmeans == 4) { //jika idkmeans == 4(pendidikan)
					$arrInsert2["nilai"] = $dk_pendidikan;
				}
				array_push($arrInsert1, $arrInsert2); //push arrInsert2 to ArrInsert1
			}
		}
		// end loop

		$checkout->insDetailKmeans($arrInsert1); //insert into detail kmeans
	}

	// This func to clustering kmeans
	public function cluster()
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
			} else {
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
		$numCluster = 5;
		$k_means = new KMeans($numCluster);
		// cluster result in array
		$cluster = $k_means->cluster($sample);

		// var_dump($cluster);
		// script for passing data $insT_Cluster to Model
		$insT_Cluster = array();
		$arr1 = array('group_cluster' => '', 'id_detail_kmeans' => '');
		for ($numC = 0; $numC < $numCluster; $numC++) {
			if (count($cluster[$numC]) == 0) {
				break;
			}
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
	}

	public function getAge($birthDate)
	{
		//explode the date to get month, day and year
		$birthDate = explode("-", $birthDate);
		//get age from date or birthdate
		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
			? ((date("Y") - $birthDate[0]) - 1)
			: (date("Y") - $birthDate[0]));
		return $age;
	}
}
