<?php
require 'function.php';

if (isset($_POST['simpan'])) {
  if (tambah_pengambilan($_POST)) {
    echo "<script>
      alert('Berhasil Diinput!');location.href='admin.php?url=data_pengambilan';
          </script>";
  } else {
    echo "<script>
    alert('Gagal!');location.href='admin.php?url=data_pengambilan';
          </script>";
  }
}

if (isset($_POST['ubah'])) {
  if (ubah_pengambilan($_POST) > 0) {
    echo "<script>
      alert('Berhasil Diubah !!');location.href='admin.php?url=data_pengambilan';
          </script>";
  } else {
    // Jika fungsi ubah jika data tidak terubah, maka munculkan alert dibawah
    echo "<script>
      alert('Gagal Diubah !!');location.href='admin.php?url=data_pengambilan';
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
  <title>Data Pengambilan</title>
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
            <h3 class="float-start judul-atas">Data Pengambilan</h3>

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
                  <th>No Hp</th>
                  <th>Tanggal Pengambilan</th>
                  <th>Biaya</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "koneksi.php";
                $tampil = "select pengambilan.*, pengajuan.nama, pengajuan.kerusakan, pengajuan.no_hp from pengambilan join pengajuan on pengambilan.id_pengajuan = pengajuan.id_pengajuan;";
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
                      <?php echo $data['no_hp']; ?>
                    </td>
                    <td>
                      <?php echo $data['tgl_pengambilan']; ?>
                    </td>
                    <td>
                      <?php echo $data['biaya']; ?>
                    </td>
                    <td>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit<?= $no ?>">
                        Edit
                      </button>
                      <a href="hapus_data_pengambilan.php?id=<?php echo $data['id_pengambilan']; ?>&nama_tabel=pengambilan&id_kolom=id_pengambilan&id_pengajuan=<?php echo $data['id_pengajuan']; ?>" class='btn btn-danger btn-sm' onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $data['nama'] ?> ?');">Hapus</a>
                    </td>
                  </tr>

                  <!--Edit Data Modal -->
                  <div class="modal fade" id="modalEdit<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pengambilan</h1>
                          <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <input type="hidden" value="<?php echo $data['id_pengambilan']; ?>" name="id_pengambilan" id="" class="form-control" readonly>
                              <label for="nama">Nama</label>
                              <input type="text" value="<?php echo $data['nama']; ?>" name="nama" id="" class="form-control" readonly>
                              <label for="">Kerusakan</label>
                              <input type="text" value="<?php echo $data['kerusakan']; ?>" name="kerusakan" id="" class="form-control" readonly>
                              <label for="">Tanggal Pengambilan</label>
                              <input type="date" value="<?php echo $data['tgl_pengambilan']; ?>" name="tgl_pengambilan" id="" class="form-control" required>
                              <label for="biaya_awal">Biaya</label>
                              <input type="text" name="input_biaya" id="input_biayaEdit" class="form-control input-biaya" required>
                              <label for="biaya">(Biaya + Pajak 10%)</label>
                              <input type="text" value="<?php echo $data['biaya']; ?>" name="biaya" id="biayaEdit" class="form-control biaya" readonly>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pengambilan</h1>
          <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="id_pengajuan">Id Pengajuan</label>
              <select name="id_pengajuan" id="id_pengajuan" class="form-select" required onchange="tampilkanDataPengajuan()">
                <option value="">Pilih Id Pengajuan</option>
                <?php
                include "koneksi.php";
                $data_pengajuan = "select * from pengajuan where status='Belum Diambil'";
                $sql = mysqli_query($konekDB, $data_pengajuan);

                while ($data = mysqli_fetch_array($sql)) {
                ?>
                  <option value="<?php echo $data['id_pengajuan'] ?>" data-nama="<?php echo $data['nama'] ?>" data-kerusakan="<?php echo $data['kerusakan'] ?>">
                    <?php echo $data['id_pengajuan'] ?>
                  </option>
                <?php
                }
                ?>
              </select>

            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control" readonly>
              <label for="kerusakan">Kerusakan</label>
              <input type="text" name="kerusakan" id="kerusakan" class="form-control" readonly>
              <label for="tgl_pengajuan">Tanggal Pengambilan</label>
              <input type="date" name="tgl_pengambilan" id="" class="form-control" required>
              <label for="biaya_awal">Biaya</label>
              <input type="text" name="input_biaya" id="input_biayaTambah" class="form-control" required>
              <label for="biaya">(Biaya + Pajak 10%)</label>
              <input type="text" name="biaya" id="biayaTambah" class="form-control" readonly>
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
  <script>
    function tampilkanDataPengajuan() {
      let select = document.getElementById("id_pengajuan");
      let input_nama = document.getElementById("nama");
      let input_kerusakan = document.getElementById("kerusakan");
      let selectedOption = select.options[select.selectedIndex];

      if (selectedOption.value !== "") {
        let nama = selectedOption.getAttribute("data-nama");
        let kerusakan = selectedOption.getAttribute("data-kerusakan");
        input_nama.value = nama;
        input_kerusakan.value = kerusakan;
      } else {
        input_nama.value = "";
        input_kerusakan.value = "";
      }
    }

    function hitungPajakTambah() {
      const biaya = document.getElementById("biayaTambah");

      let biaya_awal = parseFloat(input_biayaTambah.value);
      if (input_biayaTambah.value !== "") {
        const biaya_akhir = biaya_awal + (0.1 * biaya_awal);
        biaya.value = biaya_akhir;
      } else {
        biaya.value = "";
      }
    }

    const input_biayaTambah = document.getElementById("input_biayaTambah");
    input_biayaTambah.addEventListener("input", () => {
      hitungPajakTambah()
    })

    const input_biaya_elements = document.querySelectorAll(".input-biaya");

    document.addEventListener("input", (event) => {
      if (event.target.classList.contains("input-biaya")) {
        hitungPajak(event.target);
      }
    });

    function hitungPajak(inputElement) {
      const biaya_awal = parseFloat(inputElement.value);
      if (!isNaN(biaya_awal)) {
        const biaya_akhir = biaya_awal + 0.1 * biaya_awal;
        const biayaOutput = inputElement.closest(".modal").querySelector(".biaya");
        if (biayaOutput) {
          biayaOutput.value = biaya_akhir;
        }
      }
    }
  </script>
</body>

</html>