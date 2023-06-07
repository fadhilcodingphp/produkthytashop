<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="" name="keywords" />
<meta content="" name="description" />

<!-- Favicon -->
<link href="img/favicon.ico" rel="icon" />

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Quicksand:wght@600;700&display=swap" rel="stylesheet" />

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

<!-- Libraries Stylesheet -->
<link href="lib/animate/animate.min.css" rel="stylesheet" />
<link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet" />
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

<!-- Customized Bootstrap Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet" />

<!-- Template Stylesheet -->
<link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Belau, Kecamatan Masanda, Tana Toraja</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Pesanan Dapat Dilakukan 24 Jam</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+62 822-9203-0561</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href="https://wa.me/6282188289569"><i class="fab fa-whatsapp"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-0" href="https://instagram.com/podefoodmakassar?igshid=YmMyMTA2M2Y="><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->



    <!-- Navbar Start -->
    <?php
    if (!isset($_SESSION["login"])) { ?>
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-4 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="Home.php" class="navbar-brand p-0">
                <h1 class="m-0 text-primary">Thytashop</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse py-4 py-lg-0" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="Home.php#home" class="nav-item nav-link">Home</a>
                    <a href="MenuLogin.php" class="nav-item nav-link">Produk</a>
                    <a href="Home.php#caraPesan" class="nav-item nav-link">Panduan Pemesanan</a>
                    <a href="Home.php#kontak" class="nav-item nav-link">Kontak</a>
                </div>
                <a href="Login.php" class="btn btn-primary">User<i class="fa fa-arrow-right ms-3"></i></a>&nbsp &nbsp
                <a href="Admin/AdminLogin.php" class="btn btn-danger">Admin<i class="fa fa-arrow-right ms-3"></i></a>&nbsp &nbsp
                <a href="Pemilik/PemilikLogin.php" class="btn btn-dark">Pemilik<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
    <?php } else { ?>
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-3 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="Home.php" class="navbar-brand p-0">
                <img class="img-fluid me-3" src="img/icon/logo.jpg" alt="Icon" />
                <h1 class="m-0 text-primary">Thytashop</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse py-4 " id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="Homepage.php#home" class="nav-item nav-link">Home</a>
                    <a href="Homepage.php#about" class="nav-item nav-link">About</a>
                    <a href="Menu.php" class="nav-item nav-link">Menu</a>
                    <a href="Homepage.php#caraPesan" class="nav-item nav-link">Panduan Pemesanan</a>
                    <a href="Homepage.php#kontak" class="nav-item nav-link">Kontak</a>
                </div>

                <div class="navbar-nav ms-auto">
                    <a href="Keranjang.php" class="btn btn-primary mx-1"><i class="fa fa-shopping-cart mt-1" aria-hidden="true"></i></a>
                    <div class="nav-item dropdown">
                        <a href="#" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-user" aria-hidden="true" style="width: 10px; height: 10px"></i>
                        </a>
                        <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                            <a href="ProfilSaya.php" class="dropdown-item">Profil Saya</a>
                            <a href="PesananSaya.php" class="dropdown-item">Pesanan Saya</a>
                            <a href="TagihanSaya.php" class="dropdown-item">Tagihan Saya</a>
                        </div>
                    </div>
                    <a href="Logout.php" class="btn btn-outline-primary mx-2">Keluar<i class="fa fa-arrow-right ms-3"></i></a>
                </div>
            </div>
        </nav>
    <?php } ?>
    <!-- Navbar End -->