<?php
  //cetak function
  current_date();

  //function current date
  function current_date() {
    // set time zone asia
    date_default_timezone_set('Asia/Jakarta');

    // Set waktu sekarang
    $thedate  = getdate();

    // array date
    $arrayHari  = array(1 => "Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
    $hari       = $arrayHari[date("N")];

    // format tanggal
    $tanggal    = date("j");
    // array bulan
    $arrayBulan = array(1 => "Januari","Februari","Maret","April","Mei",
                          "Juni","Juli","Agustus","September","Oktober",
                          "November","Desember");
    $bulan      = $arrayBulan[date("n")];

    // format tahun
    $tahun      = date("Y");

    // tampilkan waktu
    $current_date = "$hari, $tanggal $bulan $tahun";
    echo "<strong>".$current_date."</strong>";
  }
?>
