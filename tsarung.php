<?php
require "custFunction.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Produk | Thytashop</title>
  <?php
  include 'header.php';
  ?>

  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0">
          <p class="my-0"><a href="Homepage.php" class="text-primary">Home</a><span class="mx-2">/</span> <strong class="text-black">Produk</strong></p>
        </div>
      </div>
    </div>
  </div>

  <!-- products section start  -->
  <section class="my-lg-14 my-8 mt-4">
    <div class="container">
      <div class="row">
        <div class="col-6 mb-6">
          <h3 class=" mb-4">
            Produk Sarung <span class="text-primary">Thytashop</span>
          </h3>
        </div>
        <div class="col-5">
          <form class="d-flex" action="" method="POST">
            <input class="form-control me-2" type="search" placeholder="Cari Produk" aria-label="Search" name="keyword" autocomplete="off">
            <button class="btn btn-outline-success" type="submit" name="cari"><i class="fa fa-search"></i></button>
          </form>
        </div>
      </div>

      <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-3">
        <?php
        if (isset($_POST["cari"])) {
          $keyword = $_POST["keyword"];
          $ambil = mysqli_query($conn, "SELECT * FROM produk INNER JOIN kategori_produk ON produk.ID_Kategori = kategori_produk.ID_Kategori WHERE produk.Nama_produk LIKE '%$keyword%' OR kategori_produk.Nama_Kategori LIKE '%$keyword%' ORDER BY produk.Nama_Produk ASC");
        } else {
          $ambil = mysqli_query($conn, "SELECT * FROM produk WHERE produk.ID_Kategori = 'THY002'");
        }
        ?>
        <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
          <!-- produk -->
          <div class="col">
            <div class="card card-product">
              <div class="card-body ">
                <div class="text-center position-relative mb-2" style="width:100%; height:200px;"> <a href="MenuDetail.php?id=<?= $pecah['ID_Produk']; ?>">
                    <img src="assets/img/<?php echo $pecah['Gambar']; ?>" style="width:100%; max-height:200px;" alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                </div>
                <h3 class="fs-5">
                  <a href="MenuDetail.php?id=<?= $pecah['ID_Produk']; ?>" class="text-inherit text-primary text-decoration-none"><?php echo $pecah['Nama_Produk']; ?></a>
                </h3>
                <div class="d-flex justify-content-between align-items-center mt-2 mb-1">
                  <div><span class="text-dark"><?php echo 'Rp. ' . number_format($pecah['Harga'], 2, ',', '.'); ?></span>
                  </div>
                </div>
                <div>
                  <a href="tambahKeranjang.php?id=<?= $pecah['ID_Produk']; ?>" class="btn btn-primary btn-sm">
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
  </section>
  <!-- products section end  -->

  <?php
  include 'footer.php';
  ?>