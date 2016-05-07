<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistem Informasi Kelulusan</title>
<link type="text/css" href="css/bootstrap.css">
<link type="text/css" href="css/bootstrap-responsive.css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<style type="text/css">
.modal-footer.navbar-fixed-bottom address strong {
	text-align: left;
}
</style>
</head>

<body>
<div class="nav nav-header nav-tabs navbar-fixed-top;" style="background-color:rgba(0,153,255,0.4)">
<nav style="display:inline; padding:1px 0 1px 1px;">
	<ul role="navigation">
    	<li style="display:inline"><a href="hal-admin.php">Beranda</a></li>
        <li style="display:inline"><a href="data-siswa.php">Data Siswa</a></li>
        <li style="display:inline"><a href="import.php">Import Data</a></li>
      <li style="display:inline"><a href="<?php echo $logoutAction ?>">Keluar</a></li>
    </ul>
</nav>
</div>
<div class="container-fluid">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="table-condensed" id="map_canvas" style="background-color: rgba(0,204,255,0.1); border-radius: 10px; text-align: justify;">
  	<legend style="padding-left:20px; color:rgba(204,0,0,0.5); text-shadow:rgba(0,0,255,0.1); font-size:24px; font-family:Verdana, Geneva, sans-serif; transform-style:preserve-3d"><strong>Sistem Informasi Kelulusan</strong></legend>
    <tr style="border-radius:5px;">
      <td><h1>Selamat Datang di Web Informasi Kelulusan Sekolah</h1>
      </td>
    </tr>
    <tr>
    	<td style="padding-left:30px; font-size:16px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif">Anda login sebagai Administrator</td><hr align="center" width="70%" noshade="noshade" class="row-fluid">
    </tr>
    <tr class="warning">
    	<td><p style="padding: 5px 26px 3px; text-align: justify; font-size:16px; font-family:Arial, Helvetica, sans-serif">Pada halaman ini anda dapat melakukan Input, Update, dan Delete.</p></td>
    </tr>
    <tr>
        <td><blockquote><p style="padding: 0 1px 1px 1px; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 24px;">Web ini dapat digunakan sebagai alternatif Informasi Kelulusan secara online. Kritik dan saran yang membangun sangat kami harapkan demi perbaikan web ini.</p></blockquote></td>
    </tr>
  </table>
</div><br><br><br>
<footer class="modal-footer" style="background-color:rgba(0,0,0,0.9); text-align: center; color: #000000; margin-top:145px;">
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