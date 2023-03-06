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
  <style>
    .kotak {
      -webkit-box-shadow: 4px 3px 14px -3px rgba(0,0,0,0.65);
      -moz-box-shadow: 4px 3px 14px -3px rgba(0,0,0,0.65);
      box-shadow: 4px 3px 14px -3px rgba(0,0,0,0.65);
    }
  </style>
</head>
<body>
  <?php include "template/navbar.php"; ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card my-3 border-0 kotak">
          <div class="card-body">
            <div class="row">
              <?php 
              $id = $_GET["detail"];
              $result = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = $id");

              while($row = mysqli_fetch_assoc($result)):
              ?>
              <!-- kiri -->
              <div class="col-md-6">
                <img src="assets/img/<?= $row["gambar"]; ?>" alt="gambar printer" width="400px">
              </div>

              <!-- kanan -->
              <div class="col-md-6">
                <h5><?= $row["judul_produk"]; ?></h5>
                <h4><?= "Rp" . number_format($row["harga"], 0, ",", "."); ?></h4>
                <p><strong>Stok: <?= $row["stok"]; ?></strong></p>
                <p><?= $row["deskripsi"]; ?></p>
                
                <?php if($super_user == false): ?>
                <a href="form_beli.php?beli=<?= $row['id_produk']; ?>" class="btn btn-primary">Beli</a>
                <?php endif; ?>
                
              </div>

              <?php endwhile; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>