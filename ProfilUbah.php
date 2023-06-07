<?php
include 'custFunction.php';
if (!isset($_SESSION["login"]) && !isset($_SESSION["ID_Pelanggan"])) {
  header("Location: login.php");
  exit;
}
if (isset($_POST["ubahProfil"])) {
  //cek apakah data berhasil diubah atau tidak
  if (ubahProfil($_POST) > 0) {
    echo "
        <script>
        alert('Data berhasil diubah');
        document.location.href='ProfilSaya.php';
        </script>
        ";
  } else {
    echo "
        <script>
        alert('Data Gagal Diubah');
        document.location.href='ProfilSaya.php';
        </script>
        ";
  }
}
$ID_Pelanggan = $_SESSION["ID_Pelanggan"];
$custProfile = query("SELECT * FROM pelanggan WHERE ID_Pelanggan = '$ID_Pelanggan'")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Edit Profile | Thytashop</title>

  <?php
  include 'header.php';
  ?>

  <div class="bg-light py-3 mb-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0">
          <p class="my-0">
            <a href="Homepage.php" class="text-primary">Home</a><span class="mx-2">/
              <a href="ProfilSaya.php" class="text-primary">Profil Saya</a><span class="mx-2">/
              </span> <strong class="text-black">Edit Profil Saya</strong>
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="container mb-5">
    <main id="main" class="main">
      <section class="section profile">
        <div class="row">
          <div class="col-xl-4">
            <div class="card">
              <img src="assets/img/<?php echo $custProfile['Foto_Profil']; ?>">
              <div class="card-body">
                <h5 class="card-title"><?= $custProfile['Nama_Pelanggan'] ?></h5>
              </div>
            </div>
          </div>
          <div class="col-xl-8">
            <div class="card">
              <div class="card-body pt-3">
                <!-- Edit detail Profile -->
                <div class="tab-pane fade show active profile-overview" id="ubahProfil">
                  <h5 class="card-title">Edit Profile</h5>
                  <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="gambarLama" value="<?= $custProfile["Foto_Profil"] ?>">
                    <div class="row mb-3">
                      <label for="ID_Pelanggan" class="col-md-4 col-lg-3 col-form-label">ID/Username</label>
                      <div class="col-md-8 col-lg-9"> <input name="ID_Pelanggan" type="text" class="form-co ntrol" id="ID_Pelanggan" value="<?= $custProfile['ID_Pelanggan'] ?>" readonly></div>
                    </div>
                    <div class="row mb-3">
                      <label for="Nama_Pelanggan" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                      <div class="col-md-8 col-lg-9"> <input name="Nama_Pelanggan" type="text" class="form-control" id="Nama_Pelanggan" value="<?= $custProfile['Nama_Pelanggan'] ?>"></div>
                    </div>
                    <div class="row mb-3">
                      <label for="Telepon" class="col-md-4 col-lg-3 col-form-label">Telepon</label>
                      <div class="col-md-8 col-lg-9"> <input name="Telepon" type="text" class="form-control" id="Telepon" value="<?= $custProfile['Telepon'] ?>"></div>
                    </div>
                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9"> <input name="Email" type="text" class="form-control" id="Email" value="<?= $custProfile['Email'] ?>"></div>
                    </div>
                    <div class="row mb-3">
                      <label for="Gambar" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                      <div class="col-md-8 col-lg-9"> <input type="file" name="Gambar" class="form-control" id="Gambar"></div>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="ubahProfil" class="btn btn-primary">Ubah Profil Saya</button>
                    </div>
                  </form>
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