<center><strong>REKAP DATA PENJUALAN</strong></center>
<hr>

<table  class="table table-bordered">
<tr>
<th align="center"><strong>Tanggal</strong></th>
<th align="center"><strong>Nama Produk </strong></th>
<th align="center"><strong>Harga Satuan </strong></th>
<th align="center"><strong>Jumlah Terjual </strong></th>
<th align="center"><strong>Total </strong></th>
</tr>
<?php
$ambildata= $koneksi->query("SELECT * FROM pembelian JOIN pembelian_produk ON pembelian.id_pembelian = pembelian_produk.id_pembelian JOIN produk ON pembelian_produk.id_produk=produk.id_produk"); 
while($cetakdata= $ambildata->fetch_array()){?>
<tr>
<td><?php $cetakdata['tanggal_pembelian']?></td>
<td><?php $cetakdata['nama_produk']?></td>
<td><?php $cetakdata['harga_produk']?></td>
<td><?php $cetakdata['jumlah']?></td>
<td><?php $cetakdata['harga_produk']*$cetakdata['jumlah']?></td>
</tr>
<?php } ?>
</table>
