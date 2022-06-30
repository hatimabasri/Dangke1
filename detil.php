<?php
session_start();
//mendapatkan id produk dari url
include 'koneksi.php';
 foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
  $ambil = $koneksi->query("SELECT stok FROM produk WHERE id_produk='$id_produk'");
  $detail = $ambil->fetch_assoc();
  $jumlah=$_POST['jumlah'];}
		  if($detail['stok']<$jumlah){
		  echo "<script>alert('Stok Kurang dari $jml');</script>";
		  echo "<script>location='index.php';</script>";
		  }
		  else{
          // masukkan di keranjang
          $_SESSION['keranjang'][$id_produk] += $jumlah;
          echo "<script>alert('Produk Masuk Ke Keranjang Anda');</script>";
          echo "<script>location='keranjang.php';</script>";
        } ?>
		