<?php
  session_start();
  include '../library/koneksi.php';
  $link = koneksi();

  if (isset($_POST['btn-simpan'])) {
    $nopeserta  = $_POST['nomorpeserta'];
    $namapeserta= mysqli_escape_string($link, $_POST['namasiswa']);
    $jurusan    = mysqli_escape_string($link, $_POST['jurusan']);
    $nbindo     = mysqli_escape_string($link, $_POST['nbind']);
    $nbing      = mysqli_escape_string($link, $_POST['nbing']);
    $nmat       = mysqli_escape_string($link, $_POST['nmtk']);
    $nipa       = mysqli_escape_string($link, $_POST['nipa']);
    $nips       = mysqli_escape_string($link, $_POST['nips']);
    $keterangan = mysqli_escape_string($link, $_POST['keterangan']);
    $pesan      = mysqli_escape_string($link, $_POST['pesan']);

    // Cek nomor peserta di database
    $ceknopeserta= mysqli_num_rows(mysqli_query($link, "SELECT id_peserta FROM siswa WHERE id_peserta='$nopeserta'"));

    // Mencegah nomor peserta yang sama
    if ($ceknopeserta > 0) {
      echo "Nomor peserta <strong>$nopeserta</strong> sudah digunakan. Silahkan masukkan nomor peserta yang baru <br>";
      echo "Klik tombol untuk kembali <input type='button' class='btn btn-warning' value='Kembali' onclick='history.back(-1)' />";
    } else {
      // buat query INSERT
      $qrysiswa = mysqli_query($link, "INSERT INTO siswa (id_peserta, nama_siswa, jurusan) VALUES ('$nopeserta', '$namapeserta', '$jurusan')");
      $qrynilai = mysqli_query($link, "INSERT INTO nilai (id_peserta, naindo, nainggris, namat, naipa, naips, keterangan, pesan) VALUES ('$nopeserta', '$nbindo', '$nbing', '$nmat', '$nipa', '$nips', '$keterangan', '$pesan')");
      if (!$qrysiswa AND !$qrynilai) {
        echo "<script>window.alert('Data gagal disimpan. Coba ulangi lagi');
              window.location=('tambahdatasiswa.php')</script>";
      } else {
        echo "<script>window.alert('Data siswa telah berhasil dibuat');
              window.location=('datasiswa.php')</script>";
      }
    }
  }
?>
