<?php
require 'AdminFunction.php';

?>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Pelanggan | Thytashop</title>
   <?php
   include 'header.php';
   ?>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Pelanggan</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
               <li class="breadcrumb-item active">Pelanggan</li>
            </ol>
         </nav>
      </div>
      <?php $i = 1; ?>
      <section class="section">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title">Pelanggan</h5>
                     <!-- <a class="btn btn-primary" href="PelangganTambah.php" role="button">Tambah Pelanggan</a> -->
                     <table class="table datatable">
                        <thead>
                           <tr>
                              <th scope="col">No.</th>
                              <th scope="col">ID Pelanggan</th>
                              <th scope="col">Nama Pelanggan</th>
                              <th scope="col">Foto Profil</th>
                              <th scope="col">Telefon</th>
                              <th scope="col">Email</th>
                              <th scope="col">Institusi</th>
                              <th scope="col">Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $ambil = mysqli_query($conn, "SELECT * FROM pelanggan"); ?>
                           <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
                              <tr>
                                 <td><?= $i ?></td>
                                 <td scope="row"><?php echo $pecah['ID_Pelanggan']; ?></td>
                                 <td scope="row"><?php echo $pecah['Nama_Pelanggan']; ?></td>
                                 <td scope="row"><img width="150px" src="../assets/img/<?php echo $pecah['Foto_Profil']; ?>"></td>
                                 <td scope="row"><?php echo $pecah['Telepon']; ?></td>
                                 <td scope="row"><?php echo $pecah['Email']; ?></td>
                                 <td scope="row"><?php echo $pecah['Institusi']; ?></td>
                                 <td>
                                    <a class="btn btn-info" href="PelangganDetail.php?id=<?= $pecah['ID_Pelanggan']; ?>">Detail</a>
                                    <!-- <a class="btn btn-danger" href="PelangganHapus.php?id=<?= $pecah['ID_Pelanggan']; ?>" onclick="return confirm('Yakin ingin menghapus?')" >Delete</a> -->
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