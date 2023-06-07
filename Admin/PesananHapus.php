<?php
require 'AdminFunction.php';
if ( !isset($_SESSION['admin']) ) {
   header("Location: AdminLogin.php");
   exit;
}
$conn->query("DELETE FROM produk_item WHERE ID_Pesanan='$_GET[id]'");
$conn->query("DELETE FROM pembayaran WHERE ID_Pesanan='$_GET[id]'");
$conn->query("DELETE FROM pesanan WHERE ID_Pesanan='$_GET[id]'");
if (hapus() > 0) {
    echo "
        <script>
        alert('data berhasil dihapus');
        document.location.href='Pesanan.php';
        </script>
        ";
}else {
    echo "
        <script>
        alert('Data Gagal Dihapus');
        document.location.href='Pesanan.php';
        </script>
        ";
}
?>