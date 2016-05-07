<?php
  session_start();
  include '../library/koneksi.php';
  $link = koneksi();

  if (!isset($_SESSION['username'])) {
    echo "<script>
      window.alert('Maaf, anda belum login ');
      window.location=('index.php')</script>";
  } else {
    $id = $_GET['id'];
    $qry = mysqli_query($link, "SELECT * FROM bukutamu WHERE id='$id'");
    $data = mysqli_fetch_array($qry, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah User</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style>
    /*
    .form-signin
      {
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
      }
    .form-signin .form-signin-heading, .form-signin .checkbox
      {
      margin-bottom: 10px;
      }
    .form-signin .checkbox
      {
      font-weight: normal;
      }
    .form-signin .form-control
      {
      position: relative;
      font-size: 16px;
      height: auto;
      padding: 10px;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
      }
    .form-signin .form-control:focus
      z-index: 2;
      {
      }
    .form-signin input[type="text"]
      {
      margin-bottom: -1px;
      border-bottom-left-radius: 0;
      border-bottom-right-radius: 0;
      }
    .form-signin input[type="password"]
      {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
      }
  */
    .account-wall
      {
      margin-top: 20px;
      padding: 40px 0px 20px 0px;
      background-color: #f7f7f7;
      -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      }
  /*
    .login-title
      {
      color: #555;
      font-size: 18px;
      font-weight: 400;
      display: block;
      }
    .profile-img
      {
      width: 96px;
      height: 96px;
      margin: 0 auto 10px;
      display: block;
      -moz-border-radius: 50%;
      -webkit-border-radius: 50%;
      border-radius: 50%;
      }
    .need-help
      {
      margin-top: 10px;
      }
    .new-account
      {
      display: block;
      margin-top: 10px;
      }
    */
    </style>
  </head>
  <body>
    <!-- nav tabs -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">
            <img src="../img/logo.png" alt="logo-asik" width="120px" />
            <!-- <span class="glyphicon glyphicon-star"></span>&nbsp;ASIK&nbsp;<span class="glyphicon glyphicon-star"></span> -->
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="admin.php"><span class="glyphicon glyphicon-home"></span>&nbsp;</a></li>
            <li class="dropdown">
              <a href="#" data-toggle="dropdown" class="dropd"> Data Siswa <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="datasiswaipa.php">Siswa IPA</a></li>
                <li><a href="datasiswaips.php">Siswa IPS</a></li>
              </ul>
            </li>
            <!-- <li><a href="datasiswa.php"><span class="glyphicon glyphicon-education"></span>&nbsp;Data Siswa</a></li> -->
            <li><a href="datauser.php"><span class="glyphicon glyphicon-user"></span>&nbsp;User</a></li>
            <li><a href="bukutamu.php"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Buku Tamu</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $_SESSION['username']; ?></a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav><!-- /.end-nav -->
    <br><br><br>

    <!-- form tambah user -->
    <div class="container-fluid">
      <div style="">
        <div class="row">
          <div class="col-sm-2 col-md-10 col-md-offset-1">
            <div class="alert alert-info">
              <h1 class="text-center"><small><span class="glyphicon glyphicon-book"></span>&nbsp;Buku Tamu</small></h1>
              <hr>
              <!-- table pesan -->
              <div class="form-horizontal">
                <div class="form-group">
                  <label for="pengirim" class="control-label col-sm-3">Pengirim :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="pengirim" id="pengirim" value="<?php echo $data['guest_name']; ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="control-label col-sm-3">Email :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="email" id="email" value="<?php echo $data['email']; ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="judul" class="control-label col-sm-3">judul :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="judul" id="judul" value="<?php echo $data['judul']; ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Pesan" class="control-label col-sm-3">Pesan :</label>
                  <div class="col-sm-6">
                    <textarea name="pesan" class="form-control"  rows="8" cols="22" disabled><?php echo $data['pesan']; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Pesan" class="control-label col-sm-4"></label>
                  <div class="btn-group-sm col-sm-8">
                    <button type='button' class='btn btn-primary' onclick="history.back(-1)"><span class="glyphicon glyphicon-backward"></span>&nbsp;Kembali</button>
                    <a href="deletebukutamu.php?id=<?php echo $data['id']; ?>"><button type='button' class='btn btn-danger'><span class="glyphicon glyphicon-remove"></span>&nbsp;Hapus</button></a>
                  </div>
                </div>
              </div><!-- End form-horizontal -->
            </div><!-- End account-wall -->
          </div><!-- End col -->
        </div><!-- End Row -->
      </div><!-- End alert -->
    </div><!-- End Container -->

  <?php } // end-if ?>
<?php include '../template/footer.php'; ?>
