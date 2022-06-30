<h2><center>Data Pembelian</center></h2>
<hr>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Pelanggan</th>
      <th>Tanggal</th>
      <th>Total</th>
      <th>Status Order</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <?php $nomor=1; ?>
  <?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan and status_pembelian!='Diterima'"); ?>
  <?php while ($pecah = $ambil->fetch_assoc()) { ?>
  <tr>
    <td><?php echo $nomor; ?></td>
    <td><?php echo $pecah['nama_pelanggan']; ?></td>
    <td><?php echo $pecah['tanggal_pembelian']; ?></td>
    <td><?php echo number_format($pecah['total_pembelian']); ?></td>
    <td><?php echo $pecah['status_pembelian']; ?></td>
    <td style=" max-width: 160px;">
      <a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?> " class="btn btn-info"> Detail </a>
      <a href="index.php?halaman=hapuspembelian&id=<?php echo $pecah['id_pembelian']; ?> " class="btn btn-danger"> Hapus </a>
      <a href="index.php?halaman=konfirmasipembelian&id=<?php echo $pecah['id_pembelian']; ?> " class="btn btn-success"> Konfirmasi </a>
    </td>
  </tr>
  <?php $nomor++; ?>
<?php } ?>
</table>
<a href="index.php?halaman=beliselesai" class="btn btn-primary">Pesanan Selesai</a>
