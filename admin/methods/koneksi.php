<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "uas";

    $konek = new mysqli($hostname, $username, $password, $database);

    // cek apakah konek error apa tidak
    if ($konek->connect_error) {
        // jika terjadi error, matikan proses dengan die() atau exit();
       die('Maaf koneksi gagal: '. $konek->connect_error);
    }
?>
