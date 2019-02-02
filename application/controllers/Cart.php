<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct() {
		parent:: __construct();

    // $this->load->library('cart');
		$this->load->model('cart_model');
	}

	function index() {
		$detail_cart = $this->cart_model->get_detail_cart();
		$detail_cart = $detail_cart->result_array();
		$data['detail_cart'] = $detail_cart;

		$grand_total = $this->cart_model->select_cart();
		$data['grand_total'] = $grand_total->row_array();

		$this->load->view('cart', $data);
	}

	public function delete($id_detail_cart)
	{
		$this->cart_model->delete_produk($id_detail_cart);
		$this->update_total_cart();
		redirect('cart');
	}

	public function update()
	{
		$detail_cart = $this->cart_model->get_detail_cart();
		$detail_cart = $detail_cart->result_array();

		$push = array();
		$data_qty = array();

		foreach ($detail_cart as $key => $value) {
			$get_id = $value['id_detail_cart'];
			$push['id_detail_cart'] = $get_id;
			$push['qty_detail_cart'] = $this->input->post($get_id);

			array_push($data_qty, $push);
		}

		$this->cart_model->update_qty($data_qty);

		$this->update_total_cart();

		redirect('cart');
	}

	public function update_total_cart($id_customer = 1)//beri id customer
	{
		$this->cart_model->update_total_cart($id_customer);//beri id customer
	}
}
