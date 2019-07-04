<?php

class product_model extends CI_Model
{
    private $_table = "produk";
    private $_tImage = "image";

    public $id_kategori;
    public $nama_produk;
    public $harga_produk;
    public $deskripsi_produk;
    public $url_produk;

    public function rules()
    {
        return [
            [
                'field' => 'nama_produk',
                'label' => 'Nama Produk',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'harga_produk',
                'label' => 'Harga Produk',
                'rules' => 'trim|required'
            ],

            [
                'field' => 'kategori_produk',
                'label' => 'Kategori Produk',
                'rules' => 'trim|required'
            ]
        ];
    }
    public function selectAll($limit, $offset)
    {
        // $this->db->select('distinct produk.id_produk, produk.id_kategori, produk.nama_produk, produk.harga_produk, produk.deskripsi_produk, produk.url_produk, produk.produk_created_at, produk.produk_updated_at, image.id_image, image.id_produk, image.url_image, kategori.id_kategori, kategori.nama_kategori, kategori.url_image_kategori, kategori.status_kategori');
        $this->db->select('produk.id_produk, produk.id_kategori, produk.nama_produk, produk.harga_produk, produk.deskripsi_produk, produk.url_produk, produk.status_produk, image.id_image, image.url_image, kategori.nama_kategori, kategori.url_image_kategori');
        $this->db->limit($limit, $offset);
        $this->db->from($this->_table);
        $this->db->join('image', 'image.id_produk = ' . $this->_table . '.id_produk', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = ' . $this->_table . '.id_kategori');
        $this->db->group_by('produk.id_produk');
        return $this->db->get()->result();
    }

    public function getTotalRow()
    {
        return $this->db->count_all($this->_table);
    }

    public function getKategori()
    {
        return $this->db->get('kategori')->result();
    }

    public function getImageProduk($id_produk)
    {
        $this->db->where("id_produk", $id_produk);
        return $this->db->get($this->_tImage)->result();
    }

    public function getSingleProduk($id)
    {
        $this->db->where('id_produk', $id);
        return $this->db->get($this->_table)->result();
    }

    public function insert()
    {
        $post = $this->input->post();

        $this->id_kategori = $post['kategori_produk'];
        $this->nama_produk = $post['nama_produk'];
        $this->harga_produk = $post['harga_produk'];
        $this->deskripsi_produk = $post['deskripsi_produk'];
        $this->url_produk = str_replace(" ", "-", $post['nama_produk']);

        $this->db->insert($this->_table, $this);
        $id_produk = $this->db->insert_id();

        //insert image to table image
        $this->insertToImage($id_produk, $this->nama_produk);
        return true;
    }

    public function update($id_produk, $url_images)
    {
        $post = $this->input->post();

        $this->id_kategori = $post['kategori_produk'];
        $this->nama_produk = $post['nama_produk'];
        $this->harga_produk = $post['harga_produk'];
        $this->deskripsi_produk = $post['deskripsi_produk'];
        $this->url_produk = str_replace(" ", "-", $post['nama_produk']);

        if (isset($url_images)) {
            if ($_FILES['files']['name']) {
                foreach ($url_images as $url_image) {
                    unlink(base_url('assets/img/produk/' . $url_image->url_image));
                }
            }
        }

        $productNames = $this->_uploadImage($this->nama_produk);
        $this->db->delete('image', array('id_produk' => $id_produk));
        if ($productNames) {
            foreach ($productNames as $productName) {
                $data = new stdClass();
                $data->id_produk = $id_produk;
                $data->url_image = $productName;
                $this->db->insert('image', $data);
                // $this->db->update('image', $data, array('id_produk' => $id_produk));
            }
        }

        // $this->url_image = $this->nama_produk;

        // $this->insertToImage($id_produk);
        return $this->db->update($this->_table, $this, array('id_produk' => $id_produk));
    }

    public function disable($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        return $this->db->update($this->_table, array('status_produk' => 1));
    }

    public function enable($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        return $this->db->update($this->_table, array('status_produk' => 0));
    }

    public function insertToImage($id_produk, $nama_produk)
    {
        $productNames = $this->_uploadImage($nama_produk);
        foreach ($productNames as $productName) {
            $data = new stdClass();
            $data->id_produk = $id_produk;
            $data->url_image = $productName;
            $this->db->insert($this->_tImage, $data);
        }
    }

    private function _uploadImage($nama_produk)
    {
        $countfiles = count($_FILES['files']['name']);
        // var_dump($_FILES['files']['name'][0]);
        // die();

        for ($i = 0; $i < $countfiles; $i++) {
            if (!empty($_FILES['files']['name'][$i])) {
                // Define new $_FILES array - $_FILES['file']
                $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                $_FILES['file']['size'] = $_FILES['files']['size'][$i];

                // Set preference
                $config['file_name']      = $nama_produk . " " . $i;
                $config['allowed_types']  = 'jpg|jpeg|png|gif';
                $config['upload_path']    = './assets/img/produk/';
                $config['overwrite']      = true;
                $config['max_size']       = 1024; // 1MB
                // $config['file_name']      = str_replace(' ', '-', $this->input->post('nama_produk'));

                //Load upload library
                $this->load->library('upload');
                // re-config upload library
                $this->upload->initialize($config);

                // File upload
                if ($this->upload->do_upload('file')) {
                    // Get data about the file
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];

                    // Initialize array
                    $filenames[] = $filename;
                }
            }
        } //end for
        if (isset($filenames)) {
            return $filenames;
        }
    }
}
