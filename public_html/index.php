<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sistem Informasi Kelulusan</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
      .modal-header, h4, .close {
          background-color: #5cb85c;
          color:white !important;
          text-align: center;
          font-size: 30px;
      }
      .modal-footer {
          background-color: #f9f9f9;
      }
    </style>

<!-- custom css is disable
<style type="text/css">
.modal-footer.navbar-fixed-bottom table tr td {
	color: rgba(255,255,255,1);
}
/* 3D On Hover */
.button {width:350px;margin:0 auto;padding:5px 10px;cursor:pointer}
.btn7:hover {box-shadow:none;top:5px;left:5px}
.btn7 {
  top:0;left:0;position:relative;
  border-radius:5px;background: red;
  color:#fff;text-shadow:1px 2px 2px #111;
  box-shadow:2px 2px 0 #ccc,3px 3px 0 #ccc,4px 4px 0 #ccc,5px 5px 0 #ccc;
  transition:top 0.25s, left 0.25s, box-shadow 0.25s;
  -webkit-transition:top 0.25s, left 0.25s, box-shadow 0.25s;
  -moz-transition:top 0.25s, left 0.25s, box-shadow 0.25s;
  -o-transition:top 0.25s, left 0.25s, box-shadow 0.25s}
</style>
-->
</head>

<body style="background:url(http://i1166.photobucket.com/albums/q603/albarnationn/albarnation2_zpsb5a883df.jpg); repeat-x fixed top center;">
<!-- ========================================== start tag navbar ========================================== -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">

     <!-- Header saat mobile version -->
      <div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="glyphicon glyphicon-list" style="color:white"></span>
				</button>
				<a class="navbar-brand" href="#">Sistem Informasi Kelulusan</a>
			</div>
     <!-- End Navbar Header -->

      <div class="navbar-collapse collapse"><div>
          <ul class="nav navbar-nav">
              <li><a href="#home">Beranda</a></li>
              <li><a href="contact.php">Kontak Kami</a></li>
              <li><a href="aboutus.php">Tentang Kami</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                <div class="dropdown-menu">
<!-- ================================================Form Login Admin==========================================================================  -->
                  <form id="formLogin" class="form container-fluid" action="loginadmin.php" method="POST">
                    <div class="form-group">
                      <label for="user"> Username</label>
                      <input type="text" class="form-control" name="txtUsername" id="txtUsername">
                    </div>
                    <div class="form-group">
                      <label for="pwd"> Password</label>
                      <input type="password" class="form-control" name="txtPassword" id="txtPassword">
                    </div>
                    <button type="submit" id="btn" class="btn btn-block" name="btnLog"><span class="glyphicon glyphicon-user"></span> Login</button>
                  </form>
<!-- ================================================End Form Login Admin=======================================================================  -->
                </div>
              </li>
          </ul>
      </div>
  </div>
</nav>
<!-- ========================================== end tag navbar ========================================== -->

<!-- ========================================== start tag content form ========================================== -->
<div class="container-fluid">
  <div class="row">
<!-- ============================================================================================================= -->
    <div class="col-sm-1"></div>                                                                     <!-- div blank-->
<!-- ============================================================================================================= -->
    <div class="col-sm-10">
      <div class="alert alert-warning">
        <div class="text-right">
          <p class="text-danger">
            <?php
              //cetak function
              current_date();

              //function current date
              function current_date() {
                // set time zone asia
                date_default_timezone_set('Asia/Jakarta');

                // Set waktu sekarang
                $thedate  = getdate();

                // array date
                $arrayHari  = array(1 => "Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
                $hari       = $arrayHari[date("N")];

                // format tanggal
                $tanggal    = date("j");
                // array bulan
                $arrayBulan = array(1 => "Januari","Februari","Maret","April","Mei",
                                      "Juni","Juli","Agustus","September","Oktober",
                                      "November","Desember");
                $bulan      = $arrayBulan[date("n")];

                // format tahun
                $tahun      = date("Y");

                // tampilkan waktu
                $current_date = "$hari, $tanggal $bulan $tahun";
                echo "<strong>".$current_date."</strong>";
              }
            ?>
          </p>
        </div>  <!-- end div class="pull-right" -->
<!-- ============================================================================================================= -->


<!-- ====================================== Start Form login siswa ======================================================================= -->
        <div class="table-responsive text-center" style="border:0">
          <h2>Selamat Datang di Website Pengumuman Kelulusan<br>Sekolah Wijayakusuma</h2><hr>
          <div class="container-fluid">
            <h3>Silahkan tekan tombol dibawah</h3>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
                  </div>
                  <div class="modal-body text-justify" style="padding:40px 50px;">
                    <form role="form" method="POST" action="nilai-siswa.php">
                      <div class="form-group">
                        <label for="noujian"><span class="glyphicon glyphicon-user"></span> Nomor Ujian</label>
                        <input type="text" class="form-control" id="usrname" placeholder="contoh: 27-870-001-8">
                      </div>
                      <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-off"></span> Login</button>
                      <button type="submit" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    </form>
                  </div>
                </div>
                <!-- End Modal content -->
              </div>
              <!-- End Modal Dialog -->
            </div>
            <!-- End Modal -->
          </div>
<!-- ====================================== End Form login siswa ========================================================================= -->
        </div>
      </div>  <!-- end div class="well" -->
    </div>  <!-- end div class="col-sm-8" -->
<!-- ============================================================================================================= -->
    <div class="col-sm-1"></div>                                                                     <!-- div blank-->
<!-- ============================================================================================================= -->
  </div>  <!-- end div class="row" -->
</div>  <!-- end div class="container-fluid" -->
<!-- ========================================== end tag content ========================================== -->

<!-- ========================================== start tag footer ========================================== -->
<footer class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container-fluid">
    <div class="navbar-text pull-left">
      <h3>
        <small>
          <p>&copy; Copyright <?php echo date("Y"); ?>
        </small>
      </h3>
    </div>
  </div>
</footer>
<!-- =============================================== end tag footer =============================================== -->

<!-- ========================================== javascript modal content ========================================== -->
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>
<!-- ========================================== javascript modal content ========================================== -->
</body>
</html>
