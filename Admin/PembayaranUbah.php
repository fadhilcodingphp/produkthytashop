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

if (isset($_POST["ubahPembayaran"])) {
    //cek apakah data berhasil diubah atau tidak
    if (ubahPembayaran($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil diubah');
        document.location.href='Pembayaran.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data Gagal Diubah');
        document.location.href='Pembayaran.php';
        </script>
        ";
    }
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Edit Pembayaran | Thytashop</title>
    <?php
    include 'header.php';
    ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Detail Pembayaran</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="Pembayaran.php">Pembayaran</a></li>
                    <li class="breadcrumb-item active">Edit Pembayaran</li>
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
                                        <div class="col-lg-9 col-md-8"><?= 'Rp. ' . number_format($pesanan['Ongkir'], 2, ',', '.'); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Total Harga yang Harus Dibayar</div>
                                        <div class="col-lg-9 col-md-8"><?= 'Rp. ' . number_format($pesanan['Total_pesanan'], 2, ',', '.'); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Status Pesanan</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php
                                            $bayar = $pesanan['status_Pembayaran'];
                                            $status = $pesanan['status'];
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
                                <div class="tab-pane fade show active profile-overview" id="detailPembayaran">
                                    <h5 class="card-title">Detail Pembayaran</h5>
                                    <form action="" method="post">
                                        <div class="row mb-3">
                                            <div class="col-md-8 col-lg-9"> <input name="ID_Pesanan" type="hidden" class="form-control" id="ID_Pesanan" value="<?= $pesanan['ID_Pesanan'] ?>" readonly></div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-8 col-lg-9"> <input name="Status" type="hidden" class="form-control" id="Status" value="<?= $pesanan['Status'] ?>" readonly></div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ID_Pembayaran" class="col-md-4 col-lg-3 col-form-label">ID Pembayaran</label>
                                            <div class="col-md-8 col-lg-9"> <input name="ID_Pembayaran" type="text" class="form-control" id="ID_Pembayaran" value="<?= $pesanan['ID_Pembayaran'] ?>" readonly></div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Nama_Rek" class="col-md-4 col-lg-3 col-form-label">Pembayaran Atas Nama</label>
                                            <div class="col-md-8 col-lg-9"> <input name="Nama_Rek" type="text" class="form-control" id="Nama_Rek" value="<?= $pesanan['Nama_Rek'] ?>"></div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Total_Order" class="col-md-4 col-lg-3 col-form-label">Nominal Pembayaran</label>
                                            <div class="col-md-8 col-lg-9"> <input name="Total_Order" type="text" class="form-control" id="Total_Order" value="<?= $pesanan['Total_Order'] ?>"></div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Tgl_bayar" class="col-md-4 col-lg-3 col-form-label">Tanggal Pembayaran</label>
                                            <div class="col-md-8 col-lg-9"> <input name="Tgl_bayar" type="date" class="form-control" id="Tgl_bayar" value="<?= $pesanan['Tgl_bayar'] ?>"></div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="pembayaran" class="col-md-4 col-lg-3 col-form-label">Melakukan Pembayaran Ke</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select class="form-select" aria-label="Default select example" name="ID_Rekening">
                                                    <option selected><?= $pesanan['Nama_Platform'] ?></option>
                                                    <?php
                                                    $ambil = mysqli_query($conn, "SELECT * FROM rekening");
                                                    while ($pecah = mysqli_fetch_assoc($ambil)) {
                                                        echo "<option value=$pecah[ID_Rekening]> $pecah[Nama_Platform]</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="No_Rek" class="col-md-4 col-lg-3 col-form-label">Nomor Rekening/Emoney</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="No_Rek" type="text" class="form-control" id="No_Rek" value="<?= $pesanan['No_Rek'] ?>" readonly>
                                                <div class="form-text">Nomor Rekening/Emoney akan disesuaikan setelah mengubah platform pembayaran</div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="status_Pembayaran" class="col-md-4 col-lg-3 col-form-label">Status Pembayaran</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select class="form-select" aria-label="Default select example" id="status_Pembayaran" name="status_Pembayaran">
                                                    <option selected><?= $pesanan['status_Pembayaran'] ?></option>
                                                    <option value="DP 50% dan COD">DP 50% dan COD</option>
                                                    <option value="LUNAS">LUNAS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="ubahPembayaran" class="btn btn-primary">Ubah Detail Pembayaran</button>
                                            <a class="btn btn-danger" href="PembayaranHapus.php?id=<?= $pesanan['ID_Pesanan']; ?>" onclick="return confirm('Dengan menolak pembayaran anda menghapus data pembayaran')">Tolak Pembayaran</a>
                                        </div>
                                    </form>
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