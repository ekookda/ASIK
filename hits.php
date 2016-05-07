<?php


# Membuat hits counter tanpa database
  // $fp = fopen("hits.txt", "r");
  // $count = fread($fp, 1024);
  // fclose($fp);
  // $count = $count + 1;
  // echo $count;
  // $fp = fopen("hits.txt", "w");
  // fwrite($fp, $count);
  // fclose($fp);

  // Menangkap IP Pengunjung
  function initCounter() {
    $link = new mysqli('localhost', 'root', '', 'asik');
    if ($link->connect_errno) {
      echo "Database galat". $link->connect_error;
    }
     $ip = $_SERVER['REMOTE_ADDR']; // menangkap ip pengunjung
     $location = $_SERVER['PHP_SELF']; // menangkap server path

     //membuat log dalam tabel database 'counter'
     $create_log = $link->query("INSERT INTO counter(ipaddress,location)VALUES('$ip', '$location') ");

   }

   # Fungsi menghitung jumlah pengunjung
   function getCounter($mode, $location = NULL) {

     $link = new mysqli('localhost', 'root', '', 'asik');
     if ($link->connect_errno) {
       echo "Database galat". $link->connect_error;
     }

      if(is_null($location)) {
           $location = $_SERVER['PHP_SELF'];
      }

      if($mode == "unique") // query perhitungan IP Address unik
      {
           $get_res = $link->query( "SELECT DISTINCT ipaddress FROM counter WHERE location = '$location' ");
      } else { // query perhitungan seluruh IP Address (tidak unik)
           $get_res = $link->query( "SELECT ipaddress FROM counter WHERE location = '$location' ");
      }

      $res = $get_res->num_rows;

      return $res;

    }
?>
