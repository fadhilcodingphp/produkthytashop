<?php
if (!isset($_SESSION['roleadmin'])) {
    header("Location: ../AdminLogin.php");
    exit;
}
?>

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
<link href="assets/css/sadmin.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-3 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="Dashboard.php" class="navbar-brand p-0">
            <h1 class="m-0"><b>Admin Thytashop</b></h1>
        </a>
        <div class="collapse navbar-collapse py-4 " id="navbarCollapse">
            <div class="navbar-nav ms-auto" style="margin-top: 13px;">
                <a href="Dashboard.php" class="nav-item nav-link">Dashboard</a>
                <a href="Kategori.php" class="nav-item nav-link">Kategori</a>
                <a href="Produk.php" class="nav-item nav-link">Produk</a>
                <a href="Pesanan.php" class="nav-item nav-link">Pesanan</a>
                <?php $get1 = mysqli_query($conn, "SELECT*FROM Pesanan");
                $count1 = mysqli_num_rows($get1);
                ?>
                <b class="btn btn-danger" style="
                           border-radius: 40px; 
                           font-size: 10px; 
                           margin-left: -35px;
                           margin-top: 35px;
                           margin-bottom : 20px;
                           "><?= $count1; ?></b>
                <a href="Pembayaran.php" class="nav-item nav-link" style="padding-left: 20px;">Pembayaran</a>
                <a href="Rekening.php" class="nav-item nav-link">Rekening</a>
                <a href="Laporan.php" class="nav-item nav-link">Laporan</a>
                <a href="Testimoni.php" class="nav-item nav-link">Testimoni</a>
            </div>
            <div class="navbar-nav ms-auto">
                <a href="AdminLogout.php" class="btn btn-outline-primary mx-2">Logout</a>
            </div>
        </div>
    </nav>