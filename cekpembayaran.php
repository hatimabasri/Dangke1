<?php
session_start();
include 'koneksi.php';
 // <!-- jika tidak ada user login -->
  if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert('Silahkan Login Dulu');</script>";
    echo "<script>location='login.php';</script>";
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dangke-Ku</title>
    <link rel="icon" href="icon.png">
    <link href="./vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="./css/shop-homepage.css" rel="stylesheet">

  </head>
  <body>
    <?php include 'navbar.php'; ?>

    <!-- todo container -->
    <div class="container"><br><br>
	<div class="row">
<div style=" margin-top: 100px;" class="offset-lg-4 text-lg-center">
        <!--  <form action="konfirmasipembayaran.php" method="get" class="form-inline">
            <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Cari Disini" aria-label="Search">
            <button class="btn  btn-info my-2 my-sm-0">Search</button>
          </form>
		  
    -->	
	
	</div>
    	</div>
		<div class="row">
	 <!-- <a href="dikirim.php" class="btn btn-dark">Dikirim</a> -->
	 
	 <a href="riwayatpesan.php" class="btn  btn-info my-2 my-sm-0">Riwayat Pesanan</a> 
	 </div>
	<div class="row"><br>
	 <table class="table">
       <thead class="thead-dark">
         <tr>
           <th scope="col">ID Bayar</th>
           <th scope="col">Nama</th>
		   <th scope="col">Tanggal Beli</th>
           <th scope="col">Total Bayar</th>
           <th scope="col">Status</th>
		   <th scope="col">Action</th>
         </tr>
       </thead>
	   <tbody>
	   <?php
	   if (isset($_SESSION['pelanggan'])) {
	   $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
           $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
          ON pembelian.id_pelanggan = pelanggan.id_pelanggan where pembelian.id_pelanggan='$id_pelanggan' and status_pembelian!='Diterima'");?>
           <?php while ($detail = $ambil->fetch_assoc()) { ?>
            
         <tr>
           <th ><?php echo $detail["id_pembelian"]; ?></th>
           <td><?php echo $detail["nama_pelanggan"]; ?></td>
		   <td><?php echo $detail["tanggal_pembelian"]; ?></td>
           <td><?php echo number_format($detail["total_pembelian"]); ?> </td>
           <td><?php echo $detail["status_pembelian"]; ?></td>
		   <td><a href="nota.php?&id=<?php echo $detail['id_pembelian'];  ?>" class="btn-warning btn"> Nota </a>
		   <a href="buktibayar.php?&id=<?php echo $detail['id_pembelian'];  ?>" class="btn btn-success"> Bukti Transfer </a></td>
         </tr>
       </tbody>
	   <?php } } ?>
     </table></div>
	 
    </div>
  </body>
</html>