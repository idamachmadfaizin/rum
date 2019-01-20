<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class K_means_c extends CI_Controller {
   public function __construct()
   {
      parent::__construct();
      
      $this->load->model('Rum_model');   
   }

	public function index()
	{
      $data['totKmeans'] = $this->Rum_model->getTotalKmeans();
      $query = $this->Rum_model->getAllTable('detail_kmeans');
      $data['k_means'] = $query->result_array();

	   $this->load->view('k_means_v', $data);
	}
}
