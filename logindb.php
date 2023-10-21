<?php
include 'koneksi.php';
$user = $_POST['username'];
$pass = $_POST['password'];
$login = "select * from admin where username='$user' and password='$pass'";
$sql = mysqli_query($konekDB, $login);
$jumlah = mysqli_num_rows($sql);
$data = mysqli_fetch_array($sql);

if ($jumlah == 1) {
    session_start();
    $_SESSION['user'] = $data['username'];
    $_SESSION['pass'] = $data['password'];
    echo "<script>alert('Selamat Datang " . $_SESSION['user'] . "');location.href='admin.php?url=dashboard'</script>";
} else {
    echo "<script>alert('Masukan Kembali Data Dengan Benar !!');location.href='index.php';</script>";
}
