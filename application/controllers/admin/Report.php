<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('admin/report_model');
  }

  public function index()
  {
    $report = $this->report_model;

    $data['report'] = $report->getTableContent();
    $this->load->view('admin/report', $data);
  }
}
