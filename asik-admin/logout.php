<?php
  session_start();
  if (isset($_SESSION['username']) OR isset($_SESSION['password'])) {
    // kembalikan variabel session ke kondisi null
    $_SESSION = array();

    // Hancurkan Session
    session_destroy();
    echo "<script>window.alert('Anda telah logout');
          window.location=('../index.php')</script>";
  } else {
    header('location:index.php');
  }
?>
