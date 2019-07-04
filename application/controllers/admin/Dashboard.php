<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/dashboard_model');

        if (!$this->session->userdata('id_admin')) {
            redirect('admin/login');
        }
    }

    public function index()
    {
        $dashboard = $this->dashboard_model;
        $dateNow = date('Y-m-d');

        $order_today = $dashboard->orderToday($dateNow);
        $dibayar = $dashboard->getWidget($dateNow, 'Dibayar');
        $proses = $dashboard->getWidget($dateNow, 'Proses');
        $cus = $dashboard->totCustomer();

        $data['widget'] = [
            'order_today' => $order_today,
            'dibayar'     => $dibayar,
            'proses'      => $proses,
            'customer'    => $cus
        ];
        $data['orders'] = $dashboard->getOrders($dateNow);
        if ($data['orders']) {
            $data['detail_orders'] = $dashboard->getDetailOrder($dateNow);
        }
        $data['KP'] = $dashboard->getKP($dateNow);

        $this->load->view('admin/dashboard', $data);
    }

    public function updateStatus()
    {
        $dashboard = $this->dashboard_model;

        $id = $dashboard->updateStatus();

        redirect('admin/dashboard/');
    }
}
