<?php 
$super_user = false;
if( isset($_SESSION["name"]) ) {
  if(cek_status($_SESSION["name"]) == 1) {
    $super_user = true;
  }
}
?>
<nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="produk.php">Toko Printer</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if(isset($_SESSION["login"])): ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="produk.php">Home</a>
        </li>
        <?php if($super_user == false): ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="transaksi.php">Transaksi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="konfirmasi.php">Konfirmasi Pembayaran</a>
        </li>
        <?php endif; ?>
          <?php if($super_user == true): ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="konfirmasi_pembayaran_admin.php">Konfirmasi Pembayaran</a>
          </li>
          <?php endif; ?>
        <?php endif; ?>
      </ul>

      <?php if(isset($_SESSION["login"])): ?>
      <form class="d-flex" role="search">
        <a class="btn btn-outline-success" href="logout.php">Logout</a>
      </form>
      <?php endif; ?>

      <?php if(!isset($_SESSION["login"])): ?>
      <form class="d-flex me-3" role="search">
        <a class="btn btn-outline-primary" href="register.php">Register</a>
      </form>
      <form class="d-flex" role="search">
        <a class="btn btn-outline-primary" href="index.php">Login</a>
      </form>
      <?php endif; ?>

    </div>
  </div>
</nav>