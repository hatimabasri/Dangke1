<h2><center>Konfirmasi Pembayaran</center></h2>
<hr>
<!-- container -->
<div class="container">

  <!-- todo card edit-->
<!-- JOIN bukti ON pembelian.id_pembelian=bukti.id_pembelian-->
    <?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan  WHERE pembelian.id_pembelian='$_GET[id]'");
    $pecah = $ambil->fetch_assoc();
     ?>
	<?php $buk=$koneksi->query("select * from bukti where id_pembelian='$_GET[id]'");
	$bukt = $buk->fetch_array();
	?>
  <div class="row col-lg-8 offset-lg-2" style="margin-top: 70px;">
      <div class="card">
          <div class="card-block">
            <ul class="list-group">
              <li class="list-group-item">ID Pembelian : <b><?php echo $pecah['id_pembelian']; ?></b></li>
              <li class="list-group-item">Nama Pelanggan : <?php echo $pecah['nama_pelanggan']; ?></li>
              <li class="list-group-item">Tanggal Order : <?php echo $pecah['tanggal_pembelian']; ?></li>
              <li class="list-group-item">Total Pembayaran : <?php echo number_format($pecah['total_pembelian']); ?></li>
			  <li class="list-group-item">Bukti Transfer : <img src="../image/bukti/<?php echo $pecah['bukti_bayar']; ?>" width="200px"></li>
            </ul>
            <br>
			
            <form method="post">
			<!--<img src="c:/xampp/htdocs/Dangke/image/bukti/">-->
              <div class="form-group">
                <label for="Status Order" style="margin-left: 15px; margin-right: 10px;"><b>Status Order: </b></label>
                <select class="form-group" name="status">
                  <option hidden > Pilih Status </option>
                  <option value="Tidak Disetujui">Tidak Disetujui</option>
                  <option value="Disetujui">Disetujui</option>
				  <option value="Dikirim">Dikirim</option>
				  <option value="Diterima">Diterima</option>
                </select>
              </div>
              <div class="modal-footer text-lg-center">
                <a class="btn btn-danger" href="index.php?halaman=pembelian">Kembali</a>
                <button class="btn btn-primary" name="konfirmasi">Konfirmasi</button>
              </div>
            </form>
            <?php

            if (isset($_POST['konfirmasi'])) {

              $koneksi = new mysqli("localhost","root","","dbstartup");

              $ambillagi = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$_GET[id]'");
              $pecahlagi = $ambil->fetch_assoc();
              $koneksi->query("UPDATE pembelian SET status_pembelian='$_POST[status]' WHERE id_pembelian='$_GET[id]'");
             echo "<script> alert('Diubah'); </script>";
             echo "<script> location='index.php?halaman=pembelian'; </script>";

           }
             ?>
          </div>
      </div>
  </div>

</div>
<!-- end container -->
