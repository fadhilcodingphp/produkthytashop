<?php
if (isset($_SESSION["login"])) {
  header("Location: Homepage.php");
  exit;
}
require 'custFunction.php';
if (isset($_POST["login"])) {
  $username = $_POST["ID_Pelanggan"];
  $password = $_POST["Password"];
  //cek username
  $result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE ID_Pelanggan='$username'");
  if (mysqli_num_rows($result) == 1) {
    //cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["Password"])) {
      //set session
      $_SESSION["login"] = true;
      $_SESSION["ID_Pelanggan"] = $username;
      header("Location: Homepage.php");
      exit;
    }
    $error = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login | Thytashop</title>

  <!-- Font Icon -->
  <link rel="stylesheet" href="registrasi/fonts/material-icon/css/material-design-iconic-font.min.css">

  <!-- Main css -->
  <link rel="stylesheet" href="registrasi/css/styles.css">
</head>

<body>

  <div class="main">

    <section class="signup">
      <!-- <img src="images/signup-bg.jpg" alt=""> -->
      <div class="container">
        <div class="signup-content">
          <form method="POST" id="signup-form" class="signup-form">
            <h2 class="form-title">Login</h2>
            <div class="form-group">
              <input type="text" class="form-input" name="ID_Pelanggan" id="ID_Pelanggan" placeholder="Username" />
            </div>
            <div class="form-group">
              <input type="password" class="form-input" name="Password" id="Password" placeholder="Password" />
            </div>
            <?php if (isset($error)) : ?>
              <p class="text-danger">Username/Password salah</p>
            <?php endif; ?>
            <div class="form-group">
              <input type="submit" name="login" id="login" class="form-submit" value="Login" />
            </div>
          </form>
          <p class="loginhere">
            Belum Punya Akun? <a href="Daftar.php" class="loginhere-link">Daftar Disini</a>
          </p>
        </div>
      </div>
    </section>

  </div>

  <!-- JS -->
  <script src="registrasi/vendor/jquery/jquery.min.js"></script>
  <script src="registrasi/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>