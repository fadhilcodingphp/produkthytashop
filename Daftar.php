<?php
require 'custFunction.php';
if (isset($_POST["daftar"])) {
  if (daftar($_POST) > 0) {
    echo
    "<script>
        alert ('userbaru berhasil ditambah')
        document.location.href='Login.php';
        </script>";
  } else {
    echo mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registrasi | Thytashop</title>

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
            <h2 class="form-title">Registrasi</h2>
            <div class="form-group">
              <input type="text" class="form-input" name="Nama_Pelanggan" id="Nama_Pelanggan" placeholder="Nama Pelanggan" required />
            </div>
            <div class="form-group">
              <input type="text" class="form-input" name="ID_Pelanggan" id="ID_Pelanggan" placeholder="Username" required />
            </div>
            <div class="form-group">
              <input type="tel" onkeydown="phoneNumberFormatter()" class="form-input" id="Telepon" name="Telepon" placeholder="Nomor Telepon" required />
              <script>
                function formatPhoneNumber(value) {
                  if (!value) return value;
                  const phoneNumber = value.replace(/[^\d]/g, '');
                  const phoneNumberLength = phoneNumber.length;
                  if (phoneNumberLength < 4) return phoneNumber;
                  if (phoneNumberLength < 7) {
                    return `(${phoneNumber.slice(0,3)}) ${phoneNumber.slice(3)}`;
                  }
                  return `(${phoneNumber.slice(0,3)}) ${phoneNumber.slice(
                      3,
                      6,
                      )}-${phoneNumber.slice(6,13)}`;
                }

                function phoneNumberFormatter() {
                  const inputField = document.getElementById('Telepon');
                  const formattedInputValue = formatPhoneNumber(inputField.value);
                  inputField.value = formattedInputValue;
                }
              </script>
            </div>
            <div class="form-group">
              <input type="email" class="form-input" name="Email" id="Email" placeholder="Email" required />
            </div>
            <div class="form-group">
              <input type="password" class="form-input" name="Password" id="Password" placeholder="Password" required />
            </div>
            <div class="form-group">
              <input type="password" class="form-input" name="Password2" id="Password2" placeholder="Confirm Password" required />
            </div>
            <div class="form-group">
              <input type="submit" name="daftar" id="submit" class="form-submit" value="Daftar" />
            </div>
          </form>
          <p class="loginhere">
            Sudah Punya Akun <a href="Login.php" class="loginhere-link">Login Disini</a>
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