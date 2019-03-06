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
                      <th>Email Customer</th>
                      <th>Nama</th>
                      <th>Telp</th>
                      <th>Address</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal Lahir</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                      <!-- <th>Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="serial">1</td>
                      <td><span>customer3@gmail.com</span></td>
                      <td><span>customer3</span></td>
                      <td><span>08123456789</span></td>
                      <td><span>karangploso1</span></td>
                      <td><span>Pria</span></td>
                      <td><span>2019-01-01</span></td>
                      <td><span>2019-02-05 01:48:46</span></td>
                      <td><span>2019-02-18 00:44:52</span></td>
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
