<?php
  session_start();
  include '../library/koneksi.php';
  $link = koneksi();

  if (isset($_POST['btn-login'])) {
    $username = mysqli_real_escape_string($link, $_POST['name']);
    // $password = mysqli_real_escape_string($link, $_POST['password']);
    $password = md5($_POST['password']);
    $level    = $_POST['leveljenjang'];
    print_r($_POST);

    // Query SQL
    $sql    = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $query  = mysqli_query($link, $sql);
    $cek    = mysqli_fetch_array($query, MYSQLI_ASSOC);
    // echo "<pre>".print_r($cek)."</pre>";

    if (!$cek) {
      echo "Anda gagal login. Silahkan <a href='index.php'>Login</a> Kembali<br>";
      echo mysqli_error($link);
    }
    else {
      if ($level == "administrator" && $cek['nama_level'] == "admin" ) {
        $_SESSION['username']=$username;
        $_SESSION['nama'] = $cek['nama_lengkap'];
        echo $_SESSION['username'];
        header("location:admin.php");
      }
      elseif ($level == "adminsma" && $cek['nama_level'] == "sma") {
        $_SESSION['username']=$username;
        $_SESSION['nama'] = $cek['nama_lengkap'];
        echo $_SESSION['username'];
        header("location:sma/admin.php");
      }
      elseif ($level == "adminsmp" && $cek['nama_level'] == "smp") {
        $_SESSION['username']=$username;
        $_SESSION['nama'] = $cek['nama_lengkap'];
        header("location:smp/admin.php");
      }
      else {
        echo "Anda gagal login. Silahkan <a href='index.php'>Login</a> Kembali<br>";
        echo $_SESSION['username'];
        echo mysqli_error($link);
        // header('location: index.php');
      }
    }
  }
?>
