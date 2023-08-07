<?php
if (!isset($_SESSION['rolepemilik'])) {
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
            <h1 class="m-0"><b>Pemilik Thytashop</b></h1>
        </a>
        <div class="collapse navbar-collapse py-4 " id="navbarCollapse">
            <a href="Dashboard.php" class="nav-item nav-link">Dashboard</a>
            <a href="Laporan.php" class="nav-item nav-link">Laporan</a>
            <a href="Testimoni.php" class="nav-item nav-link">Testimoni</a>
            <div class="navbar-nav ms-auto">
                <a href="PemilikLogout.php" class="btn btn-outline-primary mx-2">Logout</a>
            </div>
        </div>
    </nav>