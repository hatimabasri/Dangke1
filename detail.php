<?php
session_start();
include 'koneksi.php';

$id_produk = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dangke-Ku</title>
    <link rel="icon" href="icon.png">
    <link rel="stylesheet" href=".css">
    <link href="./vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="./css/shop-homepage.css" rel="stylesheet">
  </head>
  <body>
<?php include 'navbar.php'; ?>
<section class="konten">
  <div class="container">
    <div class="row">
<dv class ="row"><br><br>
<div class ="row">
      <br>
    <div class="col-md-6"> <img src="image/produk/<?php echo $detail['foto_produk']; ?>" alt="" class="img-responsive" width="400px"> 
    </div>
      <br>
    <div class="col-md-6"> <br>
      <br>
      <h2><?php echo $detail['nama_produk']; ?></h2>
      <h4>Rp. <?php echo number_format($detail['harga_produk']); ?></h4>
      <form method="post" action="">
        <div class="input-group mb-3"> 
          <input type="number" class="form-control" placeholder="Masukkan Jumlah" min="1" aria-describedby="button-addon2" name="jml">
          <div class="input-group-append"> 
            <button class="btn btn-outline-dark" id="button-addon2" name="beli">Beli</button>
          </div>
        </div>
      </form>
      <!-- jika dipencet tombol beli -->
      <?php
        if (isset($_POST['beli'])) {
          // mendapatkan jumlah yang diinputkan
          $jml = $_POST['jml'];
          // masukkan di keranjang
          if (isset($_SESSION['keranjang'][$id_produk])) {
	foreach ($_SESSION["keranjang"] as $id_produk => $jumlah)
	if(($detail['stok']<=$jumlah) || ($detail['stok']<$jml) || ($detail['stok']<$jml+$jumlah)){
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
	if ($detail['stok']<$jml){
	echo "<script>alert('Stok sisa $detail[stok]');</script>";
	echo "<script>location='index.php'; </script>";}
	else{
	  $_SESSION['keranjang'][$id_produk]=$jml;
	//jika di klik maka lari ke keranjang belanja
	echo "<script>alert('Produk Masuk Ke Keranjang Anda');</script>";
	echo "<script>location='keranjang.php';</script>";
	}
	} } ?>
      <p><?php echo $detail['deskripsi_produk'];?></p>
    </div>
    </div>
  </div>
</section>
</body>
</html>