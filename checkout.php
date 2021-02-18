<?php
session_start();
if( !isset($_SESSION['login']) ) {
    header("Location: loginPage.php?pesan=belum_login");
    exit;
}

include "admin/methods/koneksi.php";

// jika tabel di keranjang gk ada item yg dibeli / kosong 
if( empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"]) ) {
    echo "<script>alert('Kerajang kosong, silahkan belanja terlebih dahulu');</script>";
    echo "<script>location='belanja.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="fontawesome/fontawesome-free/css/all.min.css">

    <!-- css sendiri -->
    <link rel="stylesheet" href="css/belanja.css">
    <title>Checkout</title>
</head>
<body>
    
<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top" id="mainNav">
        <div class="container text">
            <a class="navbar-brand font-weight-bold text-white" href="index.php" id="Logo">RARA BAKERY</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <!-- NAVIGASI HOME -->
                    <li class="nav-item active">
                        <a class="nav-link js-scroll-trigger text-white" href="index.php">HOME <span class="sr-only">(current)</span></a>
                    </li>
                                <!-- spasi margin navigasinya atau list kosong-->
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"></a></li>  
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"></a></li>  
                                
                                
                    <!-- NAVIGASI ABOUT  -->
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger text-white" href="index.php#lambang">ABOUT US</a>
                    </li>
                                <!-- spasi margin navigasinya atau list kosong-->
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"></a></li>  
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"></a></li>  
                                
                    <!-- NAVIGASI CONTACT US  -->
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger text-white" href="index.php#lambang">CONTACT US</a>
                    </li>
                                <!-- spasi margin navigasinya atau list kosong-->
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"></a></li>  
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"></a></li> 
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"></a></li> 
                    <!-- dropdown username with profile and logout menu [REMEMBER TO PUT JAVASCRIPT BOOTSTRAP LINK IN THE BOTTOM]-->
                    <?php if( isset($_SESSION['username']) ) { 
                        $username = $_SESSION['username'];    
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $username; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.php">PROFILE</a>
                                <a class="dropdown-item" href="riwayat.php">RIWAYAT PEMBELIAN</a>

                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">LOGOUT</a>
                            </div>
                        </li>
                    <?php } ?>

                </ul>
            </div>    
        </div>
    </nav>

    <!-- konten -->
    <section class="konten">
        <div class="container">
            <h1>Keranjang Belanja</h1>
            <hr class="my-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; 
                          $totalHarga = 0;
                    ?>
                    <?php foreach($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
                    <!-- output item yang dibeli berdasarkan id_produk -->
                    <?php

                        $query = mysqli_query($konek, "SELECT * FROM produk WHERE id_produk = '$id_produk'");

                        $data = mysqli_fetch_assoc($query);
                        $subharga =  $data['harga_produk']*$jumlah;
                    ?>
                    <tr>
                        <td><?= $nomor; ?></td>
                        <td><?= $data['nama_produk']; ?></td>
                        <td>Rp. <?= number_format($data['harga_produk']); ?></td>
                        <td><?= $jumlah; ?></td>
                        <td>Rp. <?= number_format($subharga); ?></td>
                    </tr>
                    <?php $nomor++; 
                          $totalHarga = $totalHarga + $subharga;
                    ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja:</th>
                        <th>Rp. <?= number_format($totalHarga); ?></th>
                    </tr>
                </tfoot>
            </table>
            <br><br>

            <!-- input -->
            <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['alamat'] ?>" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <a href="keranjang.php" class="btn btn-danger">Batal</a>
                    <button class="btn btn-primary" name="beli">Beli</button>
            </form>

            <!-- cek tombol beli -->
            <?php
            if( isset($_POST["beli"]) ) {
                // ambil variabel session pelanggan masukkan ke tabel pembelian di database
                $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];   
                $tanggal_pembelian = date("Y-m-d");
                $total_pembelian = $totalHarga;

                // menyimpan data ke tabel pembelian
                $query = mysqli_query($konek, "INSERT INTO pembelian (id_pelanggan, tanggal_pembelian, total_pembelian) VALUES ('$id_pelanggan', '$tanggal_pembelian', '$total_pembelian')");

                // mendapatkan id_pembelian yang terjadi
                $id_pembelian_barusan = $konek->insert_id;

                // simpan/tambahkan/insert data item keranjang yang dibeli ke tabel pembelian_produk di database
                foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
                    $query = mysqli_query($konek, "INSERT INTO pembelian_produk (id_pembelian, id_produk, jumlah) VALUES ('$id_pembelian_barusan', '$id_produk', '$jumlah') ");
                }

                // mengkosongkan keranjang belanja setelah menekan beli dan pergi ke halaman INVOICE
                unset($_SESSION["keranjang"]);

                //tampilan di alihkan ke halaman INVOICE dan membawa data pelanggan, data pembelian, dan data pembelian_produk
                echo "<script>alert('Pembelian sukses');</script>";
                echo "<script>location='invoice.php?id=$id_pembelian_barusan';</script>";
            }
            
            ?>
         </div>
    </section>

    

    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>