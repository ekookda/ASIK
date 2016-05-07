<?php
  session_start();
  include "library/koneksi.php";
  $link = koneksi();

  // cek session login.
  if (!isset($_SESSION['id_peserta'])) {
    echo "<script>
      window.alert('Maaf, anda belum login ')
      window.location=('index.php')</script>";
  } else {
    // query SELECT
    $id=$_GET['id_peserta'];
    $query = mysqli_query($link, "SELECT id_peserta, nama_siswa, jurusan, naindo, nainggris, namat, kimia, biologi, fisika, ekonomi, geografi, sosiologi, keterangan, pesan FROM siswa JOIN nilai USING(id_peserta) WHERE id_peserta='$id'");
    $cek    = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ASIK</title>
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <!-- Latest compiled and minified CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  </head>
  <body>
    <!-- nav tabs -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" alt="logo-asik" width="120px" />
            <!-- <span class="glyphicon glyphicon-star"></span>&nbsp;ASIK&nbsp;<span class="glyphicon glyphicon-star"></span> -->
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span>&nbsp;Beranda</a></li>
            <li><a href="bukutamu.php"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Buku Tamu</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav><!-- /.end-nav -->
    <br><br><br>

    <!-- content index -->
    <div class="container">
      <div class="jumbotron">
        <p class="text-right text-danger">
          <!-- function waktu -->
          <?php include "library/date.php"; ?>
        </p>
        <hr>
        <!-- content -->
        <p class="text-left">Halo, <strong><?php echo $cek['nama_siswa']; ?></strong></p>
        <div class="alert alert-info">
          <div class="text-center">
            <legend class="text-danger"><?php echo strtoupper("pengumuman kelulusan") ?></legend>
          </div>
          <div class="form-horizontal">
            <div class="form-group">
              <label for="nomorpeserta" class="control-label col-sm-4">Nomor Peserta Ujian :</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" disabled value="<?php echo $cek['id_peserta']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="namapeserta" class="control-label col-sm-4">Nama Peserta Ujian :</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" disabled value="<?php echo $cek['nama_siswa']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="programstudi" class="control-label col-sm-4">Program Studi :</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" disabled value="<?php echo $cek['jurusan']; ?>">
              </div>
            </div>
          </div>
          <div class='table-responsive'>
            <table class='table table-striped table-hover'>
              <thead>
                <tr>
                  <th colspan="5" class="text-center">Hasil Nilai</th>
                </tr>
                <tr>
                  <th class="text-center" style="width:150px;">Bahasa Indonesia</th>
                  <th class="text-center" style="width:150px;">Bahasa Inggris</th>
                  <th class="text-center" style="width:150px;">Matematika</th>
                  <?php
                    if ($cek['jurusan'] == "IPA") {
                      echo "
                        <th class=\"text-center\" style=\"width:150px;\">Fisika</th>
                        <th class=\"text-center\" style=\"width:150px;\">Kimia</th>
                        <th class=\"text-center\" style=\"width:150px;\">Biologi</th>
                      ";
                    } else {
                      echo "
                        <th class=\"text-center\" style=\"width:150px;\">Ekonomi</th>
                        <th class=\"text-center\" style=\"width:150px;\">Geografi</th>
                        <th class=\"text-center\" style=\"width:150px;\">Sosiologi</th>
                      ";
                    }
                  ?>
                </tr>
              </thead>
              <tbody class="text-center lead">
                <tr>
                  <td><?php echo $cek['naindo']; ?></td>
                  <td><?php echo $cek['nainggris']; ?></td>
                  <td><?php echo $cek['namat']; ?></td>
                  <?php
                    if ($cek['jurusan'] == "IPA") {
                      echo "
                        <td>$cek[fisika]</td>
                        <td>$cek[kimia]</td>
                        <td>$cek[biologi]</td>
                      ";
                    } elseif ($cek['jurusan'] == "IPS") {
                      echo "
                        <td>$cek[ekonomi]</td>
                        <td>$cek[geografi]</td>
                        <td>$cek[sosiologi]</td>
                      ";
                    } else {
                      echo "
                        <script>
                          window.alert(\"Anda belum memasukkan nomor peserta\");
                          window.location=(\"index.php\");
                        </script>
                      ";
                    }
                  ?>
                </tr>
              </tbody>
              <?php } ?>
            </table>
          </div><!-- /.table -->
          <div class="form-horizontal">
            <div class="form-group">
              <label for="komentar" class="control-label col-sm-4">Pesan :</label>
              <div class="col-sm-4">
                <textarea class='form-control' disabled style="resize:none;" rows="4"><?php echo $cek['pesan']; ?></textarea>
              </div>
            </div>
          </div>
          <hr>
          <div class="form-group text-center">
            <?php
              if ($cek['keterangan'] == "LULUS") {
                echo "<label for='pengumuman' class='control-label'>Berdasarkan dari Hasil Nilai diatas ditambah dengan Nilai Sekolah dan Rapat Guru, maka siswa/siswi yang bernama <strong>".$cek['nama_siswa']."</strong> dinyatakan <strong class='text-danger'>".$cek['keterangan']."</strong></label>";
              }
              // else {
              //   echo "<label for='pengumuman' class='control-label'>Dari Hasil Penilaian diatas ditambah dengan Nilai Sekolah, maka siswa/siswi yang bernama <strong>".$cek['nama_siswa']."</strong> dinyatakan <strong class='text-danger'>".$cek['keterangan']."</strong></label>";
              // }
            ?>
          </div>
          <div class="pull-right">
            <a href="logout.php"><button type='submit' class='btn btn-sm btn-danger' name="logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</button></a>
          </div>
        </div><!-- /.alert alert-info -->
      </div><!-- /.jumbotron -->
    </div><!-- /.container -->

    <?php //} // end-if ?>
  <?php include 'template/footer.php'; ?>
