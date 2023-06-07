<?php
require 'AdminFunction.php';
if (!isset($_SESSION['admin'])) {
   header("Location: AdminLogin.php");
   exit;
}
//ambil data di URL
$id = $_GET["id"];
// query data mhs berdasarkan id
$ubahProduk = query("SELECT * FROM produk, kategori_produk WHERE ID_Produk = '$id' AND produk.ID_Kategori = kategori_produk.ID_Kategori")[0];
?>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Detail Produk | Thytashop</title>
   <?php
   include 'header.php';
   ?>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Detail Produk</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
               <li class="breadcrumb-item"><a href="Produk.php">Produk</a></li>
               <li class="breadcrumb-item active">Detail Produk</li>
            </ol>
         </nav>
      </div>
      <section class="section profile">
         <div class="row">
            <div class="col-xl-4">
               <div class="card">
                  <img src="../assets/img/<?php echo $ubahProduk['Gambar']; ?>">
                  <div class="card-body">
                     <h5 class="card-title"><?= $ubahProduk['Nama_Produk'] ?></h5>
                  </div>
               </div>
            </div>
            <div class="col-xl-8">
               <div class="card">
                  <div class="card-body pt-3">
                     <div class="tab-content pt-2">
                        <!-- Detail produk -->
                        <div class="tab-pane fade show active profile-overview" id="detailProduk">
                           <h5 class="card-title">Detail Produk</h5>
                           <div class="row">
                              <div class="col-lg-3 col-md-4 label ">ID Produk</div>
                              <div class="col-lg-9 col-md-8"><?= $ubahProduk['ID_Produk'] ?></div>
                           </div>
                           <div class="row">
                              <div class="col-lg-3 col-md-4 label">ID Kategori</div>
                              <div class="col-lg-9 col-md-8"><?= $ubahProduk['ID_Kategori'] ?></div>
                           </div>
                           <div class="row">
                              <div class="col-lg-3 col-md-4 label">Kategori Produk</div>
                              <div class="col-lg-9 col-md-8"><?= $ubahProduk['Nama_Kategori'] ?></div>
                           </div>
                           <div class="row">
                              <div class="col-lg-3 col-md-4 label">Nama Produk</div>
                              <div class="col-lg-9 col-md-8"><?= $ubahProduk['Nama_Produk'] ?></div>
                           </div>
                           <div class="row">
                              <div class="col-lg-3 col-md-4 label">Harga</div>
                              <div class="col-lg-9 col-md-8"><?= 'Rp. ' . number_format($ubahProduk['Harga'], 2, ',', '.'); ?></div>
                           </div>
                           <div class="row">
                              <div class="col-lg-3 col-md-4 label">Ukuran Produk</div>
                              <div class="col-lg-9 col-md-8"><?= $ubahProduk['Ukuran'] ?></div>
                           </div>
                           <div class="row">
                              <div class="col-lg-3 col-md-4 label">Jenis Kain</div>
                              <div class="col-lg-9 col-md-8"><?= $ubahProduk['Jenis_Kain'] ?></div>
                           </div>
                           <div class="row">
                              <div class="col-lg-3 col-md-4 label">Keterangan Produk</div>
                              <div class="col-lg-9 col-md-8"><?= $ubahProduk['Keterangan'] ?></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </main>
   <?php
   include 'footer.php';
   ?>