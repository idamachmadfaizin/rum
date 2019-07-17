<?php $this->load->view('partials/header2'); ?>

<div class="container-fluid" style="margin-top:80px; background-color:#F3F3F1;">
	<div class="row">

		<?php $this->load->view('partials/side_menu_customer'); ?>

		<div class="col-9">
			<div class="bg-white nav-bar-right-white shadow1">
				<p class="text-black text-18 mb-1 font-weight-bold">My Orders</p>
				<p class="text-12">Lihat detail informasi pesanan anda</p>
				<hr>

				<table class="table">
					<thead class="thead-light">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Date</th>
							<th scope="col">Berita Acara</th>
							<th scope="col">Total</th>
							<th scope="col">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($orders as $order) : ?>
							<?php $offset++ ?>
							<tr>
								<th scope="row"><a href="<?= site_url('order/show/' . $order->id_order) ?>"><?= $offset ?></a></th>
								<td><?= $order->tgl_order ?></td>
								<td><?= $order->id_order ?></td>
								<td>Rp <?= number_format($order->total_harga, 0, ",", ".") ?></td>
								<td><?= $order->status ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<?= $this->pagination->create_links(); ?>
			</div>

		</div>
	</div>
</div>

<?php $this->load->view('partials/footer'); ?>