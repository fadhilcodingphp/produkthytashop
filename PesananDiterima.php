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
                                            <h4 class="text-center mt-3">
                                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                            </h4>
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
    <script>
        $(document).ready(function() {

            var rating_data = 0;

            $('#add_review').click(function() {

                $('#review_modal').modal('show');

            });

            $(document).on('mouseenter', '.submit_star', function() {

                var rating = $(this).data('rating');

                reset_background();

                for (var count = 1; count <= rating; count++) {

                    $('#submit_star_' + count).addClass('text-warning');

                }

            });

            function reset_background() {
                for (var count = 1; count <= 5; count++) {

                    $('#submit_star_' + count).addClass('star-light');

                    $('#submit_star_' + count).removeClass('text-warning');

                }
            }

            $(document).on('mouseleave', '.submit_star', function() {

                reset_background();

                for (var count = 1; count <= rating_data; count++) {

                    $('#submit_star_' + count).removeClass('star-light');

                    $('#submit_star_' + count).addClass('text-warning');
                }

            });

            $(document).on('click', '.submit_star', function() {

                rating_data = $(this).data('rating');

            });

            $('#save_review').click(function() {

                var user_name = $('#user_name').val();

                var user_review = $('#user_review').val();

                if (user_name == '' || user_review == '') {
                    alert("Please Fill Both Field");
                    return false;
                } else {
                    $.ajax({
                        url: "submit_rating.php",
                        method: "POST",
                        data: {
                            rating_data: rating_data,
                            user_name: user_name,
                            user_review: user_review
                        },
                        success: function(data) {
                            $('#review_modal').modal('hide');

                            load_rating_data();

                            alert(data);
                        }
                    })
                }

            });

            load_rating_data();

            function load_rating_data() {
                $.ajax({
                    url: "submit_rating.php",
                    method: "POST",
                    data: {
                        action: 'load_data'
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $('#average_rating').text(data.average_rating);
                        $('#total_review').text(data.total_review);

                        var count_star = 0;

                        $('.main_star').each(function() {
                            count_star++;
                            if (Math.ceil(data.average_rating) >= count_star) {
                                $(this).addClass('text-warning');
                                $(this).addClass('star-light');
                            }
                        });

                        $('#total_five_star_review').text(data.five_star_review);

                        $('#total_four_star_review').text(data.four_star_review);

                        $('#total_three_star_review').text(data.three_star_review);

                        $('#total_two_star_review').text(data.two_star_review);

                        $('#total_one_star_review').text(data.one_star_review);

                        $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

                        $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

                        $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

                        $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

                        $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

                        if (data.review_data.length > 0) {
                            var html = '';

                            for (var count = 0; count < data.review_data.length; count++) {
                                html += '<div class="row mb-3">';

                                html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' + data.review_data[count].user_name.charAt(0) + '</h3></div></div>';

                                html += '<div class="col-sm-11">';

                                html += '<div class="card">';

                                html += '<div class="card-header"><b>' + data.review_data[count].user_name + '</b></div>';

                                html += '<div class="card-body">';

                                for (var star = 1; star <= 5; star++) {
                                    var class_name = '';

                                    if (data.review_data[count].rating >= star) {
                                        class_name = 'text-warning';
                                    } else {
                                        class_name = 'star-light';
                                    }

                                    html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                                }

                                html += '<br />';

                                html += data.review_data[count].user_review;

                                html += '</div>';

                                html += '</div>';

                                html += '</div>';

                                html += '</div>';
                            }

                            $('#review_content').html(html);
                        }
                    }
                })
            }

        });
    </script>