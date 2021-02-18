<?php
    session_start();

    include 'admin/methods/koneksi.php';

    // konfirmasi variabel dari form
    $username = $_POST['username'];
    $password_pelanggan = $_POST['password_pelanggan'];

    // query untuk mencari username dan password di database yang telah user inputkan pada form
    $query = mysqli_query($konek, "SELECT * FROM pelanggan WHERE username='$username' and password_pelanggan='$password_pelanggan'") or die(mysqli_error($konek));

    // cek hitung jumlah data yang di select
    $cek = mysqli_num_rows($query);

    // redirect 
    if ( $cek > 0 ) {
        // ambil data
        $data = mysqli_fetch_assoc($query);
        // set session
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['pelanggan'] = $data;
        
        header("Location: belanja.php");
    } else {

        header("Location: loginPage.php?pesan=gagal");
    }
?>