<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('produk_model');
    }
    
	public function index()
	{
        $kategori = $this->produk_model->getAllTable('kategori');
        $kategori = $kategori->result_array();
        $data['kategori'] = $kategori;
        
		$this->load->view('produk', $data);
	}
}
