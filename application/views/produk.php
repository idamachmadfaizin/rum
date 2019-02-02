<?php $this->load->view('partials/header2'); ?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m slide" style="background-image: url(<?php echo base_url() ?>assets/fashe/images/banner_carousel_product.jpg);">
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					
					<form action="" method="get">
						<div class="leftbar p-r-20 p-r-0-sm">
							<!-- Categories -->
							<h4 class="m-text14 p-b-7">
								Categories
							</h4>
							<div class="flex-sb-m flex-w p-b-35">
								<div class="flex-w">
									<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
										<select class="selection-2" name="kategori">
											<?php foreach ($kategori as $key => $value): ?>
												<option value="<?php echo $value['id_kategori']?>"<?php if ($this->input->get('kategori') == $value['id_kategori']) { echo "selected";} ?>><?php echo $value['nama_kategori'] ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
							</div>
							<!-- End Categories -->

							<!-- Sorting -->
							<h4 class="m-text14 p-b-7">
								Sort
							</h4>

							<div class="flex-sb-m flex-w p-b-35">
								<div class="flex-w">
									<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
										<select class="selection-2" name="sorting">
											<option value="" <?php if (!$this->input->get('sorting')) { echo "selected";} ?>>Default Sorting</option>
											<!-- <option>Popularity</option> -->
											<option value="asc" <?php if ($this->input->get('sorting') == "asc") { echo "selected";} ?>>Price: low to high</option>
											<option value="desc" <?php if ($this->input->get('sorting') == "desc") { echo "selected";} ?>>Price: high to low</option>
										</select>
									</div>

									<!-- <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
										<select class="selection-2" name="sorting">
											<option>Price</option>
											<option>$0.00 - $50.00</option>
											<option>$50.00 - $100.00</option>
											<option>$100.00 - $150.00</option>
											<option>$150.00 - $200.00</option>
											<option>$200.00+</option>

										</select>
									</div> -->
								</div>
							</div>
							<!-- End Sorting -->

							<!-- Filter -->
							<h4 class="m-text14 p-b-7">
								Filters
							</h4>

							<div class="filter-price p-t-22 p-b-50 bo3">
								<div class="m-text15 p-b-17">
									Price
								</div>

								<div class="wra-filter-bar">
									<div id="filter-bar"></div>
								</div>

								<div class="flex-sb-m flex-w p-t-16">
									<div class="w-size11">
										<!-- Button -->
										<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
											Filter
										</button>
									</div>

									<div class="s-text3 p-t-10 p-b-10">
										Rp <span id="value-lower">50</span>K - Rp <span id="value-upper">200</span>K
									</div>
								</div>
							</div>
							<!-- End Filter -->

							<!-- Form Cari -->
							<div class="search-product pos-relative bo4 of-hidden">
								<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">
								
								<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
									<i class="fs-12 fa fa-search" aria-hidden="true"></i>
								</button>
							</div>
							<!-- End form cari -->
						</div>
					</form>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<div class="flex-sb-m flex-w p-b-35 justify-content-end">
						<span class="s-text8 p-t-5 p-b-5">
							Showing 1–12 of 16 results
						</span>
					</div>
					<!-- Product -->
					<div class="row">

						<?php foreach($produk as $key => $value): ?>
						<!-- <form action="#"> -->
              <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                <!-- Block2 -->
                <div class="block2">
                  <div class="block2-img wrap-pic-w of-hidden pos-relative">
                    <img src="<?php echo base_url().$value['url_image'] ?>" alt="IMG-<?php echo $value['nama_produk'] ?>">

                    <div class="block2-overlay trans-0-4">
                      <div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<a href="<?= site_url().'/'?>">
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
														Add to Cart
													</button>
												</a>
                      </div>
                    </div>
                  </div>

                  <div class="block2-txt p-t-20">
										<p hidden class="hidden-id_produk"><?= $value['id_produk']?></p>
                    <a href="<?php echo site_url().'/detail_produk/detail/'.$value['id_produk'] ?>" class="block2-name dis-block s-text3 p-b-5">
											<?php echo $value['nama_produk'] ?>
                    </a>
                    
                    <!-- <span class="block2-oldprice m-text7 p-r-5">
                      $29.50
                    </span> -->
                    
                    <span class="block2-price m-text6 p-r-5">
                      Rp <?php echo $value['harga_produk'] ?>
                    </span>
                  </div>
                </div>
							</div>
						<!-- </form> -->
            <?php endforeach ?>

					</div>

					<!-- Pagination -->
					<!-- <div class="pagination flex-m flex-w p-t-26">
            <span>
              <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
            </span>
            <span>
              <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
            </span>
          </div> -->
          
          <?php echo $this->pagination->create_links(); ?>

				</div>
			</div>
		</div>
	</section>

<?php $this->load->view('partials/footer'); ?>