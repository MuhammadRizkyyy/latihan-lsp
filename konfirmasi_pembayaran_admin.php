<?php 
require "functions/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>konfirmasi Pembayaran</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>

<?php include "template/navbar.php"; ?>
<div class="container mt-3">
  <h3 class="text-center">Daftar Transaksi</h3>
  <?php 
  if( isset($_GET["p"]) ) {
    $pesan = $_GET["p"];

    ?>
      <div class="alert alert-secondary alert-dismissible fade show my-3" role="alert">
        <strong><?= $pesan; ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
  }
  ?>
  <div class="row">
      <?php 
      $result = mysqli_query($conn, "SELECT * FROM `tb_pembayaran` INNER JOIN tb_pembelian ON tb_pembayaran.idpembelian = tb_pembelian.idpembelian WHERE tb_pembayaran.status = 1");

      while($row = mysqli_fetch_assoc($result)):
      if( $row["status"] == 1) {
        $statustxt = "Belum di konfirmasi";
      }
      ?>
    <div class="col mt-3">
      <div class="card" style="width: 18rem;">
        <img src="assets/bukti/<?= $row["bukti"]; ?>" class="card-img-top" alt="bukti bayar">
        <div class="card-body">
          <p class="card-text">Nama: <?= $row["nama"]; ?></p>
          <p class="card-text">Kode pembayaran: <?= $row["kode_pembayaran"]; ?></p>
          <p class="card-text">Status: <?= $statustxt; ?></p>
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#konfirmasi<?= $row["idpembelian"] ?>">Konfirmasi</button>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tolak<?= $row["idpembelian"] ?>">Tolak</button>
        </div>
      </div>

       <!-- modal konfirmasi -->
       <div class="modal fade" id="konfirmasi<?= $row["idpembelian"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Transaksi</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="post">
                  <p>Apakah ingin mengkonfirmasi transaksi ini?</p>
                  <input type="hidden" name="idpembelian" value="<?= $row["idpembelian"]; ?>">
                  <button type="submit" name="verifikasi" class="btn btn-success">Konfirmasi</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- modal tolak -->
      <div class="modal fade" id="tolak<?= $row["idpembelian"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tolak Konfirmasi</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="post">
                  <p>Apakah yakin ingin menolak transaksi ini?</p>
                  <input type="hidden" name="idproduk" value="<?= $idproduk; ?>">
                  <input type="hidden" name="kty" value="<?= $qty; ?>">
                  <input type="hidden" name="idpembelian" value="<?= $row["idpembelian"]; ?>">
                  <button type="submit" class="btn btn-danger" name="tolak">Tolak</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
    <?php endwhile; ?>
  </div>
</div>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>