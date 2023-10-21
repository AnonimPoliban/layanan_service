<?php
    session_start();
    session_destroy();

    echo "<script>
        alert('Anda Telah Keluar Dari Sistem');location.href='index.php';
        </script>";
    
?>