<h2><center> Ubah Produk </center></h2>
<hr>
<?php
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

 ?>

 <form method="post" enctype="multipart/form-data">
   <div class="form-group">
     <label> Nama Produk </label>
     <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
   </div>
   <div class="form-group">
     <label> Harga (Rp)</label>
     <input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk']; ?>">
   </div>
   <div class="form-group">
     <label> Berat (Gr) </label>
     <input type="number" name="berat" class="form-control" value="<?php echo $pecah['berat_produk']; ?>">
     </div>
	 <div class="form-group">
     <label> Stok </label>
     <input type="number" name="stok" class="form-control" value="<?php echo $pecah['stok']; ?>">
     </div>
    <div class="form-group">
        <img src="../image/produk/<?php echo $pecah['foto_produk']; ?>" width="200px">
        <input type="file" name="foto" class="form-control">
    </div>
    <div class="form-group">
      <label> Deskripsi </label>
      <textarea name="deskripsi" rows="10" class="form-control">
        <?php echo $pecah['deskripsi_produk']; ?>
      </textarea>
    </div>
    <button class="btn btn-primary" name="ubah"> Simpan </button>
 </form>


<?php
if (isset($_POST['ubah'])) {
  $produk_foto = $_FILES['foto']['name'];
  $lokasi_foto = $_FILES['foto']['tmp_name'];

  // Jika Foto Diubah 
  if (!empty($lokasi_foto)) {
    move_uploaded_file($lokasi_foto,"../image/produk/$produk_foto");

    $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',
                     berat_produk='$_POST[berat]',foto_produk='$produk_foto',deskripsi_produk='$_POST[deskripsi]',stok='$_POST[stok]'
                     WHERE id_produk='$_GET[id]'");
  }
  else {
    $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',
                     berat_produk='$_POST[berat]',deskripsi_produk='$_POST[deskripsi]',stok='$_POST[stok]' WHERE id_produk='$_GET[id]'");
  }
  echo "<script> alert('Data Diubah'); </script>";
  echo "<script> location='index.php?halaman=produk'; </script> ";
}

 ?>
