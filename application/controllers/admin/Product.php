<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/product_model');
        $this->load->library('pagination');
    }

    public function index($offset = 0, $id = 0)
    {
        $produk = $this->product_model;

        $config['base_url'] = site_url('admin/product/index/');
        $config['total_rows'] = $produk->getTotalRow();
        $config['per_page'] = 5;

        // tag pagination
        $config['full_tag_open'] = '<nav aria-label="Page navigation produk" class="d-flex justify-content-end pr-5"><ul class="pagination pagination-sm">';
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
        $produks = $produk->selectAll($limit, $offset);
        $data['produk'] = $produks;

        $kategori = $produk->getKategori();
        $data['kategoris'] = $kategori;
        $data['offset'] = $offset;

        if ($id != 0) {
            $data['singleProduk'] = $produk->getSingleProduk($id);
        } else {
            $data['singleProduk'] = "";
        }
        // var_dump($this->db->get('produk')->result());
        // die();

        $this->load->view('admin/product', $data);
    }

    public function edit($id_product)
    {
        $produk = $this->product_model;
        $kategori = $produk->getKategori();
        $data['kategoris'] = $kategori;
        $data['singleProduk'] = $produk->getSingleProduk($id_product);
        // var_dump($data);
        // die();

        $this->load->view('admin/update_product', $data);
    }

    public function insertUpdate()
    {
        $produk = $this->product_model;
        $post = $this->input->post();

        $id = $post['id_produk'];

        $validation = $this->form_validation;
        $validation->set_rules($produk->rules());

        // get old url image from db
        $url_images = $produk->getImageProduk($id);

        if (empty($_FILES['files']['name'])) {
            //jika produk belum memiliki image
            if (!$url_images) {
                $this->form_validation->set_rules('files', 'Gambar produk', 'required');
            }
        }

        if ($validation->run()) {
            if ($id) {
                $update = $produk->update($id, $url_images);
                if ($update) {
                    $this->session->set_flashdata('sukses', 'Produk berhasil diupdate');
                }
            } else {
                if ($produk->insert()) {
                    $this->session->set_flashdata('sukses', 'Produk berhasil disimpan');
                }
            }
        }

        redirect("admin/product");
    }

    public function disable($id)
    {
        $produk = $this->product_model;

        $disable = $produk->disable($id);
        if ($disable) {
            $this->session->set_flashdata('sukses', 'Produk berhasil dinonaktifkan');
        }
        redirect("admin/product/index/0");
    }

    public function enable($id)
    {
        $produk = $this->product_model;

        $enable = $produk->enable($id);
        if ($enable) {
            $this->session->set_flashdata('sukses', 'Produk berhasil diaktifkan');
        }
        redirect("admin/product/index/0");
    }
}
