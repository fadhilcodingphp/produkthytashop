<?php
require "custFunction.php";
if (!isset($_SESSION["login"]) && !isset($_SESSION["ID_Pelanggan"])) {
  header("Location: login.php");
  exit;
}
if (isset($_POST["submit"])) {
  //cek apakah data berhasil diubah atau tidak
  if (TambahPesanan($_POST) > 0) {
    echo "
        <script>
        document.location.href='PesananSaya.php';
        </script>
        ";
  } else {
    echo "
        <script>
        alert('Data Gagal Ditambahkan');
        document.location.href='PesananSaya.php';
        </script>
        ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Pesan Barang | Thytashop</title>

  <?php
  include 'header.php';
  ?>

  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0">
          <p class="my-0">
            <a href="Homepage.php" class="text-primary">Home</a>
            <span class="mx-2">/</span> <a href="Keranjang.php" class="text-primary">Keranjang</a>
            <span class="mx-2">/</span> <strong class="text-black">Pesan Barang</strong>
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Pesan Barang -->
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="h3 mt-3 mb-3 text-black">Pesan Barang</h2>
        </div>
        <?php $ID_Pelanggan = $_SESSION["ID_Pelanggan"] ?>
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
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php $ambil = mysqli_query($conn, "SELECT * FROM keranjang INNER JOIN pelanggan ON keranjang.ID_Pelanggan = pelanggan.ID_Pelanggan  
                    INNER JOIN produk ON keranjang.ID_Produk = produk.ID_Produk WHERE Pelanggan.ID_Pelanggan = '$ID_Pelanggan'"); ?>
                    <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
                      <tr>
                        <td><?= $i ?></td>
                        <td scope="row"><img width="150px" src="assets/img/<?php echo $pecah['Gambar']; ?>"></td>
                        <td scope="row"><?php echo $pecah['Nama_Produk']; ?></td>
                        <td scope="row"><?php echo $pecah['Jumlah_Barang']; ?></td>
                        <td scope="row"><?php echo 'Rp. ' . number_format($pecah['Harga'], 2, ',', '.'); ?></td>
                        <td scope="row"><?php echo 'Rp. ' . number_format($pecah['Harga'] * $pecah['Jumlah_Barang'], 2, ',', '.'); ?></td>
                      </tr>
                      <?php $i++ ?>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <form action="" method="post">
            <?php $ID_Pelanggan = $_SESSION["ID_Pelanggan"] ?>
            <?php $ambil = mysqli_query($conn, "SELECT * FROM produk, keranjang, pelanggan WHERE produk.ID_Produk = keranjang.ID_Produk AND pelanggan.ID_Pelanggan = '$ID_Pelanggan'"); ?>
            <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
              <input type="hidden" class="form-control" id="ID_Pelanggan" name="ID_Pelanggan" value="<?php echo $pecah['ID_Pelanggan']; ?>">
              <input type="hidden" class="form-control" id="ID_Produk" name="ID_Produk" value="<?php echo $pecah['ID_Produk']; ?>">
              <input type="hidden" class="form-control" id="Jumlah_Barang" name="Jumlah_Barang" value="<?php echo $pecah['Jumlah_Barang']; ?>">
            <?php } ?>
            <div class="p-3 p-lg-5 border">
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <h2 class="h5 mb-3 text-black">Form Pemesanan</h2>
                  <label for="Tgl_Kirim" class="text-black mb-1">Tanggal Pengiriman <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="Tgl_Kirim" name="Tgl_Kirim">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <label for="Waktu_Kirim" class="text-black mb-1">Waktu Pesanan Sampai Di Tangan Pemesan <span class="text-danger">*</span></label>
                  <input type="time" class="form-control" id="Waktu_Kirim" name="Waktu_Kirim">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <label for="Nama_Penerima" class="text-black mb-1">Nama Penerima Pesanan<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="Nama_Penerima" name="Nama_Penerima">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <label for="NoTelp_Penerima" class="text-black mb-1">Nomor Telefon Penerima<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="NoTelp_Penerima" name="NoTelp_Penerima">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <label for="Alamat" class="text-black mb-1">Alamat Lengkap Pengantaran<span class="text-danger">*</span></label>
                  <textarea name="Alamat" id="Alamat" cols="30" rows="7" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <label for="Catatan" class="text-black mb-1">Link Maps</label>
                  <input type="text" class="form-control" id="link_okasi" name="link_Lokasi">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <label for="link_Lokasi" class="text-black mb-1">Jarak Pengantaran
                    <a href="https://www.google.com/maps/place/Pode+Food/@-5.1766959,119.4534077,17z/data=!3m1!4b1!4m6!3m5!1s0x2dbee3c052a5ff39:0xab2cfbde14421cdb!8m2!3d-5.1766959!4d119.4534077!16s%2Fg%2F11qlxxfxh9?entry=ttu" class="btn btn-danger">Cek Jarak</a>
                  </label>
                  <div class="col-7">
                    <input type="textarea" class="form-control" id="jarak" name="jarak" placeholder="Masukkan Jarak Dengan Satuan KM">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <label for="Catatan" class="text-black mb-1">Catatan</label>
                  <input type="text" class="form-control" id="Catatan" name="Catatan" placeholder="Masukkan catatan seperti bentuk cap nasi yang diinginkan atau pilihan lauk">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12 mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                      Saya setuju dengan syarat dan ketentuan pemesanan yang tertera di bagian kanan form pembelian
                    </label>
                    <div class="invalid-feedback">
                      Anda harus setuju dengan syarat dan ketentuan yang berlaku.
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block">Pesan Sekarang</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Pesan Barang  -->

  <?php
  include 'footer.php';
  ?>