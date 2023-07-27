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

  <!-- Produk Best Seller -->
  <div id="caraPesan" class="container-xxl py-5">
    <div class="container">
      <div class="row g-5 mb-5 align-items-end wow fadeInUp" data-wow-delay="0.1s">
        <div class="col-lg-8">
          <h1 class="display-5 mb-0">
            Produk Best Seller
            <span class="text-danger">Thytashop</span>
          </h1>
        </div>
      </div>
      <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-3">
        <?php
        $ambil = mysqli_query($conn, "SELECT * FROM produk WHERE produk.ID_Kategori = 'THY006'");
        ?>
        <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
          <!-- produk -->
          <div class="col">
            <div class="card card-product">
              <div class="card-body ">
                <div class="text-center position-relative mb-2" style="width:100%; height:200px;">
                  <img src="assets/img/<?php echo $pecah['Gambar']; ?>" style="width:100%; max-height:200px;" alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                </div>
                <h3 class="fs-5">
                  <?php echo $pecah['Nama_Produk']; ?></a>
                </h3>
                <div class="d-flex justify-content-between align-items-center mt-2 mb-1">
                  <div>
                    <h4 class="text-dark"><?php echo 'Rp. ' . number_format($pecah['Harga'], 2, ',', '.'); ?></h4>
                  </div>
                </div>
                <div>
                  <a href="MenuDetail.php?id=<?= $pecah['ID_Produk']; ?>" class="btn btn-primary btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                      <line x1="12" y1="5" x2="12" y2="19"></line>
                      <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>Tambah Ke Keranjang</a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- Produk Best Seller -->

  <!-- Promo Produk -->
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
        $ambil = mysqli_query($conn, "SELECT * FROM produk WHERE produk.ID_Kategori = 'THY005'");
        ?>
        <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <?php
            $tgl_now = date("Y-m-d");
            $tgl_exp = $pecah['Tgl_Promo']; //tanggal expired
            if ($tgl_now >= $tgl_exp) {
              $conn->query("DELETE FROM produk WHERE Tgl_Promo = '$tgl_exp'");
            } else {
            ?>
              <div class="membership-item position-relative" style="background: red;">
                <h4 class=" text-black"><?php echo $pecah['Nama_Produk']; ?></h4>
                <img src="assets/img/<?php echo $pecah['Gambar']; ?>" style="width:50%; max-height:200px;" alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                <h5 class="coret" style="color: black;"><?php echo 'Rp. ' . number_format($pecah['Promo'], 2, ',', '.'); ?></h5>
                <h4 style="color: white;">Sekarang Hanya : <br> <?php echo 'Rp. ' . number_format($pecah['Harga'], 2, ',', '.'); ?></h4>
                <h6 style="color: white;">Berlaku sampai<br><?php echo $pecah['Tgl_Promo']; ?> </h6>
                <div>
                  <a href="MenuDetail.php?id=<?= $pecah['ID_Produk']; ?>" class="btn btn-primary btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                      <line x1="12" y1="5" x2="12" y2="19"></line>
                      <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>Tambah Ke Keranjang</a>
                </div>
              <?php
            }
              ?>
              </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- Promo Produk -->
  <!-- Cara Pesan -->
  <div id="caraPesan" class="container-xxl py-5">
    <div class="container">
      <div class="row g-5 mb-5 align-items-end wow fadeInUp" data-wow-delay="0.1s">
        <div class="col-lg-8">
          <p><span class="text-primary me-2">#</span>Panduan Pemesanan</p>
          <h1 class="display-5 mb-0">
            Cara memesan lewat website
            <span class="text-danger">Thytashop</span>
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
      <?php
      include 'rating.php';
      ?>
    </div>
  </div>
  <!-- Testimonial End -->

  <?php
  include 'footer.php';
  ?>