<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		require_once('cart_header.php');

		$cart = $this->cart_model->get_cart();
		$data['cart'] = $cart;

		$grand_total = $this->cart_model->grand_total();
		$data['grand_total'] = $grand_total->row_array();

		$this->load->view('cart', $data);
	}

	public function delete($id_cart)
	{
		$this->load->model('cart_model');

		$this->cart_model->delete_produk($id_cart);
		// $this->update_total_cart();
		redirect('cart');
	}

	public function update()
	{
		$this->load->model('cart_model');
		$cart = $this->cart_model->get_cart();

		$push = array();
		$data_qty = array();

		foreach ($cart as $carts) {
			$get_id = $carts->id_cart;
			$push['id_cart'] = $get_id;
			$push['qty_cart'] = $this->input->post($get_id);

			array_push($data_qty, $push);
		}

		$this->cart_model->update_qty($data_qty);

		// $this->update_total_cart();

		redirect('cart');
	}
}
