<?php
require 'function.php';

if (isset($_POST['simpan'])) {
  if (tambah_pengajuan($_POST)) {
    echo "<script>
      alert('Berhasil Diinput!');location.href='admin.php?url=data_pengajuan';
          </script>";
  } else {
    echo "<script>
    alert('Gagal!');location.href='admin.php?url=data_pengajuan';
          </script>";
  }
}

if (isset($_POST['ubah'])) {
  if (ubah_pengajuan($_POST) > 0) {
    echo "<script>
      alert('Berhasil Diubah !!');location.href='admin.php?url=data_pengajuan';
          </script>";
  } else {
    // Jika fungsi ubah jika data tidak terubah, maka munculkan alert dibawah
    echo "<script>
      alert('Gagal Diubah !!');location.href='admin.php?url=data_pengajuan';
          </script>";
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pengajuan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <style>
    #exampleModalLabel {
      font-size: 20px;
    }
  </style>
</head>

<body>


  <div class="container mt-1 ">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="float-start judul-atas">Data Pengajuan</h3>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-end mt-1" data-toggle="modal" data-target="#exampleModal">
              Tambah Data
            </button>
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
                  <th>No Hp</th>
                  <th>Alamat</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "koneksi.php";
                $tampil = "select * from pengajuan;";
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
                      <?php echo $data['no_hp']; ?>
                    </td>
                    <td>
                      <?php echo $data['alamat']; ?>
                    </td>
                    <td>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit<?= $no ?>">
                        Edit
                      </button>
                      <a href="hapus_data.php?id=<?php echo $data['id_pengajuan']; ?>&nama_tabel=pengajuan&id_kolom=id_pengajuan" class='btn btn-danger btn-sm' onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $data['nama'] ?> ?');">Hapus</a>
                    </td>
                  </tr>

                  <!--Edit Data Modal -->
                  <div class="modal fade" id="modalEdit<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pengajuan</h1>
                          <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <input type="hidden" value="<?php echo $data['id_pengajuan']; ?>" name="id_pengajuan" id="" class="form-control" readonly>
                              <label for="nama">Nama</label>
                              <input type="text" value="<?php echo $data['nama']; ?>" name="nama" id="" class="form-control" required>
                              <label for="">Kerusakan</label>
                              <input type="text" value="<?php echo $data['kerusakan']; ?>" name="kerusakan" id="" class="form-control" required>
                              <label for="">Tanggal Pengajuan</label>
                              <input type="date" value="<?php echo $data['tgl_pengajuan']; ?>" name="tgl_pengajuan" id="" class="form-control" required>
                              <label for="">Merk Hp</label>
                              <input type="text" value="<?php echo $data['merk_hp']; ?>" name="merk_hp" id="" class="form-control" required>
                              <label for="">No Hp</label>
                              <input type="text" value="<?php echo $data['no_hp']; ?>" name="no_hp" id="" class="form-control" required>
                              <label for="">Alamat</label>
                              <input type="text" value="<?php echo $data['alamat']; ?>" name="alamat" id="" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
                          <button type="reset" class="btn btn-secondary">Bersihkan</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!--Tambah Data Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pengajuan</h1>
          <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama" id="" class="form-control" required>
              <label for="kerusakan">Kerusakan</label>
              <input type="text" name="kerusakan" id="" class="form-control" required>
              <label for="tgl_pengajuan">Tanggal Pengajuan</label>
              <input type="date" name="tgl_pengajuan" id="" class="form-control" required>
              <label for="merk_hp">Merk Hp</label>
              <input type="text" name="merk_hp" id="" class="form-control" required>
              <label for="no_hp">No Hp</label>
              <input type="text" name="no_hp" id="" class="form-control" required>
              <label for="alamat">Alamat</label>
              <input type="text" name="alamat" id="" class="form-control" required>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
          <button type="reset" class="btn btn-secondary">Bersihkan</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script>
    new DataTable('#dataTable');
  </script>
</body>

</html>