<?php
session_start();

    include 'admin/methods/koneksi.php';

    function registrasi($data) {
        global $konek;

        $nama_pelanggan = $data['nama_pelanggan'];
        $email_pelanggan = $data['email'];
        $username = $data['username'];
        $password_pelanggan = $data['password_pelanggan'];
        $telepon_pelanggan = $data['telepon_pelanggan'];
        $alamat = $data['alamat'];


        // cek username sudah ada atau belum
        $result = mysqli_query($konek, "SELECT username FROM pelanggan WHERE username = '$username'");

        if ( mysqli_fetch_assoc($result) ) {
            echo "<script>
                    alert('username sudah ada, tolong pilih username lain');
                 </script>";
            return false;
        }

        // tambahkan data baru ke database
        $query = mysqli_query($konek, "INSERT INTO pelanggan VALUES ('', '$email_pelanggan', '$password_pelanggan', '$nama_pelanggan', '$telepon_pelanggan', '$username',   '$alamat')");

        return mysqli_affected_rows($konek);
    }

   
?>