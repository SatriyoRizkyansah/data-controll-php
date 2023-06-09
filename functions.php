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

         // query insert data 
        $query = "INSERT INTO mahasiswa VALUES ('$nim', '$nama_mhs', '$alamat', '$kota', '$jns_kelamin', '$tgl_lahir')";

        mysqli_query($conn, $query);

        // mysqli_affected_rows digunakan untuk mereturn nilai, jika > 1 maka data berhasil di tambahkan 
        // dan jika < 0 maka data gagal di tambahkan
        return mysqli_affected_rows($conn);
    }

    function hapus($nim){
        global $conn;

        $query = "DELETE FROM mahasiswa WHERE nim='$nim'";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function ubah($data){
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

         // query update data 
        $query = "UPDATE mahasiswa SET 
                        nim = '$nim',
                        nama_mhs = '$nama_mhs',
                        alamat = '$alamat',
                        kota = '$kota',
                        jns_kelamin = '$jns_kelamin',
                        tgl_lahir = '$tgl_lahir'
                        WHERE nim = $nim";

        mysqli_query($conn, $query);

        // mysqli_affected_rows digunakan untuk mereturn nilai, jika > 1 maka data berhasil di tambahkan 
        // dan jika < 0 maka data gagal di tambahkan
        return mysqli_affected_rows($conn);
    }

    
?>