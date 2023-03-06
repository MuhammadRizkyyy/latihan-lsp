<?php 
require "functions/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Produk</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php include "template/navbar.php"; ?>
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-7">
        <div class="card">
          <div class="card-body">
            <h1 class="text-success">Selamat!</h1>
            <h3>Anda berhasil melakukan pemesanan barang</h3><hr>

            <h5 class="text-center text-danger">Silakan melakukan pembayaran sesuai detail berikut</h5><hr>

            <h3 class="text-center">B03523623</h3>
            <P class="text-center font-weight-bold">a/n Toko Printer</P>
            <p class="text-center">BCA kode bank: 006</p>

            <?php 
            $result = mysqli_query($conn, "SELECT * FROM tb_pembelian AS pem, tb_produk AS pro WHERE pem.id_produk = pro.id_produk ORDER BY pem.idpembelian DESC LIMIT 1");

            $row = mysqli_fetch_assoc($result);
            $harga = $row["harga"];
            $qty = $row["qty"];
            $total = $qty * $harga;
            ?>
            <h5 class="text-center">Total yang harus dibayar</h5>
            <h2 class="text-center"><?= "Rp" . number_format($total, 0, ",", "."); ?></h2><hr>

            <h5 class="text-center">Kode pembayaran</h5>
            <h2 class="text-center"><?= $row["kode_pembayaran"]; ?></h2><br><br>

            <p class="text-center text-danger">JIka sudah transfer, silakan lakukan upload bukti pembayaran pada halaman <a href="konfirmasi.php" target="_blank">Konfirmasi pembayaran</a></p>
            <h4 class="text-center">Terima kasih!</h4>
          </div>
        </div>
      </div>
    </div>
  </div>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>