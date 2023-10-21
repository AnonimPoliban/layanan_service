<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Skranji&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
  <style>
    .text_siswa {
      font-family: 'Ubuntu', sans-serif;
    }

    .text_siswa span {
      font-family: 'Skranji', cursive;
    }
  </style>
</head>

<body>
  <div class="container d-flex justify-content-center gap-3 flex-wrap mt-3">
    <div class="card shadow d-flex align-items-center justify-content-center flex-row" style="width: 28rem;">
      <i class="fa-solid fa-circle-arrow-down ml-4 text-success" style="font-size: 90px !important;"></i>
      <div class="card-body d-flex justify-content-center flex-column">
        <h5 class="card-title text-center">Jumlah Pengajuan</h5>
        <h6 class="card-subtitle mb-2 text-muted text-center">Service</h6>
        <?php
        include 'koneksi.php';

        $data_pengajuan = "select id_pengajuan from pengajuan";
        $sql = mysqli_query($konekDB, $data_pengajuan);
        $jumlah = mysqli_num_rows($sql);
        ?>
        <p class="card-text fs-1 text_siswa text-center"><span class="text-success text-decoration-underline"><?php echo $jumlah ?></span></p>
      </div>
    </div>
    <div class="card shadow d-flex align-items-center justify-content-center flex-row" style="width: 28rem;">
      <i class="fa-solid fa-circle-arrow-up ml-4 text-success" style="font-size: 90px !important;"></i>
      <div class="card-body d-flex justify-content-center flex-column">
        <h5 class="card-title text-center">Jumlah Pengambilan</h5>
        <h6 class="card-subtitle mb-2 text-muted text-center">Service</h6>
        <?php
        include 'koneksi.php';

        $data_pengambilan = "select id_pengambilan from pengambilan";
        $sql = mysqli_query($konekDB, $data_pengambilan);
        $jumlah = mysqli_num_rows($sql);
        ?>
        <p class="card-text fs-1 text_siswa text-center"><span class="text-success text-decoration-underline"><?php echo $jumlah ?></span></p>
      </div>
    </div>
  </div>


  <div class="container mt-4 ">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="float-start judul-atas">Status Pengajuan</h3>

          </div>
          <div class="card-body">
            <table border="1" align="center" class="table table-hover table-bordered" id="dataTable">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Id Pengajuan</th>
                  <th>Nama</th>
                  <th>Kerusakan</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Merk Hp</th>
                  <th>No Hp</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "koneksi.php";
                $tampil = "select * from pengajuan";
                $query = mysqli_query($konekDB, $tampil);
                $no = 1;
                while ($data = mysqli_fetch_array($query)) {

                ?>
                  <tr margin="auto">
                    <td>
                      <?php echo $no++; ?>
                    </td>
                    <td>
                      <?php echo $data['id_pengajuan']; ?>
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
                      <?php echo $data['status']; ?>
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