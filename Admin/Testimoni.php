<?php
require 'AdminFunction.php';
?>

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Testimoni Pelanggan | Thytashop</title>
   <?php
   include 'header.php';
   ?>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Testimoni</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
               <li class="breadcrumb-item active">Testimoni</li>
            </ol>
         </nav>
      </div>
      <!-- Testimonial Start -->
      <div class="container-xxl py-5">
         <div class="container">
            <?php
            $ambil = mysqli_query($conn, "SELECT * FROM penilaian");
            ?>
            <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
               <div class="card mb-3" style="max-width: 1200px; max-height: 200px;">
                  <div class="row g-0">
                     <div class="col-md-4">
                        <img src="../assets/img/<?php echo $pecah['Gambar']; ?>" style="max-height:50%;" alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                     </div>
                     <div class="col-md-8">
                        <div class="card-body">
                           <h5 class="card-title"><?php echo $pecah['Nama_Penerima']; ?></h5>
                           <p class="card-text"><?php echo $pecah['Testimoni']; ?></a></p>
                           <p class="card-text"><small class="text-body-secondary">Rate : <?php echo $pecah['rating']; ?> Poin</small></p>
                        </div>
                     </div>
                  </div>
               </div>
            <?php } ?>
         </div>
      </div>
      <!-- Testimonial End -->
      <thead>
   </main>
   <?php
   include 'footer.php';
   ?>