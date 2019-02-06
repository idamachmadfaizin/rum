<?php $this->load->view('partials/header2'); ?>

<div class="d-flex align-items-center" style="margin-top:80px; height:498px;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-3"></div>

      <!-- start -->
      <div class="col-lg-6">
        <?= form_open(); ?>  
          <div class="form-group">
            <div class="row">
              <div class="col-1"></div>
              <div class="col-11">
                <?php if(validation_errors()): ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= validation_errors(); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('message')):?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
              
                <span class="font-weight-bold">Registration with email</span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-1">
                <span style="padding: 11px 0px;" class="d-flex justify-content-center">
                  <i class="fa fa-envelope"></i>
                </span>  
              </div>
              <div class="col-11">
                <input type="email" name="email" value="<?= set_value('email')?>" placeholder="Email" class="form-control">
              </div>
            </div>
          </div>          

          <div class="form-group">
            <div class="row">
              <div class="col-1">
                <span style="padding: 11px 0px;" class="d-flex justify-content-center">
                  <i class="fas fa-phone"></i>
                </span>  
              </div>
              <div class="col-11">
                <input type="tel" name="telp" value="<?= set_value('telp')?>" placeholder="Telephone" class="form-control">
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="row">
              <div class="col-1">
                <span style="padding: 11px 0px;" class="d-flex justify-content-center">
                  <i class="fas fa-lock"></i>
                </span>  
              </div>
              <div class="col-11">
                <input type="password" name="password" placeholder="Password" class="form-control">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-1">
                <span style="padding: 11px 0px;" class="d-flex justify-content-center">
                </span>  
              </div>
              <div class="col-11">
                <input type="password" name="passconf" placeholder="Password Confirmation" class="form-control">
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="row">
              <div class="col-1"></div>
              <div class="col-11">
              <button type="submit" class="btn btn-danger btn-block">Register</button>
              </div>
            </div>
          </div>
        <?= form_close() ?>
      </div>
      <div class="col-3"></div>
    </div> <!-- end row -->
  </div> <!-- End container -->
</div>

<div class="fixed-bottom">
  <a href="<?= site_url()?>/register">
    <button class="btn btn-light btn-block" style="height: 60px;">Login</button>
  </a> 
</div>

<?php $this->load->view('partials/footer-script'); ?>

</body>
</html>