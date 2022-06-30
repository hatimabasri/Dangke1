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

<br>
     <section class="konten" >
       <div class="container"><br>
        <h1><center>Nota Pembelian</center></h1>
         <hr>
         <?php
         $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
                   ON pembelian.id_pelanggan = pelanggan.id_pelanggan
                   WHERE pembelian.id_pembelian ='$_GET[id]'");
         $detail = $ambil->fetch_assoc();
          ?>
          <!-- <pre> <?php print_r($detail) ?> </pre> -->
          <strong class="h3"> <?php echo $detail['nama_pelanggan']; ?> </strong>
          <p>
            <?php echo $detail['telepon_pelanggan']; ?> <br>
            <?php echo $detail['email_pelanggan']; ?> <br>
            <?php echo $detail['alamat_pelanggan']; ?>
           </p>
          <p>
            <strong>ID Pembayaran : <?php echo $detail['id_pembelian']; ?> </strong><br>
            Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
            Total : <?php echo number_format($detail['total_pembelian']); ?>
          </p>

         <table class="table table-bordered">
           <thead>
             <tr>
               <th>No</th>
               <th>Nama</th>
               <th>Harga</th>
               <th>Jumlah</th>
               <th>Subtotal</th>
             </tr>
           </thead>
           <tbody>
             <?php $nomor=1; ?>
             <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk = produk.id_produk
               WHERE pembelian_produk.id_pembelian= '$_GET[id]'"); ?>
             <?php while ($pecah = $ambil->fetch_assoc()) { ?>
             <tr>
               <td> <?php echo $nomor; ?> </td>
               <td> <?php echo $pecah['nama_produk']; ?> </td>
               <td> <?php echo number_format($pecah['harga_produk']); ?> </td>
               <td> <?php echo $pecah['jumlah']; ?> </td>
               <td> <?php echo number_format($pecah['harga_produk']* $pecah['jumlah']); ?> </td>
             </tr>
           <?php $nomor++; ?>
           <?php } ?>
           </tbody>
         </table>
         <div class="row">
           
    <div class="col-md-7"> 
      <div class="alert alert-info"> 
        <p>Silahkan Melakukan Pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> 
          Ke <br>
          <strong>BANK BRI 4987-01-016362-53-7 AN KHUSNUL HATIMA BASRI</strong> 
          <br>
          Dan Konfirmasi Jika Pembayaran Selesai Ke Nomor 081243128757 <br>
          Setelah Itu Pembayaran Akan Dikonfirmasi Oleh Admin </p>
      </div>
    </div>
         </div>

       </div>
     </section>

   </body>
 </html>
