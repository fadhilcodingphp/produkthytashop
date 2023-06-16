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
   <title>Produk Yang Best Seller | Thytashop</title>
   <?php
   include 'header.php';
   ?>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Produk Yang Best Seller</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
               <li class="breadcrumb-item active">Produk Yang Best Seller</li>
            </ol>
         </nav>
      </div>
      <?php $i = 1; ?>
      <section class="section">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title">Produk</h5>
                     <a class="btn btn-primary" href="ProdukSeller.php" role="button">Tambah Produk Best Seller</a>
                     <table class="table datatable">
                        <thead>
                           <tr>
                              <th scope="col">No.</th>
                              <th scope="col">Gambar Produk</th>
                              <th scope="col">Nama Produk</th>
                              <th scope="col">Harga Produk</th>
                              <th scope="col">Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $ambil = mysqli_query($conn, "SELECT * FROM bestseller ORDER BY bestseller.Nama_Produk ASC"); ?>
                           <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
                              <tr>
                                 <td><?= $i ?></td>
                                 <td scope="row"><img width="150px" src="../assets/img/<?php echo $pecah['Gambar']; ?>"></td>
                                 <td scope="row"><?php echo $pecah['Nama_Produk']; ?></td>
                                 <td scope="row"><?php echo 'Rp. ' . number_format($pecah['Harga'], 2, ',', '.'); ?></td>
                                 <td>
                                    <a class="btn btn-danger" href="ProdukSellerHapus.php?id=<?= $pecah['ID_Seller']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
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