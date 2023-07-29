<?php 
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "kampus");

    // membuat function untuk mengelola proses pengambilan dan looping data
    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        // menyimpan data ke dalam array, untuk di looping
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows [] = $row;
        }
        return $rows;
    }

    function tambah($data){
        global $conn;
         // ambil data dari tiap elemen dalam form
        //  "htmlspecialchars digunakan untuk mengantisipasi user jahat yang berniat merusak sistem"
        $nim = htmlspecialchars($data["nim"]);
        $nama_mhs = htmlspecialchars( $data["nama"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $kota = htmlspecialchars($data["kota"]);
        $jns_kelamin = htmlspecialchars($data["jns_kelamin"]);
        $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);

        // Upload gambar
        $gambar = upload();
            if( !$gambar ){
                return false;
            }
        
         // query insert data 
        $query = "INSERT INTO mahasiswa VALUES ('$nim', '$nama_mhs', '$alamat', '$kota', '$jns_kelamin', '$tgl_lahir','$gambar')";

        mysqli_query($conn, $query);

        // mysqli_affected_rows digunakan untuk mereturn nilai, jika > 1 maka data berhasil di tambahkan 
        // dan jika < 0 maka data gagal di tambahkan
        return mysqli_affected_rows($conn);
    }

    function upload() {

         $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // cek apakah tidak ada gambar yang diupload
        if ($error === 4){
            echo'<script>
                alert("Silahkan upload file gambar terlebih dahulu!");
            </script>'; 
            return false;
        }

        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) { 
            echo'<script>
                alert("File yang anda upload bukan gambar!");
            </script>'; 
            return false;
        }

        // cek jika ukurannya terlalu besar
        if($ukuranFile > 1000000){
            echo'<script>
                alert("Ukuran file gambar yang anda upload terlalu besar!");
            </script>'; 
            return false;
        }

        // lolos pengecekan, gambar siap diupload
        // generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;


        move_uploaded_file($tmpName, 'photo/ava/' . $namaFileBaru);

            return $namaFileBaru;
    }

    function hapus($nim){
        global $conn;

        $query = "DELETE FROM mahasiswa WHERE nim='$nim'";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function update($data){
        global $conn;
         // ambil data dari tiap elemen dalam form
        //  "htmlspecialchars digunakan untuk mengantisipasi user jahat yang berniat merusak sistem"
        $no = $data["nim"];
        $nim = htmlspecialchars($data["nim"]);
        $nama_mhs = htmlspecialchars( $data["nama"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $kota = htmlspecialchars($data["kota"]);
        $jns_kelamin = htmlspecialchars($data["jns_kelamin"]);
        $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
        $gambarLama = ($data["gambarLama"]);

         // cek apakah user pilih gambar baru ataua tidak
        
        if( $_FILES['gambar']['error'] === 4 ){
            $gambar = $gambarLama;
        } else { 
            $gambar = upload();
        }

         // query update data 
        $query = "UPDATE mahasiswa SET 
                        nim = '$nim',
                        nama_mhs = '$nama_mhs',
                        alamat = '$alamat',
                        kota = '$kota',
                        jns_kelamin = '$jns_kelamin',
                        tgl_lahir = '$tgl_lahir',
                        gambar = '$gambar'
                        WHERE nim = $nim";

        mysqli_query($conn, $query);

        // mysqli_affected_rows digunakan untuk mereturn nilai, jika > 1 maka data berhasil di tambahkan 
        // dan jika < 0 maka data gagal di tambahkan
        return mysqli_affected_rows($conn);
    }

      function cari($keyword){
        $query = "SELECT * FROM mahasiswa 
                    WHERE
                nama_mhs LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%' OR
                kota LIKE '%$keyword%' OR
                jns_kelamin LIKE '%$keyword%' OR
                jns_kelamin LIKE '%$keyword%'
                ";
        return query($query);
    }

    function registrasi($data) {
        global $conn;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        // cek username sudah ada belum
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

        if( mysqli_fetch_assoc($result) ) {
            echo "<script>
                alert('username sudah terdaftar')
            </script>";
            return false;
        }

        // cek konfirmasi password
        if($password != $password2){
            echo "<script>
                alert('Password tidak sesuai')
            </script?>";
            return false;
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambahkan user baru ke database
        mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");

        return mysqli_affected_rows($conn);
    }

    
?>