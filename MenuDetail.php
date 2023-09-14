<?php
require 'custFunction.php';
//ambil data di URL
$id = $_GET["id"];
// query data mhs berdasarkan id
$ubahProduk = query("SELECT * FROM produk, kategori_produk WHERE ID_Produk = '$id' AND produk.ID_Kategori = kategori_produk.ID_Kategori")[0];

if (isset($_POST["submit"])) {
  //cek apakah data berhasil diubah atau tidak
  if (tambahKeranjang() > 0) {
    echo "
        <script>
        document.location.href='Keranjang.php';
        </script>
        ";
  } else {
    echo "
        <script>
        alert('Data Gagal Diubah');
        document.location.href='Menu.php';
        </script>
        ";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Detail Produk | Thytashop</title>
  <?php
  include 'header.php';
  ?>
  <section class="section pb-0" id="about">
    <!-- Content -->

    <div class="container mt-5 mb-5 g-4">
      <div class="row align-items-center">
        <h2>Detail Produk</h2>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
          <img class="img-fluid" src="assets/img/<?php echo $ubahProduk['Gambar']; ?>" style="width:100%; max-height:300px;" alt="" />
        </div>
        <div class="col-md-6 col-lg-5 ms-3 mt-5 ">
          <h1 class="display-5 fw-bolder">
            <?= $ubahProduk['Nama_Produk'] ?>
          </h1>
          <div class="fs-5 mb-3">
            <span><?= 'Rp. ' . number_format($ubahProduk['Harga'], 2, ',', '.'); ?></span>
          </div>
          <div class="d-flex">
            <form action="" method="post">
              <div class="fs-5 mt-3 mb-3">
                <span>Ukuran
                  <select required name="Ukuran" id="Ukuran">
                    <option></option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                  </select>
                </span>
              </div>
              <div class="input-group mb-3" style="max-width: 120px;">
                <div class="">
                  <button class="btn btn-outline-primary" onclick="countMinus()" type="button">&minus;</button>
                </div>
                <input type="text" name="Jumlah_Barang" class="form-control text-center" id="counter" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                <div class="">
                  <button class="btn btn-outline-primary js-btn-plus" onclick="countPlus()" type="button">&plus;</button>
                </div>
              </div>
              <button type="submit" name="submit" class="btn btn-outline-primary flex-shrink-0">
                <i class="bi-cart-fill me-1"></i>
                Tambahkan Ke Keranjang
              </button>
            </form>
          </div>
          <p class="lead">
          <h4>Deskripsi Produk :</h4>
          <div class="row">
            <div class="col-lg-3 col-md-4 label">Jenis Kain</div>
            <div class="col-lg-9 col-md-8">: <?= $ubahProduk['Jenis_Kain'] ?></div>
          </div>
          <?= $ubahProduk['Keterangan'] ?>
          </p>
        </div>
      </div>
      <!-- / .row -->
    </div>
    <!-- / .container -->
  </section>

  <div class="container py-5">

  </div>
  <?php
  include 'footer.php';
  ?>
  <script>
    const counter = document.getElementById('counter');
    let counterValue = counter.value;

    function countPlus() {
      counter.value = ++counterValue;
    }

    function countMinus() {
      if (counter.value != 1) {
        counter.value = --counterValue;
      } else {
        counter.value = 1;
      }

    }
  </script>