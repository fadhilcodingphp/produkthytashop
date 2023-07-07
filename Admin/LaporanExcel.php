<?php
require 'AdminFunction.php';
if (!isset($_SESSION['roleadmin'])) {
   header("Location: ../AdminLogin.php");
   exit;
}
$awal = $_GET['awal'];

$akhir = $_GET['akhir'];

$tglAwal = isset($_GET['awal']);
$tglAkhir = isset($_GET['akhir']);
$sqlPeriode = "AND pesanan.Tgl_Pesan BETWEEN '$awal' AND '$akhir'";

//script print excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=LaporanPenjualanProduk.xls");
?>
<html lang="en">
<?php $i = 1; ?>
<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <h4>Laporan Penjualan Toko Thytashop</h4>
               <h5 class="card-title">Laporan Periode tanggal <b><?= ($tglAwal); ?></b> s/d <b><?= ($tglAkhir); ?></b></h5>
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
                             INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan $sqlPeriode ORDER BY pesanan.Tgl_Pesan ASC") ?>
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
                           <td scope="row"><?php echo 'Rp. ' . number_format($pecah['Total_Order'], 2, ',', '.'); ?></td>
                        </tr>
                        <?php $i++; ?>
                     <?php } ?>
                  </tbody>
               </table>
               <?php $total_Penjualan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(Total_Prodit) AS total FROM produk_item"))["total"]; ?>
               <h6>
                  Total Penjualan Thytashop : Rp.<?php echo number_format($total_Penjualan, 2, ',', '.') ?>
               </h6>
            </div>
         </div>
      </div>
   </div>
</section>

</body>

</html>