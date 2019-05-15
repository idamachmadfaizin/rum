<?php
$CI =& get_instance();

$CI->load->model('cart_model');

$cart = $CI->cart_model->get_cart();
$data['cart'] = $cart;

$grand_total = $CI->cart_model->grand_total();
$data['grand_total'] = $grand_total->row_array();

$num_notif = $CI->cart_model->count();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>RUM Seafood</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('partials/header-css'); ?>
</head>
<body class="animsition">

	<!-- header fixed -->
	<div class="wrap_header fixed-header2 trans-0-4">
		<!-- Logo -->
		<a href="<?= base_url() ?>" class="logorum">
			<img src="<?php echo base_url()?>assets/img/logos/logo_Rumseafood.png" alt="IMG-LOGO">
		</a>

		<!-- Menu -->
		<div class="wrap_menu">
			<nav class="menu">
				<ul class="main_menu">
					<li>
						<a href="<?php echo base_url()?>">Home</a>
					</li>

					<li>
						<a href="<?php echo site_url('produk') ?>">Product</a>
					</li>

					<li>
						<a href="<?php echo site_url('about') ?>">About</a>
					</li>

					<!-- <li>
						<a href="<?php //echo site_url('contact') ?>">Contact</a>
					</li> -->
				</ul>
			</nav>
		</div>

		<!-- Header Icon -->
		<div class="header-icons">
			<?php if($this->session->id_customer): ?>
				<a href="<?= site_url()."/profile"?>" class="header-wrapicon1 dis-block">
					<img src="<?php echo base_url()?>assets/fashe/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
				</a>
				
				<span class="linedivide1"></span>
			<?php endif; ?>

			<div class="header-wrapicon1">
				<img src="<?php echo base_url()?>assets/fashe/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
				<span class="header-icons-noti"><?= $num_notif ?></span>

				<!-- Header cart noti -->
				<?php if($this->session->id_customer): ?>
				<div class="header-cart header-dropdown">
					<ul class="header-cart-wrapitem">
					<?php foreach($cart as $carts): ?>
						<li class="header-cart-item">
							<div class="header-cart-item-img">
								<img src="<?php echo base_url('assets/img/produk/'.$carts->url_image)?>" alt="IMG">
							</div>

							<div class="header-cart-item-txt">
								<a href="<?= site_url().'/detail_produk/detail/'.$carts->id_produk ?>" class="header-cart-item-name">
									<?php echo $carts->nama_produk?>
								</a>

								<span class="header-cart-item-info">
									<?= $carts->qty_cart?> x <?= $carts->harga_produk?>
								</span>
							</div>
						</li>
					<?php endforeach ?>
					</ul>

					<div class="header-cart-total">
						Total: RP <?= $data['grand_total']['grand_total'] ?>
					</div>

					<div class="header-cart-buttons">
						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="<?= site_url().'/cart' ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								View Cart
							</a>
						</div>

						<div class="header-cart-wrapbtn">
							<!-- Bookmark -->
							<!-- Button -->
							<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								Check Out
							</a>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
			
			<?php if($this->session->id_customer): ?>
				<span class="linedivide1"></span>
				
				<a href="<?= site_url()."/logout"?>" class="header-wrapicon2 dis-block">
					<img src="<?php echo base_url('assets/fashe/images/icons/icon-signout.png')?>" class="header-icon1" alt="ICON">
				</a>
			<?php else: ?>
				<span class="linedivide1"></span>
				
				<a href="<?= site_url()."/login"?>" class="header-wrapicon2 dis-block">
					<img src="<?php echo base_url('assets/fashe/images/icons/icon-signin.png')?>" class="header-icon1" alt="ICON">
				</a>
			<?php endif; ?>

		</div>
	</div>

	<!-- Header -->
	<header class="header2">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="wrap_header">
				<!-- Logo -->
				<a href="<?= base_url() ?>" class="logorum">
					<img src="<?php echo base_url('assets/img/logos/logo_Rumseafood.png')?>" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="<?php echo base_url()?>">Home</a>
							</li>

							<li>
								<a href="<?php echo site_url('produk') ?>">Product</a>
							</li>

							<li>
								<a href="<?php echo site_url('about') ?>">About</a>
							</li>

							<!-- <li>
								<a href="<?php //echo site_url('contact') ?>">Contact</a>
							</li> -->
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					
					<?php if($this->session->id_customer): ?>
						<a href="<?= site_url()."/profile"?>" class="header-wrapicon1 dis-block">
							<img src="<?php echo base_url('assets/fashe/images/icons/icon-header-01.png')?>" class="header-icon1" alt="ICON">
						</a>

						<span class="linedivide1"></span>
					<?php endif; ?>


					<div class="header-wrapicon2">
						<img src="<?php echo base_url('assets/fashe/images/icons/icon-header-02.png')?>" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti"><?= $num_notif ?></span>

						<?php if($this->session->id_customer): ?>
						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
							<?php foreach($cart as $carts): ?>
								<li class="header-cart-item">
									<div class="header-cart-item-img cover">
										<!-- <img src="<?php //echo base_url('assets/fashe/images/item-cart-01.jpg')?>" alt="IMG"> -->
										<img src="<?php echo base_url('assets/img/produk/'.$carts->url_image)?>" alt="IMG" style="width:'320px'; height:'320px'">
									</div>

									<div class="header-cart-item-txt">
										<a href="<?= site_url().'/detail_produk/detail/'.$carts->id_produk ?>" class="header-cart-item-name">
										<?php echo $carts->nama_produk ?>
										</a>

										<span class="header-cart-item-info">
										<?= $carts->qty_cart ?> x <?= $carts->harga_produk ?>
										</span>
									</div>
								</li>
							<?php endforeach ?>
							</ul>

							<div class="header-cart-total">
							Total: RP <?= $data['grand_total']['grand_total'] ?>
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="<?= site_url().'/cart' ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Bookmark -->
									<!-- Button -->
									<a href="<?= site_url().'/checkout'?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
						<?php endif; ?>
					</div>

					
					<?php if($this->session->id_customer): ?>
						<span class="linedivide1"></span>
						
						<a href="<?= site_url()."/logout"?>" class="header-wrapicon2 dis-block">
							<img src="<?php echo base_url()?>assets/fashe/images/icons/icon-signout.png" class="header-icon1" alt="ICON">
						</a>
					<?php else: ?>
						<span class="linedivide1"></span>

						<a href="<?= site_url()."/login"?>" class="header-wrapicon2 dis-block">
							<img src="<?php echo base_url()?>assets/fashe/images/icons/icon-signin.png" class="header-icon1" alt="ICON">
						</a>
					<?php endif; ?>
					
				</div>
			</div>
		</div>

		<!-- ABAIKAN HEADER MOBILE -->
		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.html" class="logo-mobile">
				<img src="<?php echo base_url()?>assets/img/logos/logo_Rumseafood.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="<?php echo base_url()?>assets/fashe/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="<?php echo base_url()?>assets/fashe/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti"><?= $num_notif ?></span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
							<?php foreach($cart as $carts): ?>
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo base_url()?>assets/fashe/images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="<?= site_url().'/detail_produk/detail/'.$carts->id_produk ?>" class="header-cart-item-name">
											<?php echo $carts->nama_produk ?>
										</a>

										<span class="header-cart-item-info">
											<?= $carts->qty_cart ?> x <?= $carts->harga_produk ?>
										</span>
									</div>
								</li>
							<?php endforeach?>
							</ul>

							<div class="header-cart-total">
							Total: RP <?= $data['grand_total']['grand_total'] ?>
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="<?= site_url().'/cart' ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-menu-mobile">
						<a href="index.html">Home</a>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="product.html">Shop</a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.html">Sale</a>
					</li>

					<li class="item-menu-mobile">
						<a href="cart.html">Features</a>
					</li>

					<li class="item-menu-mobile">
						<a href="blog.html">Blog</a>
					</li>

					<li class="item-menu-mobile">
						<a href="about.html">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>