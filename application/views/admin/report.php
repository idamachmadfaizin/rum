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
            <div class="card-body">
              <h4 class="box-title">List Product</h4>
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
                  <?php // $number = 1; ?>
                  <?php // foreach ($customer as $customer): ?>
                    <tr>
                      <td class="serial"></td>
                      <td><span></span></td>
                      <td><span></span></td>
                      <td><span></span></td>
                      <td><span></span></td>
                      <td><span></span></td>
                      <td><span></span></td>
                      <td><span></span></td>
                    </tr>
                    <?php //$number++; ?>
                  <?php //endforeach; ?>
                  </tbody>
                </table>
                <hr>
                <?php //echo $this->pagination->create_links(); ?>
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