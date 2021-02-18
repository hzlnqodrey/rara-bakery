<?php
   
    include 'registerPage_proses.php';

     // cek apakah tombol register sudah ditekan
     if ( isset($_POST['register']) ) {
        if ( registrasi($_POST) > 0 ) {
            $berhasil = true;
        } else {
            echo mysqli_error($konek);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="tes">
        <!-- alert berhasil -->
        <?php if (isset($berhasil)) { ?>    
            <div class="alert alert-success">
                <strong>Success!</strong> <a href="loginPage.php" class="alert-link">Click this to login page</a>.
            </div>
        <?php } ?>
        <div class="content">
            <center><h1>Register Page</h1></center>
            <div class="container">
                <form action="" method="POST">
                    <!-- Nama Lengkap -->
                    <div class="form-group" id="nama_pelanggan">
                        <label for="nama_pelanggan">Nama Lengkap:</label><br>
                        <input type="text" class="form-control" id="nama_pelanggan" aria-describedby="emailHelp" placeholder="Enter Nama Lengkap" name="nama_pelanggan" required>
                        <br>
                    </div>
                    <!-- email -->
                    <div class="form-group" id="email">
                        <label for="email">Email:</label><br>
                        <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email" name="email" required>
                        <br>
                    </div>
                    <!-- username -->
                    <div class="form-group" id="nama">
                        <label for="username">Username:</label><br>
                        <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username" name="username" required>
                        <br>
                    </div>
                    <!-- password -->
                    <div class="form-group" id="password1">
                        <label for="Password1">Password:</label><br>
                        <input type="password" class="form-control" id="Password1" placeholder="Enter password" name="password_pelanggan" required>
                    </div>
                    <!-- phone number -->
                    <div class="form-group" id="phone_number">
                        <label for="phone_number">Phone Number:</label><br>
                        <input type="text" class="form-control" id="phone-number" placeholder="Enter phone number" name="telepon_pelanggan" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
                    </div>
                    <!-- alamat -->
                    <div class="form-group" id="alamat">
                        <label for="alamat">Alamat Lengkap:</label><br>
                        <textarea name="alamat" id="alamat" cols="43" rows="3" placeholder="  Enter alamat"></textarea>
                    </div>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary" name="register" id="button">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>