<?php
    session_start();
    include "admin/methods/koneksi.php";

    if( !isset($_SESSION['login']) ) {
        header("Location: loginPage.php?pesan=belum_login");
        exit;
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
    <title>Invoice</title>
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
                                <a class="dropdown-item" href="riwayat.php">RIWAYAT BELANJA</a>

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
        <h2>Detail Pembelian</h2>
        <hr class="my-4">
            <?php
                    $query = mysqli_query($konek, "SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan 
                    WHERE pembelian.id_pembelian = '$_GET[id]' ");

                    $detail = mysqli_fetch_assoc($query);
            ?>
            <!-- PROTEKSI orang yg login dan orang yang beli (jadi tidak bisa asal mengobrak-abrik transaksi dari submit di URL-->
            <?php
                $id_pelanggan_yang_beli = $detail['id_pelanggan'];

                $id_pelanggan_yang_login = $_SESSION["pelanggan"]["id_pelanggan"];

                if ( $id_pelanggan_yang_beli != $id_pelanggan_yang_login ) {
                    echo "<script>alert('Terminated');</script>";
                    echo "<script>location='riwayat.php'</script>";
                }
            ?>
            <div class="row"> 
                <div class="col-md-4">
                    <h3>Pembelian</h3>
                    <strong>No. Pembelian: <?= $detail['id_pembelian']; ?></strong><br>
                    Tanggal: <?= $detail['tanggal_pembelian']; ?> <br>
                    Total  : <?= number_format($detail['total_pembelian']); ?>
                </div>
                <div class="col-md-4">
                    <h3>Pelanggan</h3>
                    <strong><?= $detail['nama_pelanggan']; ?></strong><br>
                    <p>
                        <?= $detail['telepon_pelanggan']; ?> <br>
                        <?= $detail['email_pelanggan']; ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pengiriman</h3>
                    <strong>Alamat Pelanggan:</strong><br>
                    <?= $detail['alamat']; ?>
                </div>
            </div>
            
            <br><br>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $nomor = 1;
                        $query = mysqli_query($konek, "SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk = produk.id_produk
                        WHERE pembelian_produk.id_pembelian = '$_GET[id]' ");

                        while($data = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td><?= $nomor; ?></td>
                        <td><?= $data['nama_produk']; ?></td>
                        <td><?= $data['harga_produk']; ?></td>
                        <td><?= $data['jumlah']; ?></td>
                        <td>
                            <?= $data['harga_produk']*$data['jumlah']; ?>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total belanja:</th>
                        <th>Rp. <?= number_format($detail['total_pembelian']); ?> </th>
                    </tr>
                </tfoot>
            </table>
            <br><br>
            <!-- alert box transaksi pembayaran -->
                <div class="row">
                    <div class="col-md-7">
                        <div class="alert alert-info">
                            <p>
                                Silahkan melakukan pembayaran <strong>Rp. <?= number_format($detail['total_pembelian']); ?></strong> ke Rekening <br>
                                <strong>ATM BNI 0700685840 a.n. Hazlan Muhammad Qodri </strong>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <a href="riwayat.php" class="btn btn-primary">Riwayat Pembayaran</a>
                    </div>
                </div>
        </div>
    </section>        
    
    <br><br><br><br><br><br><br><br><br><br>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>