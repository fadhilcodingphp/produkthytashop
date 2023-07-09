<?php
require 'AdminFunction.php';
if (!isset($_SESSION['roleadmin'])) {
    header("Location: ../AdminLogin.php");
    exit;
}
$conn->query("UPDATE pembayaran SET
            Status = 'Menunggu Pembayaran', 
            Total_Order = 0,
            Nama_Rek = '',
            Tgl_bayar = '',
            Bukti_bayar = '',
            status_Pembayaran = 'Belum Bayar' 
            WHERE ID_Pesanan='$_GET[id]'");
if (hapus() > 0) {
    echo "
        <script>
        alert('data berhasil dihapus');
        document.location.href='Pembayaran.php';
        </script>
        ";
} else {
    echo "
        <script>
        alert('Data Gagal Dihapus');
        document.location.href='PembayaranUbah.php';
        </script>
        ";
}
