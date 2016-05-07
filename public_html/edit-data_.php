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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form-edit")) {
  $updateSQL = sprintf("UPDATE tb_student SET noujian=%s, name=%s, naindo=%s, nainggris=%s, namat=%s, naipa=%s, ket=%s, komentar=%s WHERE id=%s",
                       GetSQLValueString($_POST['txtNomor'], "text"),
                       GetSQLValueString($_POST['txtNamasiswa'], "text"),
                       GetSQLValueString($_POST['txtBindo'], "text"),
                       GetSQLValueString($_POST['txtBing'], "text"),
                       GetSQLValueString($_POST['txtMat'], "text"),
                       GetSQLValueString($_POST['txtIpa'], "text"),
                       GetSQLValueString($_POST['select'], "text"),
                       GetSQLValueString($_POST['txtKmnt'], "text"),
                       GetSQLValueString($_POST['txtId'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "data-siswa.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Update = "-1";
if (isset($_GET['id'])) {
  $colname_Update = $_GET['id'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_Update = sprintf("SELECT * FROM tb_student WHERE id = %s", GetSQLValueString($colname_Update, "int"));
$Update = mysql_query($query_Update, $koneksi) or die(mysql_error());
$row_Update = mysql_fetch_assoc($Update);
$totalRows_Update = mysql_num_rows($Update);
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
<form action="<?php echo $editFormAction; ?>" method="POST" name="form-edit" target="_self" lang="en">
<legend style="font-size:30px">Form Edit Data Siswa</legend>
<table width="500" border="0" align="center" cellpadding="3" cellspacing="1" class="table-striped table-condensed">
  <tr>
    <th align="left" valign="middle" scope="row"></th>
    <td align="left" valign="middle"><input name="txtId" type="hidden" required id="textfield7" value="<?php echo $row_Update['id']; ?>"></td>
  </tr>
  <tr>
    <th width="158" align="left" valign="middle" scope="row">Nomor Peserta Ujian</th>
    <td width="327" align="left" valign="middle"><input name="txtNomor" type="text" required placeholder="Nomor Peserta Ujian" value="<?php echo $row_Update['noujian']; ?>"></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Nama Siswa</th>
    <td align="left" valign="middle"><input name="txtNamasiswa" type="text" required id="textfield" placeholder="Nama Siswa" value="<?php echo $row_Update['name']; ?>"></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Nilai B.Indo</th>
    <td align="left" valign="middle"><input name="txtBindo" type="text" required id="textfield2" placeholder="Nilai Bahasa Indonesia" value="<?php echo $row_Update['naindo']; ?>"></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Nilai B.Inggris</th>
    <td align="left" valign="middle"><input name="txtBing" type="text" required id="txtBing" placeholder="Nilai Bahasa Inggris" value="<?php echo $row_Update['nainggris']; ?>"></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Nilai Matematika</th>
    <td align="left" valign="middle"><input name="txtMat" type="text" required id="textfield4" placeholder="Nilai Matematika" value="<?php echo $row_Update['namat']; ?>"></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Nilai IPA</th>
    <td align="left" valign="middle"><input name="txtIpa" type="text" required id="textfield5" placeholder="Nilai IPA" value="<?php echo $row_Update['naipa']; ?>"></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Keterangan</th>
    <td align="left" valign="middle"><select name="select" size="1" id="select">
    <?php
do {  
?>
      <option value="<?php echo $row_Update['id']?>"<?php if (!(strcmp($row_Update['id'], $row_Update['ket']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Update['ket']?></option>
      <?php
} while ($row_Update = mysql_fetch_assoc($Update));
  $rows = mysql_num_rows($Update);
  if($rows > 0) {
      mysql_data_seek($Update, 0);
	  $row_Update = mysql_fetch_assoc($Update);
  }
?>
      <option value="Lulus" <?php if (!(strcmp("Lulus", $row_Update['ket']))) {echo "selected=\"selected\"";} ?>>Lulus</option>
      <option value="Tidak Lulus" <?php if (!(strcmp("Tidak Lulus", $row_Update['ket']))) {echo "selected=\"selected\"";} ?>>Tidak Lulus</option>
    </select></td>
  </tr>
  <tr>
    <th align="left" valign="middle" scope="row">Komentar</th>
    <td align="left" valign="middle"><textarea placeholder="Isikan Komentar" name="txtKmnt" id="textarea" style="resize:none"><?php echo $row_Update['komentar']; ?></textarea></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>
    	<input class="btn btn-success" type="submit" name="button" id="button" value="Update" width="40px">
	</td>
  </tr>
</table>
<input type="hidden" name="MM_update" value="form-edit">
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
<?php
mysql_free_result($Update);
?>