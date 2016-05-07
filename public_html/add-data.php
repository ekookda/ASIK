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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form-add")) {
  $insertSQL = sprintf("INSERT INTO tb_student (id, noujian, name, naindo, nainggris, namat, naipa, ket, komentar) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['txtId'], "int"),
                       GetSQLValueString($_POST['txtNomor'], "text"),
                       GetSQLValueString($_POST['txtNamasiswa'], "text"),
                       GetSQLValueString($_POST['txtBindo'], "text"),
                       GetSQLValueString($_POST['txtBing'], "text"),
                       GetSQLValueString($_POST['txtMat'], "text"),
                       GetSQLValueString($_POST['txtIpa'], "text"),
                       GetSQLValueString($_POST['select'], "text"),
                       GetSQLValueString($_POST['txtKmnt'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "data-siswa.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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
<form action="<?php echo $editFormAction; ?>" method="POST" name="form-add" target="_self" lang="en">
<legend style="font-size:30px">Form Input Data Siswa</legend>
<table width="500" border="0" align="center" cellpadding="3" cellspacing="1" class="table-striped table-condensed">
  <tr>
    <th align="left" valign="middle" scope="row"></th>
    <td align="left" valign="middle"><input type="hidden" name="txtId" id="textfield7" required></td>
  </tr>
  <tr>
    <th width="158" align="left" valign="middle" scope="row">Nomor Peserta Ujian</th>
    <td width="327" align="left" valign="middle"><input name="txtNomor" type="text" required placeholder="Nomor Peserta Ujian"></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Nama Siswa</th>
    <td align="left" valign="middle"><input type="text" name="txtNamasiswa" required id="textfield" placeholder="Nama Siswa"></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Nilai B.Indo</th>
    <td align="left" valign="middle"><input placeholder="Nilai Bahasa Indonesia" type="text" required name="txtBindo" id="textfield2"></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Nilai B.Inggris</th>
    <td align="left" valign="middle"><input type="text" name="txtBing" id="txtBing" required placeholder="Nilai Bahasa Inggris"></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Nilai Matematika</th>
    <td align="left" valign="middle"><input placeholder="Nilai Matematika" type="text" required name="txtMat" id="textfield4"></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Nilai IPA</th>
    <td align="left" valign="middle"><input type="text" name="txtIpa" placeholder="Nilai IPA" required id="textfield5"></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Keterangan</th>
    <td align="left" valign="middle">
    	<select name="select" size="1" dropzone="move" id="select">
          <option value="">&nbsp;</option>
          <option value="Lulus">Lulus</option>
          <option value="Tidak Lulus">Tidak Lulus</option>
        </select></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Komentar</th>
    <td align="left" valign="middle"><textarea placeholder="Isikan Komentar" name="txtKmnt" id="textarea" style="resize:none"></textarea></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>
    	<input class="btn btn-success" type="submit" name="button" id="button" value="Tambah" width="40px">
      	<input type="reset" name="button2" id="button2" value="Reset" class="btn btn-danger">
	</td>
  </tr>
</table>
<input type="hidden" name="MM_insert" value="form-add">

</form>
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