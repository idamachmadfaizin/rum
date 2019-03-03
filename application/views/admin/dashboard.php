<?php $this->load->view('partials/header_admin'); ?>
<!-- Content -->
<div class="content">
	<!-- Animated -->
	<div class="animated fadeIn">
		<!-- Widgets  -->
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="stat-widget-five">
							<div class="stat-icon dib flat-color-1">
								<i class="fas fa-shopping-cart"></i>
							</div>
							<div class="stat-content">
								<div class="text-left dib">
									<div class="stat-text"><span class="count">30</span></div>
									<div class="stat-heading">Orders Today</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="stat-widget-five">
							<div class="stat-icon dib flat-color-2">
								<i class="fas fa-clock"></i>
							</div>
							<div class="stat-content">
								<div class="text-left dib">
									<div class="stat-text"><span class="count">50</span></div>
									<div class="stat-heading">Pending</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="stat-widget-five">
							<div class="stat-icon dib flat-color-3">
								<i class="fas fa-exclamation-circle"></i>
							</div>
							<div class="stat-content">
								<div class="text-left dib">
									<div class="stat-text"><span class="count">30</span></div>
									<div class="stat-heading">Not Yet Paid</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="stat-widget-five">
							<div class="stat-icon dib flat-color-4">
								<i class="fas fa-users"></i>
							</div>
							<div class="stat-content">
								<div class="text-left dib">
									<div class="stat-text"><span class="count">2986</span></div>
									<div class="stat-heading">Users</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Widgets -->
		<div class="clearfix"></div>
		<!-- Orders -->
		<div class="orders">
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-body">
							<h4 class="box-title">Orders </h4>
						</div>
						<div class="card-body--">
							<div class="table-stats order-table ov-h">
								<table class="table ">
									<thead>
										<tr>
											<th class="serial">#</th>
											<th>TGL ORDER</th>
											<th>NO NO INVOICE</th>
											<th>TOTAL HARGA</th>
											<th>STATUS PEMBAYARAN</th>
											<th>STATUS</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="serial">1</td>
											<td> 01-01-2019 </td>
											<td> <span class="invoice">1811S9ONUU</span> </td>
											<td> Rp <span class="count">90000</span> </td>
											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
													 aria-expanded="false">
														BELUM
													</button>
													<div class="dropdown-menu" style="margin-top:30px;">
														<a class="dropdown-item" href="#">BELUM</a>
														<a class="dropdown-item" href="#">DIBAYAR</a>
													</div>
												</div>
											</td>
											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
													 aria-expanded="false">
														COMPLETE
													</button>
													<div class="dropdown-menu" style="margin-top:30px;">
														<a class="dropdown-item" href="#">COMPLETE</a>
														<a class="dropdown-item" href="#">PENDING</a>
													</div>
												</div>
											</td>
										</tr>

										<tr class=" pb-0">
											<td class="serial">2</td>
											<td> 01-01-2019 </td>
											<td> <span class="invoice">1811S9ONUU</span> </td>
											<td> Rp <span class="count">10000</span> </td>
											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
													 aria-expanded="false">
														BELUM
													</button>
													<div class="dropdown-menu" style="margin-top:-80px;">
														<!-- change this -->
														<a class="dropdown-item" href="#">BELUM</a>
														<a class="dropdown-item" href="#">DIBAYAR</a>
													</div>
												</div>
											</td>
											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
													 aria-expanded="false">
														COMPLETE
													</button>
													<div class="dropdown-menu" style="margin-top:-80px;">
														<!-- change this -->
														<a class="dropdown-item" href="#">COMPLETE</a>
														<a class="dropdown-item" href="#">PENDING</a>
													</div>
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
