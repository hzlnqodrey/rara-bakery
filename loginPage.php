<?php
    session_start();
    // cek pesan notifikasi
    if( isset($_GET['pesan']) ) {
        if ( $_GET['pesan'] == "gagal" ) {
            $error = true;
        } else if ( $_GET['pesan'] == "belum_login" ) {
            echo "<script>
                    alert('tolong untuk login terlebih dahulu sebelum masuk ke halaman utama!');
                 </script>";
        } else if ( $_GET['pesan'] == "logout" ) {
            $berhasil = true;
        } 
    }

    // cek kalau user sudah di dalam halaman admin tapi mencoba masuk ke halaman login lewat url 
    if ( isset($_SESSION['login']) ) {
        header("Location: belanja.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="tes">
        
        <!-- jika error = true akan tampil pesan error -->
        <?php if (isset($error)) { ?>    
            <p style="color:red;">username dan password salah!</p>
        <?php } ?>
        <!-- jika berhasil = true akan tampil pesan berhasil logout -->
        <?php if (isset($berhasil)) { ?>    
            <p style="color:green;">Anda telah berhasil Logout!</p>
        <?php } ?>

        <div class="content">
            <center><h1>Login Page</h1></center>  
            <div class="container">
                <form action="cek_login.php" method="POST">
                    <div class="form-group" id="nama">
                        <label for="username">Username:</label><br>
                        <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username" name="username" required>
                        <br>
                    </div>
                    <div class="form-group" id="password1">
                        <label for="exampleInputPassword1">Password:</label><br>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_pelanggan" required>
                    </div>
                    <div class="buatakun">
                        <h6>Belum punya akun? <a href="registerPage.php">Buat</a></h6>
                    </div>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary" id="button">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>