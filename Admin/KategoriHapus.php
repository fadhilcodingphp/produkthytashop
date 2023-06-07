<?php
require 'AdminFunction.php';
if ( !isset($_SESSION['admin']) ) {
   header("Location: AdminLogin.php");
   exit;
}
$conn->query("DELETE FROM kategori_produk WHERE ID_Kategori='$_GET[id]'");
if (hapus() > 0) {
    echo "
        <script>
        alert('data berhasil dihapus');
        document.location.href='Kategori.php';
        </script>
        ";
}else {
    echo "
        <script>
        alert('Data Gagal Dihapus');
        document.location.href='Kategori.php';
        </script>
        ";
}
?>