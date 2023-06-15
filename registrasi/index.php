<?php
require '../custFunction.php';
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
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
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
                            <input type="text" class="form-input" name="Nama_Pelanggan" id="Nama_Pelanggan" placeholder="Nama Pelanggan" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="ID_Pelanggan" id="ID_Pelanggan" placeholder="Username" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="Telepon" id="Telepon" placeholder="Nomor Telepon" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="Email" id="Email" placeholder="Email" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="Password" id="Password" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="Password2" id="Password2" placeholder="Confirm Password" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="daftar" id="submit" class="form-submit" value="Daftar" />
                        </div>
                    </form>
                    <p class="loginhere">
                        Sudah Punya Akun <a href="#" class="loginhere-link">Login Disini</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>