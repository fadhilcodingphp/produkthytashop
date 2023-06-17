<?php
require 'AdminFunction.php';
if (!isset($_SESSION['roleadmin'])) {
    header("Location: ../AdminLogin.php");
    exit;
}
$conn->query("DELETE FROM rekening WHERE ID_Rekening='$_GET[id]'");
if (hapus() > 0) {
    echo "
        <script>
        alert('data berhasil dihapus');
        document.location.href='Rekening.php';
        </script>
        ";
} else {
    echo "
        <script>
        alert('Data Gagal Dihapus');
        document.location.href='Rekening.php';
        </script>
        ";
}
