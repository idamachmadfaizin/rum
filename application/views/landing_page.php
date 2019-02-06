<?php $this->load->view('partials/header2');?>

<!-- Slide1 -->
<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="<?php echo base_url() ?>assets\img\banner_carousel\banner_carousel_1.png" class="d-block w-100" alt="...">
		</div>
		<div class="carousel-item">
			<img src="<?php echo base_url() ?>assets\img\banner_carousel\banner_carousel_2.png" class="d-block w-100" alt="...">
		</div>
		<div class="carousel-item">
			<img src="<?php echo base_url() ?>assets\img\banner_carousel\banner_carousel_3.png" class="d-block w-100" alt="...">
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<!-- Banner -->
<!-- Card -->
<div class="banner bgwhite p-t-40 p-b-40">
	<div class="container">
		<div class="row">
      
      <?php foreach($kategori as $key => $value): ?>
        <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
          <!-- block1 -->
          <div class="block1 hov-img-zoom pos-relative m-b-30">
            <img src="<?php echo base_url().$value['url_image_kategori'] ?>" alt="IMG-<?php echo $value['nama_kategori'] ?>">

            <div class="block1-wrapbtn w-size2">
              <!-- Button -->
              <a href="<?= site_url().'/produk?kategori='.$value['id_kategori'] ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                <?php echo $value['nama_kategori'] ?>
              </a>
            </div>
          </div>
        </div>
      <?php endforeach ?>

		</div>
	</div>
</div>


<!-- Our product -->
<section class="bgwhite p-t-45 p-b-58">
	<div class="container">
		<div class="sec-title p-b-22">
			<h3 class="m-text5 t-center">
				Our Products
			</h3>
		</div>

		<!-- Tab01 -->
		<div class="tab01">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#best-seller" role="tab">Best Seller</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#new" role="tab">New</a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content p-t-35">
				<!-- - -->
				<div class="tab-pane fade show active" id="best-seller" role="tabpanel">
					<div class="row">

            <?php foreach($bestseller as $key => $value): ?>
              <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <!-- Block2 -->
                <div class="block2">
                  <div class="block2-img wrap-pic-w of-hidden pos-relative">
                    <img src="<?php echo base_url().$value['url_image'] ?>" alt="IMG-<?php echo $value['nama_produk'] ?>">

                    <div class="block2-overlay trans-0-4">
                      <div class="block2-btn-addcart w-size1 trans-0-4">
                        <!-- Button -->
                        <a href="<?= site_url().'/landing_page/addtocart/'.$value['id_produk']?>">
                          <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                            Add to Cart
                          </button>
                        </a>
                      </div>
                    </div>
                  </div>

                  <div class="block2-txt p-t-20">
                    <a href="<?php echo site_url().'/detail_produk/detail/'.$value['id_produk'] ?>" class="block2-name dis-block s-text3 p-b-5 nounderline">
                      <?php echo $value['nama_produk'] ?>
                    </a>

                    <span class="block2-price m-text6 p-r-5">
                      Rp <?php echo $value['harga_produk'] ?>
                    </span>
                  </div>
                </div>
              </div>
            <?php endforeach ?>

					</div>
				</div>


				<!-- - -->
				<div class="tab-pane fade" id="new" role="tabpanel">
					<div class="row">

            <?php foreach($new as $key => $value): ?>
              <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <!-- Block2 -->
                <div class="block2">
                  <div class="block2-img wrap-pic-w of-hidden pos-relative">
                    <img src="<?php echo base_url().$value['url_image'] ?>" alt="IMG-<?php echo $value['nama_produk'] ?>">

                    <div class="block2-overlay trans-0-4">
                      <div class="block2-btn-addcart w-size1 trans-0-4">
                        <!-- Button -->
                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                          Add to Cart
                        </button>
                      </div>
                    </div>
                  </div>

                  <div class="block2-txt p-t-20">
                    <a href="<?php echo site_url().'/detail_produk/detail/'.$value['id_produk'] ?>" class="block2-name dis-block s-text3 p-b-5">
                      Rp <?php echo $value['nama_produk'] ?>
                    </a>

                    <!-- <span class="block2-oldprice m-text7 p-r-5">
                      $29.50
                    </span> -->

                    <span class="block2-newprice m-text8 p-r-5">
                      <?php echo $value['harga_produk'] ?>
                    </span>
                  </div>
                </div>
              </div>
            <?php endforeach ?>

					</div>
				</div>
			</div>
</section>

<?php $this->load->view('partials/footer'); ?>
