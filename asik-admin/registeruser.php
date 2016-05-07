<?php
  session_start();
  include '../library/koneksi.php';
  $link = koneksi();

  if (isset($_POST['btn-daftar'])) {
    $nama     = mysqli_escape_string($link, $_POST['nama']);
    $username = mysqli_escape_string($link, $_POST['username']);
    $pass     = mysqli_escape_string($link, $_POST['pass']);
    $tlp      = mysqli_escape_string($link, $_POST['notelp']);

    // buat query INSERT
    $query = mysqli_query($link, "INSERT INTO admin (user_id, nama_lengkap, password, username, no_telp) VALUES ('', '$nama', MD5('$pass'), '$username', '$tlp')");
    if (!$query) {
      echo "<script>window.alert('Data gagal disimpan. Coba ulangi lagi');
            window.location=('tambahuser.php')</script>";
    } else {
      echo "<script>window.alert('User baru telah berhasil dibuat');
            window.location=('datauser.php')</script>";
    }
  }
?>
