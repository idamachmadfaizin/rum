<?php $this->load->view('partials/header2'); ?>

<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m slide" style="background-image: url(<?php echo base_url('assets/fashe/images/banner_carousel_product.jpg') ?>);">
	<!-- <h2 class="l-text2 t-center">CHECKOUT</h2> -->
</section>

<div class="container mt-70 m-b-103">
  <div class="row mx-1">
    <div class="col border-2">
      <div class="p-3">
        <div class="row">
          <div class="col text-rum">
            <i class="fas fa-map-marker-alt"></i>
            <span>
              Shipping Address
            </span>
          </div>
        </div>
        <div class="row mt-1">
          <div class="col-3">
            <div class="col-12 p-0"><?= $profile->nama_customer; ?></div>
            <div class="col-12 p-0"><?= $profile->nomor_telp; ?></div>
          </div>
          <div class="col-6">
            <!-- <span>Raya Kedung Baruk No.98, Kedung Baruk, Rungkut, Kota SBY, Jawa Timur 60298</span> -->
            <span><?= $profile->address; ?></span>
          </div>
          <div class="col-3 text-right">
            <a href="<?= site_url()."/profile"?>" class="font-weight-bold text-rum">CHANGE</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col">
      <div class="mt-40">
        <? // form_open(site_url().'/cart/update') ?>
          <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
              <table id="detail_cart" class="table table-shopping-cart mb-0">
                <thead  class="thead-light">
                  <tr class="table-head">
                    <th scope="col-2"></th>
                    <th scope="col-3">Product</th>
                    <th scope="col-2">Price</th>
                    <th scope="col-2">Quantity</th>
                    <th scope="col-3">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($carts as $cart): ?>
                    <tr>
                      <td>
                        <div class="table-img-product mx-auto">
                          <img src="<?= base_url('assets/img/produk/'.$cart->url_image)?>" alt="IMG-">
                        </div>
                      </td>
                      <td><?= $cart->nama_produk; ?></td>
                      <td>RP <?= $cart->harga_produk ?></td>
                      <td>
                        <span><?= $cart->qty_cart; ?></span>
                      </td>
                      <td>RP <?= $cart->total_harga_produk; ?></td>
                    </tr>
                  <?php endforeach; ?>
                  <tr class="table-head thead-light">
                    <th scope="col-2"></th>
                    <th scope="col-3"></th>
                    <th scope="col-2"></th>
                    <th scope="col-2">GRAND TOTAL</th>
                    <th scope="col-3">Rp <?= $grand_total->grand_total; ?></th>
                  </tr>
                </tbody>
                <!-- <thead  class="thead-light"> -->
                <!-- </thead> -->
              </table>
            </div>
          </div>
        <? // form_close(); ?>
      </div>
    </div>
  </div>

  <div class="row mx-1 mt-40">
    <div class="col border-2">
      <div class="p-3">
        <div class="row">
          <div class="col text-rum">
            <i class="fas fa-credit-card"></i>
            <span>
              Payment Method
            </span>
          </div>
        </div>
        <div class="row m-t-20">
          <div class="col-5">
            <img src="<?= base_url().'assets\img\logos\Logo-BCA-Big.png'?>" alt="logo-BCA" width="70px" class="py-3 m-r-32" style="float:left;">
            <!-- <img src="<? //base_url().'assets\img\logos\Logo-BCA-Big.png'?>" alt="Logo-BCA"> -->
            <span>Bank BCA (Manually Checked)</span>
            <p style="font-size:12px;">Accept transfer from all banks</p>
          </div>
          <div class="col-4">
            <span>1500760910 <br> a/n Rum Seafood</span>
          </div>
          <div class="col-3 text-right">
            <p style="font-size:14px;">Need to upload proof of transfer</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row m-t-10">
    <div class="col-12 d-flex justify-content-end">
      <div class="size10 trans-0-4 m-t-10 m-b-10">
        <!-- <a href="" class="nounderline"> -->
          <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" onclick="location.href='<?= site_url().'/checkout/makeorder/' ;?>'">
            MAKE ORDER
          </button>
        <!-- </a> -->
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('partials/footer'); ?>