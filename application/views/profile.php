<?php $this->load->view('partials/header2'); ?>

<div class="container-fluid" style="margin-top:80px; background-color:#F3F3F1;">
  <?= form_open_multipart(); ?>
    <div class="row">
      
      <?php $this->load->view('partials/side_menu_customer'); ?>

      <div class="col-9">
        <div class="bg-white nav-bar-right-white shadow1">
          <p class="text-black text-18 mb-1 font-weight-bold">My Profile</p>
          <p class="text-12">Kelola informasi profil anda untuk mengontrol, melindungi, dan mengamankan akun</p>

          <hr>

          <div class="row justify-content-end mt-30">
            <div class="col-9">
              <img src="<?= base_url()."assets/img/icons/profile.png"?>" class="rounded-circle float-left size-50" alt="IMG-Profile">
              
              <div class="form-group float-left ml-4 input-image-profile">
                <input type="file" name="image-profile" id="image-profile"><br>
                <label for="image-profile" class="text-secondary text-12">Max size: 1 MB.   Format: *JPG, *PNG</label>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-3">
              <div class="d-flex align-items-center justify-content-end text-secondary d-block-h-45">Email</div>
              <div class="d-flex align-items-center justify-content-end text-secondary d-block-h-45">Nomor Telepon</div>
              <div class="d-flex align-items-center justify-content-end text-secondary d-block-h-45">Nama Lengkap</div>
              <div class="d-flex align-items-center justify-content-end text-secondary d-block-h-45">Jenis Kelamin</div>
              <div class="d-flex align-items-center justify-content-end text-secondary d-block-h-45">Tanggal Lahir</div>
            </div>

            <div class="col-9">
              <div class="d-flex align-items-center d-block-h-45">
                <div class="text-dark">customer3@gmail.com</div>
              </div>
              <div class="d-flex align-items-center d-block-h-45">
                <input type="tel" name="telp" id="telp" value="<?php ?>" placeholder="Telephone" class="form-control form-control-sm">
              </div>
              <div class="d-flex align-items-center d-block-h-45">
                <input type="text" name="nama" id="nama" value="<?php ?>" placeholder="Nama Lengkap" class="form-control form-control-sm">
              </div>
              <div class="d-flex align-items-center d-block-h-45">
                <label class="custom-radio">Pria
                  <input type="radio" name="jenis_kelamin" value="Pria">
                  <span class="checkmark"></span>
                </label>
                <label class="custom-radio ml-3">Wanita
                  <input type="radio" name="jenis_kelamin" value="Wanita">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="d-flex align-items-center d-block-h-45">
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control form-control-sm">
              </div>
              <div class="d-flex align-items-center d-block-h-45">
                <button type="submit" class="btn btn-primary border-0 d-block-w-100" style="background-color: #3D2577">SAVE</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?= form_close() ?>
</div>

<?php $this->load->view('partials/footer'); ?>