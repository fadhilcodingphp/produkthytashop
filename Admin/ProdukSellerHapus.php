<?php
require 'AdminFunction.php';
if (!isset($_SESSION['roleadmin'])) {
    header("Location: ../AdminLogin.php");
    exit;
}
$conn->query("DELETE FROM bestseller WHERE ID_Promosi='$_GET[id]'");
if (hapus() > 0) {
    echo "
        <script>
        alert('data berhasil dihapus');
        document.location.href='ProdukSeller1.php';
        </script>
        ";
} else {
    echo "
        <script>
        alert('Data Gagal Dihapus');
        document.location.href='ProdukSeller1.php';
        </script>
        ";
}
