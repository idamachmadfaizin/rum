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
              <h4 class="box-title">List Customer</h4>
            </div>
            <div class="card-body--">
              <div class="table-stats order-table ov-h">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="serial">#</th>
                      <th>Email Customer</th>
                      <th>Nama</th>
                      <th>Telp</th>
                      <th>Address</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal Lahir</th>
                      <!-- <th>Created at</th> -->
                      <!-- <th>Updated at</th> -->
                      <!-- <th>Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                  <?php $number = 1; ?>
                  <?php foreach ($customer as $customer): ?>
                    <tr>
                      <td class="serial"><?= $number ?></td>
                      <td><span><?= $customer->email_customer ?></span></td>
                      <td><span><?= $customer->nama_customer ?></span></td>
                      <td><span><?= $customer->nomor_telp ?></span></td>
                      <td><span><?= $customer->address ?></span></td>
                      <td><span><?= $customer->jenis_kelamin ?></span></td>
                      <td><span><?= $customer->tanggal_lahir ?></span></td>
                      <!-- <td><span><?// $customer->customer_created_at ?></span></td> -->
                      <!-- <td><span><?// $customer->customer_updated_at ?></span></td> -->
                    </tr>
                    <?php $number++; ?>
                  <?php endforeach; ?>
                  </tbody>
                </table>
                <hr>
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

<?php $this->load->view('partials/footer_admin'); ?>
