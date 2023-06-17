<?php
require 'AdminFunction.php';

?>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Rekening | Thytashop</title>
   <?php
   include 'header.php';
   ?>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Rekening</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
               <li class="breadcrumb-item active">Rekening</li>
            </ol>
         </nav>
      </div>
      <?php $i = 1; ?>
      <section class="section">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title">Rekening</h5>
                     <a class="btn btn-primary" href="RekeningTambah.php" role="button">Tambah Rekening</a>
                     <table class="table datatable">
                        <thead>
                           <tr>
                              <th scope="col">No.</th>
                              <th scope="col">ID Rekening</th>
                              <th scope="col">Nama Bank/Platform</th>
                              <th scope="col">Nama Penerima</th>
                              <th scope="col">Nomor Rekening/Platform</th>
                              <th scope="col">Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $ambil = mysqli_query($conn, "SELECT * FROM rekening"); ?>
                           <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
                              <tr>
                                 <td><?= $i ?></td>
                                 <td scope="row"><?php echo $pecah['ID_Rekening']; ?></td>
                                 <td scope="row"><?php echo $pecah['Nama_Platform']; ?></td>
                                 <td scope="row"><?php echo $pecah['Nama_Rek']; ?></td>
                                 <td scope="row"><?php echo $pecah['No_Rek']; ?></td>
                                 <td>
                                    <a class="btn btn-warning" href="RekeningUbah.php?id=<?= $pecah['ID_Rekening']; ?>">Edit</a>
                                    <a class="btn btn-danger" href="RekeningHapus.php?id=<?= $pecah['ID_Rekening']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
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