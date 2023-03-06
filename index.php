<?php 

require "functions/functions.php";

if(isset($_SESSION["login"])) {
  header("Location: produk.php");
}

if(isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");

  // cari apakah ada yang username sesuai yg di input
  if(mysqli_num_rows($result) === 1) {
    // cek password
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row["password"])) {
      $_SESSION["login"] = true;
      $_SESSION["name"] = $username;
      $_SESSION["id_user"] = $row["id_user"];
      header("Location: produk.php");
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>

  <?php include "template/navbar.php"; ?>

  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h3 class="text-center">Login</h3><br>
            <form action="" method="post">
              <input type="text" name="username" class="form-control" placeholder="Username" required><br>
              <input type="password" name="password" class="form-control" placeholder="Password" required><br>
              <p>Belum punya akun? <a href="register.php">Register</a></p>

              <button type="submit" name="login" class="btn btn-primary">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>