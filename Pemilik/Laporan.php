<?php
require 'PemilikFunction.php';
if (!isset($_SESSION['pemilik'])) {
   header("Location: PemilikLogin.php");
   exit;
}
$conn = new mysqli("localhost", "root", "", "thytashop");
$awalTgl = "";
$akhirTgl = "";
$tglAwal = "";
$tglAkhir = "";
if (isset($_POST['btnTampil'])) {
   $tglAwal = isset($_POST['txtTglAwal']) ? $_POST['txtTglAwal'] : "01-";
   $tglAkhir = isset($_POST['txtTglAkhir']) ? $_POST['txtTglAkhir'] : "01-";
   $sqlPeriode = "AND pesanan.Tgl_Pesan BETWEEN '$tglAwal' AND '$tglAkhir'";
} else {
   $awalTgl = "01-" . date('m-Y');
   $akhirTgl = date('d-m-Y');
   $sqlPeriode = "AND pesanan.Tgl_Pesan BETWEEN '$awalTgl' AND '$akhirTgl'";
}
?>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Laporan</title>
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
      <div class="header-nav ms-auto"></div>
      <div class="d-flex justify-content-end"> <a href="pemiliklogout.php" class="nav-link d-flex"> <button type="button" class="btn btn-outline-danger">Logout</button> </a></div>
   </header>
   <!-- sidebar -->
   <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">
         <li class="nav-item"> <a class="nav-link collapsed" href="Dashboard.php"> <i class="bi bi-grid"></i> <span>Dashboard</span> </a></li>
         <li class="nav-item"> <a class="nav-link" href="Laporan.php"> <i class="bi bi-graph-up"></i> <span>Laporan</span> </a></li>
      </ul>
   </aside>
   <main id="main" class="main">
      <div class="pagetitle">
         <h1>Laporan</h1>
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
               <li class="breadcrumb-item active">Laporan</li>
            </ol>
         </nav>
      </div>
      <?php $i = 1; ?>
      <section class="section">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title">Laporan Periode tanggal <b><?= ($tglAwal); ?></b> s/d <b><?= ($tglAkhir); ?></b></h5>
                     <form action="" method="post" name="laporan">
                        <div class="row">
                           <div class="col-lg-3">
                              <input name="txtTglAwal" type="date" class="form-control" value="<?= $awalTgl ?>">
                           </div>
                           <div class="col-lg-3">
                              <input name="txtTglAkhir" type="date" class="form-control" value="<?= $akhirTgl ?>">
                           </div>
                           <div class="col-lg-3">
                              <input name="btnTampil" type="submit" class="btn btn-primary" value="Tampilkan">
                           </div>
                        </div>
                     </form>
                     <a class="btn btn-primary" href="LaporanExcel.php?awal=<?= $tglAwal; ?> &&akhir=<?= $tglAkhir; ?>" target="_blank" alt="Edit Data"> <i class="ri-download-2-fill"></i> Download Excel</a>
                     <table class="table datatable">
                        <thead>
                           <tr>
                              <th scope="col">No.</th>
                              <th scope="col">ID Psn</th>
                              <th scope="col">Tanggal Pesan</th>
                              <th scope="col">Nama Customer</th>
                              <th scope="col">Status </th>
                              <th scope="col">Nama Produk</th>
                              <th scope="col">Harga Produk</th>
                              <th scope="col">Jumlah</th>
                              <th scope="col">Total</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $ambil = mysqli_query($conn, "SELECT * FROM pesanan
                             INNER JOIN pembayaran ON pesanan.ID_Pesanan = pembayaran.ID_Pesanan
                             INNER JOIN produk_item ON pesanan.ID_Pesanan = produk_item.ID_Pesanan 
                             INNER JOIN produk ON produk_item.ID_Produk = produk.ID_Produk
                             INNER JOIN pelanggan ON pesanan.ID_Pelanggan = pelanggan.ID_Pelanggan $sqlPeriode ORDER BY pesanan.Tgl_Pesan ASC") ?>
                           <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
                              <tr>
                                 <td><?= $i ?></td>
                                 <td scope="row"><?php echo $pecah['ID_Pesanan']; ?></td>
                                 <td scope="row"><?php echo $pecah['Tgl_Pesan']; ?></td>
                                 <td scope="row"><?php echo $pecah['Nama_Pelanggan']; ?></td>
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
                                    ?>
                                 </td>
                                 <td scope="row"><?php echo $pecah['Nama_Produk']; ?></td>
                                 <td scope="row"><?php echo 'Rp. ' . number_format($pecah['Harga'], 2, ',', '.'); ?></td>
                                 <td scope="row"><?php echo $pecah['Jumlah_Barang']; ?></td>
                                 <td scope="row"><?php echo 'Rp. ' . number_format($pecah['Total_Prodit'], 2, ',', '.'); ?></td>

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

</html>