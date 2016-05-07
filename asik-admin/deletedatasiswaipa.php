<?php
  session_start();
  include '../library/koneksi.php';
  $link = koneksi();

  if (isset($_GET['id_peserta'])) {
    $id       = $_GET['id_peserta'];
    $delsiswa = "DELETE FROM siswa WHERE id_peserta='$id'";
    $delnilai = "DELETE FROM nilai WHERE id_peserta='$id'";
    $delete   = mysqli_query($link, $delsiswa) AND mysqli_query($link, $delnilai);

    if ($delete) {
      echo "<script language='JavaScript'>window.alert('Data berhasil dihapus');
            window.location=('datasiswaipa.php')</script>";
    } else {
      echo "<script>window.alert('Data gagal dihapus');
            window.location=('datasiswaipa.php')</script>";
    }
  }
?>
