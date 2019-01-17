<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_product extends CI_Controller {

	public function index()
	{
        $this->load->view('detail_product');
	}
}
