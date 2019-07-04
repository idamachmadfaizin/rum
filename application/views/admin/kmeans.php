<?php $this->load->view('partials/header_admin'); ?>
<!-- Content -->
<div class="content">
  <!-- Animated -->
  <div class="animated fadeIn">
    <div class="row justify-content-center">
      <div class="col-md-12 orders">
        <div class="row">
          <div class="col-xl-12">
            <div class="card">
              <div class="card-body">
                <h4 class="box-title">Cluster</h4>
              </div>
              <div class="card-body--">
                <div class="table-stats order-table ov-h">
                  <table class="table ">
                    <thead>
                      <tr>
                        <th class="serial">#</th>
                        <th>Group Cluster</th>
                        <th>Produk</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $num = 1 ?>
                      <?php foreach ($clusters as $cluster) : ?>
                        <tr>
                          <td class="serial"><?= $num ?></td>
                          <td> <span><?= $cluster->group_cluster ?></span> </td>
                          <td> <span><?= $cluster->nama_produk ?></span> </td>
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
            <div class="card-body--" id="live_data">
              <div class="table-stats order-table ov-h">
                <table class="table ">
                  <thead>
                    <tr>
                      <th class="serial">#</th>
                      <th>Nama Variable</th>
                      <th>Nama Produk</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($offset > 0) {
                      $num = $offset - 15;
                    } else {
                      $num = 0;
                    } ?>
                    <?php foreach ($dKmeans as $dKmeans) : ?>
                      <tr>
                        <?php if ($modulus % $rowspan == 0) : ?>
                          <?php $num++ ?>
                          <td rowspan="<?= $rowspan ?>" class="serial"><?= $num ?></td>
                        <?php endif ?>
                        <td class="nama_variable"><?= $dKmeans->nama_variable ?></td>
                        <td class="nama_produk"><?= $dKmeans->nama_produk ?></td>
                        <td class="nilai"><?= $dKmeans->nilai ?></td>
                      </tr>
                      <?php $modulus++ ?>
                    <?php endforeach ?>
                  </tbody>
                </table>
                <hr>
                <?php echo $this->pagination->create_links(); ?>
              </div> <!-- /.table-stats -->
            </div>
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
  $(document).ready(function() {
    function fetch_data() {
      $.ajax({
        url: "<?= site_url('admin/kmeans/detailKmeans') ?>",
        method: "POST",
        success: function(data) {
          $('#live_data').html(data);
        }
      });
    }

    fetch_data();

    function edit_data(id, text) {
      $.ajax({
        url: "<?= site_url('admin/kmeans/editDetailKmeans') ?>",
        method: "POST",
        data: {
          id: id,
          text: text
        },
        dataType: "text",
        success: function(data) {
          //alert(data);
          $('#result').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>" + data + "</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        }
      });
    }

    $(document).on('blur', '.nilai', function() {
      var id = $(this).data("id1");
      var nilai = $(this).text();
      edit_data(id, nilai);
    });
  })
</script>