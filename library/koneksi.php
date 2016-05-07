<?php

  //  $host = "ekookda.dev";
  //  $user = "root";
  //  $pass = "";
  //  $dbs  = "asik";

// Cek koneksi ke SQL
// function koneksi($host, $user, $pass, $dbs)
// {
//   $koneksi = mysqli_connect($host, $user, $pass);
//   if (!$koneksi) {
//     echo "koneksi gagal";
//   }
//
// // Cek koneksi ke database
//   $koneksidb = mysqli_select_db($koneksi, $dbs);
//   if (!$koneksidb) {
//     echo "Koneksi ke database Gagal";
//   }
// }
function koneksi(){
  // $conn = mysqli_connect('mysql.idhostinger.com', 'u303314754_root', '12345abcde', 'u303314754_asik');
  $conn = mysqli_connect('localhost', 'root', '', 'asik');
  return $conn;
}
