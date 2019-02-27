<?php $this->load->view('partials/header2'); ?>

<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m slide" style="background-image: url(<?php echo base_url() ?>assets/fashe/images/heading-pages-01.jpg);">
	<h2 class="l-text2 t-center">
		PAYMENT CONFIRMATION
	</h2>
</section>

<div class="container mt-70 m-b-103">
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="dis-block border-2 p-5">
        <?= form_open_multipart(); ?>
          <div class="text-rum">
            <i class="fas fa-credit-card"></i>
            <span class="p-l-15">Payment Detail</span>
          </div>
          <div class="form-group row p-l-37">
            <label for="noinvoice" class="col-sm-5 col-form-label">No. Invoice</label>
            <div class="col-sm-7">
              <select name="noinvoice" id="noinvoice" class="custom-select custom-select-sm">
                <option selected>Choose</option>
                <option value="Idam">Idam</option>
              </select>
              <!-- <input type="text" name="noinvoice" id="noinvoice" value="<?php ?>" placeholder="No Invoice" class="form-control form-control-sm"> -->
            </div>
          </div>
          <div class="form-group row p-l-37">
            <label for="noinvoice" class="col-sm-5 col-form-label">No. Rekening Tujuan</label>
            <div class="col-sm-7">
              <input type="text" name="noinvoice" id="noinvoice" value="<?php ?>" placeholder="BCA 1500760910 a/n Rum Seafood" class="form-control form-control-sm" disabled>
            </div>
          </div>
          <div class="form-group row p-l-37">
            <label for="noinvoice" class="col-sm-5 col-form-label">Total Pembayaran</label>
            <div class="col-sm-7">
              <input type="text" name="noinvoice" id="noinvoice" value="<?php ?>" placeholder="<?php ?>" class="form-control form-control-sm" disabled>
            </div>
          </div>
          <div class="form-group row p-l-37">
            <label for="noinvoice" class="col-sm-5 col-form-label">Tanggal Transfer</label>
            <div class="col-sm-7">
              <input type="date" name="noinvoice" id="noinvoice" value="<?php ?>" placeholder="No Invoice" class="form-control form-control-sm">
            </div>
          </div>
          <div class="form-group row p-l-37">
            <label for="noinvoice" class="col-sm-5 col-form-label">Bukti Transfer</label>
            <div class="col-sm-7 input-image-profile">
              <?= form_upload('buktitf', set_value('buktitf')) ?>
            </div>
          </div>

          <div class="text-rum">
            <i class="fas fa-university"></i>            <span class="p-l-15">Customer Bank Details</span>
          </div>
          <div class="form-group row p-l-37">
            <label for="noinvoice" class="col-sm-5 col-form-label">Bank Name</label>
            <div class="col-sm-7">
              <input type="text" name="bankname" id="bankname" value="<?php ?>" placeholder="BCA" class="form-control form-control-sm">
            </div>
          </div>
          <div class="form-group row p-l-37">
            <label for="noinvoice" class="col-sm-5 col-form-label">Name of Bank Owner</label>
            <div class="col-sm-7">
              <input type="text" name="bankowner" id="bankowner" value="<?php ?>" placeholder="" class="form-control form-control-sm">
            </div>
          </div>
          <div class="form-group row p-l-37">
            <label for="noinvoice" class="col-sm-5 col-form-label">Note</label>
            <div class="col-sm-7">
              <textarea name="note" id="note" class="form-control"></textarea>
            </div>
          </div>

          <div class="col-12 d-flex justify-content-end">
            <div class="size10 trans-0-4 m-t-10 m-b-10">
              <!-- <a href="" class="nounderline"> -->
                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" onclick="location.href='<?= site_url().'/order_received';?>'">
                  CONFIRM
                </button>
              <!-- </a> -->
            </div>
          </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('partials/footer'); ?>