<?php
require 'AdminFunction.php';
if (!isset($_SESSION['admin'])) {
   header("Location: AdminLogin.php");
   exit;
}
//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubahRekening"])) {
   //cek apakah data berhasil diubah atau tidak
   if (ubahRekening($_POST) > 0) {
      echo "
        <script>
        alert('Data berhasil diubah');
        document.location.href='Rekening.php';
        </script>
        ";
   } else {
      echo "
        <script>
        alert('Data Gagal Diubah');
        document.location.href='Rekening.php';
        </script>
        ";
   }
}
//ambil data di URL
$id_Rekening = $_GET["id"];
// query data mhs berdasarkan id
$ubahRek = query("SELECT * FROM rekening WHERE ID_Rekening = '$id_Rekening'")[0];
?>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Edit Rekening | Thytashop</title>
   <?php
   include 'header.php';
   ?>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Ubah Rekening</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">Home</a></li>
               <li class="breadcrumb-item"><a href="Kategori.php">Rekening</a></li>
               <li class="breadcrumb-item active">Ubah Rekening</li>
            </ol>
         </nav>
      </div>
      <section class="section">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Ubah Rekening</h5>
               <form class="row g-3" action="" method="post">
                  <div class="col-12">
                     <label for="ID_Rekening" class="form-label">ID Rekening</label>
                     <input type="text" name="ID_Rekening" class="form-control" id="ID_Rekening" value="<?= $ubahRek["ID_Rekening"] ?>" readonly>
                  </div>
                  <div class="col-12">
                     <label for="Nama_Platform" class="form-label">Nama Bank/Platform</label>
                     <input type="text" name="Nama_Platform" class="form-control" id="Nama_Platform" value="<?= $ubahRek["Nama_Platform"] ?>" required>
                  </div>
                  <div class="col-12">
                     <label for="Nama_Rek" class="form-label">Nama Penerima</label>
                     <input type="text" name="Nama_Rek" class="form-control" id="Nama_Rek" value="<?= $ubahRek["Nama_Rek"] ?>" required>
                  </div>
                  <div class="col-12">
                     <label for="No_Rek" class="form-label">Nomor Rekening/Platform</label>
                     <input type="text" name="No_Rek" class="form-control" id="No_Rek" value="<?= $ubahRek["No_Rek"] ?>" required>
                  </div>
                  <div class="text-center">
                     <button type="submit" name="ubahRekening" class="btn btn-primary">Ubah Rekening</button>
                  </div>
               </form>
            </div>
         </div>
      </section>
   </main>
   <?php
   include 'footer.php';
   ?>