<?php $this->load->view('partials/header_admin'); ?>

<!-- Content -->
<div class="content">
  <!-- Animated -->
  <div class="animated fadeIn">
    <!-- Orders -->
    <div class="orders">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body row m-0 justify-content-between">
              <h4 class="box-title">Report</h4>
              <form action="" method="get" class="row">
                <div class="form-group">
                  <label for="startDate">Start date</label><br>
                  <input type="date" name="startDate" id="startDate" class="form-control">
                </div>
                <div class="form-group">
                  <label for="endDate">End date</label><br>
                  <input type="date" name="endDate" id="endDate" class="form-control">
                </div>
              </form>
            </div>
            <div class="card-body--">
              <div class="table-stats order-table ov-h">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="serial">#</th>
                      <th>Id Order</th>
                      <th>Tgl Order</th>
                      <th>Nama Customer</th>
                      <th>Produk</th>
                      <th>Jumlah</th>
                      <th>Harga Satuan</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $number = 1; ?>
                    <?php foreach ($report as $report) : ?>
                      <tr>
                        <td class="serial"><?= $number ?></td>
                        <td><span><?= $report->id_order ?></span></td>
                        <td><span><?= $report->tgl_order ?></span></td>
                        <td><span><?= $report->nama_customer ?></span></td>
                        <td><span><?= $report->nama_produk ?></span></td>
                        <td><span><?= $report->jumlah ?></span></td>
                        <td class="count"><span><?= $report->harga_satuan ?></span></td>
                        <td class="count"><span><?= $report->total_harga ?></span></td>
                      </tr>
                      <?php $number++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <hr>
                <a href="<?= site_url('admin/Topdf') ?>" class="btn btn-primary float-right mt-0 mr-3 mb-3">Export</a>
                <?php //echo $this->pagination->create_links(); 
                ?>
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