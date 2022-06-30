<?php
session_start();
include 'koneksi.php';
 // <!-- jika tidak ada user login -->
  if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert('Silahkan Login Dulu');</script>";
    echo "<script>location='login.php';</script>";
  }
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
     <!-- Bootstrap core CSS -->
     <link href="./vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

     <!-- Custom styles for this template -->
     <link href="./css/shop-homepage.css" rel="stylesheet">

   </head>
   <body>
  <?php include 'navbar.php'; ?>
     <section class="konten">
       <div class="container">
         <br><br>
         <h1 style=" font-family: Arial; "><center>Checkout</center></h1>
         <hr>
         <table class="table">
       <thead class="thead-dark">
         <tr>
           <th scope="col">No</th>
           <th scope="col">Produk</th>
           <th scope="col">Harga</th>
           <th scope="col">Jumlah</th>
           <th scope="col">Subtotal</th>
         </tr>
       </thead>
       <tbody>
         <?php $totalbelanja=0; ?>
         <?php $nomor=1; ?>
         <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) { ?>
           <!-- menampilkan produk yang dbeli -->
           <?php
           $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
           $pecah = $ambil->fetch_assoc();
           $subharga = $pecah["harga_produk"] * $jumlah;
		   $sisa = $pecah["stok"]-$jumlah;
            ?>
         <tr>
           <th scope="row"><?php echo $nomor; ?></th>
           <td><?php echo $pecah["nama_produk"]; ?></td>
           <td><?php echo number_format($pecah["harga_produk"]); ?> </td>
           <td><?php echo $jumlah ?></td>
           <td><?php echo number_format($subharga); ?></td>
         </tr>
       <?php $nomor++; ?>
       <?php $totalbelanja+=$subharga; ?>
       <?php } ?>
       </tbody>
       <tfoot>
         <tr>
           <th colspan="4">Total Belanja</th>
           <th>Rp. <?php echo number_format($totalbelanja); ?> </th>
         </tr>
       </tfoot>
     </table>

     <form method="post">
       <div class="row">
         
      <div class="col-md-4"> 
        <div class="form-group"> 
          <label>Nama Pelanggan</label>
        </div>
        <div class="form-group"> 
          <input type="text" class="form-control" name="nama_pelanggan" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?>">
        </div>
      </div>
         
      <div class="col-md-4"> 
        <div class="form-group"> 
          <label>Email Pelanggan</label>
        </div>
        <div class="form-group"> 
          <input type="text" class="form-control" name="email_pelanggan" readonly value="<?php echo $_SESSION['pelanggan']['email_pelanggan']; ?>">
        </div>
      </div>
         
      <div class="col-md-4"> 
        <div class="form-group"> 
          <label>Telepon Pelanggan</label>
        </div>
        <div class="form-group"> 
          <input type="text" class="form-control" name="telepon_pelanggan" readonly value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan']; ?>">
        </div>
      </div>
       </div>
	   <div class="form-group">
	  <label>Alamat Pelanggan</label>
	  </div>
          <div class="form-group">
            <input type="text" class="form-control" name="alamat_pelanggan"   value="<?php echo $_SESSION['pelanggan']['alamat_pelanggan']; ?>">
          </div>
      <button class="btn btn-dark" name="checkout">Buat Pesanan</button>
     </form>
     <br>
     <div class="alert alert-secondary" role="alert">
       Ongkos Kirim Ditanggung Pembeli Dan Dibayar Ditempat Saat Barang Datang!!
     </div>

     <?php
     if (isset($_POST['checkout'])) {
       $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
       $tanggal_pembelian = date("Y-m-d");
	   if ($pecah['stok']<$jumlah){
	   echo "<script>alert('Stok Habis');</script>";
      echo "<script>location='keranjang.php';</script>";
		}
	  else{
	  //ubah data
		$koneksi->query("update pelanggan set email_pelanggan='$_POST[email_pelanggan]',
		nama_pelanggan='$_POST[nama_pelanggan]',telepon_pelanggan='$_POST[telepon_pelanggan]',alamat_pelanggan='$_POST[alamat_pelanggan]' where id_pelanggan=$id_pelanggan ");
		
		$koneksi->query("update produk set stok='$sisa' where id_produk='$id_produk'");
       // simpan data ke tabel
       $koneksi->query("INSERT INTO pembelian (id_pelanggan,tanggal_pembelian,status_pembelian,total_pembelian)
          VALUES ('$id_pelanggan','$tanggal_pembelian','Belum Disetujui','$totalbelanja') ");
		      
	  //mendapatkan id pembelian barusan terjadi
      $id_pembelian_barusan = $koneksi->insert_id;

      foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
        $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah)
        VALUES ('$id_pembelian_barusan','$id_produk','$jumlah')");
		
      }
      //mengkosongkan keranjang
      unset($_SESSION['keranjang']);
      // lalu alihkan tampilan ke halaman nota
      echo "<script>alert('Pembelian Sukses');</script>";
      echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
     }}
      ?>

   </div>
</section>

   </body>
 </html>
