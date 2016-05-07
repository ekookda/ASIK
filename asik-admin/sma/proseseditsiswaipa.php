<?php
  session_start();
  include '../library/koneksi.php';
  $link = koneksi();

  if (isset($_POST['btn-simpan'])) {
    // buat variabel untuk menangkap langsung id dari address browser
    $nopeserta  = $_POST['nomorpeserta'];
    $namapeserta= mysqli_real_escape_string($link, $_POST['namasiswa']);
    $jurusan    = mysqli_real_escape_string($link, $_POST['jurusan']);
    $naindo     = mysqli_real_escape_string($link, $_POST['nbind']);
    $nbing      = mysqli_real_escape_string($link, $_POST['nbing']);
    $nmat       = mysqli_real_escape_string($link, $_POST['nmtk']);
    $biologi    = mysqli_real_escape_string($link, $_POST['biologi']);
    $fisika     = mysqli_real_escape_string($link, $_POST['fisika']);
    $kimia      = mysqli_real_escape_string($link, $_POST['kimia']);
    $keterangan = mysqli_real_escape_string($link, $_POST['keterangan']);
    $pesan      = mysqli_real_escape_string($link, $_POST['pesan']);

    // buat query INSERT
    $qrysiswa = mysqli_query($link, "UPDATE siswa SET nama_siswa='$namapeserta', jurusan='$jurusan' WHERE id_peserta='$nopeserta'");
    $qrynilai = mysqli_query($link, "UPDATE nilai SET naindo='$naindo', nainggris='$nbing', namat='$nmat', biologi='$biologi', fisika='$fisika', kimia='$kimia', keterangan='$keterangan', pesan='$pesan' WHERE id_peserta='$nopeserta'");
    if (!$qrysiswa AND !$qrynilai) {
        echo "<script>window.alert('Data gagal disimpan. Coba ulangi lagi');
            window.location=('editdatasiswaipa.php?id_peserta=$nopeserta')</script>";
    } else {
        echo "<script>window.alert('Data siswa telah berhasil diubah');
            window.location=('datasiswaipa.php')</script>";
    }
  }
?>
