<?php
include 'custFunction.php';
if (!isset($_SESSION["login"]) && !isset($_SESSION["ID_Pelanggan"])) {
  header("Location: login.php");
  exit;
}
$ID_Pelanggan = $_SESSION["ID_Pelanggan"];
$custProfile = query("SELECT * FROM pelanggan WHERE ID_Pelanggan = '$ID_Pelanggan'")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Profil | Thytashop</title>

  <?php
  include 'header.php';
  ?>

  <div class="bg-light py-3 mb-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0">
          <p class="my-0"><a href="Homepage.php" class="text-primary">Home</a><span class="mx-2">/</span> <strong class="text-black">Profil Saya</strong></p>
        </div>
      </div>
    </div>
  </div>

  <div class="container mb-5">
    <main id="main" class="main">
      <section class="section profile">
        <div class="row">
          <div class="col-xl-12 mb-3">
            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <img src="assets/img/<?php echo $custProfile['Foto_Profil']; ?>" style="width:200px">
                <h2><?php echo $custProfile['Nama_Pelanggan']; ?></h2>
                <a class="btn btn-warning" href="ProfilUbah.php">Edit Profil Pelanggan</a>
              </div>
            </div>
          </div>
          <div class="col-xl-12">
            <div class="card">
              <div class="card-body pt-3">
                <div class="tab-content pt-2">
                  <div class="tab-pane fade show active profile-overview" id="detailProduk">
                    <h5 class="card-title">Detail Profil</h5>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Username</div>
                      <div class="col-lg-9 col-md-8"><?= $custProfile['ID_Pelanggan'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Nama</div>
                      <div class="col-lg-9 col-md-8"><?= $custProfile['Nama_Pelanggan'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Telepon</div>
                      <div class="col-lg-9 col-md-8"><?= $custProfile['Telepon'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8"><?= $custProfile['Email'] ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>


  <?php
  include 'footer.php';
  ?>