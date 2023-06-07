<?php
require 'AdminFunction.php';
if (!isset($_SESSION['admin'])) {
    header("Location: AdminLogin.php");
    exit;
}
$conn->query("UPDATE pembayaran SET
            ID_Rekening = 'Belum Bayar',
            Nama_Rek = 'Masih Menunggu Tagihan', 
            Nominal = 0,
            Bukti_bayar = '',
            Bukti_bayar = '',
            status_Pembayaran = 'Pembayaran Ditolak' 
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
        document.location.href='Pembayaran.php';
        </script>
        ";
}
