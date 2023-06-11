<?php
require 'custFunction.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Home | Thytashop</title>

  <?php
  include 'header.php';
  ?>

  <!-- Cara Pesan -->
  <div id="caraPesan" class="container-xxl py-5">
    <div class="container">
      <div class="row g-5 mb-5 align-items-end wow fadeInUp" data-wow-delay="0.1s">
        <div class="col-lg-8">
          <h1 class="display-5 mb-0">
            Promo Produk
            <span class="text-danger">Thytashop</span>
          </h1>
        </div>
      </div>
      <div class="row g-4">
        <?php
        $ambil = mysqli_query($conn, "SELECT * FROM promosi");
        ?>
        <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="membership-item position-relative" style="background: red;">
              <h4 class=" text-black"><?php echo $pecah['Nama_Produk']; ?></h4>
              <img src="assets/img/<?php echo $pecah['Gambar']; ?>" style="width:50%; max-height:200px;" alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
              <h5 class="coret" style="color: black;"><?php echo 'Rp. ' . number_format($pecah['Harga'], 2, ',', '.'); ?></h5>
              <h4 style="color: white;">Sekarang Hanya : <br> <?php echo 'Rp. ' . number_format($pecah['Harga_Promosi'], 2, ',', '.'); ?></h4>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- Cara Pesan -->
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