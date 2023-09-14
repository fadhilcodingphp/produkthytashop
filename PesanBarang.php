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
                      <th scope="col">Ukuran</th>
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
                        <td scope="row"><?php echo $pecah['Ukuran']; ?></td>
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
              <input type="hidden" class="form-control" id="Ukuran" name="Ukuran" value="<?php echo $pecah['Ukuran']; ?>">
            <?php } ?>
            <input type="hidden" name="Invoice" value="<?php
                                                        date_default_timezone_set('Asia/Makassar');
                                                        echo "THY" . date('ymdHis'); ?>">
            <div class="p-3 p-lg-5 border">
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <h2 class="h5 mb-3 text-black">Form Pemesanan</h2>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <label for="Nama_Penerima" class="text-black mb-1">Nama Penerima Pesanan<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="Nama_Penerima" name="Nama_Penerima" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <label for="NoTelp_Penerima" class="text-black mb-1">Nomor Telepon Penerima<span class="text-danger">*</span></label>
                  <input type="tel" onkeydown="phoneNumberFormatter()" class="form-control" id="NoTelp_Penerima" name="NoTelp_Penerima" required>
                  <script>
                    function formatPhoneNumber(value) {
                      if (!value) return value;
                      const phoneNumber = value.replace(/[^\d]/g, '');
                      const phoneNumberLength = phoneNumber.length;
                      if (phoneNumberLength < 4) return phoneNumber;
                      if (phoneNumberLength < 7) {
                        return `(${phoneNumber.slice(0,3)}) ${phoneNumber.slice(3)}`;
                      }
                      return `(${phoneNumber.slice(0,3)}) ${phoneNumber.slice(
                      3,
                      6,
                      )}-${phoneNumber.slice(6,13)}`;
                    }

                    function phoneNumberFormatter() {
                      const inputField = document.getElementById('NoTelp_Penerima');
                      const formattedInputValue = formatPhoneNumber(inputField.value);
                      inputField.value = formattedInputValue;
                    }
                  </script>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <label for="Provinsi" class="text-black mb-1">Provinsi<span class="text-danger">*</span></label>
                  <div type="text" id="Provinsi">
                    <select name="provinsi" class="form-select" required>

                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <label for="distrik" class="text-black mb-1">Kabupaten<span class="text-danger">*</span></label>
                  <div type="text" id="distrik">
                    <select name="distrik" class="form-select" required>

                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <label for="Alamat" class="text-black mb-1">Alamat (Nama Jalan/Gedung/Sekolah/dll)<span class="text-danger">*</span></label>
                  <textarea name="Alamat" id="Alamat" cols="30" rows="7" class="form-control" required></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <label for="ekspedisi" class="text-black mb-1">Ekspedisi<span class="text-danger">*</span></label>
                  <div type="text" id="ekspedisi">
                    <select name="ekspedisi" class="form-select" required>

                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <label for="paket" class="text-black mb-1">Paket<span class="text-danger">*</span></label>
                  <div type="text" id="paket">
                    <select name="paket" class="form-select" required>

                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <label for="ongkir" class="text-black mb-1">Biaya Pengiriman<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="ongkir" name="ongkir">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <label for="estimasi" class="text-black mb-1">Estimasi Pengiriman<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="estimasi" name="estimasi">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <label for="Catatan" class="text-black mb-1">Link Maps</label>
                  <input type="text" class="form-control" id="link_lokasi" name="link_Lokasi" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12 mb-3">
                  <label for="Catatan" class="text-black mb-1">Catatan</label>
                  <input type="text" class="form-control" id="Catatan" name="Catatan" placeholder="Masukkan catatan seperti ukuran pakaian (M/L/XL/XXL)" required>
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

  <script>
    //rajaongkir
    $(document).ready(function() {
      $.ajax({
        url: 'data_provinsi.php',
        type: 'post',
        data: {},
        success: function(data_provinsi) {
          $("select[name=provinsi]").html(data_provinsi)
        }
      });
      $("select[name=provinsi]").on("change", function() {
        var id_provinsi = $("option:selected", this).attr("id_provinsi");
        $.ajax({
          url: 'data_distrik.php',
          type: 'post',
          data: 'id_provinsi=' + id_provinsi,
          success: function(data_distrik) {
            $("select[name=distrik]").html(data_distrik);
          }
        });
      });

      $.ajax({
        url: 'data_ekspedisi.php',
        type: 'post',
        success: function(data_ekspedisi) {
          $("select[name=ekspedisi]").html(data_ekspedisi);
        }
      });

      $("select[name=ekspedisi]").on("change", function() {

        var nama_ekspedisi = $("select[name=ekspedisi]").val();
        var datadistrik = $("option:selected", "select[name=distrik]").attr("id_distrik");
        var total_berat = $("input[name=total_berat]").val();

        $.ajax({
          url: 'data_paket.php',
          type: 'post',
          data: 'ekspedisi=' + nama_ekspedisi + '&distrik=' + datadistrik + '&berat=' + total_berat,
          success: function(data_paket) {
            $("select[name=paket]").html(data_paket);
            $("input[name=nama_ekspedisi]").val(nama_ekspedisi);
          }
        });

      });
      $("select[name=distrik]").on("change", function() {
        var prov = $("option:selected", this).attr("nama_provinsi");
        var dist = $("option:selected", this).attr("nama_distrik");
        var type = $("option:selected", this).attr("type_distrik");
        var pos = $("option:selected", this).attr("kode_pos");
        $("input[name=nama_provinsi]").val(prov);
        $("input[name=nama_distrik]").val(dist);
        $("input[name=type_distrik]").val(type);
        $("input[name=kode_pos]").val(pos);
      });


      $("select[name=paket]").on("change", function() {
        var paket = $("option:selected", this).attr("paket");
        var ongkir = $("option:selected", this).attr("ongkir");
        var etd = $("option:selected", this).attr("etd");
        $("input[name=paket]").val(paket);
        $("input[name=ongkir]").val(ongkir);
        $("input[name=estimasi]").val(etd);
      });
    });
  </script>