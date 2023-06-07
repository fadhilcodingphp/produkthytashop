<?php
require "custFunction.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Tagihan Saya | Thytashop</title>
  <?php
  include 'header.php';
  ?>

  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0">
          <p class="my-0"><a href="Homepage.php" class="text-primary">Home</a><span class="mx-2">/</span> <strong class="text-black">Tagihan Saya</strong></p>
        </div>
      </div>
    </div>
  </div>

  <!-- tagihan start  -->
  <div class="site-section">
    <?php $ID_Pelanggan = $_SESSION["ID_Pelanggan"] ?>

    <div class="container">
      <div class="row mt-5 mb-4">
        <form class="col-md-12" method="post">
          <div class="site-blocks-table mx-0 px-0">
            <table class="table table-bordered ">
              <thead>
                <tr>
                  <th class="product-thumbnail">ID Pesanan</th>
                  <th class="product-name">Tanggal Pesan</th>
                  <th class="product-name">Jumlah Paket</th>
                  <th class="product-price">Diskon Pemesanan</th>
                  <th class="product-quantity">Total Harga</th>
                  <th class="product-price">Status Pembayaran</th>
                  <th class="product-quantity" style="width:20%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $ID_Pelanggan = $_SESSION["ID_Pelanggan"] ?>
                <?php $ambil = mysqli_query($conn, "SELECT * FROM pesanan
                                                INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan 
                                                INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan
                                                WHERE pelanggan.ID_Pelanggan = '$ID_Pelanggan'  ") ?>
                <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
                  <tr>
                    <td class="product-name">
                      <p class="text-black"><?php echo $pecah['ID_Pesanan']; ?></p>
                    </td>
                    <td class="product-name">
                      <p class="text-black"><?php echo $pecah['Tgl_Pesan']; ?></p>
                    </td>
                    <td class="product-name">
                      <p class="text-black">pcs</p>
                    </td>
                    <td>
                      <?php echo $pecah['Diskon_Pesanan']; ?>%
                    </td>
                    <td>
                      <?php echo 'Rp. ' . number_format($pecah['Total_Order'], 2, ',', '.'); ?>
                    </td>
                    <td>
                      <?php
                      $bayar = $pecah['status_Pembayaran'];
                      $status = $pecah['status'];
                      if ($bayar == "LUNAS") {
                        echo "<span class='badge bg-success'> <h6><b> $bayar </b></h6> </span>";
                      } elseif ($bayar == "DP 50% dan COD") {
                        echo "<span class='badge bg-warning'> <h6><b> $bayar </b></h6> </span>";
                      } elseif ($bayar == "Belum Bayar") {
                        echo "<span class='badge bg-danger'> <h6><b> $bayar </b></h6> </span>";
                      } elseif ($status == "Menunggu Pembayaran") {
                        echo "<span class='badge bg-danger'> <h6><b> $status </b></h6> </span>";
                      }
                      ?>
                    </td>
                    <td>
                      <?php
                      $bayar = $pecah['status_Pembayaran'];
                      if ($bayar == "Menunggu Pembayaran") { ?>
                        <p>Tagihan belum dikirim. Harap tunggu beberapa saat lagi</p>
                      <?php } else { ?>
                        <a href="TagihanBayar.php?id=<?= $pecah['ID_Pembayaran']; ?>" class="btn btn-primary btn-sm">Bayar Tagihan</a>
                      <?php } ?>

                    </td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </form>
      </div>

    </div>
  </div>
  <!-- tagihan end  -->

  <?php
  include 'footer.php';
  ?>