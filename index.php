<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dangke-Ku</title>
  <link rel="icon" href="icon.png">

  <!-- Bootstrap core CSS -->
  <link href="./vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="./css/shop-homepage.css" rel="stylesheet">

</head>

<body>

<?php include 'navbar.php'; ?>
<br>
  <!-- Page Content -->
<section class="konten">
<div class="container">
<br>
  <h1 style=" font-family: Arial; "><center>Produk Terbaru</center></h1>
  <hr>
    <div class="row">
      <!-- /.col-lg-3 -->
        <div class="row">
          <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
          <?php while ($perproduk = $ambil->fetch_assoc()) { ?>

      <div class="col-md-3"> 
        <div class="card" style="height: 520px;"> <img class="card-img-top" height="300px" width="350px" src="image/produk/<?php echo $perproduk['foto_produk']; ?>" alt=""> 
          <div class="card-body"> 
            <h5><?php echo $perproduk['nama_produk']; ?> </h5>
            <h6>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h6>
            <h6><?php echo $perproduk['berat_produk']; ?> gr</h6>
			<h6>Stok :<?php echo $perproduk['stok']; ?></h6>
          </div>
          <div class="card-footer">
            <a href="detail.php?id=<?php echo $perproduk["id_produk"]; ?>" class="btn btn-light"> 
            Detail </a> </div>
        </div>
      </div>
          <?php } ?>

       
        </div>
      </div>
    </div>
</section>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
