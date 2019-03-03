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
          <?= form_open_multipart(site_url()) ?>
          <!-- <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"> -->
            <div class="card-body card-block">
              <div class="form-group">
                <label for="nama_kategori" class="form-control-label">Nama Kategori</label>
                <input type="text" id="nama_kategori" class="form-control">
              </div>
              <div class="form-group">
                <label for="file-input" class=" form-control-label">File input</label>
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
                      <tr>
                        <td class="serial">1</td>
                        <td class="avatar">
                          <div class="round-img">
                            <img class="rounded-circle" src="<?= base_url().'assets/elaadmin/images/avatar/1.jpg' ?>" alt="">
                          </div>
                        </td>
                        <td> <span class="invoice">1811S9ONUU</span> </td>
                      </tr>
                      <tr class="pb-0">
                        <td class="serial">2</td>
                        <td class="avatar">
                          <div class="round-img">
                            <img class="rounded-circle" src="<?= base_url().'assets/elaadmin/images/avatar/1.jpg' ?>" alt="">
                          </div>
                        </td>
                        <td> <span class="invoice">1811S9ONUU</span> </td>
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

	</div>
	<!-- .animated -->
</div>
<!-- /.content -->

<div class="clearfix"></div>

<?php $this->load->view('partials/footer_admin'); ?>
