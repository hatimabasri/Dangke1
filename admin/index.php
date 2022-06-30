<?php
session_start();
//koneksi ke databdase
$koneksi = new mysqli("localhost","root","","dbstartup");

if(!isset($_SESSION['user']) && !isset($_SESSION['pass']) ){
  echo "<script> alert('Anda Harus Login Dulu'); </script>";
  echo "<script>location='login.php';</script>";

}
 ?>
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dangke-Ku</title>
    <link rel="icon" href="../icon.png">
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <p class="navbar-brand" href="index.html">Welcome <?php echo $_SESSION['user'] ?></p>
            </div>
  <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
<!-- <a href="login.html" class="btn btn-danger square-btn-adjust">Logout</a> -->
 </div>
        </nav>
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				              
      <li class="text-center"> <img src="assets/img/find_user.png" class="user-image img-responsive"/> 
      </li>

					      
      <li><a href="index.php"><i class="fa fa-home fa-2x"></i> Home</a></li>
                
      <li><a href="index.php?halaman=produk"><i class="fa fa-bar-chart fa-2x"></i> 
        Produk</a> </li>
        
      <li><a href="index.php?halaman=pelanggan"><i class="fa fa-users fa-2x"></i> 
        Pelanggan</a></li>
      <li class="sub-menu"><a href="index.php?halaman=pembelian"><i class="fa fa-tasks fa-2x"></i> 
        <span>Data Pembelian<span style="padding-left:80px;"><i class="fa fa-angle-down"></i></span></span></a> 
        <ul class="sub">
          <li><a  href="index.php?halaman=pembelian"></i> Pembelian</a></li>
          <li><a  href="index.php?halaman=beliselesai"></i> Diterima</a></li>
        </ul>
      </li>
              
      <!--<li><a href="index.php?halaman=laporan"><i class="fa fa-desktop"></i> Laporan</a></li>-->
                
      <li><a href="index.php?halaman=logout"><i class="fa fa-sign-out fa-2x"></i> 
        Logout</a></li>

                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
              <?php
              if (isset($_GET['halaman'])) {
                if ($_GET['halaman']=="produk") {
                  include 'produk.php';
                }
                 elseif ($_GET['halaman']=="pembelian"){
                  include 'pembelian.php';
                }
                elseif ($_GET['halaman']=="pelanggan"){
                  include 'pelanggan.php';
                }
                elseif ($_GET['halaman']=="detail") {
                  include 'detail.php';
                }
                elseif ($_GET['halaman']=="tambahproduk") {
                  include 'tambahproduk.php';
                }
                elseif ($_GET['halaman']=="hapusproduk") {
                  include 'hapusproduk.php';
                }
                elseif ($_GET['halaman']=="ubahproduk") {
                  include 'ubahproduk.php';
                }
				elseif ($_GET['halaman']=="laporan") {
                  include 'laporan.php';
                }
                elseif ($_GET['halaman']=="logout") {
                  include 'logout.php';
                }
                elseif ($_GET['halaman']=="hapuspembelian") {
                  include 'hapuspembelian.php';
                }
                elseif ($_GET['halaman']=="konfirmasipembelian") {
                  include 'konfirmasipembelian.php';
                }
				 elseif ($_GET['halaman']=="beliselesai") {
                  include 'beliselesai.php';
                }
                elseif ($_GET['halaman']=="hapuspelanggan") {
                  include 'hapuspelanggan.php';
                }
              }else
               {
                include 'home.php';
              }
              ?>
                 <!-- /. ROW  -->
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
