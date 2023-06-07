<?php
require 'custFunction.php';
$conn->query("DELETE FROM keranjang WHERE ID_Keranjang='$_GET[id]'");
if (hapus() > 0) {
    echo "
        <script>
        document.location.href='Keranjang.php';
        </script>
        ";
} else {
    echo "
        <script>
        alert('Barang berhasil dihapus dari keranjang belanja');
        document.location.href='Keranjang.php';
        </script>
        ";
}
