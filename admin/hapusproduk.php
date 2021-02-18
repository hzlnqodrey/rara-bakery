<?php

    $query = mysqli_query($konek, "SELECT * FROM produk WHERE id_produk = '$_GET[id]'");

    $data = mysqli_fetch_assoc($query);

    $fotoproduk = $data['foto_produk'];

    if(file_exists("../img/produk/$fotoproduk")) {
        unlink("../img/produk/$fotoproduk");
    }

    $konek->query("DELETE FROM produk WHERE id_produk = '$_GET[id]'");

    echo "<script>alert('Produk Terhapus');</script>";
    echo "<script>location='index.php?halaman=produk'</script>";

?>