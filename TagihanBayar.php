<?php
require "custFunction.php";
if (!isset($_SESSION["login"]) && !isset($_SESSION["ID_Pelanggan"])) {
  header("Location: login.php");
  exit;
}
if (isset($_POST["submit"])) {
  //cek apakah data berhasil diubah atau tidak
  if (BayarTagihan($_POST) > 0) {
    echo "
        <script>
        document.location.href='PesananSaya.php';
        </script>
        ";
  } else {
    echo "
        <script>
        alert('Tagihan Gagal Dibayar');
        document.location.href='TagihanSaya.php';
        </script>
        ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Bayar Tagihan | Thytashop</title>

  <?php
  include 'header.php';
  ?>

  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0">
          <p class="my-0">
            <a href="Homepage.php" class="text-primary">Home</a>
            <span class="mx-2">/</span> <a href="TagihanSaya.php" class="text-primary">Tagihan Saya</a>
            <span class="mx-2">/</span> <strong class="text-black">Bayar Tagihan</strong>
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Pesan Barang -->
  <div class="site-section">
    <div class="container">
      <div class="row">
        <h2 class="h3 mt-3 mb-3 text-black">Bayar Tagihan</h2>

      </div>
      <?php $id = $_GET["id"]; ?>
      <div class="card mb-3">
        <div class="card-body pt-3">
          <div class="tab-content pt-2">
            <!-- Produk yang dipesan -->
            <div class="tab-pane fade show active profile-overview" id="detailPesanan">
              <h5 class="card-title">Produk Yang Dipesan</h5>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Gambar Produk</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga Satuan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php $ambil = mysqli_query($conn, "SELECT * FROM pesanan 
                                                      INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan  
                                                      INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan 
                                                      INNER JOIN produk_item ON pesanan.ID_Pesanan = produk_item.ID_Pesanan  
                                                      INNER JOIN produk ON produk_item.ID_Produk = produk.ID_Produk 
                                                      WHERE pembayaran.ID_Pembayaran = $id"); ?>
                  <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td scope="row"><img width="150px" src="assets/img/<?php echo $pecah['Gambar']; ?>"></td>
                      <td scope="row"><?php echo $pecah['Nama_Produk']; ?></td>
                      <td scope="row"><?php echo $pecah['Jumlah_Barang']; ?></td>
                      <td scope="row"><?php echo 'Rp. ' . number_format($pecah['Harga'], 2, ',', '.'); ?></td>
                    </tr>
                    <?php $i++ ?>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-7">
          <?php
          $ambil = mysqli_query($conn, "SELECT * FROM pesanan
                                                INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan 
                                                INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan
                                                WHERE pembayaran.ID_Pembayaran = '$id' ") ?>
          <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
            <form action="" method="post" enctype="multipart/form-data">
              <input type="hidden" class="form-control" id="ID_Pesanan" name="ID_Pesanan" value="<?php echo $pecah['ID_Pesanan']; ?>">
              <div class="p-3 p-lg-4 border">
                <span class="d-block text-primary h5 mb-3">Form Pembayaran</span>
                <div class="form-group row">
                  <div class="col-md-12 mb-3">
                    <label for="ID_Rekening" class="text-black mb-1">Telah Melakukan Pembayaran Melalui<span class="text-danger">*</span></label>
                    <div class="col-12">
                      <select class="form-select" aria-label="Default select example" name="ID_Rekening">
                        <option selected>---</option>
                        <?php
                        $ambil = mysqli_query($conn, "SELECT * FROM rekening");
                        while ($rekening = mysqli_fetch_assoc($ambil)) {
                          echo "<option value=$rekening[ID_Rekening]> $rekening[Nama_Platform] $rekening[No_Rek] a/n $rekening[Nama_Rek]</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12 mb-3">
                    <label for="Nama_Rek" class="text-black mb-1">Nama Rekening/e-Money yang Melakukan Pembayaran<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="Nama_Rek" name="Nama_Rek">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12 mb-3">
                    <label for="Total_Order" class="text-black mb-1">Besar Nominal yang Sudah Dibayar<span class="text-danger">*</span></label>
                    <div class="col-md-8 col-lg-9"> <input name="Total_Order" type="text" class="form-control" id="Total_Order" value="<?= $pecah['Total_Order'] ?>" readonly></div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12 mb-3">
                    <label for="Tgl_bayar" class="text-black mb-1">Pembayaran Dilakukan Pada Tanggal<span class="text-danger">*</span></label>
                    <input type="date" name="Tgl_bayar" id="Tgl_bayar" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12 mb-3">
                    <label for="Gambar" class="text-black mb-1">Bukti Pembayaran<span class="text-danger">*</span></label>
                    <input type="file" name="Gambar" id="Gambar" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12 mb-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                      <label class="form-check-label" for="invalidCheck">
                        Saya setuju dengan syarat dan ketentuan pembayaran yang tertera di bagian kanan form pembayaran
                      </label>
                      <div class="invalid-feedback">
                        Anda harus setuju dengan syarat dan ketentuan yang berlaku.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block">Kirim Konfirmasi Pembayaran</button>
                  </div>
                </div>
              </div>
            </form>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>

  <!-- Pesan Barang  -->

  <?php
  include 'footer.php';
  ?>