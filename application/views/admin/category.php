<?php $this->load->view('partials/header_admin'); ?>
<!-- Content -->
<div class="content">
	<!-- Animated -->
	<div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <strong>Category</strong> Product
          </div>

          <?php if(validation_errors()): ?>
            <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
              <span class="badge badge-pill badge-warning">Warning</span>
              <?= validation_errors(); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
            </div>
          <?php endif; ?>
          
          <?php if($this->session->flashdata('sukses')): ?>
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
              <?= $this->session->flashdata('sukses'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>

          <?= form_open_multipart('admin/category/insert') ?>
          <!-- <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"> -->
            <div class="card-body card-block">
              <div class="form-group">
                <label for="nama_kategori" class="form-control-label">Nama Kategori</label>
                <input type="text" id="nama_kategori" name="nama_kategori" class="form-control">
              </div>
              <div class="form-group">
                <label for="file-input" class=" form-control-label">Gambar Kategori</label>
                <input type="file" id="file-input" name="file-input" class="form-control-file">
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
      <!-- Orders -->
      <div class="col-lg-6 orders">
        <div class="row">
          <div class="col-xl-12">
            <div class="card">
              <div class="card-body">
                <h4 class="box-title">List Category Product</h4>
              </div>
              <div class="card-body--">
                <div class="table-stats order-table ov-h">
                  <table class="table ">
                    <thead>
                      <tr>
                        <th class="serial">#</th>
                        <th>Image</th>
                        <th class="avatar">Nama Kategori</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $num = 1; ?>
                    <?php foreach($kategori as $kategori): ?>
                      <tr>
                        <td class="serial"><?= $num ?></td>
                        <td class="avatar">
                          <div class="round-img">
                            <img class="rounded-circle" src="<?= base_url().$kategori->url_image_kategori ?>" alt="">
                          </div>
                        </td>
                        <td> <span class="invoice"><?= $kategori->nama_kategori ?></span> </td>
                      </tr>
                      <?php $num++ ?>
                    <?php endforeach ?>
                    </tbody>
                  </table>
                </div> <!-- /.table-stats -->
              </div>
            </div> <!-- /.card -->
          </div> <!-- /.col-lg-8 -->
        </div>
      </div>
      <!-- /.orders -->
    </div>

	</div>
	<!-- .animated -->
</div>
<!-- /.content -->

<div class="clearfix"></div>

<?php $this->load->view('partials/footer_admin'); ?>
