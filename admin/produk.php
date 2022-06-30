<h2><center>Data Produk </center></h2>
<hr>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary"> Tambah Data </a>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Harga</th>
	  <th>Stok</th>
      <th>Berat</th>
      <th>Foto</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM produk") ?>
    <?php while($pecah = $ambil->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $nomor; ?></td>
        <td> <?php echo $pecah['nama_produk']; ?> </td>
        <td> <?php echo $pecah['harga_produk']; ?> </td>
		<td> <?php echo $pecah['stok']; ?> </td>
        <td> <?php echo $pecah['berat_produk']; ?> </td>
        <td> <img src="../image/produk/<?php echo $pecah['foto_produk']; ?>" width="80px"> </td>
        <td>
          <a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn"> Hapus </a>
          <a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-warning btn"> Edit </a>
        </td>
      </tr>
      <?php $nomor++; ?>
    <?php } ?>
  </tbody>
</table>


