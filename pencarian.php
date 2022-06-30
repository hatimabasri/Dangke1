<?php
session_start();
include 'koneksi.php';
 ?>
 <?php
$keyword = $_GET['keyword'];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'
OR deskripsi_produk LIKE '%$keyword%'");
while ($pecah = $ambil->fetch_assoc()) {
  $semuadata[]=$pecah;
}
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Dangke-Ku</title>
    <link rel="icon" href="icon.png">
    <link href="./vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="./css/shop-homepage.css" rel="stylesheet">
  </head>
  <body>
    <?php include 'navbar.php'; ?> <br>
    <section class="konten">
    <div class="container"><br>
      <h1 style=" font-family: Arial; "><center>Hasil pencarian : <?php echo $keyword; ?></center></h1>
      <hr>
      <?php
      if (empty($semuadata)) {?>
        <div class="alert alert-danger"> Pencarian <?php echo $keyword; ?> Tidak Ditemukan

        </div>
      <?php } ?>
        <div class="row">
          <!-- /.col-lg-3 -->
            <div class="row">
              <?php foreach ($semuadata as $key => $value) {?>
              <div style="max-width: 400px; min-width: 250px;" class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <img class="card-img-top" src="image/produk/<?php echo $value['foto_produk']; ?>" alt="">
                  <div class="card-body">
                    <h5><?php echo $value["nama_produk"]; ?> </h5>
                    <h6>Rp. <?php echo number_format($value['harga_produk']); ?></h6>
                  </div>
                  <div class="card-footer">
                      <a href="beli.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-dark" style=" width: 60px;" >Beli</a>
                      <a href="detail.php?id=<?php echo $value["id_produk"]; ?>" class="btn btn-light"> Detail </a>
                  </div>
                </div>
              </div>
            <?php } ?>

            </div>
          </div>
        </div>
    </section>
