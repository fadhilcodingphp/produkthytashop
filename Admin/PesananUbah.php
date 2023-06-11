<?php
require 'AdminFunction.php';
if (!isset($_SESSION['admin'])) {
    header("Location: AdminLogin.php");
    exit;
}
//ambil data di URL
if (isset($_POST["ubahPesanan"])) {
    //cek apakah data berhasil diubah atau tidak
    if (ubahPesanan($_POST) > 0) {
        echo "
        <script>
        document.location.href='Pesanan.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data Gagal Diubah');
        document.location.href='Pesanan.php';
        </script>
        ";
    }
}
if (isset($_POST["ubahPenerima"])) {
    //cek apakah data berhasil diubah atau tidak
    if (ubahPenerima($_POST) > 0) {
        echo "
        <script>
        document.location.href='Pesanan.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data Gagal Diubah');
        document.location.href='Pesanan.php';
        </script>
        ";
    }
}
$id = $_GET["id"];
// query data mhs berdasarkan id
$pesanan = query("SELECT * FROM pesanan
INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan 
INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan
INNER JOIN produk_item ON pesanan.ID_Pesanan = produk_item.ID_Pesanan 
INNER JOIN produk ON produk_item.ID_Produk = produk.ID_Produk
WHERE pesanan.ID_Pesanan = $id")[0];
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Edit Pesanan | Thytashop</title>
    <?php
    include 'header.php';
    ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Detail Pesanan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="Pesanan.php">Pesanan</a></li>
                    <li class="breadcrumb-item active">Ubah Pesanan</li>
                </ol>
            </nav>
        </div>
        <section class="section profile">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="tab-content pt-2">
                                <!-- Detail Pemesan -->
                                <div class="tab-pane fade show active profile-overview" id="detailPesanan">
                                    <h5 class="card-title">Detail Pemesan</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">ID Pelanggan</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['ID_Pelanggan'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Nama Pelanggan</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['Nama_Pelanggan'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Nomor Telepon Pelanggan</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['Telepon'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email Pelanggan</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['Email'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Institusi Pelanggan</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['Institusi'] ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="tab-content pt-2">
                                <h5 class="card-title">Detail Pesanan</h5>
                                <!-- Detail Pesanan -->
                                <form action="" method="post">
                                    <div class="row mb-3">
                                        <label for="ID_Pesanan" class="col-md-4 col-lg-3 col-form-label">ID Pesanan</label>
                                        <div class="col-md-8 col-lg-9"> <input name="ID_Pesanan" type="text" class="form-control" id="ID_Pesanan" value="<?= $pesanan['ID_Pesanan'] ?>" readonly></div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Tgl_Pesan" class="col-md-4 col-lg-3 col-form-label">Tanggal Pemesanan</label>
                                        <div class="col-md-8 col-lg-9"> <input name="Tgl_Pesan" type="text" class="form-control" id="Tgl_Pesan" value="<?= $pesanan['Tgl_Pesan'] ?>" readonly></div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Tgl_Kirim" class="col-md-4 col-lg-3 col-form-label">Tanggal Pengiriman</label>
                                        <div class="col-md-8 col-lg-9"> <input name="Tgl_Kirim" type="date" class="form-control" id="Tgl_Kirim" value="<?= $pesanan['Tgl_Kirim'] ?>" readonly></div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Catatan" class="col-md-4 col-lg-3 col-form-label">Catatan</label>
                                        <div class="col-md-8 col-lg-9"> <input name="Catatan" type="text" class="form-control" id="Catatan" value="<?= $pesanan['Catatan'] ?>" readonly></div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Total_pesanan" class="col-md-4 col-lg-3 col-form-label">Total Pesanan</label>
                                        <div class="col-md-8 col-lg-9"> <input name="Total_pesanan" type="text" class="form-control" id="Total_pesanan" value="<?= $pesanan['Total_pesanan'] ?>" readonly></div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Biaya_pengiriman" class="col-md-4 col-lg-3 col-form-label">Biaya Pengiriman</label>
                                        <div class="col-md-8 col-lg-9"> <input name="Biaya_pengiriman" type="text" class="form-control" id="Biaya_pengiriman" value="<?= $pesanan['Biaya_pengiriman'] ?>"></div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Total_Order" class="col-md-4 col-lg-3 col-form-label">Total Harga yang Harus Dibayar</label>
                                        <div class="col-md-8 col-lg-9"> <input name="Total_Order" type="text" class="form-control" id="Total_Order" value="<?= $pesanan['Total_Order'] ?>" readonly></div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Diskon Pemesanan</label>
                                        <div class="col-md-8 col-lg-3">
                                            <select class="form-select" aria-label="Default select example" name="Diskon_Pesanan">
                                                <option>--</option>
                                                <option>5</option>
                                                <option>10</option>
                                                <option>15</option>
                                            </select>
                                        </div>
                                        %
                                    </div>
                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Status Pesanan</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select class="form-select" aria-label="Default select example" name="status">
                                                <option selected><?= $pesanan['status'] ?></option>
                                                <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                                                <option value="Diproses">Diproses</option>
                                                <option value="Dikirim">Dikirim</option>
                                                <option value="Pesanan Selesai">Pesanan Selesai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Status Pembayaran</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php
                                            $bayar = $pesanan['status_Pembayaran'];
                                            if ($bayar == "LUNAS") {
                                                echo "<span class='badge bg-success'> <h6><b> $bayar </b></h6> </span>";
                                            } elseif ($bayar == "DP 50% dan COD") {
                                                echo "<span class='badge bg-warning'> <h6><b> $bayar </b></h6> </span>";
                                            } elseif ($bayar == "Belum Bayar") {
                                                echo "<span class='badge bg-danger'> <h6><b> $bayar </b></h6> </span>";
                                            }
                                            ?></div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="ubahPesanan" class="btn btn-primary">Ubah Detail Pesanan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
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
                                            <?php $ambil = mysqli_query($conn, "SELECT * FROM pesanan INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan  INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan INNER JOIN produk_item ON pesanan.ID_Pesanan = produk_item.ID_Pesanan  INNER JOIN produk ON produk_item.ID_Produk = produk.ID_Produk WHERE pesanan.ID_Pesanan = $id"); ?>
                                            <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td scope="row"><img width="150px" src="../assets/img/<?php echo $pecah['Gambar']; ?>"></td>
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
                </div>

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="tab-content pt-2">
                                <!-- Detail Penerima -->
                                <div class="tab-pane fade show active profile-overview" id="detailPesanan">
                                    <h5 class="card-title">Detail Penerima</h5>
                                    <form action="" method="post">
                                        <input type="hidden" name="ID_Pesanan" value="<?= $pesanan['ID_Pesanan'] ?>">
                                        <div class="row mb-3">
                                            <label for="Nama_Penerima" class="col-md-4 col-lg-3 col-form-label">Nama Penerima</label>
                                            <div class="col-md-8 col-lg-9"> <input name="Nama_Penerima" type="text" class="form-control" id="Nama_Penerima" value="<?= $pesanan['Nama_Penerima'] ?>"></div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="NoTelp_Penerima" class="col-md-4 col-lg-3 col-form-label">Nomor Telepon Penerima</label>
                                            <div class="col-md-8 col-lg-9"> <input name="NoTelp_Penerima" type="text" class="form-control" id="NoTelp_Penerima" value="<?= $pesanan['NoTelp_Penerima'] ?>"></div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Alamat" class="col-md-4 col-lg-3 col-form-label">Alamat Lengkap</label>
                                            <div class="col-md-8 col-lg-9"> <input name="Alamat" type="text" class="form-control" id="Alamat" value="<?= $pesanan['Alamat'] ?>"></div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="link_Lokasi" class="col-md-4 col-lg-3 col-form-label">Link Lokasi</label>
                                            <div class="col-md-8 col-lg-9"> <input name="link_Lokasi" type="text" class="form-control" id="link_Lokasi" value="<?= $pesanan['link_Lokasi'] ?>"></div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="ubahPenerima" class="btn btn-primary">Ubah Detail Penerima</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="tab-content pt-2">
                                <!-- Detail Peembayaran -->
                                <div class="tab-pane fade show active profile-overview" id="detailPesanan">
                                    <h5 class="card-title">Bukti Pembayaran</h5>
                                    <div class="row">
                                        <img src="../assets/img/<?php echo $pesanan['Bukti_bayar']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    include 'footer.php';
    ?>