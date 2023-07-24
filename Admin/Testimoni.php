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
      <section class="section dashboard">
         <div class="row">
            <div class="row">
               <!-- Testimonial Start -->
               <div class="container-xxl py-5">
                  <div class="container">
                     <?php
                     $ambil = mysqli_query($conn, "SELECT * FROM penilaian");
                     ?>
                     <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
                        <div class="card mb-3" style="max-width: 700px;">
                           <div class="row no-gutters">
                              <div class="col-md-4">
                                 <img src="../assets/img/<?php echo $pecah['Gambar']; ?>" style="width:70%; max-height:70%;" alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                              </div>
                              <div class="col-md-8">
                                 <div class="card-body">
                                    <h5 class="card-title"><?php echo $pecah['Nama_Penerima']; ?></h5>
                                    <?php echo $pecah['Testimoni']; ?></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     <?php } ?>
                  </div>
               </div>
               <!-- Testimonial End -->
            </div>
      </section>
      <thead>
   </main>
   <?php
   include 'footer.php';
   ?>