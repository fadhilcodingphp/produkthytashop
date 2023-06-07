<?php
require "custFunction.php";

if (!isset($_SESSION["login"]) && !isset($_SESSION["ID_Pelanggan"])) {
  header("Location: login.php");
  exit;
}
if (isset($_POST["submit"])) {
  //cek apakah data berhasil diubah atau tidak
  if (KeranjangUbah($_POST) > 0) {
    echo "
        <script>
        document.location.href='Keranjang.php';
        </script>
        ";
  } else {
    echo "
        <script>
        document.location.href='Keranjang.php';
        </script>
        ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Keranjang | Thytashop</title>
  <?php
  include 'header.php';
  ?>

  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0">
          <p class="my-0"><a href="Homepage.php" class="text-primary">Home</a><span class="mx-2">/</span> <strong class="text-black">Keranjang</strong></p>
        </div>
      </div>
    </div>
  </div>

  <!-- tabel keranjang -->
  <div class="site-section">
    <?php $ID_Pelanggan = $_SESSION["ID_Pelanggan"] ?>

    <div class="container">
      <div class="row mt-5 mb-4">
        <form class="col-md-12" method="post">
          <div class="site-blocks-table mx-0 px-0">
            <table class="table table-bordered ">
              <thead>
                <tr>
                  <th class="product-thumbnail" style="width:30%">Gambar</th>
                  <th class="product-name">Menu</th>
                  <th class="product-price">Harga</th>
                  <th class="product-quantity">Jumlah</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Hapus</th>
                </tr>
              </thead>
              <tbody>
                <?php $ambil = mysqli_query($conn, "SELECT * FROM keranjang INNER JOIN pelanggan ON keranjang.ID_Pelanggan = pelanggan.ID_Pelanggan  
              INNER JOIN produk ON keranjang.ID_Produk = produk.ID_Produk WHERE Pelanggan.ID_Pelanggan = '$ID_Pelanggan'"); ?>
                <?php $total = 0; ?>
                <?php while ($pecah = mysqli_fetch_assoc($ambil)) {
                  $total += $pecah['Harga'] * $pecah['Jumlah_Barang'] ?>
                  <tr>
                    <td class="product-thumbnail" style="width:30%">
                      <img src="assets/img/<?php echo $pecah['Gambar']; ?>" width="95%" alt="Image">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $pecah['Nama_Produk']; ?></h2>
                    </td>
                    <td><?php echo 'Rp. ' . number_format($pecah['Harga'], 2, ',', '.'); ?></td>
                    <td>
                      <form action="" method="post">
                        <div class="input-group mb-3" style="max-width: 120px;">
                          <input type="hidden" name="ID_Keranjang" class="form-control" id="ID_Keranjang" value="<?= $pecah["ID_Keranjang"] ?>">
                          <input type="text" name="Jumlah_Barang" class="form-control text-center" id="Jumlah_Barang" value="<?php echo $pecah['Jumlah_Barang']; ?>" placeholder="">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-sm btn-block">Edit Jumlah</button>

                      </form>
                    </td>
                    <td><?php echo 'Rp. ' . number_format($pecah['Harga'] * $pecah['Jumlah_Barang'], 2, ',', '.'); ?></td>
                    <td><a href="KeranjangHapus.php?id=<?= $pecah['ID_Keranjang']; ?>" class="btn btn-primary btn-sm" onclick="return confirm('Yakin ingin menghapus barang ini dari keranjang?')">X</a></td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </form>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="row mt-0">
            <div class="col-md-4">
              <a href="Menu.php" class="btn btn-outline-primary py-1 btn-block">Lanjutkan Belanja</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-6 text-right border-bottom mb-5">
                  <h5 class="text-black text-uppercase">Total Belanja</h5>
                </div>
                <div class="col-md-6 text-right border-bottom mb-5">
                  <h5 class="text-black text-uppercase"><?php echo 'Rp. ' . number_format($total, 2, ',', '.'); ?></h5>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='PesanBarang.php'">Buat Pesanan</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- tabel keranjang  -->


  <!-- Footer Start -->
  <div class="container-fluid bg-dark text-light mt-3 pt-3 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
      <div class="row g-5">
        <div class="col-lg- col-md-12">
          <h3 class="text-light text-center mb-4">Pode Food Makassar</h3>
          <h5 class="text-light text-center">
            <i class="fa fa-map-marker-alt me-3"></i>Kompleks Stella Marisa Blok E No 10 Makassar
          </h5>
          <h5 class="text-light text-center">
            <i class="fa fa-phone-alt me-3"></i>082188289569
          </h5>
          <h5 class="text-light text-center">
            <i class="fab fa-youtube me-3"></i>Melisa Pode
          </h5>
          <div class="text-light d-flex justify-content-center pt-2">
            <a class="btn btn-outline-light btn-social me-2" href="https://instagram.com/podefoodmakassar?igshid=YmMyMTA2M2Y="><i class="fab fa-instagram"></i></a>
            <a class="btn btn-outline-light btn-social" href="https://wa.me/6282188289569"><i class="fab fa-whatsapp"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
  <?php $ambil = mysqli_query($conn, "SELECT * FROM produk, keranjang, pelanggan WHERE produk.ID_Produk = keranjang.ID_Produk AND pelanggan.ID_Pelanggan = '$ID_Pelanggan'"); ?>
  <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
    <script>
      function countPlus() {
        const counter = document.getElementById('<?php echo $pecah['ID_Produk']; ?>');
        let counterValue = counter.value;
        counter.value = ++counterValue;
      }

      function countMinus() {
        const counter = document.getElementById('<?php echo $pecah['ID_Produk']; ?>');
        let counterValue = counter.value;
        if (counter.value > 1) {
          counter.value = --counterValue;
        } else {
          counter.value = 1;
        }

      }
    </script>
  <?php } ?>


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