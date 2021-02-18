<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
        $query = mysqli_query($konek, "SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan 
        WHERE pembelian.id_pembelian = '$_GET[id]' ");

        $data = mysqli_fetch_assoc($query);
   ?>
   
   <h2>Detail Pembelian</h2> 

    <!-- alert lunas -->
    <?php
        if($data["status_pembelian"] == "sudah melakukan pembayaran") {
    ?>
        <div class="alert alert-success" role="alert">
            LUNAS
        </div>
    <?php } ?>

   <strong><?= $data['nama_pelanggan']; ?></strong><br>
   <p>
       <?= $data['telepon_pelanggan']; ?> <br>
       <?= $data['email_pelanggan']; ?> <br>
       <?= $data['alamat']; ?> <br>
   </p>
   <p>
       Tanggal: <?= $data['tanggal_pembelian']; ?> <br>
       Total: <?= $data['total_pembelian']; ?> <br>
   </p>
    
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
   </table>
</body>
</html>