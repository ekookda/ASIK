<?php
error_reporting(E_ALL ^ E_DEPRECATED);
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
<?php 	
	require_once('config.php');

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_koneksi, $koneksi);
$query_tabel_data = "SELECT * FROM tb_student";
$tabel_data = mysql_query($query_tabel_data, $koneksi) or die(mysql_error());
$row_tabel_data = mysql_fetch_assoc($tabel_data);
$totalRows_tabel_data = mysql_num_rows($tabel_data);
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
<div class="nav nav-header nav-tabs navbar-static-top" style="background-color:rgba(0,153,255,0.4)">
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
<h2 style="background-color:rgba(204,204,204,0.3); padding-left:20px; color:rgba(0,0,0,0.5)">Data Siswa Kelas 9</h2>
<a href="add-data.php"><img src="img/add_data.png" /></a><br><br>
<table class="table table-condensed table-striped">
	<thead>
    	<tr>
        	<th>No.</th>
            <th abbr="starter" scope="col">Nama Siswa</th>
            <th scope="col" abbr="Bisnis">Nomor Ujian</th>
            <th scope="col" abbr="Medium">B.Indo</th>
            <th scope="col" abbr="Medium">B.Ingg</th>
            <th scope="col" abbr="Medium">MTK</th>
            <th scope="col" abbr="Medium">IPA</th>
            <th scope="col" abbr="Medium">Keterangan</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody class="table-striped table-hover">
    <?php
		$no=1;
		while($siswa=mysql_fetch_object($tabel_data)):
	?>
    	<tr>
        	<td><?=$no++;?></td>
            <td><?=ucwords($siswa->name) ?></td>
            <td><?=$siswa->noujian ?></td>
            <td><?=$siswa->naindo ?></td>
            <td><?=$siswa->nainggris ?></td>
            <td><?=$siswa->namat ?></td>
            <td><?=$siswa->naipa ?></td>
            <td><?=$siswa->ket ?></td>
            <td><a href="edit-data.php?id=<?=$siswa->id?>" target="_self">Edit</a></td>
            <td><a href="hapus.php?id=<?=$siswa->id?>" target="_self" onClick="return confirm('Anda yakin ingin menghapus data ini ?')">Hapus</a></td>
        </tr>
    </tbody>
    <?php 
		endwhile;
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