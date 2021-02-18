<?php
 session_start();

 if( !isset($_SESSION['login']) ) {
     header("Location: loginPage.php?pesan=belum_login");
     exit;
 }

    include 'admin/methods/koneksi.php';

    if( isset($_SESSION['username']) ) {

        $username = $_SESSION['username'];
    } 
        $phone_number = $_POST['phone_number'];
        $alamat = $_POST['alamat'];

        // query update
        $query = mysqli_query($konek, "UPDATE pelanggan SET telepon_pelanggan = '$phone_number', alamat = '$alamat' WHERE username = '$username' ");

        // cek berhasil atau error updatenya
        if($query) {
            $query = mysqli_query($konek, "SELECT * FROM pelanggan");
            $data = mysqli_fetch_assoc($query);
            $_SESSION['pelanggan'] = $data;
            header("Location: belanja.php");
        } else {
            echo "Proses edit gagal!";
        }

?>