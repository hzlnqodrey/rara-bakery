<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Tambah Produk</h2>
<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for='nama'>Nama</label>
        <input type='text' name='nama' id='nama' class="form-control" required>
    </div>

    <div class="form-group">
        <label for='harga'>Harga (Rp)</label>
        <input type='number' name='harga' id='harga' class="form-control" required>
    </div>

    <div class="form-group">
        <label for='deskripsi'>Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi"  rows="10" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for='foto'>Foto</label>
        <input type='file' name='foto' id='foto' class="form-control">
    </div>

    <button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
    if( isset($_POST['save']) ) {
        $nama = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "../img/produk/".$nama);

        $query = mysqli_query($konek, "INSERT INTO produk
        (nama_produk, harga_produk, foto_produk, deskripsi_produk)
        VALUES('$_POST[nama]', '$_POST[harga]', '$nama', '$_POST[deskripsi]')");

        echo "<div class='alert alert-info'>Data tersimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
    }
?>


</body>
</html>