<?php
require 'AdminFunction.php';
if (!isset($_SESSION['admin'])) {
   header("Location: AdminLogin.php");
   exit;
}
//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["tambahPromosi"])) {
   //cek apakah data berhasil ditambahkan atau tidak
   if (tambahPromosi($_POST) > 0) {
      echo "
        <script>
        alert('Produk berhasil ditambahkan');
        document.location.href='ProdukPromosi1.php';
        </script>
        ";
   } else {
      echo "
        <script>
        alert('Produk gagal ditambahkan');
        document.location.href='ProdukPromosi.php';
        </script>
        ";
   }
}
?>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Tambah Promosi | Thytashop</title>
   <?php
   include 'header.php';
   ?>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Tambah Promosi</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">Home</a></li>
               <li class="breadcrumb-item"><a href="Produk.php">Produk</a></li>
               <li class="breadcrumb-item active">Tambah Promosi</li>
            </ol>
         </nav>
      </div>
      <section class="section">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Tambah Promosi</h5>
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
                     <label for="Harga_Promosi" class="form-label">Harga Promosi</label>
                     <input type="text" name="Harga_Promosi" class="form-control" id="Harga_Promosi" required>
                  </div>
                  <div class="col-12">
                     <label for="Gambar" class="col-md-4 col-lg-3 col-form-label">Foto Produk</label>
                     <input type="file" name="Gambar" class="form-control" id="Gambar">
                  </div>
                  <div class="text-center">
                     <button type="submit" name="tambahPromosi" class="btn btn-primary">Tambah Produk Yang Dipromosikan</button>
                  </div>
               </form>
            </div>
         </div>
      </section>
   </main>
   <?php
   include 'footer.php';
   ?>