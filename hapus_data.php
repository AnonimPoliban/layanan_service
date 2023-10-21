<?php
require 'function.php';

$id = $_GET['id'];
$nama_tabel = $_GET['nama_tabel'];
$id_kolom = $_GET['id_kolom'];

if (hapus_data($id, $nama_tabel, $id_kolom)) {
  echo "<script>
  alert('Berhasil Dihapus !!');location.href='admin.php?url=data_$nama_tabel';
            </script>";
} else {
  echo "<script>
  alert('Gagal Dihapus !!');location.href='admin.php?url=data_$nama_tabel';
        </script>";
}
?>
