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
    <title>Edit Pelanggan | Thytashop</title>
    <?php
    include 'header.php';
    ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tambah Produk</h1>
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
                    <h5 class="card-title">Tambah Produk</h5>
                    <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="gambarLama" value="<?= $adminProfile["Gambar"] ?>">
                        <div class="row mb-3">
                            <label for="ID_Pelanggan" class="col-md-4 col-lg-3 col-form-label">ID/Username Admin*</label>
                            <div class="col-md-8 col-lg-9"> <input name="ID_Pelanggan" type="text" class="form-control" id="ID_Pelanggan" value="<?= $adminProfile['ID_Pelanggan'] ?>" readonly></div>
                        </div>
                        <div class="row mb-3">
                            <label for="Nama_Pelanggan" class="col-md-4 col-lg-3 col-form-label">Nama Pelanggan*</label>
                            <div class="col-md-8 col-lg-9"> <input name="Nama_Pelanggan" type="text" class="form-control" id="Nama_Pelanggan" value="<?= $adminProfile['Nama_Pelanggan'] ?>"></div>
                        </div>
                        <div class="row mb-3">
                            <label for="Telepon" class="col-md-4 col-lg-3 col-form-label">Telepon Pelanggan*</label>
                            <div class="col-md-8 col-lg-9"> <input name="Telepon" type="text" class="form-control" id="Telepon" value="<?= $adminProfile['Telepon'] ?>"></div>
                        </div>
                        <div class="row mb-3">
                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email Pelanggan</label>
                            <div class="col-md-8 col-lg-9"> <input name="Email" type="text" class="form-control" id="Email" value="<?= $adminProfile['Email'] ?>"></div>
                        </div>
                        <div class="row mb-3">
                            <label for="Intitusi" class="col-md-4 col-lg-3 col-form-label">Intitusi Pelanggan</label>
                            <div class="col-md-8 col-lg-9"> <input name="Intitusi" type="text" class="form-control" id="Intitusi" value="<?= $adminProfile['Intitusi'] ?>"></div>
                        </div>
                        <div class="row mb-3">
                            <label for="Gambar" class="col-md-4 col-lg-3 col-form-label">Profile Admin</label>
                            <div class="col-md-8 col-lg-9"> <input type="file" name="Gambar" class="form-control" id="Gambar"></div>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="ubahProfil" class="btn btn-primary">Tambah Pelanggan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php
    include 'footer.php';
    ?>