<?php
    // cek apakah user sudah login atau belum, jika belum maka tendang ke halaman login
    session_start();

    if( !isset($_SESSION['login']) ) {
        header("Location: loginPage.php?pesan=belum_login");
        exit;
    }

    include 'admin/methods/koneksi.php';
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

    <link rel="stylesheet" href="css/profile.css">

    <title>Profile Page</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top" id="mainNav">
        <div class="container text">
            <a class="navbar-brand font-weight-bold text-white" href="index.php" id="Logo">RARA BAKERY</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
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
                        <a class="nav-link js-scroll-trigger text-white" href="belanja.php">BELANJA</a>
                    </li>
                                <!-- spasi margin navigasinya atau list kosong-->
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"></a></li>  
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"></a></li>  
                                
                    <!-- NAVIGASI ABOUT  -->
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger text-white" href="index.php#about">ABOUT</a>
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

    <?php if( isset($_SESSION['username']) ) { ?>
    <!-- main content -->
    <div class="content">
        <div class="container ">
            <br><br><br><br>
            <h1>Account Information</h1>
            <hr class="my-4">
            <center>
                <table border="1" cellpadding="10">
                    <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Phone Number</th>
                        <th>Alamat</th>
                        <th>Opsi</th>
                    </tr>
                    <?php
                        $username = $_SESSION['username'];
                        $query = mysqli_query($konek, "SELECT * FROM pelanggan WHERE username = '$username' ");

                        $data = mysqli_fetch_array($query) ;
                    ?>
                    <tr>
                        <td><?= $data['username']; ?></td>
                        <td><?= $data['password_pelanggan']; ?></td>
                        <td><?= $data['telepon_pelanggan']; ?></td>
                        <td><?= $data['alamat']; ?></td>
                        <td>
                            <a href="edit.php?username=<?php echo $data['username']; ?>"><button type="submit" class="btn btn-primary">Edit</button></a>
                            <a href="delete_user.php?username=<?php echo $data['username']; ?>"><button type="submit" class="btn btn-danger" onclick="return confirm('yakin?')"; >Delete</button></a>
                        </td>
                    </tr>
                </table>
            </center>
            <br> 
            <a href="belanja.php" class="btn btn-primary">Kembali</a>       
        </div>
    </div>
    <?php } ?>

        
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>