<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kmeans extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('admin/kmeans_model');
    $this->load->library('pagination');
    $this->load->dbforge();
  }

  public function index($offset = 0)
  {
    $kmeans = $this->kmeans_model;

    $config['base_url'] = site_url('admin/kmeans/index/');
    $config['total_rows'] = $kmeans->countDetailKmeans();
    $config['per_page'] = 20;

    // tag pagination
    $config['full_tag_open'] = '<nav aria-label="Page navigation kategori" class="d-flex justify-content-end pr-5"><ul class="pagination pagination-sm">';
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

    $limit = $config['per_page'];

    $data['clusters'] = $kmeans->getCluster();
    $data['dKmeans'] = $kmeans->detailKmeans($limit, $offset);
    $countKmeans = $kmeans->countKmeans();
    $data['modulus'] = $countKmeans;
    $data['rowspan'] = $countKmeans;
    $data['offset'] = $offset;

    $this->load->view('admin/kmeans', $data);
  }

  public function insertUpdate()
  {
    $kmeans = $this->kmeans_model;
    $post   = $this->input->post();

    $validation = $this->form_validation;
    $validation->set_rules($kmeans->rules());

    if ($validation->run()) {
      if ($post['id_kmeans']) {
        if ($kmeans->updateKmeans($post['id_kmeans'])) {
          $this->session->set_flashdata('updated', 'Data berhasi diupdate');
        }
      } else {
        $insertedId = $kmeans->insertKmeans(); // get primary key id after inserting
        if ($insertedId) {
          $this->reAllocate($insertedId);
          $this->session->set_flashdata('inserted', 'Data berhasil disimpan');
        }
      }
    }

    // $detailKmeans = $kmeans->getAllDetailKmeans();


    redirect('admin/kmeans');
  }

  //reallocate after added new variable or deleted variable
  public function reAllocate($insertedId = 0)
  {
    $kmeans = $this->kmeans_model;

    $result    = $kmeans->getAllDetailKmeans();
    $numDK     = $result->num_rows();
    $oldDK     = $result->result_array();

    $numKmean = $kmeans->countKmeans();

    $data = array();
    $raws = array();
    $x = 0;

    // #memecah data lama sebanyak jumlah kmeans
    for ($i = 0; $i < $numDK; $i = $i + 2) {
      // $slice = array_slice($oldDK, $i, $numKmean-1);
      $slice = array_chunk($oldDK, $numKmean - 1);
      // print_r($slice);
      array_push($raws, $slice);
    }

    // #push $slice[] to $data[] ++ null row
    foreach ($slice as $slice) {
      $id_produk;
      for ($i = 0; $i < count($slice); $i++) {
        $id_produk = $slice[$i]['id_produk'];
        array_push($data, $slice[$i]);
      }
      if (!$insertedId == 0) {
        $arr1['id_kmeans'] = $insertedId;
        $arr1['id_produk'] = $id_produk;
        $arr1['nilai']     = null;
        array_push($data, $arr1);
      }
    }

    // print_r($data);
    $kmeans->reAllocate($data);
  }




  // Fungsi Delete K-means
  public function delete($id_kmeans)
  {
    $kmeans = $this->kmeans_model;

    if ($this->deleteDetailKmeans($id_kmeans)) {
      if ($kmeans->deleteKmeans($id_kmeans)) {
        $this->reAllocate();
        $this->session->set_flashdata('deleted', 'Data berhasil dihapus');
      }
    }

    redirect('admin/kmeans');
  }
  public function deleteDetailKmeans($id_kmeans)
  {
    $kmeans = $this->kmeans_model;

    return $kmeans->deleteDetailKmeans($id_kmeans);
  }
  // .end

  public function detailKmeans()
  {
    $kmeans = $this->kmeans_model;
    $output = '';
    $output .= '  
      <div class="table-stats order-table ov-h">
        <table class="table ">
          <thead>
            <tr>
              <th class="serial">#</th>
              <th>Nama Variable</th>
              <th>Nama Produk</th>
              <th>Nilai</th>
            </tr>
          </thead>
          <tbody>
    ';

    $dKmeans = $kmeans->detailKmeans();
    // print_r($dKmeans);

    $num = 0;
    $modulus = $kmeans->countKmeans();
    $rowspan = $kmeans->countKmeans();
    foreach ($dKmeans as $dKmeans) {
      $output .= '<tr>';
      if ($modulus % $rowspan == 0) {
        $num++;
        $output .= '<td rowspan="' . $rowspan . '" class="serial">' . $num . '</td>';
      };
      $output .= '
          <td class="nama_variable">' . $dKmeans->nama_variable . '</td>
          <td class="nama_produk">' . $dKmeans->nama_produk . '</td>
          <td class="nilai" data-id1="' . $dKmeans->id_detail_kmeans . '" contenteditable>' . $dKmeans->nilai . '</td>
        </tr>
      ';
      $modulus++;
    }
    $output .= '
            </tbody>
          </table>
        <hr>
      </div> <!-- /.table-stats -->
    ';
    echo $output;
  }

  public function editDetailKmeans()
  {
    $kmeans = $this->kmeans_model;

    if ($kmeans->updateDetailKmeans()) {
      echo "Data updated!";
    }
  }
}
