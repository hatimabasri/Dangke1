 <?php 
 session_start();
 include 'koneksi.php';
 foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
  $ambil = $koneksi->query("SELECT stok FROM produk WHERE id_produk='$id_produk'");
  $a = $ambil->fetch_assoc();
  $jumlah=$_POST['jml'];}
  if ($a['stok'] < $jumlah){
  $_SESSION['keranjang'][$id_produk]= $a['stok'];
  echo "<script>alert('Stok sisa $a[stok]');</script>";
	echo "<script>location='keranjang.php';</script>";
  } else{
  $_SESSION['keranjang'][$id_produk]=$jumlah;
  echo "<script>alert('Masih ada $a[stok]');</script>";
  echo "<script>location='keranjang.php';</script>";
  }
  ?> <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-dark" style=" width: 60px;" >Beli</a>
    
	<?php 
  if (isset($_POST['Cek'])) {
  $ambil = $koneksi->query("SELECT stok FROM produk WHERE id_produk='$id_produk'");
  $a = $ambil->fetch_assoc();
  $jumlah=$_POST['jml'];
  if ($a['stok'] < $jumlah){
  $_SESSION['keranjang'][$id_produk]= $a['stok'];
  echo "<script>alert('Stok sisa $a[stok]');</script>";
	echo "<script>location='keranjang.php';</script>";
  } else{
  $_SESSION['keranjang'][$id_produk]=$jumlah;
 echo "<script>alert('Masih ada $a[stok]');</script>";
  echo "<script>location='checkout.php';</script>";
  echo "";
  }
  }
  ?>