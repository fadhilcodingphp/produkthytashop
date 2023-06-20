<?php
require 'custFunction.php';
$ID_Pelanggan = $_SESSION["ID_Pelanggan"];
if (!isset($_SESSION["login"]) && !isset($_SESSION["ID_Pelanggan"])) {
  header("Location: login.php");
  exit;
}
$ambil = mysqli_query($conn, "SELECT * FROM produk, keranjang, pelanggan WHERE produk.ID_Produk = keranjang.ID_Produk 
                      AND pelanggan.ID_Pelanggan = '$ID_Pelanggan'");
$total = 0;
while ($pecah = mysqli_fetch_assoc($ambil)) {
  $total += $pecah['Harga'] * $pecah['Jumlah_Barang'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Pesanan Saya | Thytashop</title>
  <?php
  include 'header.php';
  ?>

  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0">
          <p class="my-0"><a href="Homepage.php" class="text-primary">Home</a><span class="mx-2">/</span> <strong class="text-black">Pesanan Saya</strong></p>
        </div>
      </div>
    </div>
  </div>

  <!-- products section start  -->
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="h3 mt-3 mb-3 text-black">Pesanan Saya</h2>
        </div>
        <?php $ID_Pelanggan = $_SESSION["ID_Pelanggan"] ?>
        <?php $ambil = mysqli_query($conn, "SELECT * FROM pesanan
                                                INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan 
                                                INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan
                                                WHERE pelanggan.ID_Pelanggan = '$ID_Pelanggan'") ?>
        <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
          <div class="col-md-12">
            <div class="p-4 border border-primary mb-3">
              <div class="row">
                <div class="row col-md-12 mb-3">
                  <div class="col-10">
                    <span class="d-block h5">
                      ID Pesanan: <?php echo $pecah['ID_Pesanan']; ?> |
                      <?php
                      $status = $pecah['status'];
                      if ($status == "Menunggu Pembayaran") {
                        echo "<span class='badge bg-primary'> $status </span> &ensp;";
                      } elseif ($status == "Menunggu Konfirmasi Pembayaran") {
                        echo "<span class='badge bg-danger'> $status </span> &ensp;";
                      } elseif ($status == "Diproses") {
                        echo "<span class='badge bg-warning'> $status </span> &ensp;";
                      } elseif ($status == "Dikirim") {
                        echo "<span class='badge bg-warning'> $status </span> &ensp;";
                      } elseif ($status == "Pesanan Selesai") {
                        echo "<span class='badge bg-primary'> $status </span> &ensp;";
                      } ?>
                    </span>
                    <span class="d-block text h6">Tanggal: <?php echo $pecah['Tgl_Pesan']; ?></span>
                  </div>
                  <hr style="border-top: 1px solid #8c8b8b;">
                  <?php
                  $bayar = $pecah['status_Pembayaran'];
                  if ($bayar == "Belum Bayar") { ?>
                    <div class="col-7">
                      <button class="btn btn-primary">Menunggu Tagihan</button>
                      <a href="PesananBatal.php?id=<?= $pecah['ID_Pesanan']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin membatalkan pesanan?')">Batalkan Pesanan</a>
                    </div>
                  <?php } ?>
                  <?php
                  $bayar = $pecah['status_Pembayaran'];
                  if ($bayar == "Menunggu Pembayaran") { ?>
                    <div class="col-7">
                      <a href="TagihanSaya.php?id=<?= $pecah['ID_Pesanan']; ?>" class="btn btn-primary">Bayar Tagihan</a>
                      <a href="PesananBatal.php?id=<?= $pecah['ID_Pesanan']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin membatalkan pesanan?')">Batalkan Pesanan</a>
                    </div>
                  <?php } ?>
                  <?php
                  $bayar = $pecah['status_Pembayaran'];
                  if ($bayar == "LUNAS") { ?>
                    <div class="col-2">
                      <a href="PesananDiterima.php?id=<?= $pecah['ID_Pesanan']; ?>" type="submit" name="submit" id="submit" class="btn btn-primary">Pesanan Diterima</a>
                    </div>
                  <?php } ?>
                </div>

                <hr style="border-top: 1px solid #8c8b8b;">

                <div class="col-md-3">
                  <p class="d-block text-primary mb-1">Kontak Penerima</p>
                  <p class="d-block text mb-0">Penerima : <?php echo $pecah['Nama_Penerima']; ?></p>
                  <p class="d-block text mb-0">No. Penerima : <?php echo $pecah['NoTelp_Penerima']; ?></p>
                </div>
                <div class="col-md-7">
                  <p class="d-block text-primary mb-1">Detail Pengiriman</p>
                  <p class="d-block text mb-0">Alamat : <?php echo $pecah['Alamat']; ?></p>
                  <p class="d-block text mb-0">Link Maps : <?php echo $pecah['link_Lokasi']; ?></p>
                </div>
                <div class="col-md-5 mt-3 mb-3">
                  <p class="d-block text-primary mb-1">Detail Pembayaran</p>
                  <p class="d-block text mb-0">Total Pesanan : <?php echo $pecah['Total_pesanan']; ?></p>
                  <p class="d-block text mb-0">Nama Rekening : <?php echo $pecah['Nama_Rek']; ?></p>
                  <p class="d-block text mb-0">Total Pembayaran : <?php echo $pecah['Total_Order']; ?></p>
                </div>
                <hr style="border-top: 1px solid #8c8b8b;">

                <p class="d-block text mb-2">THY00<?php echo $pecah['ID_Pesanan']; ?></p>
                <?php $ID_Pesanan = $pecah['ID_Pesanan']; ?>
                <?php $produk = mysqli_query($conn, "SELECT * FROM pesanan
                                                INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan 
                                                INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan
                                                INNER JOIN produk_item ON pesanan.ID_Pesanan = produk_item.ID_Pesanan 
                                                INNER JOIN produk ON produk_item.ID_Produk = produk.ID_Produk
                                                WHERE pelanggan.ID_Pelanggan = '$ID_Pelanggan' AND pesanan.ID_Pesanan = '$ID_Pesanan'") ?>
                <?php while ($prodit = mysqli_fetch_assoc($produk)) { ?>
                  <div class="row col-md-4 mb-3">
                    <div class="col-5">
                      <img class="img-fluid" src="assets/img/<?php echo $prodit['Gambar']; ?>" alt="" style="width:150px;" />
                    </div>
                    <div class="col-7">
                      <p class="d-block text mb-0"><?php echo $prodit['Nama_Produk']; ?></p>
                      <p class="d-block text mb-0"><?= $prodit['Jumlah_Barang'] . ' Pcs' ?></p>
                      <p class="d-block text mb-0">Size : <?= $prodit['Ukuran'] ?></p>
                      <p class="d-block text mb-0"><?= 'Total : Rp. ' . number_format($prodit['Total_Prodit'], 2, ',', '.'); ?></p>
                    </div>
                  </div>
                <?php } ?>
              </div>

            </div>
          </div>
        <?php } ?>
      </div>

    </div>
  </div>
  <!-- products section end  -->

  <?php
  include 'footer.php';
  ?>