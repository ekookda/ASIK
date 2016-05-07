<?php
  session_start();
  include '../library/koneksi.php';
  $link = koneksi();

  if (!isset($_SESSION['username'])) {
    echo "<script>
      window.alert('Maaf, anda belum login ');
      window.location=('index.php')</script>";
  } else {
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data User</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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


    <!-- content index admin -->
    <div class="container">
      <div class="row">
        <div class="col-sm-2">
          <a href="tambahuser.php">
            <button type='button' name="tambahuser" class='btn btn-primary'><span class="glyphicon glyphicon-plus-sign"></span>&nbsp; Tambah User</button>
          </a>
        </div>
      </div><!-- /.row -->
      <div class="pull-right">
        <p></p>
      </div>
    </div><!-- /. container -->
    <!-- daftar list user  -->
    <div class="container">
      <div class="table-responsive">
        <table class='table table-striped table-hover'>
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Hak Akses</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no=1;
              $query = mysqli_query($link, "SELECT * FROM admin");
              while ($data = mysqli_fetch_array($query, MYSQLI_ASSOC)) :
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $data['nama_lengkap'];?></td>
              <td><?php echo $data['username'];?></td>
              <td><?php echo $data['nama_level'];?></td>
              <td>
                <a href="edituser.php?user_id=<?php echo $data['user_id']; ?>"><button type='button' name="btn-edit" class='btn btn-xs btn-info'><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit</button></a>
                <a href="deleteuser.php?user_id=<?php echo $data['user_id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><button type='button' name="btn-hapus" id="btn-hapus" class='btn btn-xs btn-danger'><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Hapus</button></a>
              </td>
            </tr>
          <?php
            $no++;
            endwhile;
          ?>
          </tbody>
        </table>
      </div><!-- /.table-responsive -->
    </div><!-- /.container -->

  <?php } // end-if ?>
  <?php include "../template/footer.php"; ?>
