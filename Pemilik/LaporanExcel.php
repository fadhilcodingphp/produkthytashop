<?php
require 'PemilikFunction.php';
if (!isset($_SESSION['pemilik'])) {
   header("Location: PemilikLogin.php");
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
<main id="main" class="main">
   <h5 class="card-title">Laporan Periode tanggal <b><?= ($tglAwal); ?></b> s/d <b><?= ($tglAkhir); ?></b></h5>
   <table>
      <?php $i = 1; ?>
      <thead>
         <tr>
            <th scope="col">No.</th>
            <th scope="col">ID Psn</th>
            <th scope="col">Tanggal Pesan</th>
            <th scope="col">Nama Customer</th>
            <th scope="col">Institusi</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total</th>
         </tr>
      </thead>
      <tbody>
         <?php $ambil = mysqli_query($conn, "SELECT * FROM pesanan
                             INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan
                             INNER JOIN produk_item ON pesanan.ID_Pesanan = produk_item.ID_Pesanan 
                             INNER JOIN produk ON produk_item.ID_Produk = produk.ID_Produk
                             INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan 
                             WHERE pesanan.status = 'Pesanan Selesai' AND pembayaran.status_Pembayaran = 'LUNAS' $sqlPeriode ORDER BY pesanan.Tgl_Pesan ASC") ?>
         <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
            <tr>
               <td><?= $i ?></td>
               <td scope="row"><?php echo $pecah['ID_Pesanan']; ?></td>
               <td scope="row"><?php echo $pecah['Tgl_Pesan']; ?></td>
               <td scope="row"><?php echo $pecah['Nama_Pelanggan']; ?></td>
               <td scope="row"><?php echo $pecah['Institusi']; ?></td>
               <td scope="row"><?php echo $pecah['Nama_Produk']; ?></td>
               <td scope="row"><?php echo $pecah['Jumlah_Barang']; ?></td>
               <td scope="row"><?php echo $pecah['Total_Prodit']; ?></td>
            </tr>
            <?php $i++; ?>
         <?php } ?>
      </tbody>
   </table>
</main>

</body>

</html>