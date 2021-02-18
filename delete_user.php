<?php
    session_start();
    include 'admin/methods/koneksi.php';

    $username = $_GET['username'];

    $query = mysqli_query($konek, "DELETE FROM pelanggan WHERE username = '$username'");

    if($query) {
        $berhasil = true;
        
    } else {
        echo "Proses Delete Gagal!";
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
    <style>
        body {
            margin: auto;
        }
    </style>
</head>
<body>
     <!-- alert berhasil -->
     <?php if (isset($berhasil)) { ?>    
                <div class="alert alert-danger">
                    <strong>Akun Berhasil dihapus!</strong> <a href="logout.php?pesan=delete" class="alert-link">Klik ini untuk menuju ke Menu Awal</a>.
                </div>
    <?php } ?>
</body>
</html>