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

					<?php if(validation_errors()): ?>
					<div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
						<span class="badge badge-pill badge-warning">Warning</span>
						<?= validation_errors(); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<?php endif; ?>

					<?php if($this->session->flashdata('sukses')): ?>
					<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
						<?= $this->session->flashdata('sukses'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php endif; ?>
					<?= form_open_multipart('admin/category/insertUpdate') ?>
					<!-- <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"> -->
					<div class="card-body card-block">
            <!-- inout fot get id -->
            <input type="hidden" name="id_kategori" id="id_kategori" value="<?php if(!empty($singleCategory)){ echo $singleCategory[0]->id_kategori;} ?>" class="form-control">
            
						<div class="form-group">
							<label for="nama_kategori" class="form-control-label">Nama Kategori</label>
							<input type="text" id="nama_kategori" name="nama_kategori" class="form-control" value="<?php if(!empty($singleCategory)){ echo $singleCategory[0]->nama_kategori;} ?>">
						</div>
						<div class="form-group">
							<label for="file-input" class=" form-control-label">Gambar Kategori</label>
							<input type="file" id="file-input" name="file-input" class="form-control-file" value="<?php if(!empty($singleCategory)){ echo $singleCategory[0]->url_image_kategori;} ?>">
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
												<th class="avatar">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $num = 1; ?>
											<?php foreach($kategori as $kategori): ?>
											<tr>
												<td class="serial"><?= $num ?></td>
												<td class="avatar">
													<div class="round-img">
														<img class="rounded-circle"
															src="<?= base_url("assets/img/kategori/".$kategori->url_image_kategori) ?>" alt="">
													</div>
												</td>
												<td> <span class="invoice"><?= $kategori->nama_kategori ?></span> </td>
												<td>
													<a href="<?= site_url('admin/category/index/').$kategori->id_kategori ?>" class="btn p-0"><i class="fas fa-pen-square color-success font-16"></i></a> <!-- btn Edit -->
													
													<?php if($kategori->status_kategori == 0): ?>
														<a href="<?= site_url('admin/category/disable/').$kategori->id_kategori ?>" class="btn p-0" onclick="return confirm('Disable Kategori?')"><i class="fa fa-minus-square color-danger font-16"></i></a> <!-- btn Disable -->
													<?php elseif($kategori->status_kategori == 1): ?>
														<a href="<?= site_url('admin/category/enable/').$kategori->id_kategori ?>" class="btn p-0" onclick="return confirm('Enable Kategori?')"><i class="fas fa-plus-square color-danger font-16"></i></a> <!-- btn Enable -->
													<?php endif ?>
												</td>
											</tr>
											<?php $num++ ?>
											<?php endforeach ?>
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

	</div>
	<!-- .animated -->
</div>
<!-- /.content -->

<div class="clearfix"></div>

<?php $this->load->view('partials/footer_admin'); ?>
