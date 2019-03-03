<?php $this->load->view('partials/header_admin'); ?>
<!-- Content -->
<div class="content">
	<!-- Animated -->
	<div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <strong>Product</strong>
          </div>
          <?= form_open_multipart(site_url()) ?>
          <!-- <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"> -->
            <div class="card-body card-block">
              <div class="row">
                <div class="col col-md-6">
                  <div class="form-group">
                    <label for="nama_produk" class="form-control-label">Nama Produk</label>
                    <input type="text" name="nama_produk" id="nama_produk" value="<?php // echo $profile->nomor_telp; ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="harga_produk" class="form-control-label">Harga Produk</label>
                    <input type="number" name="harga_produk" id="harga_produk" value="<?php // echo $profile->nomor_telp; ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="kategori_produk" class="form-control-label">Kategori Produk</label>
                    <select name="kategori_produk" id="kategori_produk" class="form-control">
                      <option>Please select</option>
                      <option value="1">Option #1</option>
                      <option value="2">Option #2</option>
                      <option value="3">Option #3</option>
                    </select>
                  </div>
                </div>
                <div class="col col-md-6">
                  <div class="form-group">
                    <label for="url_produk" class="form-control-label">URL Produk</label>
                    <input type="text" name="url_produk" id="url_produk" value="<?php // echo $profile->nomor_telp; ?>" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="deskripsi_produk" class="form-control-label">Deskripsi Produk</label>
                    <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="file-multiple-input" class="form-control-label">Multiple File input</label>
                    <input type="file" id="file-multiple-input" name="file-multiple-input" multiple="" class="form-control-file">
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
    <!-- Orders -->
    <div class="orders">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
              <h4 class="box-title">List Product</h4>
            </div>
            <div class="card-body--">
              <div class="table-stats order-table ov-h">
                <table class="table ">
                  <thead>
                    <tr>
                      <th class="serial">#</th>
                      <th>Nama Produk</th>
                      <th>Harga</th>
                      <th>Kategori</th>
                      <th>Url Produck</th>
                      <th>Deskripsi</th>
                      <th class="avatar">Images</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="serial">1</td>
                      <td><span>Cumi Kupas</span></td>
                      <td>Rp <span class="count">90000</span></td>
                      <td><span>Seafood</span></td>
                      <td><span>cumi_kupas</span></td>
                      <td><span>ini deskripsi cumi kupas</span></td>
                      <td class="avatar">
                        <div class="round-img">
                          <a href="#">
                            <img class="rounded-circle" src="<?= base_url().'assets/elaadmin/images/avatar/1.jpg' ?>" alt="">
                          </a>
                        </div>
                      </td>
                    </tr>
                    
                    <tr class="pb-0">
                      <td class="serial">1</td>
                      <td><span>Cumi Kupas</span></td>
                      <td>Rp <span class="count">90000</span></td>
                      <td><span>Seafood</span></td>
                      <td><span>cumi_kupas</span></td>
                      <td><span>ini deskripsi cumi kupas</span></td>
                      <td class="avatar">
                        <div class="round-img">
                          <a href="#">
                            <img class="rounded-circle" src="<?= base_url().'assets/elaadmin/images/avatar/1.jpg' ?>" alt="">
                          </a>
                        </div>
                      </td>
                    </tr>
                    
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
	<!-- .animated -->
</div>
<!-- /.content -->

<div class="clearfix"></div>

<?php $this->load->view('partials/footer_admin'); ?>
