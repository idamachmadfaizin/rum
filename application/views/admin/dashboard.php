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
								<i class="far fa-credit-card"></i>
							</div>
							<div class="stat-content">
								<div class="text-left dib">
									<div class="stat-text"><span class="count">50</span></div>
									<div class="stat-heading">Dibayar</div>
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
								<i class="fas fa-sync-alt"></i>
							</div>
							<div class="stat-content">
								<div class="text-left dib">
									<div class="stat-text"><span class="count">30</span></div>
									<div class="stat-heading">Proses</div>
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
									<div class="stat-heading">Customer</div>
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
											<th>No Order</th>
											<th>Nama Customer</th>
											<th>Tanggal Order</th>
											<th>Total Harga</th>
											<th class="avatar">TF</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="serial">1</td>
											<td>
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-sm p-0" data-toggle="modal" data-target="#<?php //no_order ?>" style="font-weight:600">
													1235
												</button>

												<!-- Modal -->
												<div class="modal fade" id="<?php //no_order ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																...
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
											</td>
											<td>
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-sm p-0" data-toggle="modal" data-target="#idam" style="font-weight:600">
													Customer34
												</button>

												<!-- Modal -->
												<div class="modal fade" id="idam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLongTitle">Customer Detail</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																...
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
											</td>
											<td><span>01-01-2019</span></td>
											<td><span>90000</span></td>
											<td class="avatar">
												<div class="round-img">
													<button class="btn p-0" data-toggle="modal" data-target="#idama">
														<img class="rounded-circle" src="<?= base_url().'assets/elaadmin/images/avatar/1.jpg' ?>" alt="">
													</button>
												</div>
												<!-- Modal -->
												<div class="modal fade" id="idama" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLongTitle">Customer Detail</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																...
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
											</td>
											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
														aria-expanded="false">
														MENUNGGU
													</button>
													<div class="dropdown-menu" style="margin-top:30px;font-size:14px;">
														<a class="dropdown-item" href="#">MENUNGGU</a>
														<a class="dropdown-item" href="#">DIBAYAR</a>
														<a class="dropdown-item" href="#">PROSES</a>
														<a class="dropdown-item" href="#">PENGIRIMAN</a>
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
