<?php
  session_start();
  include '../library/koneksi.php';
  $link = koneksi();

  if (isset($_POST['btn-edit'])) {
    // buat variabel untuk menangkap langsung id dari address browser
    $id       = mysqli_real_escape_string($link, $_POST['id']);
    $nama     = mysqli_escape_string($link, $_POST['nama']);
    $username = mysqli_escape_string($link, $_POST['username']);
    // $pass     = mysqli_escape_string($link, $_POST['pass']);
    $level    = $_POST['level'];

    // buat query INSERT
    $query = mysqli_query($link, "UPDATE admin SET nama_lengkap='$nama', username='$username', nama_level='$level' WHERE user_id='$id'");
    if (!$query) {
      echo "<script>window.alert('Data gagal disimpan. Coba ulangi lagi');
            window.location=('edituser.php?id=$id')</script>";
    } else {
      echo "<script>window.alert('Data user telah berhasil diubah');
            window.location=('datauser.php')</script>";
    }
  }
?>
