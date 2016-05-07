<?php
  session_start();
  include '../library/koneksi.php';
  $link = koneksi();

  if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];
    $query = "DELETE FROM admin WHERE user_id='$id'";
    $delete = mysqli_query($link, $query);

    if ($delete) {
      echo "<script language='JavaScript'>window.alert('Data berhasil dihapus');
            window.location=('datauser.php')</script>";
    } else {
      echo "<script>window.alert('Data gagal dihapus');
            window.location=('datauser.php')</script>";
    }
  }
?>
