<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
require_once('Connections/koneksi.php'); ?>
<?php
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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['txtUsername'])) {
  $loginUsername=$_POST['txtUsername'];
  $password=$_POST['txtPassword'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "hal-admin.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_koneksi, $koneksi);
  
  $LoginRS__query=sprintf("SELECT username, pass FROM tbl_user WHERE username=%s AND pass=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $koneksi) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
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
<div class="container-fluid">
<form name="form-login" method="POST" action="<?php echo $loginFormAction; ?>">
  <table width="490" border="0" align="center" cellpadding="3" cellspacing="1" class="table-condensed" id="map_canvas" style="background-color:rgba(0,204,255,0.1); border-radius:10px">
  	<legend style="padding-left:20px; color:rgba(204,0,0,0.5); text-shadow:rgba(0,0,255,0.1); font-size:24px; font-family:Verdana, Geneva, sans-serif; transform-style:preserve-3d"><strong>Sistem Informasi Kelulusan</strong></legend>
    <tr style="border-radius:5px;">
      <td colspan="3" align="center" valign="middle"><h3 style="color: rgba(255,0,0,0.5)"><strong><em>LOGIN ADMIN</em></strong></h3></td>
    </tr>
    <tr>
      <td colspan="2" rowspan="4" align="center" valign="middle"><img src="img/login-key.png"></td>
      <td width="281">Username</td>
    </tr>
    <tr>
      <td align="left" valign="middle">
          <p>
            <label for="admin">
              <input name="txtUsername" placeholder="Username" type="text" class="table-hover">
            </label>
          </p>
          <p>Password</p>
          <p>
            <label for="Pass">
              <input type="password" name="txtPassword" placeholder="Password">
            </label>
          </p>
      </td>
    </tr>
    <tr>
      <td><input name="btnLog" type="submit" class="btn btn-success" id="btn" value="LogIn"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
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