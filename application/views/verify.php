<?php $this->load->view('partials/header2'); ?>

<div class="container p-t-100">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verify Your Email Address</div>

                <div class="card-body">
                    <!-- session'resent'
                    <div class="alert alert-success" role="alert">
                        A fresh verification link has been sent to your email address.
                    </div> -->

                    <?= $message ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('partials/footer-script'); ?>

</body>

</html>