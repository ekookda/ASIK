<?php
  session_start();
  include 'library/koneksi.php';
  $link = koneksi();

  if (isset($_POST['btn-kirim'])) {
    $nama  = mysqli_real_escape_string($link, $_POST['name']);
    $email = mysqli_escape_string($link, $_POST['email']);
    $judul = mysqli_escape_string($link, $_POST['judul']);
    $pesan = mysqli_escape_string($link, $_POST['pesan']);

    // Query SQL
    $sql    = "INSERT INTO bukutamu (guest_name, email, judul, pesan) VALUES ('$nama', '$email', '$judul', '$pesan')";
    $kirim  = mysqli_query($link, $sql);
    if (!$kirim) {
      echo "Pesan tidak terkirim. Silahkan <a href='bukutamu.php'>Mengisi</a> Kembali";
      echo mysqli_error($link);
    } else {
      echo "<script>window.alert('Pesan telah terkirim. Terima kasih atas kesediaannya mengisi buku tamu');
            window.location=('index.php')</script>";
    }
  }
?>
