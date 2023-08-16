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
        document.location.href='PesananDiterima.php';
        </script>
        ";
    }
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Testimoni Produk | Thytashop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
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
                                    <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                                        <div class="col-12">
                                            <h5 class="card-title">Silahkan berikan penilaian anda terhadap produk kami!</h5>
                                            <input type="hidden" name="ID_Pesanan" value="<?php echo $pecah['ID_Pesanan']; ?>">
                                            <div style="text-align: center;">
                                                <div class="rateyo" style="margin: 0 auto;" id="rating" data-rateyo-rating="0" data-rateyo-num-stars="5" data-rateyo-score="3">
                                                </div>
                                                <span class='result'>rating</span>
                                                <input type="hidden" name="rating">
                                            </div>
                                            <label for="Nama_Penerima" class="text-black mb-1">Nama Penerima<span class="text-danger"></span></label>
                                            <input type="text" name="Nama_Penerima" class="form-control" id="Nama_Penerima" value="<?php echo $pecah['Nama_Penerima']; ?>" readonly>
                                            <label for="Testimoni" class="text-black mb-1">Testimoni<span class="text-danger">*</span></label>
                                            <input type="text" name="Testimoni" class="form-control" id="Testimoni" required>
                                            <label for="Gambar" class="text-black mb-1">Foto Produk<span class="text-danger">*</span></label>
                                            <input type="file" name="Gambar" id="Gambar" class="form-control" required>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
        $(function() {
            $(".rateyo").rateYo().on("rateyo.change", function(e, data) {
                var rating = data.rating;
                $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
                $(this).parent().find('.result').text('rating :' + rating);
                $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
            });
        });
    </script>