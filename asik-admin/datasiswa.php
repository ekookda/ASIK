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
    <title>Data Siswa</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  </head>
  <body>

    <?php
      // include fungsi pagination
      include '../library/pagination1.php';

      // query
      $no=1;
      // $query = mysqli_query($link, "SELECT id_peserta, nama_siswa, jurusan, naindo, nainggris, namat, biologi, fisika, kimia, ekonomi, geografi, sosiologi, keterangan, pesan FROM siswa JOIN nilai USING(id_peserta)");
      $qry= "SELECT * FROM tb_data";
      $query  = mysqli_query($link, $qry);

      // mulai konfigurasi paging
      $record = 10; // jumlah record per halaman
      $reload = "datasiswa.php?pagination=true";
      $page   = intval(isset($_GET['page'])?$_GET['page']:0);
      if ($page<=0) $page = 1;
      $tcount = mysqli_num_rows($query);
      $tpages = ($tcount) ? ceil($tcount/$record) : 1; // Total pages, last page number

      $count = 0;
      $i = ($page-1)*$record;
      // pagination config end
    ?>

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
            <li><a href="datasiswa.php"><span class="glyphicon glyphicon-education"></span>&nbsp;Data Siswa</a></li>
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
    <br><br><br><br>

    <!-- content index admin -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2">
          <a href="tambahdatasiswa.php">
            <button type='button' name="tambahsiswa" class='btn btn-primary'><span class="glyphicon glyphicon-plus-sign"></span>&nbsp; Tambah Data Siswa</button>
          </a>
        </div>
      </div><!-- /.row -->
      <div class="pull-right">&nbsp;</div>
    </div><!-- /. container -->
    <!-- daftar list user  -->
    <div class="container-fluid" style="margin-bottom:50px;">
      <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
          <thead>
            <tr class="info">
              <th rowspan="2" class="text-center" style="vertical-align:middle; word-wrap:break-word;">#</th>
              <th rowspan="2" class="text-center" style="vertical-align:middle">Nomor Peserta Ujian</th>
              <th rowspan="2" class="text-center" style="vertical-align:middle">Nama Siswa</th>
              <th rowspan="2" class="text-center" style="word-wrap:break-word; width:18px;vertical-align:middle;">Program Studi</th>
              <th colspan="7" class="text-center">Nilai Ujian Nasional</th>
              <th rowspan="2" class="text-center" style="word-wrap:break-word; width:18px;vertical-align:middle;">Aksi</th>
            </tr>
            <tr class="info">
              <th class="text-center" style="word-wrap:break-word; width:18px;vertical-align:middle;">Bahasa Indonesia</th>
              <th class="text-center" style="word-wrap:break-word; width:18px;vertical-align:middle;">Bahasa Inggris</th>
              <th class="text-center" style="word-wrap:break-word; width:18px;vertical-align:middle;">Matematika</th>
              <th class="text-center" style="word-wrap:break-word; width:18px;vertical-align:middle;">IPA</th>
              <th class="text-center" style="word-wrap:break-word; width:18px;vertical-align:middle;">IPS</th>
              <th class="text-center">Keterangan</th>
              <th class="text-center">Pesan</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while (($count<$record) AND ($i<$tcount)) {
                mysqli_data_seek($query, $i);
                $data = mysqli_fetch_array($query, MYSQLI_ASSOC)
            ?>
            <tr>
              <td class="text-center"><?php echo $no; ?></td>
              <td><?php echo $data['id_peserta'];?></td>
              <td><?php echo $data['nama_siswa'];?></td>
              <td><?php echo $data['jurusan'];?></td>
              <td class="text-center"><?php echo $data['naindo'];?></td>
              <td class="text-center"><?php echo $data['nainggris'];?></td>
              <td class="text-center"><?php echo $data['namat'];?></td>
              <td class="text-center"><?php echo $data['naipa'];?></td>
              <td class="text-center"><?php echo $data['naips'];?></td>
              <td class="text-center"><?php echo $data['keterangan'];?></td>
              <td><?php echo $data['pesan'];?></td>
              <td class="text-center" style="word-wrap:break-word; width:18px;vertical-align:middle;">
                <a href="editdatasiswa.php?id_peserta=<?php echo $data['id_peserta']; ?>"><button type='button' name="btn-edit" class='btn btn-xs btn-info'><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit</button></a>
                <a href="deletedatasiswa.php?id_peserta=<?php echo $data['id_peserta']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><button type='button' name="btn-hapus" id="btn-hapus" class='btn btn-xs btn-danger'><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Hapus</button></a>
              </td>
            </tr>
          <?php
              $no++;
              $i++; $count++;
            }
          ?>
          </tbody>
        </table>
      </div><!-- /.table-responsive -->
      <div class="row">
        <div class="col-sm-6">
          <div class="pull-left">
            <?php
              // Menghitung total siswa
              $countsiswa = mysqli_query($link, "SELECT * FROM siswa");
              $jumlah = mysqli_num_rows($countsiswa);
              echo "Jumlah <strong>".$jumlah."</strong> siswa";
            ?>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="pull-right">
            <?php echo paginate_one($reload, $page, $tpages); ?>
          </div>
        </div>
      </div>
    </div><!-- /.container -->

<?php } // end-if ?>

<?php include '../template/footer.php'; ?>
