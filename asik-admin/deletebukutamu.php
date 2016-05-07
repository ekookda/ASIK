<?php
  session_start();
  include '../library/koneksi.php';
  $link = koneksi();

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM bukutamu WHERE id='$id'";
    $delete = mysqli_query($link, $query);

    if ($delete) {
      echo "<script language='JavaScript'>window.alert('Pesan berhasil dihapus');
            window.location=('bukutamu.php')</script>";
    } else {
      echo "<script>window.alert('Pesan gagal dihapus');
            window.location=('bukutamu.php')</script>";
    }
  }
?>
