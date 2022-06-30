<?php

session_start();

include 'koneksi.php';
if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
  echo "<script> alert('Keranjang Kosong');</script>";
  echo "<script>location='index.php';</script>";
}

 ?>
 <!DOCTYPE html>
 <html>
   <head>
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
    <br><br>
    <h1 style=" font-family: Arial; "><center>Keranjang Belanja</center></h1>
    <hr>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Produk</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Subtotal</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) { ?>
      <!-- menampilkan produk yang dbeli -->
      <?php
      $nomor=1;
      $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
      $pecah = $ambil->fetch_assoc();
      $subharga = $pecah["harga_produk"] * $jumlah;
       ?>
    <tr>
      <th scope="row"><?php echo $nomor; ?></th>
      <td><?php echo $pecah["nama_produk"]; ?></td>
      <td><?php echo number_format($pecah["harga_produk"]); ?> </td>
      <td><?php echo $jumlah; ?> </td>
      <td><?php echo number_format($subharga); ?></td>
      <td>
        <a href="hapuskeranjang.php?id=<?php echo $id_produk; ?>" class="btn btn-danger btn-sm">Hapus</a>
		</form>
      </td>
    </tr>
  <?php $nomor++; ?>
  <?php } ?>

  </tbody>
</table>
<a href="index.php" class="btn btn-dark">Lanjutkan Belanja</a>
<a href="checkout.php" class="btn btn-outline-dark">Checkout</a>
  </div>
</section>

   </body>
 </html>
 
 