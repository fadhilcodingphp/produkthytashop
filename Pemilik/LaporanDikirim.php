<?php
require 'PemilikFunction.php';

$conn = new mysqli("localhost", "root", "", "thytashop");
$awalTgl = "";
$akhirTgl = "";
$tglAwal = "";
$tglAkhir = "";
if (isset($_POST['btnTampil'])) {
   $tglAwal = isset($_POST['txtTglAwal']) ? $_POST['txtTglAwal'] : "01-";
   $tglAkhir = isset($_POST['txtTglAkhir']) ? $_POST['txtTglAkhir'] : "01-";
   $sqlPeriode = "AND pesanan.Tgl_Pesan BETWEEN '$tglAwal' AND '$tglAkhir'";
} else {
   $sqlPeriode = "AND pesanan.Tgl_Pesan";
}
?>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Laporan | Thytashop</title>
   <?php
   include 'header.php';
   ?>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Laporan Pesanan Dikirim</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
               <li class="breadcrumb-item active">Laporan Pesanan Dikirim</li>
            </ol>
         </nav>
      </div>
      <?php $i = 1; ?>
      <section class="section">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-body">
                     <a class="btn btn-primary col-2 mt-3" href="LaporanExcelDikirim.php?sqlPeriode=<?= $sqlPeriode; ?>" target="_blank" alt="Edit Data">Cetak Laporan</a>
                     <table class="table datatable">
                        <thead>
                           <tr>
                              <th scope="col">No.</th>
                              <th scope="col">Tanggal Pesan</th>
                              <th scope="col">Nama Customer</th>
                              <th scope="col">Status </th>
                              <th scope="col">Nama Produk</th>
                              <th scope="col">Harga Produk</th>
                              <th scope="col">Jumlah</th>
                              <th scope="col">Total</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $ambil = mysqli_query($conn, "SELECT * FROM pesanan
                             INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan
                             INNER JOIN produk_item ON pesanan.ID_Pesanan = produk_item.ID_Pesanan 
                             INNER JOIN produk ON produk_item.ID_Produk = produk.ID_Produk
                             INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan WHERE pesanan.status='Dikirim'") ?>
                           <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
                              <tr>
                                 <td><?= $i ?></td>
                                 <td scope="row"><?php echo $pecah['Tgl_Pesan']; ?></td>
                                 <td scope="row"><?php echo $pecah['Nama_Pelanggan']; ?></td>
                                 <td scope="row">
                                    <?php
                                    $bayar = $pecah['status_Pembayaran'];
                                    $status = $pecah['status'];
                                    if ($status == "Menunggu Pembayaran") {
                                       echo "<span class='badge bg-warning'> <h6><b> $status </b></h6> </span>";
                                    } elseif ($status == "Menunggu Konfirmasi Pembayaran") {
                                       echo "<span class='badge bg-danger'> <h6><b> $status </b></h6> </span>";
                                    } elseif ($status == "Diproses") {
                                       echo "<span class='badge bg-warning'> <h6><b> $status </b></h6> </span>";
                                    } elseif ($status == "Pesanan Selesai") {
                                       echo "<span class='badge bg-success'> <h6><b> $status </b></h6> </span>";
                                    } else {
                                       echo "<span class='badge bg-info'> <h6><b> $status </b></h6> </span>";
                                    }
                                    ?>
                                 </td>
                                 <td scope="row"><?php echo $pecah['Nama_Produk']; ?></td>
                                 <td scope="row"><?php echo 'Rp. ' . number_format($pecah['Harga'], 2, ',', '.'); ?></td>
                                 <td scope="row"><?php echo $pecah['Jumlah_Barang']; ?></td>
                                 <td scope="row"><?php echo 'Rp. ' . number_format($pecah['Total_pesanan'] + $pecah['ID_Pesanan'] + $pecah['Ongkir'], 2, ',', '.'); ?></td>
                              </tr>
                              <?php $i++; ?>
                           <?php } ?>
                        </tbody>
                     </table>
                     <?php $total_Penjualan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(Total_Prodit) AS total FROM produk_item"))["total"]; ?>
                     <h6 style="margin-left: 10px;">
                        Total Penjualan Thytashop : <b>Rp.<?php echo number_format($total_Penjualan, 2, ',', '.') ?></b>
                     </h6>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </main>
   <?php
   include 'footer.php';
   ?>