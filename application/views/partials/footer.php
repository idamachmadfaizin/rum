<footer class="bg-gray" style="margin-top: 50px;">
	<div class="container">
		<div class="row" style="padding-bottom: 50px;">
			<div class="col-sm-5 row-footer">
				<h6><b>GET IN TOUCH</b></h6>
				<br>
				<p>Lorem Ipsum is simply dummy text of the printing <br>and typesetting industry.</p>
				<i class="fab fa-facebook-f"></i>
				<i class="fab fa-instagram" style="margin-left:20px;"></i>
				<i class="fab fa-twitter" style="margin-left:20px;"></i>
			</div>
			<div class="col-sm-2 row-footer">
				<h6><b>MY ACCOUNT</b></h6>
				<br>
				<p><a href="#" class="nounderline">My Account</a></p>
				<p><a href="#" class="nounderline">Order History</a></p>
				<p><a href="#" class="nounderline">Wishlist</a></p>
			</div>
			<div class="col-sm-2 row-footer">
				<h6><b>PAYMENT</b></h6>
				<br>
				<img src="<?php echo base_url();?>/assets/img/logos/Logo-BCA.png" alt="">
				<br>
				<br>
				<img src="<?php echo base_url();?>/assets/img/logos/Logo-JNE.png" alt="">
			</div>
			<div class="col-sm-3 row-footer">
				<h6><b>CONTACT</b></h6>
				<br>
				<ul class="list-unstyled">
					<li style="margin-bottom: 10px;">
						<div class="d-flex justify-content-center contact-box-icon">
							<i class="fas fa-map-marker-alt contact"></i>
						</div>
						<span>Swan Regency - Sidoarjo</span>
					</li>
					<li style="margin-bottom: 10px;">
						<div class="d-flex justify-content-center contact-box-icon">
							<i class="fas fa-phone contact"></i>
						</div>
						<span>082123456789</span>
					</li>
					<li style="margin-bottom: 10px;">
						<div class="d-flex justify-content-center contact-box-icon">
							<i class="fas fa-envelope contact"></i>
						</div>
						<span>Rumseafood@gmail.com</span>
					</li>
					<li style="margin-bottom: 10px;">
						<div class="d-flex justify-content-center contact-box-icon">
							<i class="fas fa-info contact"></i>
						</div>
						<span>About Us</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
 crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
 crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
 crossorigin="anonymous"></script>


<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</span>
</div>

<!-- Container Selection -->
<div id="dropDownSelect1"></div>
<div id="dropDownSelect2"></div>



<!--================================================================================-->
<script type="text/javascript" src="<?php echo base_url()?>assets/fashe/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--================================================================================-->
<script type="text/javascript" src="<?php echo base_url()?>assets/fashe/vendor/animsition/js/animsition.min.js"></script>
<!--================================================================================-->
<script type="text/javascript" src="<?php echo base_url()?>assets/fashe/vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/fashe/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--================================================================================-->
<script type="text/javascript" src="<?php echo base_url()?>assets/fashe/vendor/select2/select2.min.js"></script>
<script type="text/javascript">
	$(".selection-1").select2({
		minimumResultsForSearch: 20,
		dropdownParent: $('#dropDownSelect1')
	});

	$(".selection-2").select2({
		minimumResultsForSearch: 20,
		dropdownParent: $('#dropDownSelect2')
	});

</script>
<!--================================================================================-->
<script type="text/javascript" src="<?php echo base_url()?>assets/fashe/vendor/slick/slick.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/fashe/js/slick-custom.js"></script>
<!--================================================================================-->
<script type="text/javascript" src="<?php echo base_url()?>assets/fashe/vendor/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
	$('.block2-btn-addcart').each(function () {
		var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
		$(this).on('click', function () {
			swal(nameProduct, "is added to cart !", "success");
		});
	});

	$('.block2-btn-addwishlist').each(function () {
		var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
		$(this).on('click', function () {
			swal(nameProduct, "is added to wishlist !", "success");
		});
	});

	$('.btn-addcart-product-detail').each(function () {
		var nameProduct = $('.product-detail-name').html();
		$(this).on('click', function () {
			swal(nameProduct, "is added to wishlist !", "success");
		});
	});

</script>

<!--================================================================================-->
<script src="<?php echo base_url()?>assets/fashe/js/main.js"></script>
</body>
</html>