<?php
require 'custFunction.php';
$conn->query("DELETE FROM pembayaran WHERE ID_Pesanan='$_GET[id]'");
$conn->query("DELETE FROM pesanan WHERE ID_Pesanan='$_GET[id]'");
if (hapus() > 0) {
    echo "
        <script>
        alert('Pesanan Berhasil Dibatalkan');
        document.location.href='PesananSaya.php';
        </script>
        ";
}else {
    echo "
        <script>
        alert('Pesanan Gagal Dibatalkan');
        document.location.href='PesananSaya.php';
        </script>
        ";
}
?>