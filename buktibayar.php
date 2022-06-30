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
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
 ?>
    <!-- todo container -->
    <div class="container"><br><br>
	<h1 style=" font-family: Arial; "><center>Masukkan Bukti Bayar</center></h1>
    <hr>
		 <form method="POST" enctype="multipart/form-data">
       
        <div class="row"> 
      <div class="col-md-4"> 
        <div class="form-group"> 
          <label>ID Bayar</label>
        </div>
        <div class="form-group"> 
           <input type="text" class="form-control" name="id_pembelian" value="<?php echo $pecah['id_pembelian']; ?>" >
		  <!-- <input type="text" class="form-control" name="id_pembelian"  > -->
        </div>
      </div>
    </div>
	<div class="row">
      <div class="col-md-4"> 
        <div class="form-group"> 
          <label>Bukti Transfer</label>
        </div>
        <div class="form-group"> 
          <input type="file" class="form-control" name="bukti">
		  
        </div>
      </div>
    </div>
	<div class="row">
      <button class="btn btn-dark" name="kirim">Kirim</button></div>
     </form>
	   <?php
	   
if (isset($_POST['kirim'])) {
	$lokasi_foto = "C:/xampp/htdocs/Dangke/image/bukti/";
	$bukti_foto = $_FILES['bukti']['name'];
    move_uploaded_file($_FILES['bukti']['tmp_name'],$lokasi_foto.$bukti_foto);

    mysqli_query($koneksi,"INSERT INTO bukti(id,id_pembelian,bukti_bayar) VALUES (null,'$_POST[id_pembelian]','$bukti_foto')");
	echo "<script> alert('Berhasil Terupload'); </script>";
	echo "<script> location='cekpembayaran.php'; </script>";
}
?>
	<br>
	 </div>
    </div>
  </body>
</html>