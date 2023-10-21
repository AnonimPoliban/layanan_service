<?php
require 'function.php';

$id = $_GET['id'];
$id_pengajuan = $_GET['id_pengajuan'];
$nama_tabel = $_GET['nama_tabel'];
$id_kolom = $_GET['id_kolom'];

if (hapus_data_pengambilan($id, $id_pengajuan, $nama_tabel, $id_kolom)) {
  echo "<script>
  alert('Berhasil Dihapus !!');location.href='admin.php?url=data_$nama_tabel';
            </script>";
} else {
  echo "<script>
  alert('Gagal Dihapus !!');location.href='admin.php?url=data_$nama_tabel';
        </script>";
}
