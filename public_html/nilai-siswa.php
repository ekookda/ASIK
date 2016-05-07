<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include "config.php";
$name	= $_POST['txtnoujian']; // mengambil data dari nama textfiled
$q		= "SELECT * FROM tb_student WHERE noujian like '%$name%'";
$result	= mysql_query($q);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistem Informasi Kelulusan</title>
<link type="text/css" href="css/bootstrap.css">
<link type="text/css" href="css/bootstrap-responsive.css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="nav nav-header nav-tabs">
<nav style="display:inline; padding:1px 0 1px 1px;">
	<ul role="navigation">
    	<li style="display:inline"><a href="index.php">Beranda</a></li>
        <li style="display:inline"><a href="aboutus.php">About Us</a></li>
        <li style="display:inline"><a href="contact.php">Kontak Kami</a></li>
      <li style="display:inline"><a href="loginadmin.php">Login</a></li>
    </ul>
</nav>
</div>
<div class="container-fluid table-condensed">
<p class="badge-info" style="text-align:center; font-size:18px; color:rgba(255,255,255,1)"><span><marquee>Raport Kelulusan Siswa</marquee></span><br>
</p>
<table width="500" align="center" cellpadding="3" cellspacing="1" class="table-striped table-condensed>
<?php
$num_rows = mysql_num_rows($result);
	while($data	= mysql_fetch_array($result)){
	if($num_rows == 0)
	echo "<br>
		<div align='center' class='alert alert-dismissable alert-danger'>
			<h4>Maaf, Nomor Peserta Ujian Salah Atau Tidak Ada Dalam Database!</h4>
		</div>
		<meta http-equiv='refresh' content='2; url=index.php'>";
else
?>
  <tr>
    <th width="121" scope="row">&nbsp;</th>
    <td width="362"><input name="hiddenField" type="hidden" id="hiddenField" value=""></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Nama Siswa</th>
    <td class="text-success" style="font-size:20px;"><?php echo $data['name']; ?></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Nomor Peserta</th>
    <td style="font-size:20px"><?php echo $data['noujian']; ?></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Nilai Bhs Indonesia</th>
    <td style="font-size:20px"><?php echo $data['naindo']; ?></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Nilai Bhs Inggris</th>
    <td style="font-size:20px"><?php echo $data['nainggris']; ?></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Nilai Matematika</th>
    <td style="font-size:20px"><?php echo $data['namat'];?></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Nilai IPA</th>
    <td style="font-size:20px"><?php echo $data['naipa'];?></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Keterangan</th>
    <td style="text-transform:capitalize; color:rgba(0,102,255,1); font-weight:bolder; font-size:24px">
<?php
	if($data['adm']=="LUNAS"){
		echo $data['ket'];
	}
	else {
		echo "MAAF, ANDA BELUM MELUNASI ADMINISTRASI";	
	}
?>
    </td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Komentar</th>
    <td><label for="textarea">
      <textarea name="koment" cols="200" rows="10" readonly style="width:350px; resize:none" id="textarea"><?php echo $data['komentar']; ?></textarea>
    </label></td>
  </tr>
  <?php //	endwhile;
	}
  ?>
</table>
</div>
<footer class="modal-footer" style="background-color:rgba(0,0,0,0.9); text-align: center; color: #000000;">
  <table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
	<td width="9%" height="61"><img src="img/tutwk.png" width="80" height="80"></td>
      	<td width="91%" align="left" valign="middle" style="text-shadow:rgba(255,0,0,1);color:rgba(255,255,255,1); font-weight:bolder; font-size:18px">Sekolah Wijayakusuma<br>
      Jl. Bandengan Utara No.80<br>
      Telp. 021-6693514 | Fax. 021-6684739<br>
	website: <a href="http://www.sekolahwijayakusuma.com" target="_blank">www.sekolahwijayakusuma.com</a><br>email: <a href="mailto:info@sekolahwijayakusuma.com">info@sekolahwijayakusuma.com</a></td>
    </tr>
  </table><br>
<p style="text-align:center; text-shadow:rgba(255,0,0,1); font-size:20px; color:rgba(255,255,255,1); font-weight:bolder">Copyright &copy; 2015  <small><a href="http://ekookda.blogspot.com" target="_blank">Junior Web Developer</a></small></p></footer>
</body>
</html>