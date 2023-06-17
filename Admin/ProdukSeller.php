<?php
require 'AdminFunction.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["tambahSeller"])) {
   //cek apakah data berhasil ditambahkan atau tidak
   if (tambahSeller($_POST) > 0) {
      echo "
        <script>
        alert('Produk berhasil ditambahkan');
        document.location.href='ProdukSeller1.php';
        </script>
        ";
   } else {
      echo "
        <script>
        alert('Produk gagal ditambahkan');
        document.location.href='ProdukSeller.php';
        </script>
        ";
   }
}
?>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Tambah Produk Best Seller | Thytashop</title>
   <?php
   include 'header.php';
   ?>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Tambah Produk Best Seller</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">Home</a></li>
               <li class="breadcrumb-item"><a href="Produk.php">Produk</a></li>
               <li class="breadcrumb-item active">Tambah Produk Best Seller</li>
            </ol>
         </nav>
      </div>
      <section class="section">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Tambah Produk Best Seller</h5>
               <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                  <div class="col-12">
                     <label for="Nama_Produk" class="form-label">Nama Produk</label>
                     <input type="text" name="Nama_Produk" class="form-control" id="Nama_Produk" required>
                  </div>
                  <div class="col-12">
                     <label for="Harga" class="form-label">Harga Produk</label>
                     <input type="text" name="Harga" class="form-control" id="Harga" required>
                  </div>
                  <div class="col-12">
                     <label for="Gambar" class="col-md-4 col-lg-3 col-form-label">Foto Produk</label>
                     <input type="file" name="Gambar" class="form-control" id="Gambar">
                  </div>
                  <div class="text-center">
                     <button type="submit" name="tambahSeller" class="btn btn-primary">Tambah Produk Best Seller</button>
                  </div>
               </form>
            </div>
         </div>
      </section>
   </main>
   <?php
   include 'footer.php';
   ?>