<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('admin/report_model');
    $this->load->library('pagination');
  }

  public function index($offset = 0)
  {
    $report = $this->report_model;

    $config['base_url'] = site_url('admin/report/index');
    $config['per_page'] = 10;

    $datas = $report->getTableContent($config['per_page'], $offset);
    $config['total_rows'] = $report->getTotalRow();

    // tag pagination
    $config['full_tag_open'] = '<nav aria-label="Page navigation customer" class="d-flex justify-content-end pr-5"><ul class="pagination pagination-sm">';
    $config['full_tag_close'] = '</ul></nav>';

    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
    $config['cur_tag_close'] = '</a></li>';

    $config['next_link'] = '<li class="page-item">Next</li>';
    $config['prev_link'] = '<li class="page-item">Previous</li>';

    $config['attributes'] = array('class' => 'page-link');

    $this->pagination->initialize($config);
    // end tag pagination

    $data['reports'] = $datas;
    $this->load->view('admin/report', $data);
  }

  public function pdf($start = "", $end = "")
  {
    $report = $this->report_model;
    $json = $report->getTableContentPdf();

    // $json = $this->input->post('data');
    $data['datas'] = $json;

    $mpdf = new \Mpdf\Mpdf();
    $view = $this->load->view('admin/mpdfReport', $data, TRUE);
    $mpdf->WriteHTML($view);
    $mpdf->Output();
  }
}
