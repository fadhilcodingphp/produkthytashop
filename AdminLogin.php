<?php
require 'custFunction.php';
?>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Login | Thytashop</title>
   <meta name="robots" content="noindex, nofollow">
   <meta content="" name="description">
   <meta content="" name="keywords">
   <link href="admin/assets/img/favicon.png" rel="icon">
   <link href="admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
   <link href="https://fonts.gstatic.com" rel="preconnect">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet">
   <link href="admin/assets/css/bootstrap-icons.css" rel="stylesheet">
   <link href="admin/assets/css/boxicons.min.css" rel="stylesheet">
   <link href="admin/assets/css/quill.snow.css" rel="stylesheet">
   <link href="admin/assets/css/quill.bubble.css" rel="stylesheet">
   <link href="admin/assets/css/remixicon.css" rel="stylesheet">
   <link href="admin/assets/css/simple-datatables.css" rel="stylesheet">
   <link href="admin/assets/css/style.css" rel="stylesheet">
</head>

<body>
   <main>
      <div class="container">
         <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                     <div class="card mb-3">
                        <div class="card-body">
                           <div class="pt-4 pb-2">
                              <h5 class="card-title text-center pb-0 fs-4">LOGIN</h5>
                              <p class="text-center small">Silahkan masukkan username & password untuk melihat web admin</p>
                           </div>
                           <?php if (isset($error)) : ?>
                              <p class="text-danger">Username/Password salah</p>
                           <?php endif; ?>
                           <form class="row g-3 needs-validation" method="post" role="form">
                              <div class="col-12">
                                 <label for="username" class="form-label">Username</label>
                                 <input type="text" name="username" class="form-control" id="username" required>
                                 <div class="invalid-feedback">Tolong input username anda</div>
                              </div>
                              <div class="col-12">
                                 <label for="password" class="form-label">Password</label>
                                 <input type="password" name="password" class="form-control" id="password" required>
                                 <div class="invalid-feedback">Tolong input password anda</div>
                              </div>
                              <div class="col-12"> <button class="btn btn-primary w-100" type="submit" name='login'>Login</button></div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </main>
   <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
   <script src="admin/assets/js/apexcharts.min.js"></script>
   <script src="admin/assets/js/bootstrap.bundle.min.js"></script>
   <script src="admin/assets/js/chart.min.js"></script>
   <script src="admin/assets/js/echarts.min.js"></script>
   <script src="admin/assets/js/quill.min.js"></script>
   <script src="admin/assets/js/simple-datatables.js"></script>
   <script src="admin/assets/js/tinymce.min.js"></script>
   <script src="admin/assets/js/validate.js"></script>
   <script src="admin/assets/js/main.js"></script>
</body>

</html>