<?php
require 'AdminFunction.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubahProduk"])) {
   //cek apakah data berhasil diubah atau tidak
   if (ubahProduk($_POST) > 0) {
      echo "
        <script>
        alert('Data berhasil diubah');
        document.location.href='Produk.php';
        </script>
        ";
   } else {
      echo "
        <script>
        alert('Data Gagal Diubah');
        document.location.href='Produk.php';
        </script>
        ";
   }
}
//ambil data di URL
$ID_Produk = $_GET["id"];
// query data mhs berdasarkan id
$ubahProduk = query("SELECT * FROM produk, kategori_produk WHERE ID_Produk = '$ID_Produk' AND produk.ID_Kategori = kategori_produk.ID_Kategori")[0];
?>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Ubah Produk | Pode Food</title>
   <?php
   include 'header.php';
   ?>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Profile</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
               <li class="breadcrumb-item"><a href="Produk.php">Produk</a></li>
               <li class="breadcrumb-item active">Edit Produk</li>
            </ol>
         </nav>
      </div>
      <section class="section profile">
         <div class="row">
            <div class="col-xl-4">
               <div class="card">
                  <img src="../assets/img/<?php echo $ubahProduk['Gambar']; ?>">
                  <div class="card-body">
                     <h5 class="card-title"><?= $ubahProduk['Nama_Produk'] ?></h5>
                  </div>
               </div>
            </div>
            <div class="col-xl-8">
               <div class="card">
                  <div class="card-body pt-3">
                     <!-- Edit detail produk -->
                     <div class="tab-pane fade show active profile-overview" id="ubahProduk">
                        <h5 class="card-title">Edit Produk</h5>
                        <form action="" method="post" enctype="multipart/form-data">
                           <input type="hidden" name="gambarLama" value="<?= $ubahProduk["Gambar"] ?>">
                           <input type="hidden" name="ID_Produk" value="<?= $ubahProduk['ID_Produk'] ?>">
                           <!-- <div class="row mb-3">
                                    <label for="ID_Produk" class="col-md-4 col-lg-3 col-form-label">ID Produk</label>
                                    <div class="col-md-8 col-lg-9"> <input  type="text" class="form-control" id="ID_Produk" ></div>
                                 </div> -->
                           <div class="row mb-3">
                              <label for="company" class="col-md-4 col-lg-3 col-form-label">Kategori Produk</label>
                              <div class="col-md-8 col-lg-9">
                                 <select class="form-select" aria-label="Default select example" name="ID_Kategori">
                                    <option selected><?= $ubahProduk['Nama_Kategori'] ?></option>
                                    <?php
                                    $ambil = mysqli_query($conn, "SELECT * FROM kategori_produk");
                                    while ($pecah = mysqli_fetch_assoc($ambil)) {
                                       echo "<option value=$pecah[ID_Kategori]> $pecah[Nama_Kategori]</option>";
                                    }
                                    ?>
                                 </select>
                              </div>
                           </div>
                           <div class="row mb-3">
                              <label for="Nama_Produk" class="col-md-4 col-lg-3 col-form-label">Nama Produk</label>
                              <div class="col-md-8 col-lg-9"> <input name="Nama_Produk" type="text" class="form-control" id="Nama_Produk" value="<?= $ubahProduk['Nama_Produk'] ?>"></div>
                           </div>
                           <div class="row mb-3">
                              <label for="Harga" class="col-md-4 col-lg-3 col-form-label">Ketahanan Produk</label>
                              <div class="col-md-8 col-lg-9"> <input name="Harga" type="text" class="form-control" id="Harga" value="<?= $ubahProduk['Harga'] ?>"></div>
                           </div>
                           <div class="row mb-3">
                              <label for="Jenis_Kain" class="col-md-4 col-lg-3 col-form-label">Jenis Kain Produk</label>
                              <div class="col-md-8 col-lg-9"> <input name="Jenis_Kain" type="text" class="form-control" id="Jenis_Kain" value="<?= $ubahProduk['Jenis_Kain'] ?>"></div>
                           </div>
                           <div class="row mb-3">
                              <label for="Keterangan" class="col-md-4 col-lg-3 col-form-label">Jenis Kain Produk</label>
                              <div class="col-md-8 col-lg-9"> <input name="Keterangan" type="text" class="form-control" id="Keterangan" value="<?= $ubahProduk['Keterangan'] ?>"></div>
                           </div>
                           <div class="row mb-3">
                              <label for="Gambar" class="col-md-4 col-lg-3 col-form-label">Foto Produk</label>
                              <div class="col-md-8 col-lg-9"> <input type="file" name="Gambar" class="form-control" id="Gambar"></div>
                           </div>
                           <div class="text-center">
                              <button type="submit" name="ubahProduk" class="btn btn-primary">Ubah Detail Produk</button>
                           </div>
                        </form>
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