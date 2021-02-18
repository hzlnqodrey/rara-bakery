<?php
    // cek apakah user sudah login atau belum, jika belum maka tendang ke halaman login
    session_start();

    if( !isset($_SESSION['login']) ) {
        header("Location: loginPage.php?pesan=belum_login");
        exit;
    }

    include 'admin/methods/koneksi.php';

    //mendapatkan id_pembelian dari URL
    $id_pem = $_GET['id'];

    $query = mysqli_query($konek, "SELECT * FROM pembelian WHERE id_pembelian = '$id_pem'");

    $data = mysqli_fetch_assoc($query);

                //proteksi 
                $id_pelanggan_yang_beli = $data['id_pelanggan'];

                $id_pelanggan_yang_login = $_SESSION["pelanggan"]["id_pelanggan"];

                if ( $id_pelanggan_yang_beli != $id_pelanggan_yang_login ) {
                    echo "<script>alert('Terminated');</script>";
                    echo "<script>location='riwayat.php'</script>";
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

    <title>Konfirmasi Pembayaran</title>
 
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
                                
                    <!-- NAVIGASI WHAT WE MAKE  -->
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger text-white" href="keranjang.php">KERANJANG</a>
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

   <section class="bayar">
     <div class="container">
        
     <h2>Konfirmasi Pembayaran</h2>
    <p>Kirim bukti pembayaran anda disini</p>
    <div class="alert alert-info">Total tagihan anda <strong>Rp. <?= number_format($data['total_pembelian']); ?></strong></div>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama Pembayar</label>
                <input type="text" class="form-control" name="nama">
            </div>
            
            <div class="form-group">
                <label for="">Bank</label>
                <input type="text" class="form-control" name="bank">
            </div>

            <div class="form-group">
                <label for="">Tagihan</label>
                <input type="number" class="form-control" name="jumlah" min="1">
            </div>

            <div class="form-group">
                <label for="">Foto Bukti</label>
                <input type="file" class="form-control" name="bukti">
            </div>
            <p class="text-danger">Foto bukti harus JPG maksimal 2MB</p>
            <button class="btn btn-primary" name="kirim">KIRIM</button>
        </form>
        
        <!-- proses -->
        <?php
        if( isset($_POST['kirim']) ) {
            // upload foto 
            $namabukti = $_FILES["bukti"]["name"];
            $lokasibukti = $_FILES["bukti"]["tmp_name"];
            $nama_fix = date("YmdHis").$namabukti;
            move_uploaded_file($lokasibukti, "img/bukti_pembayaran/$nama_fix");

            // simpan data form ke database pembayaran
            $nama = $_POST['nama'];
            $bank = $_POST['bank'];
            $jumlah = $_POST['jumlah'];
            $tanggal = date("Y-m-d");
            
            $query = mysqli_query($konek, "INSERT INTO pembayaran (id_pembelian, nama, bank, jumlah, tanggal, bukti)
            VALUES ('$id_pem','$nama','$bank','$jumlah','$tanggal','$nama_fix')");
        
            // update data pembelian pending -> sudah melakukan pembayaran
            $query = mysqli_query($konek, "UPDATE pembelian SET status_pembelian ='sudah melakukan pembayaran' WHERE id_pembelian = '$id_pem'");

                    echo "<script>alert('Terima kasih sudah transaksi di Toko Rara Bakery');</script>";
                    echo "<script>location='riwayat.php'</script>";
        }

        ?>
     </div>
   </section>


    <br><br><br><br><br><br><br><br><br><br>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>




</body>
</html>