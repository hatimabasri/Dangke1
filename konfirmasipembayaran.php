<?php
session_start();
include 'koneksi.php';
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
<?php
$keyword = $_GET['keyword'];
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
          ON pembelian.id_pelanggan = pelanggan.id_pelanggan 
          WHERE pembelian.id_pembelian ='$keyword' AND pembelian.status_pembelian='Disetujui' OR pembelian.status_pembelian='Dikirim'");
$detail = $ambil->fetch_assoc();
 ?>

     <section class="konten" >
       <div class="container"><br>
         <h1><center>Riwayat Pengiriman <?php echo $keyword; ?></center></h1>
         <hr>
         <?php if ($detail) { ?>
             <div class="alert alert-info">
              <p>
              <center>
               <strong>SELAMAT PESANAN ANDA TELAH <?php echo $detail['status_pembelian']; ?></strong> <hr>
               Pelanggan Atas Nama <?php echo $detail['nama_pelanggan']; ?><br>
               Total Pembelian Rp. <?php echo number_format($detail['total_pembelian']); ?> <br>
               Paket Anda Akan Segera Dikirimkan Ke <?php echo $detail['alamat_pelanggan']; ?>
             </p>
         </div>
     <?php } else { ?>
       <div class="alert alert-danger">
        <p>
        <center>
         <strong>ID Pembayaran Anda Tidak Ditemukan</strong>
       </p>
     <?php } ?>
       </div>
     </section>

   </body>
 </html>
