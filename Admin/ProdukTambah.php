<?php
require 'AdminFunction.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["tambahProduk"])) {
   //cek apakah data berhasil ditambahkan atau tidak
   if (tambahProduk($_POST) > 0) {
      echo "
        <script>
        document.location.href='Produk.php';
        </script>
        ";
   } else {
      echo "
        <script>
        alert('Produk gagal ditambahkan');
        document.location.href='Produk.php';
        </script>
        ";
   }
}
?>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Tambah Produk | Thytashop</title>
   <?php
   include 'header.php';
   ?>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Tambah Produk</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">Home</a></li>
               <li class="breadcrumb-item"><a href="Produk.php">Produk</a></li>
               <li class="breadcrumb-item active">Tambah Produk</li>
            </ol>
         </nav>
      </div>
      <section class="section">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Tambah Produk</h5>
               <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                  <div class="col-12">
                     <label for="Nama_Produk" class="form-label">Nama Produk</label>
                     <input type="text" name="Nama_Produk" class="form-control" id="Nama_Produk" required>
                  </div>
                  <div class="col-12">
                     <label for="Stok" class="form-label">Stok Produk</label>
                     <input type="text" name="Stok" class="form-control" id="Stok" required>
                  </div>
                  <div class="col-12">
                     <label class="form-label">Kategori Produk</label>
                     <div class="col-12">
                        <select class="form-select" aria-label="Default select example" name="ID_Kategori">
                           <option selected>---</option>
                           <?php
                           $ambil = mysqli_query($conn, "SELECT * FROM kategori_Produk");
                           while ($pecah = mysqli_fetch_assoc($ambil)) {
                              echo "<option value=$pecah[ID_Kategori]> $pecah[Nama_Kategori]</option>";
                           }
                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-12">
                     <label for="Harga" class="form-label">Harga Produk</label>
                     <input type="text" name="Harga" class="form-control" id="Harga" required>
                  </div>
                  <div class="col-12">
                     <label for="Jenis_Kain" class="form-label">Jenis Kain</label>
                     <input type="text" name="Jenis_Kain" class="form-control" id="Jenis_Kain" required>
                  </div>
                  <div class="col-12">
                     <label for="Keterangan" class="form-label">Keterangan Produk</label>
                     <input type="text" name="Keterangan" class="form-control" id="Keterangan" required>
                  </div>
                  <div class="col-12">
                     <label for="Gambar" class="col-md-4 col-lg-3 col-form-label">Foto Produk</label>
                     <input type="file" name="Gambar" class="form-control" id="Gambar">
                  </div>
                  <div class="text-center">
                     <button type="submit" name="tambahProduk" class="btn btn-primary">Tambah Produk</button>
                  </div>
               </form>
            </div>
         </div>
      </section>
   </main>
   <?php
   include 'footer.php';
   ?>