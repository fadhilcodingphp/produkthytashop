<?php
require 'AdminFunction.php';
if (!isset($_SESSION['admin'])) {
   header("Location: AdminLogin.php");
   exit;
}
//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["tambahRekening"])) {
   //cek apakah data berhasil ditambahkan atau tidak
   if (tambahRekening($_POST) > 0) {
      echo "
        <script>
        alert('Rekening berhasil ditambah');
        document.location.href='Rekening.php';
        </script>
        ";
   } else {
      echo "
        <script>
        alert('Rekening gagal ditambahkan');
        document.location.href='Rekening.php';
        </script>
        ";
   }
}
?>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Tambah Rekening | Thytashop</title>
   <?php
   include 'header.php';
   ?>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Tambah Rekening</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">Home</a></li>
               <li class="breadcrumb-item"><a href="Rekening.php">Rekening</a></li>
               <li class="breadcrumb-item active">Tambah Rekening</li>
            </ol>
         </nav>
      </div>
      <section class="section">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Tambah Rekening</h5>
               <form class="row g-3" action="" method="post">
                  <div class="col-12">
                     <label for="ID_Rekening" class="form-label">ID Rekening (Kombinasi 7 huruf dan angka)</label>
                     <input type="text" name="ID_Rekening" class="form-control" id="ID_Rekening" required>
                  </div>
                  <div class="col-12">
                     <label for="Nama_Platform" class="form-label">Nama Bank/Platform</label>
                     <input type="text" name="Nama_Platform" class="form-control" id="Nama_Platform" required>
                  </div>
                  <div class="col-12">
                     <label for="Nama_Rek" class="form-label">Nama Penerima</label>
                     <input type="text" name="Nama_Rek" class="form-control" id="Nama_Rek" required>
                  </div>
                  <div class="col-12">
                     <label for="No_Rek" class="form-label">Nomor Rekening/Platform</label>
                     <input type="text" name="No_Rek" class="form-control" id="No_Rek" required>
                  </div>
                  <div class="text-center">
                     <button type="submit" name="tambahRekening" class="btn btn-primary">Tambah Rekening</button>
                  </div>
               </form>
            </div>
         </div>
      </section>
   </main>
   <?php
   include 'footer.php';
   ?>