<?php
require 'AdminFunction.php';

//ambil data di URL
$id = $_GET["id"];
// query data mhs berdasarkan id
$pesanan = query("SELECT * FROM pesanan
INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan 
INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan
INNER JOIN rekening ON pembayaran.ID_Rekening = rekening.ID_Rekening
INNER JOIN produk_item ON pesanan.ID_Pesanan = produk_item.ID_Pesanan 
INNER JOIN produk ON produk_item.ID_Produk = produk.ID_Produk
WHERE pesanan.ID_Pesanan = $id")[0];
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Detail Pembayaran | Thytashop</title>
    <?php
    include 'header.php';
    ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Detail Pesanan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="Pembayaran.php">Pembayaran</a></li>
                    <li class="breadcrumb-item active">Detail Pembayaran</li>
                </ol>
            </nav>
        </div>
        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="tab-content pt-2">
                                <!-- Bukti Pembayaran -->
                                <div class="tab-pane fade show active profile-overview" id="detailPesanan">
                                    <h5 class="card-title">Bukti Pembayaran</h5>
                                    <div class="row">
                                        <img src="../assets/img/<?php echo $pesanan['Bukti_bayar']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="tab-content pt-2">
                                <!-- Detail Pemesan -->
                                <div class="tab-pane fade show active profile-overview" id="detailPesanan">
                                    <h5 class="card-title">Detail Pemesan</h5>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 label">ID Pelanggan</div>
                                        <div class="col-lg-8 col-md-7"><?= $pesanan['ID_Pelanggan'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 label">Nama Pelanggan</div>
                                        <div class="col-lg-8 col-md-7"><?= $pesanan['Nama_Pelanggan'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 label">Nomor Telepon Pelanggan</div>
                                        <div class="col-lg-8 col-md-7"><?= $pesanan['Telepon'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 label">Email Pelanggan</div>
                                        <div class="col-lg-8 col-md-7"><?= $pesanan['Email'] ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="tab-content pt-2">
                                <!-- Detail Pesanan -->
                                <div class="tab-pane fade show active profile-overview" id="detailPesanan">
                                    <h5 class="card-title">Detail Pesanan</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">ID Pesanan</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['ID_Pesanan'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tanggal Pengiriman</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['Tgl_Kirim'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Total Pesanan</div>
                                        <div class="col-lg-9 col-md-8"><?= 'Rp. ' . number_format($pesanan['Total_pesanan'], 2, ',', '.'); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Biaya Pengiriman</div>
                                        <div class="col-lg-9 col-md-8"><?= 'Rp. ' . number_format($pesanan['Biaya_pengiriman'], 2, ',', '.'); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Total Harga yang Harus Dibayar</div>
                                        <div class="col-lg-9 col-md-8"><?= 'Rp. ' . number_format($pesanan['Total_Order'], 2, ',', '.'); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Status Pesanan</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php
                                            $bayar = $pesanan['status_Pembayaran'];
                                            $status = $pesanan['status'];
                                            if ($bayar == "belum bayar") {
                                                echo "<span class='badge bg-danger'> <h6><b> $status </b></h6> </span> &ensp;";
                                            } elseif ($bayar == "sudah bayar" and $status == "Menunggu Konfirmasi Pembayaran") {
                                                echo "<span class='badge bg-danger'> <h6><b> $status </b></h6> </span> &ensp;";
                                            } elseif ($bayar == "sudah bayar" and $status == "Diproses") {
                                                echo "<span class='badge bg-warning'> <h6><b> $status </b></h6> </span> &ensp;";
                                            } elseif ($bayar == "sudah bayar" and $status == "Dikirim") {
                                                echo "<span class='badge bg-warning'> <h6><b> $status </b></h6> </span> &ensp;";
                                            } elseif ($bayar == "sudah bayar" and $status == "Pesanan Selesai") {
                                                echo "<span class='badge bg-success'> <h6><b> $status </b></h6> </span> &ensp;";
                                            }
                                            ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="tab-content pt-2">
                                <!-- Detail Pembayaran -->
                                <div class="tab-pane fade show active profile-overview" id="detailPesanan">
                                    <h5 class="card-title">Detail Pembayaran</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">ID Pembayaran</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['ID_Pembayaran'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Pembayaran Atas Nama</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['Nama_Rek'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Nominal Pembayaran</div>
                                        <div class="col-lg-9 col-md-8"><?= 'Rp. ' . number_format($pesanan['Total_Order'], 2, ',', '.'); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tanggal Pembayaran</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['Tgl_bayar'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Melakukan Pembayaran Ke</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['Nama_Platform'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Nomor Rekening/Emoney</div>
                                        <div class="col-lg-9 col-md-8"><?= $pesanan['No_Rek'] ?></div>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-xl-12">
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
            </div>
        </section>
    </main>
    <?php
    include 'footer.php';
    ?>