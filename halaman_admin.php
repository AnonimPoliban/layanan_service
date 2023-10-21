<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];

    if ($url == 'data_pengajuan') {
        include 'data_pengajuan.php';
    } elseif ($url == 'data_pengambilan') {
        include 'data_pengambilan.php';
    } elseif ($url == 'riwayat') {
        include 'riwayat.php';
    } elseif ($url == 'dashboard') {
        include 'dashboard.php';
    } else {
        include 'dashboard.php';
    }
}
