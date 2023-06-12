<!-- Nama : Satriyo Rizkyansah 
     Nim : 221011700050
     Kelas : 02SIFP002
-->

<?php 
  require 'functions.php';
  $mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Bootsrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <!-- My Css -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- Icon bootsrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <title>Tabel Mahasiswa</title>
  </head>
  <body>
    <nav class="navbar bg-primary">
      <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <img class ="nav-logo" src="photo/logo-unpam.png" alt="" width="100px" height="100px">
          <span class="navbar-text fs-1">DATA MAHASISWA SISTEM INFORMASI</span>
        </div>
      </nav>
      <nav class="navbar navbar-light">
        <div class="container-fluid">
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn bg-light" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </nav>

    <section class="tabel">
      <button type="button" class="btn btn-secondary tambah-mhs"><a href="tambah.php" style="color:white; text-decoration: none;"><i class="bi bi-person-fill-add"></i> Tambah Data Mahasiswa</a></button>

      <table class="table mt-3 ">
        <tr>
          <th class="table-secondary">Nim</th>
          <th class="table-secondary">Nama Mahasiswa</th>
          <th class="table-secondary">Alamat</th>
          <th class="table-secondary">Kota</th>
          <th class="table-secondary">Jenis Kelamin</th>
          <th class="table-secondary">Tanggal Lahir</th>
          <th class="table-secondary">Aksi</th>
        </tr>

        <?php foreach($mahasiswa as $mhs) : ?>
        <tr>
          <td><?= $mhs["nim"]?></td>
          <td><?= $mhs["nama_mhs"]?></td>
          <td><?= $mhs["alamat"]?></td>
          <td><?= $mhs["kota"]?></td>
          <td><?php 
                if($mhs["jns_kelamin"] == 'L') {
                  echo "Laki-Laki";
                } else{
                  echo "Perempuan";
                }
          ?></td>
          <td><?= $mhs["tgl_lahir"]?></td>
          <td>
            <a class="btn btn-outline-danger" href="hapus.php?nim=<?=$mhs['nim']?>" onclick="return confirm('yakin?');" role="button"><i class="bi bi-person-fill-dash"></i> Hapus</a> |
            <a class="btn btn-outline-primary" href="update.php?nim=<?=$mhs['nim']?>" role="button"><i class="bi bi-person-fill-gear"></i> Update</a>
          </td>
        </tr>
        <?php endforeach;?>
      </table>
    </section>

     <!-- Footer -->
    <!-- <footer class="bg-primary text-white text-center pb-2">
      <p>Created with <i class="bi bi-balloon-heart-fill text-danger"></i> by <a href="https://www.instagram.com/ryorizkyansah/" class="text-white fw-bold">Satriyo Rizkyansah</a></p>
    </footer> -->
    <!-- Akhir Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
