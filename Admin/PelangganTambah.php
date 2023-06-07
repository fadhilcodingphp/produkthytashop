<?php
require 'AdminFunction.php';
if (!isset($_SESSION['admin'])) {
    header("Location: AdminLogin.php");
    exit;
}
//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["tambahPelanggan"])) {
    //cek apakah data berhasil ditambahkan atau tidak
    if (tambahPelanggan($_POST) > 0) {
        echo "
        <script>
        alert('Pelanggan berhasil ditambah');
        document.location.href='Pelanggan.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Pelanggan gagal ditambahkan');
        document.location.href='Pelanggan.php';
        </script>
        ";
    }
}
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Tambah Pelanggan | Thytashop</title>
    <?php
    include 'header.php';
    ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tambah Pelanggan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="Pelanggan.php">Pelanggan</a></li>
                    <li class="breadcrumb-item active">Tambah Pelanggan</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Pelanggan</h5>
                    <form class="row g-3" action="" method="post">
                        <div class="row mb-3">
                            <label for="ID_Pelanggan" class="col-md-4 col-lg-3 col-form-label">ID/Username Admin*</label>
                            <input name="ID_Pelanggan" type="text" class="form-control" id="ID_Pelanggan" required>
                        </div>
                        <div class="row mb-3">
                            <label for="Nama_Pelanggan" class="col-md-4 col-lg-3 col-form-label">Nama Pelanggan*</label>
                            <input name="Nama_Pelanggan" type="text" class="form-control" id="Nama_Pelanggan" required>
                        </div>
                        <div class="row mb-3">
                            <label for="Telepon" class="col-md-4 col-lg-3 col-form-label">Telepon Pelanggan*</label>
                            <input name="Telepon" type="text" class="form-control" id="Telepon" required>
                        </div>
                        <div class="row mb-3">
                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email Pelanggan</label>
                            <input name="Email" type="text" class="form-control" id="Email">
                        </div>
                        <div class="row mb-3">
                            <label for="Institusi" class="col-md-4 col-lg-3 col-form-label">Institusi Pelanggan (Tidak Ada Institusi Tulis "Pribadi")</label>
                            <input name="Institusi" type="text" class="form-control" id="Institusi" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="tambahPelanggan" class="btn btn-primary">Tambah Pelanggan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php
    include 'footer.php';
    ?>