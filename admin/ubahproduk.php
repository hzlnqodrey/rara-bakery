<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Ubah Produk</h2>
    <?php
    
    $query = mysqli_query($konek, "SELECT * FROM produk WHERE id_produk = '$_GET[id]'");

    $data = mysqli_fetch_assoc($query);

    ?>
   

    <form action="" method="POST" enctype="multipart/form-data">
    
        <div class="form-group">
            <label for='nama'>Nama</label>
            <input type='text' name='nama' id='nama' class="form-control" value="<?= $data['nama_produk']; ?>" required>
        </div>

        <div class="form-group">
            <label for='harga'>Harga (Rp)</label>
            <input type='number' name='harga' id='harga' class="form-control" value="<?= $data['harga_produk']; ?>" required>
        </div>

        <!-- image -->
        <div class="form-group">
            <img src="../img/produk/<?= $data['foto_produk']; ?>" alt="">
        </div>
        <div class="form-group">
            <label for="">Ganti Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <div class="form-group">
        <label for='deskripsi'>Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi"  rows="10" class="form-control">
            <?= $data['deskripsi_produk']; ?>
        </textarea>

        <button class="btn btn-primary" name="ubah">Ubah</button>
    </div>
        
    </form>

    <?php
    
        if( isset($_POST['ubah']) ) {
            $namaFoto = $_FILES['foto']['name'];
            $lokasiFoto = $_FILES['foto']['tmp_name'];
            // Jika foto diubah
            if( !empty($lokasiFoto) ) {
                move_uploaded_file($lokasiFoto, "../img/produk/".$namaFoto);

                $query = mysqli_query($konek, "UPDATE produk SET nama_produk = '$_POST[nama]', harga_produk = '$_POST[harga]', foto_produk = '$namaFoto', deskripsi_produk = '$_POST[deskripsi]' WHERE id_produk = '$_GET[id]' ");
            // Jika foto tidak diubah
            } else { 
                $query = mysqli_query($konek, "UPDATE produk SET nama_produk = '$_POST[nama]', harga_produk = '$_POST[harga]', deskripsi_produk = '$_POST[deskripsi]' WHERE id_produk = '$_GET[id]' ");
            }
            echo "<script>alert('Data produk telah diubah');</script>";
            echo "<script>location='index.php?halaman=produk'</script>";
        }

    ?>
</html>