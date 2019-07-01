<?php $this->load->view('partials/header_admin'); ?>
<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Update Product</strong>
                    </div>

                    <?php if (validation_errors()) : ?>
                        <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
                            <span class="badge badge-pill badge-warning">Warning</span>
                            <?= validation_errors(); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('sukses')) : ?>
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <?= $this->session->flashdata('sukses'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?= form_open_multipart(site_url('admin/product/insertUpdate')) ?>
                    <!-- <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"> -->
                    <div class="card-body card-block">
                        <div class="row">
                            <div class="col col-md-6">
                                <input type="hidden" name="id_produk" id="id_produk" value="<?php if (!empty($singleProduk)) {
                                                                                                echo $singleProduk[0]->id_produk;
                                                                                            } ?>" class="form-control">

                                <div class="form-group">
                                    <label for="nama_produk" class="form-control-label">Nama Produk</label>
                                    <input type="text" name="nama_produk" id="nama_produk" value="<?php if (!empty($singleProduk)) {
                                                                                                        echo $singleProduk[0]->nama_produk;
                                                                                                    } ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="harga_produk" class="form-control-label">Harga Produk</label>
                                    <input type="number" name="harga_produk" id="harga_produk" value="<?php if (!empty($singleProduk)) {
                                                                                                            echo $singleProduk[0]->harga_produk;
                                                                                                        } ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="kategori_produk" class="form-control-label">Kategori Produk</label>
                                    <select name="kategori_produk" id="kategori_produk" class="form-control">
                                        <option>Please select</option>
                                        <?php foreach ($kategoris as $kategori) : ?>
                                            <option value="<?= $kategori->id_kategori; ?>" <?php if ($singleProduk[0]->id_kategori == $kategori->id_kategori) {
                                                                                                echo "selected";
                                                                                            } ?>>
                                                <?= $kategori->nama_kategori; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <!-- <div class="form-group">
                    <label for="url_produk" class="form-control-label">URL Produk</label>
                    <input type="text" name="url_produk" id="url_produk" value="<?php // echo $profile->nomor_telp; 
                                                                                ?>" class="form-control">
                  </div> -->
                                <div class="form-group">
                                    <label for="deskripsi_produk" class="form-control-label">Deskripsi Produk</label>
                                    <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" value="<?= set_value('deskripsi_produk') ?>"><?php if (!empty($singleProduk)) {
                                                                                                                                                                    echo $singleProduk[0]->deskripsi_produk;
                                                                                                                                                                } ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="files" class="form-control-label">Gambar Produk</label>
                                    <input type="file" id="files" name="files[]" class="form-control-file" multiple>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->

<div class="clearfix"></div>

<?php $this->load->view('partials/footer_admin'); ?>