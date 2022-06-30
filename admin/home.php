<h2><center>Welcome Admin</center></h2>
<hr>
<form method ="GET">
<label>Pilih Tanggal</label>
<input type="date" name="drtanggal"><label>Sampai</label>
<input type="date" name="sptanggal">
<input type="submit" value="Filter" name="filter">
</form><br>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Pelanggan</th>
      <th>Tanggal</th>
      <th>Total</th>
      <th>Status Order</th>
    </tr>
  </thead>
  <?php $nomor=1; 
  if (isset($_GET['filter'])){
  $drtanggal =$_GET['drtanggal'];
  $sptanggal =$_GET['sptanggal'];
 $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.tanggal_pembelian BETWEEN '$drtanggal' AND '$sptanggal' ORDER BY pembelian.tanggal_pembelian "); 
 }else{
 $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan ORDER BY pembelian.tanggal_pembelian "); 
 }?>
  <?php while ($pecah = $ambil->fetch_assoc()) { ?>
  <tr>
    <td><?php echo $nomor; ?></td>
    <td><?php echo $pecah['nama_pelanggan']; ?></td>
    <td><?php echo $pecah['tanggal_pembelian']; ?></td>
    <td><?php echo number_format($pecah['total_pembelian']); ?></td>
    <td><?php echo $pecah['status_pembelian']; ?></td>
  </tr>
  <?php $nomor++; ?>
<?php } ?>
</table>
