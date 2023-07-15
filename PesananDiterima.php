<?php
require 'custFunction.php';
if (!isset($_SESSION['ID_Pelanggan'])) {
    header("Location: Login.php");
    exit;
}
//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    //cek apakah data berhasil ditambahkan atau tidak
    if (BeriNilai($_POST) > 0) {
        echo "
        <script>
        document.location.href='PesananSaya.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Penilaian Gagal');
        document.location.href='PesananSaya.php';
        </script>
        ";
    }
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Penilaian | Thytashop</title>
    <?php
    include 'header.php';
    ?>
    <main id="main" class="main ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pagetitle">
                        <h3>Penilaian Produk</h3>
                    </div>
                    <section class="section">
                        <?php $id = $_GET["id"]; ?>
                        <div class="card">
                            <div class="card-body">
                                <?php $ambil = mysqli_query($conn, "SELECT * FROM pesanan
                                                INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan 
                                                WHERE pesanan.ID_Pesanan = '$id'") ?>
                                <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
                                    <form class="row g-3" action="" method="post">
                                        <div class="col-12">
                                            <h5 class="card-title">Silahkan berikan penilaian anda terhadap produk kami!</h5>
                                            <input type="hidden" name="ID_Pesanan" value="<?php echo $pecah['ID_Pesanan']; ?>">
                                            <label for="Nama_Penerima" class="text-black mb-1">Nama Penerima<span class="text-danger"></span></label>
                                            <input type="text" name="Nama_Penerima" class="form-control" id="Nama_Penerima" value="<?php echo $pecah['Nama_Penerima']; ?>" readonly>
                                            <label for="Testimoni" class="text-black mb-1">Testimoni<span class="text-danger">*</span></label>
                                            <input type="text" name="Testimoni" class="form-control" id="Testimoni" required>
                                            <label for="Gambar" class="text-black mb-1">Foto Produk<span class="text-danger">*</span></label>
                                            <input type="file" name="Gambar" id="Gambar" class="form-control">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary">Kirim Penilaian</button>
                                        </div>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
    <?php
    include 'footer.php';
    ?>