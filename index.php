<?php
  include 'hits.php';
  initCounter();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ASIK</title>
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">

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
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Beranda</a></li>
            <li><a href="bukutamu.php"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Buku Tamu</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav><!-- /.end-nav -->
    <br>

    <!-- content index -->
    <div class="container">
      <div class="jumbotron">
        <!-- tulisan berjalan -->
        <marquee scrolldelay="10" behavior="scroll">
          <h1>Selamat datang di Website Sistem Informasi Kelulusan <strong class="text-info">Sekolah Wijayakusuma</strong></h1>
        </marquee>
        <hr>
        <p class="text-right text-danger">
          <!-- function waktu -->
          <?php include "library/date.php"; ?>
        </p>
        <div class="alert alert-info">
          <div class="text-center">
            <p>Untuk meilhat pengumuman kelulusan, silahkan masukkan <b>4 digit</b> angka terakhir nomor peserta</p>
          </div>
          <form class="form-inline" action="ceknopeserta.php" method="POST" role="form">
            <div class='col-sm-3'></div>
            <div class="form-group">
              <label class="control-label" for="nopeserta">Nomor Peserta Ujian :</label>
              <!-- <input type="text" name="nopeserta"> -->
              <input type="text" class="form-control" name="nopeserta" id="nopeserta" size="3" placeholder="001" maxlength="3" title="form tidak boleh kosong" pattern="[0-9]{3}" required>-
              <input type="text" class="form-control" name="nomorpeserta" id="nomorpeserta" maxlength="1" size="1" placeholder="8" required>
            </div>
            <button type='submit' class='btn btn-primary' name="btnProses"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Proses</button>

          </form>
        </div>
        <div class="row">
          <div class="col-sm-8">
            <img src="https://swaraguru.files.wordpress.com/2011/05/lulus-un.jpg" alt="gambar-kelulusan" class="img-responsive" />
          </div>
          <div class="col-sm-4">
            <div class="alert alert-warning">
              <?php
                echo "IP Address Anda: ".$_SERVER['REMOTE_ADDR']."<br>";
                echo "Browser Anda: ".$_SERVER['HTTP_USER_AGENT']."<br>";
              ?>
              <p>Total Pengunjung hari ini : <?php echo getCounter('hits'); ?></p>
              <!-- <p>Total pengunjung hari ini: </p> -->
            </div>
          </div>
        </div>
      </div><!-- /.jumbotron -->
    </div><!-- /.container -->

<?php include 'template/footer.php'; ?>
