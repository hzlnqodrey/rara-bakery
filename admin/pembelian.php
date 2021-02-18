<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Data Pembelian</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $nomor = 1;
                $query = mysqli_query($konek, "SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan");

                while($data = mysqli_fetch_assoc($query)) {
                    
            ?>
            <tr>
                <td><?= $nomor; ?></td>
                <td><?= $data['nama_pelanggan']; ?></td>
                <td><?= $data['status_pembelian']; ?></td>
                <td><?= $data['tanggal_pembelian']; ?></td>
                <td><?= $data['total_pembelian']; ?></td>
                <td>
                    <a href="index.php?halaman=detail&id=<?php echo $data['id_pembelian'] ?>" class="btn btn-info">detail</a>
                </td>
                
            </tr>
            <?php $nomor++ ?>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>