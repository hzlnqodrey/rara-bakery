<?php
session_start();

//ambil id_produk dari URL dengan GET
$id_produk = $_GET['id'];

// JIKA SUDAH ADA PRODUK ITU DIKERANJANG, MAKA PRODUK ITU JUMLAHNYA DI +1 (jadi beli beberapa barang yang sama yang akan meningkatkan jumlahnya)
if( isset($_SESSION['keranjang'][$id_produk]) ) {
    
    $_SESSION['keranjang'][$id_produk]+=1;

    // SELAIN ITU (BLM ADA DI KERANJANG), MAKA PRODUK ITU DIANGGAP DIBELI 1
} else {
    $_SESSION['keranjang'][$id_produk] = 1;
}

// redirect ke halaman keranjang
    echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
    echo "<script>location='keranjang.php'</script>";
?>
