<form method="post" class="form-control">
<div class="form-group">
<input type="date" name="tanggal" class="form-control"> S.D
<input type="date" name="tanggal1" class="form-control"></div>
<button class="btn btn-primary" name="tampil">Tampilkan</button>
</form><br><br><br><br><br><br>
if (isset($_POST['tampil'])) {
$tanggal = $_GET['tanggal'];
$tanggal1 = $_GET['tanggal1'];
WHERE tanggal_pembelian >= '$tanggal' AND tanggal_pembelian <= '$tanggal1'
$cekdata=mysqli_num_rows($ambildata);
if($cekdata=='0'){
echo "Maaf Data Yang anda cari tidak ada";
}
<?php } ?>