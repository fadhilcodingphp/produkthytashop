<?php
require 'AdminFunction.php';

?>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Pembayaran | Thytashop</title>
   <?php
   include 'header.php';
   ?>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Pembayaran</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
               <li class="breadcrumb-item active">Pembayaran</li>
            </ol>
         </nav>
      </div>
      <section class="section">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title">Pembayaran</h5>
                     <table class="table datatable">
                        <thead>
                           <?php $i = 1; ?>
                           <tr>
                              <th scope="col">No.</th>
                              <th scope="col">Nama Customer</th>
                              <th scope="col">Tanggal Kirim</th>
                              <th scope="col">Status Pembayaran</th>
                              <th scope="col">Total Harga Pesanan</th>
                              <th scope="col">Dibayar Ke</th>
                              <th scope="col">Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $ambil = mysqli_query($conn, "SELECT * FROM 
                            pelanggan INNER JOIN pesanan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan 
                            INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan
                            INNER JOIN rekening ON rekening.ID_Rekening = pembayaran.ID_Rekening") ?>
                           <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
                              <tr>
                                 <td><?= $i ?></td>
                                 <td scope="row"><?php echo $pecah['Nama_Pelanggan']; ?></td>
                                 <td scope="row"><?php echo $pecah['Tgl_Kirim']; ?></td>
                                 <td scope="row">
                                    <?php
                                    $bayar = $pecah['status_Pembayaran'];
                                    if ($bayar == "LUNAS") {
                                       echo "<span class='badge bg-success'> <h6><b> $bayar </b></h6> </span>";
                                    } elseif ($bayar == "DP 50% dan COD") {
                                       echo "<span class='badge bg-warning'> <h6><b> $bayar </b></h6> </span>";
                                    } elseif ($bayar == "Belum Bayar") {
                                       echo "<span class='badge bg-danger'> <h6><b> $bayar </b></h6> </span>";
                                    } elseif ($bayar == "Pembayaran Selesai") {
                                       echo "<span class='badge bg-success'> <h6><b> $bayar </b></h6> </span>";
                                    }
                                    ?>
                                 </td>
                                 <td scope="row"><?php echo 'Rp. ' . number_format($pecah['Total_Order'], 2, ',', '.'); ?></td>
                                 <td scope="row"><?php echo $pecah['Nama_Platform']; ?></td>
                                 <td>
                                    <a class="btn btn-info" href="PembayaranDetail.php?id=<?= $pecah['ID_Pesanan']; ?>">Detail</a>
                                    <a class="btn btn-warning" href="PembayaranUbah.php?id=<?= $pecah['ID_Pesanan']; ?>">Edit</a>
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