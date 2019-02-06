<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="5; URL=javascript:window.open('http://blog.prehanto.com/','_blank');">
  <title>blog.prehanto.com</title>
  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
  <link rel="stylesheet" href="js/bootstrap.min.css">
  <link rel="stylesheet" href="js/bootstrapValidator.css">
  <link href="js/sweetalert.css" rel="stylesheet" type="text/css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="js/sweetalert.min.js"></script>                
  <script src="js/sweetalert-dev.js"></script>   
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrapValidator.js"></script>

  <style type="text/css">
  body { background-color:#fafafa;}
.container { margin:50px auto;}

.phAnimate {
  position: relative;
  padding-top: 20px;
  margin-bottom: 10px;
}

.phAnimate input { padding-left: 15px; }

.phAnimate label {
  cursor: text;
  margin: 0;
  padding: 0;
  left: 15px;
  top: 27px;
  position: absolute;
  font-size: 14px;
  color: #ccc;
  font-weight: normal;
  transition: all 0.3s ease;
}

.phAnimate label.active {
  top: 0;
  left: 0;
  font-size: 12px;
}
.sweet-alert{

  position: fixed;
  z-index: 999999;
}
.modal-content{
  margin-top: 20%;
}
.judul{
  font-family: 'Ubuntu Condensed', sans-serif;
  font-size: 46px;
  font-weight: 700;
}
.phAnimate label.active.focusIn { color: #66afe9; }
</style>
  </head>

  <body>
  <div id="jquery-script-menu">
<div class="jquery-script-center">
<ul>
</ul>
<h1 class="judul">blog.prehanto.com</h1>
</div>
  <div class="container">
              
                <div class="page-header">
                    <h3>Data Siswa</h3>
                </div>
                <a href="#" class="btn btn-primary" data-target="#barang" data-toggle="modal"><i class="fa fa-user-plus" aria-hidden="true"></i> Add</a>
                <br/>
                <br/> 
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <td style="width: 70px; background-color: orange"><b>NIM</b></td>
                                <td style="width: 120px; background-color: orange"><b>Nama</b></td>
                                <td style="width: 140px; background-color: orange"><b>Alamat</b></td>
                                <td style="width: 80px; background-color: orange"><b>Email</b></td>
                                <td style="width: 30px; background-color: orange"><b>Aksi</b></td>
                            </tr>
                        </thead>
                        <?php
                        include "koneksi.php";
                        $res = $mysqli->query("SELECT * FROM siswa");
                        while ($data = $res->fetch_assoc()):
                        ?>
                        <tbody>
                            <tr>
                               
                                <td><?php echo $data['nim'] ?></td>
                                <td><?php echo $data['nama'] ?></td>
                                <td><?php echo $data['alamat'] ?></td>
                                <td><?php echo $data['email'] ?></td>
                                <td>

                                    <a href="#" data-target="#open_modal" data-toggle="modal" class='btn btn-warning' id='<?php echo $data['id']; ?>'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="index.php?id=<?php echo $data['id'] ?>" class='btn btn-danger delete-link' ><i class="fa fa-trash-o" aria-hidden="true"></i>
                                </td>
                                
                            </tr>
                            <?php
                            endwhile;
                            ?>

                        </tbody>
                    </table>
                <?php
                include "koneksi.php";
                if(isset($_GET['id'])):
                     $stmt = $mysqli->prepare("DELETE FROM siswa WHERE id=?");
                     $stmt->bind_param('s', $id);
                 
                     $id = $_GET['id'];
                 
                     if($stmt->execute()):
                          echo "<script>location.href='index.php'</script>";
                     else:
                          echo "<script>alert('".$stmt->error."')</script>";
                     endif;
                endif;
                ?>

          <div class="modal fade" id="barang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Data Barang</h4>
                    </div>
                    <div class="modal-body">

                    <?php
                      include "koneksi.php";
                      if(isset($_POST['bts'])):
                           $stmt = $mysqli->prepare("INSERT INTO siswa(nim,nama,alamat,email) VALUES (?,?,?,?)");
                           $stmt->bind_param('ssss', $nim, $nama, $alamat, $email);
                       
                           $nim = $_POST['nim'];
                           $nama = $_POST['nama'];
                           $alamat = $_POST['alamat'];
                           $email = $_POST['email'];
                       
                           if($stmt->execute()):
                               
                                echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>" ;
                                echo '<meta http-equiv="Refresh" content="3; URL=index.php">';
                           else:
                                echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>" ;
                                echo '<meta http-equiv="Refresh" content="2; URL=index.php">';
                           endif;
                      endif;
                      ?>
                        <form action="index.php" class="form-horizontal" method="POST" id="form-save">
                        <div class="phAnimate">  
                        <label for="firstname">NIM</label>
                        <input type="text" name="nim" class="form-control" id="firstname">
                      </div>
                      <div class="phAnimate">
                        <label for="lastname">Nama</label>
                        <input type="text" name="nama" class="form-control" id="lastname">
                      </div>
                      <div class="phAnimate">
                        <label for="password">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="password" placeholder="Alamat">
                      </div>
                      <div class="phAnimate">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="email">
                      </div>
                 
                      <input type="submit" class="btn btn-primary" name="bts" value="save">      

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="open_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah</h4>
                    </div>
                    <div class="modal-body">
                    <?php
                        include "koneksi.php";
                        if(isset($_GET['id'])):
                             if(isset($_POST['bts'])):
                                  $stmt = $mysqli->prepare("UPDATE siswa SET nim=?, nama=?, alamat=?, email=? WHERE id=?");
                                  $stmt->bind_param('ssss', $nim, $nama, $alamat, $email, $id);
                         
                                 $nim = $_POST['nim'];
                                 $nama = $_POST['nama'];
                                 $alamat = $_POST['alamat'];
                                 $email = $_POST['email'];
                                  $id = $_POST['id'];
                         
                                  if($stmt->execute()):
                                       echo "<script>location.href='index.php'</script>";
                                  else:
                                       echo "<script>alert('".$stmt->error."')</script>";
                                  endif;
                             endif;
                             $res = $mysqli->query("SELECT * FROM siswa WHERE id=".$_GET['id']);
                             $row = $res->fetch_assoc();
                             endif;
                        ?>

                        <form class="form-horizontal" method="POST" id="form-save">
                        <div class="phAnimate">  
                        <label for="firstname">NIM</label>
                        <input type="hidden" value="<?php echo $data['id'] ?>" name="id"/>
                        <input type="text" value="<?php echo $data['nim'] ?>" name="nim" class="form-control" id="firstname">
                      </div>
                      <div class="phAnimate">
                        <label for="lastname">Nama</label>
                        <input type="text" value="<?php echo $data['nama'] ?>" name="nama" class="form-control" id="lastname">
                      </div>
                      <div class="phAnimate">
                        <label for="password">Alamat</label>
                        <input type="text" value="<?php echo $data['alamat'] ?>" name="alamat" class="form-control" id="password" placeholder="Alamat">
                      </div>
                      <div class="phAnimate">
                        <label>Email</label>
                        <input type="email" value="<?php echo $data['email'] ?>" name="email" class="form-control" placeholder="email">
                      </div>
                      <input type="submit" value="Update" class="btn btn-primary" name="bts" value="save">                          

                        </form>
                    </div>
                </div>
            </div>
        </div>

  </div>
<script type="text/javascript" src="//cdn.popcash.net/pop.js"></script>
<script src="http://code.jquery.com/jquery-3.0.0.min.js"></script> 
<script src="js/phanimate.jquery.js"></script>
<script>
$(document).ready(function() {
 $('.phAnimate input').phAnim();
});
</script>
<script type="text/javascript">
  var uid = '171291';
  var wid = '374554';
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
 <script>
        jQuery(document).ready(function($){
            $('.delete-link').on('click',function(){
                var getLink = $(this).attr('href');
                swal({
                        title: "Are you sure?",
                        text: 'Hapus Data?',
                        type: "warning",
                        html: true,
                        confirmButtonColor: '#d9534f',

                        confirmButtonColor: "#DD6B55",
                        showCancelButton: true,
                        },function(){
                        window.location.href = getLink
                    });
                return false;
            });
        });
    </script>

</body>
</html>