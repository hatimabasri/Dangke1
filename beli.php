<?php
session_start();
//mendapatkan id produk dari url
include 'koneksi.php';  
$id_produk = $_GET['id'];
$jml = $_POST['jml'];
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();
if (isset($_SESSION['keranjang'][$id_produk])) {
foreach ($_SESSION["keranjang"] as $id_produk => $jumlah)
if($detail['stok']<=$jumlah){
echo "<script>alert('Stok sisa $detail[stok]');</script>";
echo "<script>location='index.php'; </script>";
 }
 else {
 // jika sudah ada produk dikeranjang, maka produk itu jumlahnya +1;
  $_SESSION['keranjang'][$id_produk]+=$jml;
  echo "<script>location='keranjang.php';</script>";
}}
//selain itu jika belum ada dikeranjang maka dianggap dibeli 1;
else {
  $_SESSION['keranjang'][$id_produk]=$jml;
//jika di klik maka lari ke keranjang belanja
echo "<script>alert('Produk Masuk Ke Keranjang Anda');</script>";
echo "<script>location='keranjang.php';</script>";
 }
 ?>
