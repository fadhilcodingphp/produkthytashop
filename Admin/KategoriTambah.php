<?php
require 'AdminFunction.php';
if (!isset($_SESSION['admin'])) {
   header("Location: AdminLogin.php");
   exit;
}
//cek apakah tombol submir sudah ditekan atau belum
if (isset($_POST["submit"])) {
   //cek apakah data berhasil ditambahkan atau tidak
   if (tambahKategori($_POST) > 0) {
      echo "
        <script>
        alert('data berhasil ditambah');
        document.location.href='Kategori.php';
        </script>
        ";
   } else {
      echo "
        <script>
        alert('Data Gagal Ditambahkan');
        document.location.href='Kategori.php';
        </script>
        ";
   }
}
?>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Tambah Kategori Produk | Thytashop</title>
   <?php
   include 'header.php';
   ?>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Kategori Produk</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">Home</a></li>
               <li class="breadcrumb-item"><a href="Kategori.php">Kategori Produk</a></li>
               <li class="breadcrumb-item active">Tambah Kategori Produk</li>
            </ol>
         </nav>
      </div>
      <section class="section">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Tambah Kategori Produk</h5>
               <form class="row g-3" action="" method="post">
                  <div class="col-12">
                     <label for="ID_Kategori" class="form-label">ID Kategori (Kombinasi 5 huruf dan angka)</label>
                     <input type="text" name="ID_Kategori" class="form-control" id="ID_Kategori" required>
                  </div>
                  <div class="col-12">
                     <label for="Nama_Kategori" class="form-label">Nama Kategori Produk</label>
                     <input type="text" name="Nama_Kategori" class="form-control" id="Nama_Kategori" required>
                  </div>
                  <div class="text-center">
                     <button type="submit" name="submit" class="btn btn-primary">Tambah Kategori Produk</button>
                  </div>
               </form>
            </div>
         </div>
      </section>
   </main>
   <?php
   include 'footer.php';
   ?>