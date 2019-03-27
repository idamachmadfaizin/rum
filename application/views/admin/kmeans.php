<?php $this->load->view('partials/header_admin'); ?>
<!-- Content -->
<div class="content">
	<!-- Animated -->
	<div class="animated fadeIn">
    <div class="row justify-content-center">
      <div class="col-md-12 col-lg-6">
        <div class="card">
          <div class="card-header">
            <strong>Form Add K-means Variable</strong>
          </div>

          <!-- Dipartial wae -->
          <?= form_open(site_url('admin/kmeans/insertUpdate')) ?>
          <!-- <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal"> -->
            <div class="card-body card-block">
              <div class="row">
                <div class="col col-md-12">
                  <div class="form-group">
                    <!-- <label type="hidden"for="id_kmeans" class="form-control-label invisible">Id Kmeans</label> -->
                    <input type="hidden" name="id_kmeans" id="kmeans" value="<?php if(!empty($singleNama)){ echo $singleNama[0]->id_kmeans;} ?>" class="form-control">
                    <label for="nama_variable" class="form-control-label">Nama Variable</label>
                    <input type="text" name="nama_variable" id="nama_variable" value="<?php if(!empty($singleNama)){ echo $singleNama[0]->nama_variable;} ?>" class="form-control">
                  </div>
                </div>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
              </button>
              <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
              </button>
            </div>
          <?= form_close(); ?>
        </div>
      </div>
      <!-- .end col-md-12 col-lg-6 -->
      <div class="col-md-12 col-lg-6 orders">
        <div class="row">
          <div class="col-xl-12">
            <div class="card">
              <div class="card-body">
                <h4 class="box-title">List K-means Variable</h4>
              </div>
              <div class="card-body--">
                <div class="table-stats order-table ov-h">
                  <table class="table ">
                    <thead>
                      <tr>
                        <th class="serial">#</th>
                        <th>Variable</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $num = 1 ?>
                      <?php foreach($kmeans as $kmeans): ?>
                        <tr>
                          <td class="serial"><?= $num ?></td>
                          <td> <span><?= $kmeans->nama_variable ?></span> </td>
                          <td>
                            <a href="<?= site_url('admin/kmeans/index/').$kmeans->id_kmeans ?>" class="btn p-0"><i class="fas fa-pen-square color-success font-16"></i></a> <!-- btn Edit -->
                            <a href="<?= site_url('admin/kmeans/delete/').$kmeans->id_kmeans ?>" class="btn p-0" onclick="return confirm('Hapus data?')"><i class="fa fa-minus-square color-danger font-16"></i></a> <!-- btn Hapus -->
                          </td>
                        </tr>
                        <?php $num++ ?>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                  <hr>
                </div> <!-- /.table-stats -->
              </div>
            </div> <!-- /.card -->
          </div> <!-- /.col-lg-8 -->
        </div>
      </div>
      <!-- /.orders -->
    </div>


    <span id="result"></span>
    <!-- Detail Kmeans -->
    <div class="orders">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
              <h4 class="box-title">Detail Kmeans</h4>
            </div>
            <div class="card-body--" id="live_data"></div>
          </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->
      </div>
    </div>
    <!-- /.orders -->

	</div>
	<!-- .animated -->
</div>
<!-- /.content -->

<div class="clearfix"></div>

<?php $this->load->view('partials/footer_admin'); ?>

<script>

$(document).ready(function(){
  function fetch_data()  
  {
    $.ajax({
      url:"<?= site_url('admin/kmeans/detailKmeans')?>",
      method:"POST",
      success:function(data){
        $('#live_data').html(data);
      }
    });
  }

  fetch_data();

  function edit_data(id, text) {
  	$.ajax({
  		url: "<?= site_url('admin/kmeans/editDetailKmeans')?>",
  		method: "POST",
  		data: {
  			id: id,
  			text: text
  		},
  		dataType: "text",
  		success: function (data) {
  			//alert(data);
  			$('#result').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>"+data+"</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
  		}
  	});
  }

  $(document).on('blur', '.nilai', function(){
    var id = $(this).data("id1");
    var nilai = $(this).text();
    edit_data(id, nilai);
  });
})

</script>