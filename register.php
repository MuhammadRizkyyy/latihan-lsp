<?php 

require "functions/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>

  <?php include "template/navbar.php"; ?>

  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h3 class="text-center">Registrasi</h3><br>
            <form action="" method="post">
              <input type="text" name="username" class="form-control" placeholder="Username" required><br>
              <input type="password" name="password" class="form-control" placeholder="Password" required><br>
              <input type="password" name="password2" class="form-control" placeholder="Konfirmasi password" required><br>
              <p>Sudah punya akun? <a href="login.php">Login</a></p>

              <button type="submit" name="register" class="btn btn-primary">Registrasi</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>