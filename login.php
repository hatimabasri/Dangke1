<?php
session_start();
include 'koneksi.php';
// jika tombol login ditekan
if (isset($_POST["login"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  // lakukan query pengecekan akun dalam database
  $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'
                            AND password_pelanggan='$password'");

  // hitung akun yang terambil
  $akuncocok = $ambil->num_rows;

  if ($akuncocok==1) {
    $akun = $ambil->fetch_assoc();
    $_SESSION["pelanggan"] = $akun;
    echo "<script> alert('Anda Sukses Login'); </script>";
    echo "<script>location='index.php';</script>";
  }
  else {
    echo "<script> alert('Anda Gagal Login'); </script>";
    echo "<script>location='login.php';</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dangke-Ku</title>
	<link rel="icon" href="icon.png">
  <!-- Bootstrap core CSS -->
  <link href="./vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="./css/shop-homepage.css" rel="stylesheet">

	<style media="screen">
	[ Button ]*/
	.container-login100-form-btn {
	  width: 100%;
	  display: -webkit-box;
	  display: -webkit-flex;
	  display: -moz-box;
	  display: -ms-flexbox;
	  display: flex;
	  flex-wrap: wrap;
	}

	.buttonlogin1 {
	  font-family: Raleway-Bold;
	  font-size: 16px;
	  color: #fff;
	  line-height: 1.2;

	  display: -webkit-box;
	  display: -webkit-flex;
	  display: -moz-box;
	  display: -ms-flexbox;
	  display: flex;
	  justify-content: center;
	  align-items: center;
	  padding: 0 20px;
	  min-width: 150px;
	  height: 55px;
	  background-color: grey;
	  border-radius: 27px;

	  -webkit-transition: all 0.4s;
	  -o-transition: all 0.4s;
	  -moz-transition: all 0.4s;
	  transition: all 0.4s;
	}

	.buttonlogin1:hover {
		background-image: linear-gradient(to right, #4040bf, #13c1ec);
	}
	</style>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./admin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="./admin/css/util.css">
	<link rel="stylesheet" type="text/css" href="./admin/css/main.css">
<!--===============================================================================================-->
</head>
<body>

<?php include 'navbar.php'; ?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form action="login.php" method="post" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-32">
						Login Pelanggan
					</span>

					<span class="txt1 p-b-11">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="email" name="email" >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<input class="input100" type="password" name="password" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class=" button buttonlogin1" name="login">Login</button>
					</div>

				</form>
			</div>
		</div>
	</div>

</body>
</html>
