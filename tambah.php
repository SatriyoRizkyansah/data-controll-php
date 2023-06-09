<?php 
    // require untuk menghubungkan file function agar logic bisa di akses di halaman ini dan di tampilkan
    // require "functions.php";
    require "functions.php";
    
    // mengecek apakah tombol Tambah sudah di tekan atau belum
     if(isset($_POST["submit"])){
              if(tambah($_POST) > 0){
                echo '<div class="alert alert-success text-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                          Data mahasiswa berhasil di tambahkan <br><a href="index.php" class="alert-link"> Kembali kehalama utama</a>
                        </div>
                        </div>
                        ';
                    
              } else {
                  echo '<div class="alert alert-danger text-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                          Data mahasiswa gagal di tambahkan
                        </div>
                      </div>';
              }
    
            }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- My Css -->
    <link rel="stylesheet" href="css/style-tambah.css" />

     <!-- Alert icon -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
      </symbol>
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg> 
    
    <!-- icon bootsrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Tambah Data Mahasiswa</title>
  </head>
  <body>
    <div class="container">
      <h1 class="text-center bg-primary p-3 h1">TAMBAH DATA MAHASISWA</h1>
      <form class="row g-3" method="post">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Nim</label>
          <input type="text" class="form-control" id="inputEmail4" name="nim" />
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Nama</label>
          <input type="text" class="form-control" id="inputPassword4" name="nama" />
        </div>
        <div class="col-12">
          <label for="exampleFormControlTextarea1" class="form-label">alamat</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"></textarea>
        </div>
        <div class="col-md-5">
          <label for="inputState" class="form-label">Kota</label>
          <select id="inputState" class="form-select" name="kota">
            <option selected>Pilih...</option>
            <option value="Tangerang">Tangerang</option>
            <option value="Jakarta">Jakarta</option>
            <option value="Surabaya">Surabaya</option>
            <option value="Surakarta">Surakarta</option>
            <option value="Bandung">Bandung</option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="inlineRadioOptions" class="form-label" >Jenis Kelamin</label>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="inlineRadio1" name="jns_kelamin" value="L"/>
            <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="inlineRadio2" name="jns_kelamin" value="P"/>
            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
          </div>
        </div>
        <div class="col-md-5">
          <label for="inputEmail4" class="form-label">Tanggal Lahir</label>
          <input type="date" class="form-control" id="inputEmail4" name="tgl_lahir"/>
        </div>
        <div class="col-12">
          <button type="button" class="btn btn-secondary"><a href="index.php" style="color:white; text-decoration:none;"><i class="bi bi-caret-left"></i>Kembali</a></button>
          <button type="submit" class="btn btn-primary float-end mb-3" name="submit"><i class="bi bi-person-fill-add"></i> Tambah</button>
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
