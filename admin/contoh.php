 <h2><center> Tambah Produk </center></h2>
<hr>
<form method="post" enctype="multipart/form-data" >
  <div class="form-group">
    <label> id </label>
    <input type="text" class="form-control" name="id_pembelian">
  </div>
  <div class="form-group">
    <label> Harga (Rp)</label>
    <input type="number" class="form-control" name="harga">
  </div>
  <div class="form-group">
    <label> Berat (Gr) </label>
    <input type="number" class="form-control" name="berat">
  </div>
  <div class="form-group">
    <label> Deskripsi </label>
    <textarea class="form-control" name="deskripsi" rows="10"></textarea>
  </div>
  <div class="form-group">
    <label> Foto </label>
    <input type="file" class="form-control" name="foto">
  </div>
  <button class="btn btn-primary" name="save">Tambah</button>
</form>

<?php
if (isset($_POST['save'])) {
  $produk_foto = $_FILES['foto']['name'];
  $lokasi_foto = $_FILES['foto']['tmp_name'];
  move_uploaded_file($lokasi_foto,"../image/produk/$produk_foto");

  $sql = "INSERT INTO bukti VALUES ('id_pembelian','$produk_foto') ";

 // if ($koneksi->query($sql) == true) {
      echo "<div class='alert alert-info'> Data Ditambahkan </div>";
      //echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
   // }
}
 ?>
