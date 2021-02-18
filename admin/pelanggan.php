<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Data Pelanggan</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Username</th>
                <th>Alamat</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                $nomor = 1;
                $query = mysqli_query($konek, "SELECT * FROM pelanggan");

                while($data = mysqli_fetch_assoc($query)) {
                    
            ?>
            <tr>
                <td><?= $nomor; ?></td>
                <td><?= $data['nama_pelanggan']; ?></td>
                <td><?= $data['email_pelanggan']; ?></td>
                <td><?= $data['telepon_pelanggan']; ?></td>
                <td><?= $data['username']; ?></td>
                <td><?= $data['alamat']; ?></td>
                
                
            </tr>
            <?php $nomor++ ?>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>