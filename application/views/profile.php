<?php $this->load->view('partials/header2'); ?>

<div class="container-fluid" style="margin-top:80px; background-color:#F3F3F1;">
  <?= form_open_multipart(site_url('profile/update')); ?>
    <div class="row">
      
      <?php $this->load->view('partials/side_menu_customer'); ?>

      <div class="col-9">
        <div class="bg-white nav-bar-right-white shadow1">
          <p class="text-black text-18 mb-1 font-weight-bold">My Profile</p>
          <p class="text-12">Kelola informasi profil anda untuk mengontrol, melindungi, dan mengamankan akun</p>

          <hr>
          
          <?php if(validation_errors()): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?= validation_errors(); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>
          
          <?php if($this->session->flashdata('updated')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?= $this->session->flashdata('updated'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>
          
          <div class="row justify-content-end mt-30">
            <div class="col-9">
              <img src="<?= base_url()."upload/profile/".$profile->url_img_customer; ?>" class="rounded-circle float-left size-50" alt="IMG-Profile">
              
              <div class="form-group float-left ml-4 input-image-profile">
                <!-- <input type="file" name="image-profile" id="image-profile"><br> -->
                <?= form_upload('userfile', set_value('userfile')); ?><br>
                <label for="userfile" class="text-secondary text-12">Max size: 1 MB.   Format: *JPG, *PNG</label>
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
              <div class="d-flex align-items-center justify-content-end text-secondary d-block-h-45">Agama</div>
              <div class="d-flex align-items-center justify-content-end text-secondary d-block-h-45">Pendidikan</div>
              <div class="d-flex align-items-center justify-content-end text-secondary d-block-h-45">Address</div>
            </div>

            <div class="col-9">
              <div class="d-flex align-items-center d-block-h-45">
                <div class="text-dark"><?= $profile->email_customer; ?></div>
              </div>
              <div class="d-flex align-items-center d-block-h-45">
                <input type="tel" name="telp" id="telp" value="<?= $profile->nomor_telp; ?>" placeholder="Telephone" class="form-control form-control-sm">
              </div>
              <div class="d-flex align-items-center d-block-h-45">
                <input type="text" name="nama" id="nama" value="<?= $profile->nama_customer; ?>" placeholder="Nama Lengkap" class="form-control form-control-sm">
              </div>
              <div class="d-flex align-items-center d-block-h-45">
                <label class="custom-radio">Pria
                  <input type="radio" <?php if($profile->jenis_kelamin == "Pria") echo "checked"; ?> name="jenis_kelamin" value="Pria">
                  <span class="checkmark"></span>
                </label>
                <label class="custom-radio ml-3">Wanita
                  <input type="radio" <?php if($profile->jenis_kelamin == "Wanita") echo "checked"; ?> name="jenis_kelamin" value="Wanita">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="d-flex align-items-center d-block-h-45">
                <input type="date" name="tanggal_lahir" value="<?= $profile->tanggal_lahir; ?>" id="tanggal_lahir" class="form-control form-control-sm">
              </div>
              <div class="d-flex align-items-center d-block-h-45">
                <select name="agama" id="agama" class="form-control form-control-sm">
                    <option value="">Agama</option>
                  <?php foreach($agamas as $agama): ?>
                    <option value="<?= $agama->id_agama ?>" <?php if ($profile->id_agama == $agama->id_agama) echo "selected"; ?> ><?= $agama->nama_agama ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="d-flex align-items-center d-block-h-45">
                <select name="pendidikan" id="pendidikan" class="form-control form-control-sm">
                    <option value="">Pendidikan</option>
                  <?php foreach($pendidikans as $pendidikan): ?>
                    <option value="<?= $pendidikan->id_pendidikan ?>" <?php if ($profile->id_pendidikan == $pendidikan->id_pendidikan) echo "selected"; ?> ><?= $pendidikan->nama_pendidikan ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="d-flex align-items-center d-block-h-45">
                <select name="provinsi" id="provinsi" class="form-control form-control-sm">
                    <option value="">Provinsi</option>
                  <?php foreach($provinsis as $provinsi): ?>
                    <option value="<?= $provinsi->id_provinsi ?>" <?php if ($profile->provinsi == $provinsi->id_provinsi) echo "selected"; ?> ><?= $provinsi->nama_provinsi ?></option>
                  <?php endforeach ?>
                </select>
                <select name="kabupaten" id="kabupaten" class="form-control form-control-sm">
                    <option value="">Kabupaten</option>
                  <?php foreach($kabupatens as $kabupaten): ?>
                    <option value="<?= $kabupaten->id_kabupaten ?>" <?php if ($profile->kabupaten == $kabupaten->id_kabupaten) echo "selected"; ?> ><?= $kabupaten->nama_kabupaten ?></option>
                  <?php endforeach ?>
                </select>
                <select name="kota" id="kota" class="form-control form-control-sm">
                    <option value="">Kota</option>
                  <?php foreach($kotas as $kota): ?>
                    <option value="<?= $kota->id_kota ?>" <?php if ($profile->kota == $kota->id_kota) echo "selected"; ?> ><?= $kota->nama_kota ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="d-flex align-items-center d-block-h-45">
                <input type="text" name="address" id="address" value="<?= $profile->address; ?>" placeholder="1234 Main St" class="form-control form-control-sm">
              </div>
              <div class="d-flex align-items-center d-block-h-45">
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