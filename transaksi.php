<?php 
require "functions/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>

<?php include "template/navbar.php"; ?>
<div class="container mt-3">
  <h3 class="text-center">Daftar Transaksi</h3>
  <div class="row">
      <?php 
      $result = mysqli_query($conn, "SELECT * FROM `tb_pembelian` INNER JOIN tb_produk ON tb_pembelian.id_produk = tb_produk.id_produk");

      $statustxt = "";
      while($row = mysqli_fetch_assoc($result)):
      if( $row["status"] == 1 || $row["status"] == 0) {
        $statustxt = "Belum di konfirmasi";
      } else if( $row["status"] == 2) {
        $statustxt = "Sudah di konfirmasi";
      } else if( $row["status"] == 3) {
        $statustxt = "Konfirmasi di tolak";
      }
      ?>
    <div class="col mt-3">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <p class="card-text">Nama: <?= $row["nama"]; ?></p>
          <p class="card-text">Produk: <?= $row["judul_produk"]; ?></p>
          <p class="card-text">Harga: <?= $row["harga"]; ?></p>
          <p class="card-text">Kode pembayaran: <?= $row["kode_pembayaran"]; ?></p>
          <p class="card-text">Status: 
            <button type="button" class="btn btn-dark text-white" style="--bs-btn-padding-y: .1rem; --bs-btn-padding-x: .1rem; --bs-btn-font-size: .8rem;">
            <?= $statustxt; ?>
          </button>
          </p>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
</div>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>