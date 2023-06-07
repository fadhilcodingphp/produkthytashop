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
  <meta charset="utf-8" />
  <title>Registrasi | Thytashop</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="keywords" />
  <meta content="" name="description" />

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon" />

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Quicksand:wght@600;700&display=swap" rel="stylesheet" />

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet" />
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet" />
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet" />
</head>

<body>
  <!-- Section: Design Block -->
  <section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
            background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
            height: 300px;
            "></div>
    <!-- Background image -->

    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
            margin-top: -100px;
            background: hsla(0, 0%, 100%, 0.8);
            backdrop-filter: blur(30px);
            ">
      <div class="card-body py-5 px-md-5">

        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5">Daftar</h2>
            <form action="" method="post">
              <div class="row g-3">
                <div class="col-12">
                  <div class="form-floating">
                    <input name="Nama_Pelanggan" id="Nama_Pelanggan" type="text" class="form-control bg-light border-0" placeholder="username" required />
                    <label for="Nama_Pelanggan">Nama Pelanggan*</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input name="ID_Pelanggan" id="ID_Pelanggan" type="text" class="form-control bg-light border-0" id="subject" placeholder="Subject" required />
                    <label for="ID_Pelanggan">Username*</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input name="Telepon" id="Telepon" type="text" class="form-control bg-light border-0" id="subject" placeholder="Subject" required />
                    <label for="Telepon">Nomor Telefon*</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input name="Email" id="Email" type="text" class="form-control bg-light border-0" id="subject" placeholder="Subject" />
                    <label for="Email">Email</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input name="Institusi" id="Institusi" type="text" class="form-control bg-light border-0" id="subject" placeholder="Subject" />
                    <label for="Institusi">Institusi</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input name="Password" id="Password" type="password" class="form-control bg-light border-0" id="subject" placeholder="Subject" required />
                    <label for="Password">Password*</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input name="Password2" id="Password2" type="password" class="form-control bg-light border-0" id="subject" placeholder="Subject" required />
                    <label for="Password2">Konfirmasi Password*</label>
                  </div>
                </div>
                <p class="text-start">Untuk yang diberi tanda bintang (*) wajib diisi</p>
                <div class="col-12">
                  <button class="btn btn-primary w-100 py-3" type="submit" name="daftar">
                    Daftar
                  </button>
                </div>
                <div class="col-12">
                  <p class="text-center text-muted mt-2 mb-0">Sudah Punya Akun?
                    <a href="Login.php" class="fw-bold text-body"><u>Log In Disini</u></a>
                  </p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>

</html>