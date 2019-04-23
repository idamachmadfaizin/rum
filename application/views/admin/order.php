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
							<h4 class="box-title">Orders</h4>
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
									<?php $num = 1 ?>
									<?php foreach($order as $order): ?>
										<tr>
											<td class="serial"><?= $num ?></td>
											<td>
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-sm p-0" data-toggle="modal" data-target="#kadam" style="font-weight:600">
													<?= $order->id_order ?>
												</button>

												<!-- Modal -->
												<div class="modal fade" id="kadam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLongTitle">Detail no order <?= $order->id_order ?></h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<div class="table-stats order-table ov-h">
																	<table class="table ">
																		<thead>
																				<tr>
																					<th class="serial">#</th>
																					<th>Nama Produk</th>
																					<th>Qty</th>
																					<th>Harga satuan</th>
																				</tr>
																		</thead>
																		<tbody>

																			<?php $numDO = 1 ?>
																			<?php foreach ($detail_order as $detail_order): ?>
																				<?php if($detail_order->id_order == $order->id_order): ?>
																					<tr>
																						<td class="serial"><?= $numDO ?></td>
																						<td><span><?= $detail_order->nama_produk ?></span></td>
																						<td><span class="count"><?= $detail_order->jumlah ?></span></td>
																						<td><span class="count"><?= $detail_order->harga_satuan ?></span></td>
																					</tr>
																					<?php $numDO++ ?>
																				<?php endif ?>
																			<?php endforeach ?>

																		</tbody>
																	</table>
																</div>
															</div><!-- end modal body -->
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
												<!-- end Modal -->
											</td>
											<td>
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-sm p-0" data-toggle="modal" data-target="#idam" style="font-weight:600">
													<?= $order->nama_customer ?>
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
																<form>
																	<div class="form-group row">
																		<label for="EmailCustomer" class="col-sm-4 col-form-label">Email cutomer</label>
																		<div class="col-sm-8">
																			<input type="text" readonly class="form-control-plaintext" id="EmailCustomer" value="<?= $order->email_customer; ?>">
																		</div>
																		<label for="NamaCustomer" class="col-sm-4 col-form-label">Nama cutomer</label>
																		<div class="col-sm-8">
																			<input type="text" readonly class="form-control-plaintext" id="NamaCustomer" value="<?= $order->nama_customer; ?>">
																		</div>
																		<label for="TelpCustomer" class="col-sm-4 col-form-label">Telp cutomer</label>
																		<div class="col-sm-8">
																			<input type="text" readonly class="form-control-plaintext" id="TelpCustomer" value="<?= $order->nomor_telp; ?>">
																		</div>
																		<label for="AddressCustomer" class="col-sm-4 col-form-label">Alamat cutomer</label>
																		<div class="col-sm-8">
																			<input type="text" readonly class="form-control-plaintext" id="AddressCustomer" value="<?= $order->address; ?>">
																		</div>
																		<label for="JkelCustomer" class="col-sm-4 col-form-label">Jenis kelamin</label>
																		<div class="col-sm-8">
																			<input type="text" readonly class="form-control-plaintext" id="JkelCustomer" value="<?= $order->jenis_kelamin; ?>">
																		</div>
																		<label for="TanggalCustomer" class="col-sm-4 col-form-label">Tanggal lahir</label>
																		<div class="col-sm-8">
																			<input type="text" readonly class="form-control-plaintext" id="TanggalCustomer" value="<?= $order->tanggal_lahir; ?>">
																		</div>
																	</div>
																</form>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
												<!-- end Modal -->
											</td>
											<td><span><?= $order->tgl_order ?></span></td>
											<td><span><?= $order->total_harga ?></span></td>
											<td class="avatar"><!-- TF -->
												<div class="round-img">
													<button class="btn p-0" data-toggle="modal" data-target="#idama">
														<img class="rounded-circle" src="<?= base_url().'upload/bukti_tf/'.$order->bukti_tf ?>" alt="">
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
															<div class="modal-body text-center">
																<img src="<?= base_url().'upload/bukti_tf/'.$order->bukti_tf ?>" alt="<?= $order->bukti_tf ?>" class="img-thumbnail" style="min-width:100%">
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
												<!-- end Modal -->
											</td>
											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-sm dropdown-toggle <?php 
														if ($order->status == 'Menunggu') {
															echo 'btn-warning';
														} elseif ($order->status == 'Dibayar') {
															echo 'btn-primary';
														} elseif ($order->status == 'Proses') {
															echo 'btn-success';
														} elseif ($order->status == 'Pengiriman') {
															echo 'btn-secondary';
														} else {
															echo '';
														}
													?>" data-toggle="dropdown" aria-haspopup="true"
														aria-expanded="false">
														<?= $order->status ?>
													</button>
													<div class="dropdown-menu" style="margin-top:30px;font-size:14px;">
														<a class="dropdown-item" href="<?= site_url().'/admin/order/updateStatus?id='.$order->id_order.'&status=Menunggu'; ?>">MENUNGGU</a>
														<a class="dropdown-item" href="<?= site_url().'/admin/order/updateStatus?id='.$order->id_order.'&status=Dibayar'?>">DIBAYAR</a>
														<a class="dropdown-item" href="<?= site_url().'/admin/order/updateStatus?id='.$order->id_order.'&status=Proses'?>">PROSES</a>
														<a class="dropdown-item" href="<?= site_url().'/admin/order/updateStatus?id='.$order->id_order.'&status=Pengiriman'?>">PENGIRIMAN</a>
													</div>
												</div>
											</td>
										</tr>
									<?php endforeach ?>
										
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
