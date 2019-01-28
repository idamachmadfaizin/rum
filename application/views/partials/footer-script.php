<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
 crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
 crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
 crossorigin="anonymous"></script>


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
<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
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

	$('.btn-addcart-product-detail').each(function () {
		var nameProduct = $('.product-detail-name').html();
		$(this).on('click', function () {
			swal(nameProduct, "is added to cart !", "success");
		});
	});

</script>

<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url();?>/assets/fashe/vendor/noui/nouislider.min.js"></script>
<script type="text/javascript">
	/*[ No ui ]
	    ===========================================================*/
	var filterBar = document.getElementById('filter-bar');

	noUiSlider.create(filterBar, {
		start: [20, 500],
		connect: true,
		range: {
			'min': 20,
			'max': 500
		}
	});

	var skipValues = [
		document.getElementById('value-lower'),
		document.getElementById('value-upper')
	];

	filterBar.noUiSlider.on('update', function (values, handle) {
		skipValues[handle].innerHTML = Math.round(values[handle]);
	});

</script>
<!--================================================================================-->
<script src="<?php echo base_url()?>assets/fashe/js/main.js"></script>
