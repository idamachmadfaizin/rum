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
            <div class="card-header">
              <h4>Filter</h4>
            </div>
            <div class="card-body row m-0 justify-content-between">
              <form action="<?= site_url('admin/report') ?>" method="get" class="row">
                <div class="col-5">
                  <label for="startDate">Start date</label>
                </div>
                <div class="col-7">
                  <label for="endDate">End date</label>
                </div>
                <div class="col-5">
                  <input type="date" name="startDate" id="startDate" class="form-control" value="<?php if ($this->input->get('startDate')) {
                                                                                                    echo $this->input->get('startDate');
                                                                                                  } ?>">
                </div>
                <div class="col-5">
                  <input type="date" name="endDate" id="endDate" class="form-control" value="<?php if ($this->input->get('endDate')) {
                                                                                                echo $this->input->get('endDate');
                                                                                              } ?>">
                </div>
                <div class="col-2">
                  <button type="submit" class="btn btn-primary">Filter</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header">
              <h4 class="box-title">Report</h4>
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
                    <?php foreach ($reports as $report) : ?>
                      <tr>
                        <td class="serial"><?= $number ?></td>
                        <td><span><?= $report->id_order ?></span></td>
                        <td><span><?= $report->tgl_order ?></span></td>
                        <td><span><?= $report->nama_customer ?></span></td>
                        <td><span><?= $report->nama_produk ?></span></td>
                        <td><span><?= $report->jumlah ?></span></td>
                        <td class="count"><span><?= number_format($report->harga_satuan, 0, ",", ".") ?></span></td>
                        <td class="count"><span><?= number_format($report->total_harga, 0, ",", ".") ?></span></td>
                      </tr>
                      <?php $number++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <hr>
                <!-- <button class="btn btn-primary float-right mt-0 mr-3 mb-3">PDF</button> -->
                <a href="<?= site_url('admin/report/pdf/' . $this->input->get('startDate') . '/' . $this->input->get('endDate')) ?>" onclick="downloadPdf()" class="btn btn-primary float-right mt-0 mr-3 mb-3">Export</a>
                <?php echo $this->pagination->create_links(); ?>
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


<!-- <script src="<?= base_url() ?>assets/js/jquery-3.4.1.min.js"></script> -->

<!-- <script>
  function downloadPdf() {
    $.ajax({
      url: "<?= site_url('admin/report/pdf') ?>",
      type: "POST",
      data: {
        "data": <?php echo (json_encode($reports)) ?>
      },
      success: function(data) {
        // $("#kabupaten").html(data);
        // $("#kabupaten").prop('disabled', false);
      }
    });
  }
</script> -->

<?php $this->load->view('partials/footer_admin'); ?>