<?php
$this->load->model('cart_model');
$cart = $this->cart_model->get_cart();
$data['cart'] = $cart;
$grand_total = $this->cart_model->grand_total();
$data['grand_total'] = $grand_total->row_array();
$data['num_notif'] = $this->cart_model->count();
