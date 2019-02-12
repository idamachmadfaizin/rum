<?php $this->load->view('partials/header2'); ?>

<div class="container-fluid" style="margin-top:80px; background-color:#F3F3F1;">
  <?= form_open_multipart(site_url('change_password/update')); ?>
    <div class="row">
      
      <?php $this->load->view('partials/side_menu_customer'); ?>

      <div class="col-9">
        <div class="bg-white nav-bar-right-white shadow1">
          <p class="text-black text-18 mb-1 font-weight-bold">Change Password</p>
          <p class="text-12">Perbarui password akun anda untuk mengontrol, melindungi, dan mengamankan akun</p>

          <hr>

          <?php if(validation_errors()): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?= validation_errors(); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>

          <?php if ($this->session->flashdata('updated')):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?= $this->session->flashdata('updated'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>

          <div class="row">
            <div class="col-3">
              <div class="d-flex align-items-center justify-content-end text-secondary d-block-h-45">New Password</div>
              <div class="d-flex align-items-center justify-content-end text-secondary d-block-h-45">Password Confirmation</div>
              <div class="d-flex align-items-center justify-content-end text-secondary d-block-h-45"></div>
              <div class="d-flex align-items-center justify-content-end text-secondary d-block-h-45">Old Password</div>
            </div>

            <div class="col-9">
              <div class="d-flex align-items-center d-block-h-45">
                <input type="password" name="newpass" id="newpass" placeholder="New Password" class="form-control form-control-sm">
              </div>
              <div class="d-flex align-items-center d-block-h-45">
                <input type="password" name="passconf" id="passconf" placeholder="Password Confirmation" class="form-control form-control-sm">
              </div>
              <div class="d-flex align-items-center d-block-h-45"></div>
              <div class="d-flex align-items-center d-block-h-45">
                <input type="password" name="oldpass" id="oldpass" placeholder="Old Password" class="form-control form-control-sm">
              </div>
              <div class="d-flex align-items-center d-block-h-45">
                <!-- <button type="submit" class="btn btn-primary border-0 d-block-w-100" style="background-color: #3D2577">SAVE</button> -->
                <input type="submit" value="SAVE" class="btn btn-primary border-0 d-block-w-100" style="background-color: #3D2577">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?= form_close() ?>
</div>

<?php $this->load->view('partials/footer'); ?>