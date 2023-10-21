<?php
session_start();
?>
<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        h3 {
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            text-decoration: none;
        }

        .card-header a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<div class="container mt-1 ">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 align="left">Riwayat</h3>
                </div>
                <div class="card-body">
                    <table border="1" align="center" class="table table-hover table-bordered" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kerusakan</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Merk Hp</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "koneksi.php";
                            $tampil = "select * from riwayat join pengajuan on riwayat.id_pengajuan = pengajuan.id_pengajuan join pengambilan on riwayat.id_pengambilan = pengambilan.id_pengambilan";
                            $query = mysqli_query($konekDB, $tampil);
                            $no = 1;
                            while ($data = mysqli_fetch_array($query)) {

                            ?>
                                <tr margin="auto">
                                    <td>
                                        <?php echo $no++; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['nama']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['kerusakan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['tgl_pengajuan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['merk_hp']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['tgl_pengambilan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['biaya']; ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            window.print();
        </script>
    </div>

</html>