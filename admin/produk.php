<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Data Produk</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Deskripsi Produk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $nomor = 1;
                $query = mysqli_query($konek, "SELECT * FROM produk");

                while($data = mysqli_fetch_assoc($query)) {
                    
            ?>
            <tr>
                <td><?= $nomor; ?></td>
                <td><?= $data['nama_produk']; ?></td>
                <td><?= $data['harga_produk']; ?></td>
                <td><img src="../img/produk/<?= $data['foto_produk']; ?>" alt=""></td>
                <td><?= $data['deskripsi_produk']; ?></td>
                <td>
                    <a href="index.php?halaman=hapusproduk&id=<?php echo $data['id_produk']; ?>" class="btn-danger btn">Hapus</a>
                    <a href="index.php?halaman=ubahproduk&id=<?php echo $data['id_produk'] ?>" class="btn btn-warning">Ubah</a>
                </td>
            </tr>
            <?php $nomor++ ?>
            <?php } ?>
        </tbody>
    </table>
    <a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Produk</a>
    
</body>
</html>