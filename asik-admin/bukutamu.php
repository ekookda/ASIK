<?php
  session_start();
  // $link = mysqli_connect('ekookda.dev', 'root', '', 'asik');
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
    <title>Data Buku Tamu</title>
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


    <!-- daftar list user  -->
    <div class="container">
      <div class="panel-title">
        <h1>Buku Tamu</h1>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Pengirim</th>
              <th>Email</th>
              <th>Isi Pesan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no=1;
              $query = mysqli_query($link, "SELECT * FROM bukutamu");
              if (mysqli_num_rows($query) == 0) {
                echo "
                        <td colspan='5' class='text-center'><h3>Tidak ada pesan yang ditampilkan</h3></td>
                      </tr>
                ";
              } else {
              while ($data = mysqli_fetch_array($query, MYSQLI_ASSOC)) :
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $data['guest_name'];?></td>
              <td><?php echo $data['email'];?></td>
              <td><a href="pesan.php?id=<?php echo $data['id']; ?>"><?php echo $data['judul'];?></a></td>
              <td>
                <a href="deletebukutamu.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus pesan ini?')"><button type='button' name="btn-hapus" id="btn-hapus" class='btn btn-xs btn-danger'><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Hapus&nbsp;</button></a>
              </td>
            </tr>
            <?php
                $no++;
                endwhile;
              }
            ?>
          </tbody>
        </table>
      </div><!-- /.table-responsive -->
    </div><!-- /.container -->

  <?php } // end-if ?>
  <?php include '../template/footer.php'; ?>
