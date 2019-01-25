<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_page extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('rum_model');   
	}
	
	public function index()
	{
		$kategori = $this->rum_model->getAllTable('kategori');
		$kategori = $kategori->result_array();
		$data['kategori'] = $kategori;

		$bestseller = $this->rum_model->selectProdukImage('bestseller');
		$bestseller = $bestseller->result_array();
		$data['bestseller'] = $bestseller;

		$new = $this->rum_model->selectProdukImage('new');
		$new = $new->result_array();
		$data['new'] = $new;

		$this->load->view('landing_page', $data);
	}
}
