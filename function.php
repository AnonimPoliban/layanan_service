<?php
$koneksi = mysqli_connect("localhost", "root", "", "service") or die("Koneksi Gagal");


// Function Data Pengajuan
function tambah_pengajuan($query)
{
  global $koneksi;

  $a = addslashes($query['nama']);
  $b = $query['kerusakan'];
  $c = $query['tgl_pengajuan'];
  $d = $query['merk_hp'];
  $e = $query['no_hp'];
  $f = $query['alamat'];

  $sql = "INSERT INTO pengajuan (nama, kerusakan, tgl_pengajuan, merk_hp, no_hp, alamat, status) VALUES ('$a','$b','$c','$d','$e','$f', 'Belum Diambil')";
  mysqli_query($koneksi, $sql);

  return mysqli_affected_rows($koneksi);
}

function ubah_pengajuan($query)
{
  global $koneksi;

  $id = $query['id_pengajuan'];
  $nama = addslashes($query['nama']);
  $kerusakan = $query['kerusakan'];
  $tgl_pengajuan = $query['tgl_pengajuan'];
  $merk_hp = $query['merk_hp'];
  $no_hp = $query['no_hp'];
  $alamat = $query['alamat'];

  $ubah = "UPDATE pengajuan SET nama='$nama', kerusakan='$kerusakan', tgl_pengajuan='$tgl_pengajuan', merk_hp='$merk_hp', no_hp='$no_hp', alamat='$alamat' WHERE id_pengajuan='$id' ";
  mysqli_query($koneksi, $ubah);

  return mysqli_affected_rows($koneksi);
}
// Function Data Pengajuan
function tambah_pengambilan($query)
{
  global $koneksi;

  $tgl_pengambilan = $query['tgl_pengambilan'];
  $biaya = $query['biaya'];
  $id_pengajuan = $query['id_pengajuan'];

  $id_pengambilan_query = "SELECT MAX(id_pengambilan) as max_id FROM pengambilan";
  $result = mysqli_query($koneksi, $id_pengambilan_query);
  $row = mysqli_fetch_array($result);
  $id_pengambilan = $row['max_id'] + 1;

  $sql = "INSERT INTO pengambilan (id_pengambilan, tgl_pengambilan, biaya, id_pengajuan) VALUES ('$id_pengambilan','$tgl_pengambilan','$biaya','$id_pengajuan')";
  mysqli_query($koneksi, $sql);
  $sql2 = "UPDATE pengajuan SET status='Sudah Diambil' WHERE id_pengajuan='$id_pengajuan'";
  mysqli_query($koneksi, $sql2);
  $sql3 = "INSERT INTO riwayat (id_pengajuan, id_pengambilan) VALUES ('$id_pengajuan', '$id_pengambilan')";
  mysqli_query($koneksi, $sql3);

  return mysqli_affected_rows($koneksi);
}

function ubah_pengambilan($query)
{
  global $koneksi;

  $id_pengambilan = $query['id_pengambilan'];
  $tgl_pengambilan = $query['tgl_pengambilan'];
  $biaya = $query['biaya'];
  $ubah = "UPDATE pengambilan SET tgl_pengambilan='$tgl_pengambilan', biaya='$biaya' WHERE id_pengambilan='$id_pengambilan' ";
  mysqli_query($koneksi, $ubah);

  return mysqli_affected_rows($koneksi);
}


function hapus_data($id, $nama_tabel, $id_kolom)
{

  global $koneksi;

  $id = mysqli_real_escape_string($koneksi, $id);
  $nama_tabel = mysqli_real_escape_string($koneksi, $nama_tabel);

  $query = "DELETE FROM $nama_tabel WHERE $id_kolom = '$id'";
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

function hapus_data_pengambilan($id, $id_pengajuan, $nama_tabel, $id_kolom)
{

  global $koneksi;

  $id = mysqli_real_escape_string($koneksi, $id);
  $id_pengajuan = mysqli_real_escape_string($koneksi, $id_pengajuan);
  $nama_tabel = mysqli_real_escape_string($koneksi, $nama_tabel);

  $query = "DELETE FROM $nama_tabel WHERE $id_kolom = '$id'";
  mysqli_query($koneksi, $query);
  $query2 = "DELETE FROM riwayat WHERE id_pengambilan = '$id'";
  mysqli_query($koneksi, $query2);
  $query3 = "UPDATE pengajuan SET status='Belum Diambil' WHERE id_pengajuan='$id_pengajuan'";
  mysqli_query($koneksi, $query3);

  return mysqli_affected_rows($koneksi);
}
