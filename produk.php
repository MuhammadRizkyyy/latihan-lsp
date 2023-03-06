<?php 
require "functions/functions.php";

if(!isset($_SESSION["login"])) {
  header("Location: produk.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
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
  <?php include "template/carousel.php"; ?>

  <h3>Tambah Printer</h3>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
  <i class="bi bi-plus-lg"></i> Tambah Printer
  </button>

  <div class="row">
    <?php 
    $result = mysqli_query($conn, "SELECT * FROM tb_produk");
    while($row = mysqli_fetch_assoc($result)):
    ?>
    <div class="col my-3">
      <div class="card border-0 kotak" style="width: 18rem;">
        <img src="assets/img/<?= $row["gambar"]; ?>" class="card-img-top" width="100%" height="150px">
        <div class="card-body">
          <h5 class="card-title"><a href="detail.php?detail=<?= $row["id_produk"]; ?>"><?= $row["judul_produk"]; ?></a></h5>
          <p class="card-text"><?= "Rp" . number_format($row["harga"], 0, ",", ".") ?></p>

          <?php if($super_user == true): ?>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $row["id_produk"] ?>"><i class="bi bi-trash"></i></button>

          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $row["id_produk"] ?>"><i class="bi bi-pencil text-light"></i></button>
          <?php endif; ?>
          
          <?php if($super_user == false): ?>
          <a href="detail.php?detail=<?= $row["id_produk"]; ?>" class="btn btn-primary">Beli</a>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Modal edit -->
  <div class="modal fade" id="edit<?= $row["id_produk"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="Nama Produk" name="produk" class="form-control" required value="<?= $row["judul_produk"]; ?>"><br>
            <input type="text" placeholder="Harga" name="harga" class="form-control" required value="<?= $row["harga"]; ?>"><br>
            <input type="number" placeholder="Stok" name="stok" class="form-control" required value="<?= $row["stok"]; ?>"><br>
            <textarea name="deskripsi" cols="30" rows="10" placeholder="Deskripsi" required class="form-control"><?= $row["deskripsi"]; ?></textarea><br>
            <img src="assets/img/<?= $row["gambar"]; ?>" alt="" width="100%" height="200px">
            <input type="file" name="gambar" class="form-control"><br>

            <!-- tampung gambar lama -->
            <input type="hidden" name="gambar_lama" value="<?= $row["gambar"]; ?>">
            <input type="hidden" name="idproduk" value="<?= $row["id_produk"]; ?>">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-warning" name="btneditproduk">Edit</button>
        </div>
            </form>
      </div>
    </div>
  </div>

  <!-- Modal hapus-->
  <div class="modal fade" id="hapus<?= $row["id_produk"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Produk</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <h6>Apakah yakin ingin menghapus?</h6>
            <input type="hidden" name="idproduk" value="<?= $row["id_produk"]; ?>">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" name="btnhapusproduk">Hapus</button>
        </div>
          </form>
      </div>
    </div>
  </div>
    <?php endwhile; ?>
  </div>
</div>

<!-- Modal tambah-->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="text" placeholder="Nama Produk" name="produk" class="form-control" required><br>
                        <input type="text" placeholder="Harga" name="harga" class="form-control" required><br>
                        <input type="number" placeholder="Stok" name="stok" class="form-control" required><br>
                        <textarea name="deskripsi" cols="30" rows="10" placeholder="Deskripsi" required class="form-control"></textarea><br>
                        <input type="file" name="gambar" class="form-control" required><br>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="btntambahproduk">Tambah</button>
                </div>
                    </form>
            </div>
        </div>
    </div>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>