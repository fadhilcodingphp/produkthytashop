<?php
require 'custFunction.php';
if (!isset($_SESSION["login"]) && !isset($_SESSION["ID_Pelanggan"])) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Home | Thytashop</title>
  <?php
  include 'header.php';
  ?>
  <!-- Header Start -->
  <div style="width:60%;" class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/car1.png" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="img/car2.png" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="img/car3.png" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="img/car4.png" class="d-block w-100">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!-- Header End -->

  <!-- Contact Start -->
  <div id="kontak" class="container-xxl py-4">
    <div class="container">
      <div class="row g-4 mb-5">
        <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
          <div class="h-100 bg-dark d-flex align-items-center p-5">
            <div class="btn-lg-square bg-black flex-shrink-0">
              <i class="fa fa-phone-alt text-primary"></i>
            </div>
            <div class="ms-4">
              <p class="mb-2 text-light">
                <span class="text-primary me-2">#</span>Telepon
              </p>
              <h5 class="text-light mb-0">082188289569</h5>
            </div>
          </div>
        </div>
        <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
          <div class="h-100 bg-dark d-flex align-items-center p-5">
            <div class="btn-lg-square bg-black flex-shrink-0">
              <i class="fa fa-whatsapp text-primary"></i>
            </div>
            <div class="ms-4">
              <p class="mb-2 text-light">
                <span class="text-primary me-2">#</span>Whatsapp
              </p>
              <h5 class="text-light mb-0">082188289569</h5>
            </div>
          </div>
        </div>
        <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
          <div class="h-100 bg-dark d-flex align-items-center p-5">
            <div class="btn-lg-square bg-black flex-shrink-0">
              <i class="fa fa-instagram text-primary"></i>
            </div>
            <div class="ms-4">
              <p class="mb-2 text-light">
                <span class="text-primary me-2">#</span>Instagram
              </p>
              <h5 class="text-light mb-0">PodeFoodMakassar</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Contact End -->

  <!-- Cara Pesan -->
  <div id="caraPesan" class="container-xxl py-5">
    <div class="container">
      <div class="row g-5 mb-5 align-items-end wow fadeInUp" data-wow-delay="0.1s">
        <div class="col-lg-8">
          <p><span class="text-primary me-2">#</span>Panduan Pemesanan</p>
          <h1 class="display-5 mb-0">
            Cara memesan lewat website
            <span class="text-primary">Thytashop</span>
          </h1>
        </div>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="membership-item position-relative" style="background: white; border-style: solid; border-color: #295c33;">
            <h1 class=" text-black">01</h1>
            <h3 class="text-black mb-12">Pilih Menu</h3>
            <p style="color: black;">
              Kamu dapat memilih menu dengan masuk ke pilihan menu. Pilih menu yang kamu mau lalu masukkan menu tersebut ke keranjang belanja.
            </p>
            <a class="btn btn-outline-primary px-4 mt-3" href="Menu.php">Pilih Menu</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="membership-item position-relative" style="background: white; border-style: solid; border-color: #295c33;">
            <h1 class=" text-black">02</h1>
            <h3 class="text-black mb-12">Pesan Menu</h3>
            <p style="color: black;">
              Check out menu pilihan yang sudah ada di keranjang belanja dengan menekan "Pesan Sekarang" dan tunggu tagihan anda muncul.
            </p>
            <a class="btn btn-outline-primary px-4 mt-3" href="Keranjang.php">Pesan Menu</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="membership-item position-relative" style="background: white; border-style: solid; border-color: #295c33;">
            <h1 class=" text-black">03</h1>
            <h3 class="text-black mb-12">Bayar Pesanan</h3>
            <p style="color: black;">
              Bayar tagihan anda dengan cara masuk ke menu tagihan. Pilih tagihan yang akan dibayar dan isi detail tagihan pada form yang muncul.
            </p>
            <a class="btn btn-outline-primary px-4 mt-3" href="TagihanBayar.php">Bayar Tagihan</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="membership-item position-relative" style="background: white; border-style: solid; border-color: #295c33;">
            <h1 class=" text-black">04</h1>
            <h3 class="text-black mb-12">Selesai</h3>
            <p style="color: black;">
              Bila pembayaran kamu telah dikonfirmasi, maka tunggu pesanan kamu sampai di tujuan sesuai dengan pesanan yang sudah disepakati.
            </p>
            <a class="btn btn-outline-primary px-4 mt-3" href="">Pesanan Kamu</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Cara Pesan -->

  <!-- Testimonial Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <h1 class="display-5 text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
        Testimoni
      </h1>
      <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">

        <?php
        $ambil = mysqli_query($conn, "SELECT * FROM penilaian");
        ?>
        <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
          <div class="testimonial-item text-center">
            <img class="img-fluid rounded-circle border border-2 p-2 mx-auto mb-4" src="assets/img/<?php echo $pecah['Foto_Produk']; ?>" style="width: 100px; height: 100px" />
            <div class="testimonial-text rounded text-center p-4">
              <p>
                <?php echo $pecah['Testimoni']; ?></a>
              </p>
              <h5 class="mb-1"><?php echo $pecah['Nama_Penerima']; ?></a></h5>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- Testimonial End -->

  <?php
  include 'footer.php';
  ?>