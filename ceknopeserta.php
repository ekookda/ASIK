<?php
  session_start();
  include 'library/koneksi.php';
  $link = koneksi();

  if (isset($_POST['btnProses'])) {
    $peserta = $_POST['nopeserta'];
    $_peserta = stripslashes(htmlentities($peserta, ENT_QUOTES));

    $nomor   = $_POST['nomorpeserta'];
    $_nomor   = stripslashes(htmlentities($nomor, ENT_QUOTES));

    $idpeserta  = "01-02-066-";
    $idpeserta  .= $_peserta."-".$_nomor;

    // echo $idpeserta;
    // echo $nomor;

    // Query SQL
    $sql    = "SELECT * FROM siswa WHERE id_peserta='$idpeserta'";
    $query  = mysqli_query($link, $sql);
    $cek    = mysqli_fetch_array($query, MYSQLI_ASSOC);
    if (!$cek) {
      echo "
        <script>
          alert(\"Nomor yang anda masukkan salah. Silahkan coba lagi\");
          window.location=(\"index.php\");
        </script>
      ";
      echo mysqli_error($link);
    } else {
      // menyimpan kedalam session
      $_SESSION['id_peserta']=$idpeserta;
      $_SESSION['nama'] = $cek['nama_siswa'];
      header('location: pengumuman.php?id_peserta='.$idpeserta);
    }
  }
