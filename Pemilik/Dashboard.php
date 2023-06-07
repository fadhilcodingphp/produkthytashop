<?php
require 'PemilikFunction.php';

if (!isset($_SESSION['pemilik'])) {
   header("Location: PemilikLogin.php");
   exit;
}

$get_Pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
$total_Pelanggan = mysqli_num_rows($get_Pelanggan);

$get_Pesanan = mysqli_query($conn, "SELECT * FROM Pesanan");
$total_Pesanan = mysqli_num_rows($get_Pesanan);

$get_Menu = mysqli_query($conn, "SELECT * FROM produk");
$total_Menu = mysqli_num_rows($get_Menu);
?>

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Dashboard Pemilik</title>
   <meta name="robots" content="noindex, nofollow">
   <meta content="" name="description">
   <meta content="" name="keywords">
   <link href="assets/img/favicon.png" rel="icon">
   <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
   <link href="https://fonts.gstatic.com" rel="preconnect">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <link href="assets/css/bootstrap.min.css" rel="stylesheet">
   <link href="assets/css/bootstrap-icons.css" rel="stylesheet">
   <link href="assets/css/boxicons.min.css" rel="stylesheet">
   <link href="assets/css/quill.snow.css" rel="stylesheet">
   <link href="assets/css/quill.bubble.css" rel="stylesheet">
   <link href="assets/css/remixicon.css" rel="stylesheet">
   <link href="assets/css/simple-datatables.css" rel="stylesheet">
   <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
   <header id="header" class="header fixed-top d-flex align-items-center">
      <!-- logo di header -->
      <div class="d-flex align-items-center justify-content-between"> <a href="Dashboard.php" class="logo d-flex align-items-center"> <img src="assets/img/logo.png" alt=""> <span class="d-none d-lg-block">Pemilik</span> </a> <i class="bi bi-list toggle-sidebar-btn"></i></div>
      <div class="header-nav ms-auto"> <a href="Profile.php" class="nav-link d-flex"></a></div>
      <div class="d-flex justify-content-end"> <a href="Pemiliklogout.php" class="nav-link d-flex"> <button type="button" class="btn btn-outline-danger">Logout</button> </a></div>
   </header>
   <!-- sidebar -->
   <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">
         <li class="nav-item"> <a class="nav-link" href="Dashboard.php"> <i class="bi bi-grid"></i> <span>Dashboard</span> </a></li>
         <li class="nav-item"> <a class="nav-link collapsed" href="Laporan.php"> <i class="bi bi-graph-up"></i> <span>Laporan</span> </a></li>
      </ul>
   </aside>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Dashboard</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
               <li class="breadcrumb-item active">Dashboard</li>
            </ol>
         </nav>
      </div>
      <section class="section dashboard">
         <div class="row">
            <div class="row">
               <!-- section penjualan -->
               <div class="col-xxl-3 col-md-6">
                  <div class="card info-card revenue-card">
                     <div class="card-body">
                        <h5 class="card-title">Penjualan</h5>
                        <div class="d-flex align-items-center">
                           <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-cash-coin"></i></div>
                           <div class="ps-3">
                              <?php $total_Penjualan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(Total_Prodit) AS total FROM produk_item"))["total"]; ?>
                              <h6>
                                 <?php echo number_format($total_Penjualan, 2, ',', '.') ?>
                              </h6>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- section jumlah konsumen -->
               <div class="col-xxl-3 col-md-6">
                  <div class="card info-card customers-card">
                     <div class="card-body">
                        <h5 class="card-title">Pelanggan</h5>
                        <div class="d-flex align-items-center">
                           <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-people"></i></div>
                           <div class="ps-3">
                              <h6><?= $total_Pelanggan ?></h6>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- section jumlah Pesanan -->
               <div class="col-xxl-3 col-md-6">
                  <div class="card info-card sales-card">
                     <div class="card-body">
                        <h5 class="card-title">Pesanan</h5>
                        <div class="d-flex align-items-center">
                           <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-cart-check-fill"></i></div>
                           <div class="ps-3">
                              <h6><?= $total_Pesanan ?></h6>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- section jumlah Menu -->
               <div class="col-xxl-3 col-md-6">
                  <div class="card info-card menu-card">
                     <div class="card-body">
                        <h5 class="card-title">Menu</h5>
                        <div class="d-flex align-items-center">
                           <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-card-list"></i> </div>
                           <div class="ps-3">
                              <h6><?= $total_Menu ?></h6>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Penjualan terkini -->
               <div class="col-12">
                  <div class="card recent-sales overflow-auto">
                     <div class="card-body">
                        <h5 class="card-title">Penjualan terkini</h5>
                        <table class="table datatable">
                           <thead>
                              <tr>
                                 <th scope="col">No.</th>
                                 <th scope="col">Nama Customer</th>
                                 <th scope="col">Tanggal Kirim</th>
                                 <th scope="col">Status Pemesanan</th>
                                 <th scope="col">Status Pembayaran</th>
                                 <th scope="col">Total Pesanan</th>
                                 <th scope="col">Biaya Pengiriman</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $ambil = mysqli_query($conn, "SELECT * FROM 
                                  pelanggan INNER JOIN pesanan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan 
                                  INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan ORDER BY pesanan.Tgl_Pesan ASC") ?>
                              <?php $i = 1; ?>
                              <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
                                 <tr>
                                    <td><?= $i ?></td>
                                    <td scope="row"><?php echo $pecah['Nama_Pelanggan']; ?></td>
                                    <td scope="row"><?php echo $pecah['Tgl_Kirim']; ?></td>
                                    <td scope="row">
                                       <?php
                                       $bayar = $pecah['status_Pembayaran'];
                                       $status = $pecah['status'];
                                       if ($status == "Menunggu Tagihan") {
                                          echo "<span class='badge bg-danger'> <h6><b> $status </b></h6> </span>";
                                       } elseif ($status == "Menunggu Pembayaran") {
                                          echo "<span class='badge bg-warning'> <h6><b> $status </b></h6> </span>";
                                       } elseif ($status == "Menunggu Konfirmasi Pembayaran") {
                                          echo "<span class='badge bg-danger'> <h6><b> $status </b></h6> </span>";
                                       } elseif ($status == "Diproses") {
                                          echo "<span class='badge bg-warning'> <h6><b> $status </b></h6> </span>";
                                       } elseif ($status == "Pesanan Selesai") {
                                          echo "<span class='badge bg-success'> <h6><b> $status </b></h6> </span>";
                                       } else {
                                          echo "<span class='badge bg-info'> <h6><b> $status </b></h6> </span>";
                                       }
                                       ?></td>
                                    <td scope="row">
                                       <?php
                                       if ($bayar == "LUNAS") {
                                          echo "<span class='badge bg-success'> <h6><b> $bayar </b></h6> </span>";
                                       } elseif ($bayar == "DP 50% dan COD") {
                                          echo "<span class='badge bg-warning'> <h6><b> $bayar </b></h6> </span>";
                                       } elseif ($bayar == "Belum Bayar") {
                                          echo "<span class='badge bg-danger'> <h6><b> $bayar </b></h6> </span>";
                                       }
                                       ?>
                                    </td>
                                    <td scope="row"><?php echo 'Rp. ' . number_format($pecah['Total_pesanan'], 2, ',', '.'); ?></td>
                                    <td scope="row"><?php echo 'Rp. ' . number_format($pecah['Biaya_pengiriman'], 2, ',', '.'); ?></td>
                                 </tr>
                                 <?php $i++; ?>
                              <?php } ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!-- Tagihan dan Pembayaran Terkini -->
               <div class="col-12">
                  <div class="card recent-sales overflow-auto">
                     <div class="card-body">
                        <h5 class="card-title">Tagihan dan Pembayaran Terkini</h5>
                        <table class="table datatable">
                           <?php $i = 1; ?>
                           <tr>
                              <th scope="col">No.</th>
                              <th scope="col">Nama Customer</th>
                              <th scope="col">Tanggal Kirim</th>
                              <th scope="col">Status Pembayaran</th>
                              <th scope="col">Total Harga Pesanan</th>
                              <th scope="col">Dibayar Ke</th>
                           </tr>
                           </thead>
                           <tbody>
                              <?php $ambil = mysqli_query($conn, "SELECT * FROM 
                            pelanggan INNER JOIN pesanan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan 
                            INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan
                            INNER JOIN rekening ON rekening.ID_Rekening = pembayaran.ID_Rekening ORDER BY pesanan.Tgl_Pesan ASC") ?>
                              <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
                                 <tr>
                                    <td><?= $i ?></td>
                                    <td scope="row"><?php echo $pecah['Nama_Pelanggan']; ?></td>
                                    <td scope="row"><?php echo $pecah['Tgl_Kirim']; ?></td>
                                    <td scope="row">
                                       <?php
                                       $bayar = $pecah['status_Pembayaran'];
                                       if ($bayar == "LUNAS") {
                                          echo "<span class='badge bg-success'> <h6><b> $bayar </b></h6> </span>";
                                       } elseif ($bayar == "DP 50% dan COD") {
                                          echo "<span class='badge bg-warning'> <h6><b> $bayar </b></h6> </span>";
                                       } elseif ($bayar == "Belum Bayar") {
                                          echo "<span class='badge bg-danger'> <h6><b> $bayar </b></h6> </span>";
                                       }
                                       ?>
                                    </td>
                                    <td scope="row"><?php echo 'Rp. ' . number_format($pecah['Total_pesanan'], 2, ',', '.'); ?></td>
                                    <td scope="row"><?php echo $pecah['Nama_Platform']; ?></td>
                                 </tr>
                                 <?php $i++; ?>
                              <?php } ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
      </section>
      <thead>
   </main>
   <footer id="footer" class="footer">
      <div class="copyright"> &copy; Copyright <strong><span>Pode Food Makassar</span></strong>. All Rights Reserved</div>
   </footer>
   <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
   <script src="assets/js/apexcharts.min.js"></script>
   <script src="assets/js/bootstrap.bundle.min.js"></script>
   <script src="assets/js/chart.min.js"></script>
   <script src="assets/js/echarts.min.js"></script>
   <script src="assets/js/quill.min.js"></script>
   <script src="assets/js/simple-datatables.js"></script>
   <script src="assets/js/tinymce.min.js"></script>
   <script src="assets/js/validate.js"></script>
   <script src="assets/js/main.js"></script>

</body>