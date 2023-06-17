<?php
require 'AdminFunction.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
   //cek apakah data berhasil diubah atau tidak
   if (ubahKategori($_POST) > 0) {
      echo "
        <script>
        alert('Data berhasil diubah');
        document.location.href='Kategori.php';
        </script>
        ";
   } else {
      echo "
        <script>
        alert('Data Gagal Diubah');
        document.location.href='Kategori.php';
        </script>
        ";
   }
}
//ambil data di URL
$id = $_GET["id"];
// query data mhs berdasarkan id
$ubah = query("SELECT * FROM kategori_produk WHERE ID_Kategori = '$id'")[0];
?>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Ubah Kategori Produk | Thytashop</title>
   <?php
   include 'header.php';
   ?>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Ubah Kategori Produk</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">Home</a></li>
               <li class="breadcrumb-item"><a href="Kategori.php">Kategori Produk</a></li>
               <li class="breadcrumb-item active">Ubah Kategori Produk</li>
            </ol>
         </nav>
      </div>
      <section class="section">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Ubah Kategori Produk</h5>
               <form class="row g-3" action="" method="post">
                  <div class="col-12">
                     <label for="ID_Kategori" class="form-label">ID Kategori (Kombinasi 5 huruf dan angka)</label>
                     <input type="text" name="ID_Kategori" class="form-control" id="ID_Kategori" value="<?= $ubah["ID_Kategori"] ?>" readonly>
                  </div>
                  <div class="col-12">
                     <label for="Nama_Kategori" class="form-label">Nama Kategori Produk</label>
                     <input type="text" name="Nama_Kategori" class="form-control" id="Nama_Kategori" value="<?= $ubah["Nama_Kategori"] ?>" required>
                  </div>
                  <div class="text-center">
                     <button type="submit" name="submit" class="btn btn-primary">Ubah Kategori Produk</button>
                  </div>
               </form>
            </div>
         </div>
      </section>
   </main>
   <?php
   include 'footer.php';
   ?>