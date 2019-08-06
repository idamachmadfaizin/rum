<?php 

class Topdf extends CI_Controller
{
  public function __construct()
  {
    parent:: __construct();

    $this->load->model('admin/Report_model');
    $this->load->library('pdf');
  }

  public function index()
  {
    $pdf = new FPDF('l','mm','A5');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',16);
    // mencetak string 
    $pdf->Cell(190,7,'LAPORAN PENJUALAN RUM SEAFOOD',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
    // Memberikan space kebawah agar tidak terlalu rapat
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,6,'id_order',1,0);
    $pdf->Cell(20,6,'tgl_order',1,0);
    $pdf->Cell(30,6,'nama_customer',1,0);
    $pdf->Cell(40,6,'nama_produk',1,0);
    $pdf->Cell(20,6,'jumlah',1,0);
    $pdf->Cell(20,6,'harga_satuan',1,0);
    $pdf->Cell(25,6,'total_harga',1,0);
    $pdf->SetFont('Arial','',10);

    $report = $this->Report_model->getTableContent();
    foreach ($report as $row){
      $pdf->Cell(20,6,$row->id_order,1,0);
      $pdf->Cell(20,6,$row->tgl_order,1,0);
      $pdf->Cell(30,6,$row->nama_customer,1,0);
      $pdf->Cell(40,6,$row->nama_produk,1,0);
      $pdf->Cell(20,6,$row->jumlah,1,0);
      $pdf->Cell(20,6,$row->harga_satuan,1,0);
      $pdf->Cell(25,6,$row->total_harga,1,1); 
    }
    $pdf->Output();
  }
}
