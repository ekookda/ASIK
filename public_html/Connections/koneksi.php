<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_koneksi = "mysql.idhostinger.com";
$database_koneksi = "u303314754_asik";
$username_koneksi = "u303314754_toor";
$password_koneksi = "12345abcde";
$koneksi = mysql_pconnect($hostname_koneksi, $username_koneksi, $password_koneksi) or trigger_error(mysql_error(),E_USER_ERROR); 
?>