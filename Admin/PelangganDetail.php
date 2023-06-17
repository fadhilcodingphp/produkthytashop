<?php
require 'AdminFunction.php';

//ambil data di URL
$idPelanggan = $_GET["id"];
// query data mhs berdasarkan id
$detailPelanggan = query("SELECT * FROM pelanggan WHERE ID_Pelanggan = '$idPelanggan'")[0];
?>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Detail Pelanggan | Thytashop</title>
   <?php
   include 'header.php';
   ?>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Pelanggan</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
               <li class="breadcrumb-item"><a href="Pelanggan.php">Pelanggan</a></li>
               <li class="breadcrumb-item active">Detail Pelanggan</li>
            </ol>
         </nav>
      </div>
      <section class="section profile">
         <div class="row">
            <div class="col-xl-4">
               <div class="card">
                  <img src="../assets/img/<?php echo $detailPelanggan['Foto_Profil']; ?>">
                  <div class="card-body">
                     <h5 class="card-title"><?= $detailPelanggan['Nama_Pelanggan'] ?></h5>
                  </div>
               </div>
            </div>
            <div class="col-xl-8">
               <div class="card">
                  <div class="card-body pt-3">
                     <div class="tab-content pt-2">
                        <!-- Detail Pelanggan -->
                        <div class="tab-pane fade show active profile-overview" id="detailProduk">
                           <h5 class="card-title">Detail Pelanggan</h5>
                           <div class="row">
                              <div class="col-lg-3 col-md-4 label ">ID Pelanggan</div>
                              <div class="col-lg-9 col-md-8"><?= $detailPelanggan['ID_Pelanggan'] ?></div>
                           </div>
                           <div class="row">
                              <div class="col-lg-3 col-md-4 label">Nama Pelanggan</div>
                              <div class="col-lg-9 col-md-8"><?= $detailPelanggan['Nama_Pelanggan'] ?></div>
                           </div>
                           <div class="row">
                              <div class="col-lg-3 col-md-4 label">Telepon</div>
                              <div class="col-lg-9 col-md-8"><?= $detailPelanggan['Telepon'] ?></div>
                           </div>
                           <div class="row">
                              <div class="col-lg-3 col-md-4 label">Email</div>
                              <div class="col-lg-9 col-md-8"><?= $detailPelanggan['Email'] ?></div>
                           </div>
                           <div class="row">
                              <div class="col-lg-3 col-md-4 label">Institusi</div>
                              <div class="col-lg-9 col-md-8"><?= $detailPelanggan['Institusi'] ?></div>
                           </div>
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