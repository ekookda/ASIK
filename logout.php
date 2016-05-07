<?php
  session_start();
  if (isset($_SESSION['id_peserta'])){
    // kembalikan variabel session ke kondisi null
    $_SESSION = array();

    // Hancurkan Session
    session_destroy();
    echo "<script>
            window.alert('Terima kasih telah berkunjung. Jangan lupa mengisi buku tamu :)');
            window.location=('index.php')
          </script>
    ";
  }
?>
