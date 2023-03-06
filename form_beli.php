<?php 
require "functions/functions.php";

$name = $_SESSION["name"];
$id_user = $_SESSION["id_user"];
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
  <div class="container mt-3">
    <div class="card">
      <div class="card-header">Info Produk</div>
        <div class="card-body">
          <?php 
          $id = $_GET["beli"];
          $result = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = $id");

          while($row = mysqli_fetch_assoc($result)):
          ?>
          <img src="assets/img/<?= $row["gambar"]; ?>" alt="gambar printer" width="400px">
          <h5><?= $row["judul_produk"]; ?></h5>
          <h4><?= "Rp" . number_format($row["harga"], 0, ",", ".") ?></h4>

          <?php endwhile; ?>
        </div>
      </div>

      <div class="card mt-3">
        <div class="card-header">Form pembelian</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="col-md-4">
              <label for="">Nama</label>
              <input type="text" name="nama" class="form-control" value="<?= $name; ?>" readonly>
            </div>
            <div class="col-md-4">
              <label for="">No. KTP</label>
              <input type="number" name="noktp" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label for="">Kode Pos</label>
              <input type="number" name="kodepos" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label for="">Alamat tujuan</label>
              <input type="text" name="alamat" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label for="">Jumlah pembelian</label>
              <input type="number" name="qty" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label for="">Jasa pengirjman</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="jne" value="jne" name="pengiriman">
                <label class="form-check-label" for="jne">JNE</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="jnt" value="jnt" name="pengiriman">
                <label class="form-check-label" for="jnt">JNT</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="sicepat" value="sicepat" name="pengiriman">
                <label class="form-check-label" for="sicepat">SiCepat</label>
              </div>

              <input type="hidden" name="iduser" value="<?= $id_user; ?>">
              <button class="btn btn-primary mt-3" name="checkout" type="submit">Checkout</button>
            </div>
          </form>
        </div>
    </div>
  </div>

  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>