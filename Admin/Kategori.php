<?php
require 'AdminFunction.php';
if (!isset($_SESSION['admin'])) {
   header("Location: AdminLogin.php");
   exit;
}
?>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Kategori Produk | Thytashop</title>
   <?php
   include 'header.php';
   ?>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Kategori Produk</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
               <li class="breadcrumb-item active">Kategori Produk</li>
            </ol>
         </nav>
      </div>
      <?php $i = 1; ?>
      <section class="section">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title">Kategori Produk</h5>
                     <a class="btn btn-primary" href="KategoriTambah.php" role="button">Tambah Kategori Produk</a>
                     <table class="table datatable">
                        <thead>
                           <tr>
                              <th scope="col">Nomor</th>
                              <th scope="col">ID Kategori</th>
                              <th scope="col">Nama Kategori</th>
                              <th scope="col">Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $ambil = mysqli_query($conn, "SELECT * FROM kategori_produk"); ?>
                           <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
                              <tr>
                                 <td><?= $i ?></td>
                                 <td scope="row"><?php echo $pecah['ID_Kategori']; ?></td>
                                 <td><?php echo $pecah['Nama_Kategori']; ?></td>
                                 <td>
                                    <a class="btn btn-warning" href="KategoriUbah.php?id=<?= $pecah['ID_Kategori']; ?>">Edit</a>
                                    <a class="btn btn-danger" href="KategoriHapus.php?id=<?= $pecah['ID_Kategori']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                                 </td>
                              </tr>
                              <?php $i++; ?>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </main>
   <?php
   include 'footer.php';
   ?>