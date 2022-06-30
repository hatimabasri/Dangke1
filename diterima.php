<?php
session_start();
//mendapatkan id 
include 'koneksi.php';
$id_pembelian = $_GET['id'];
$koneksi->query("update pembelian set status_pembelian='Diterima' WHERE id_pembelian='$id_pembelian'");
echo "<script>alert('Pembelian Sukses');</script>";
echo "<script>location='riwayatpesan.php';</script>";
?>
