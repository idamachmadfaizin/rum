<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('rum_model');
    }

    public function detail($url_produk)
    {
        // Get Detail Produk
        $query = $this->rum_model->getDetailProduk($url_produk);
        $data['detailProduk'] = $query->result_array();

        $relatedP = $this->rum_model->getRelatedProduk($url_produk);

        if (empty($relatedP)) {
            $data['relatedP'] = '';
        } else {
            $data['relatedP'] = $relatedP->result_array();
        }
        // die();
        // print_r($data);
        $this->load->view('detail_product', $data);
    }

    public function addtocart($id_produk)
    {
        if ($this->session->id_customer) {
            $id_customer = $this->session->id_customer;

            $data['id_customer'] = $id_customer;
            $data['id_produk'] = $id_produk;
            $data['qty_cart'] = 1;

            // cek barang wes onok nang cart?
            $where = array(
                'id_customer' => $id_customer,
                'id_produk' => $id_produk
            );

            $id_cart = $this->rum_model->product_exist($where);

            if ($id_cart > 0) {
                $old_qty = $this->rum_model->getQty($where);
                $new_qty = $old_qty + 1;

                $updateQty['qty_cart'] = $new_qty;

                $this->rum_model->tambah_qty($id_cart, $updateQty);
                redirect('/produk');
            } else {
                $this->rum_model->addToCart($data);
                redirect('/produk');
            }
        } else {
            redirect('/login');
        }
    }
}
