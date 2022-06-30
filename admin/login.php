<?php

$koneksi = new mysqli("localhost","root","","dbstartup");
session_start();

if(isset($_POST['login'])){
	$user  = $_POST['user'];
	$pass  = $_POST['pass'];
	$query = "SELECT * FROM admin WHERE username ='$user' AND password ='$pass'";

	$execute	= mysqli_query($koneksi, $query);
	$cek        = mysqli_num_rows($execute);
	$userlogin  = mysqli_fetch_assoc($execute);
	$username   = $userlogin['username'];
	$password   = $userlogin['password'];
	if($cek=1){
		if($username==$user && $password==$pass){
			$_SESSION['user'] = $username;
			$_SESSION['pass'] = $password;
			echo "<meta http-equiv='refresh' content='1;url=index.php?'>";
		}else{
			echo '<script> alert("Anda Tidak Diperbolehkan Login");</script>';
		}
	}else {
		echo '<script>alert ("Anda Tidak Bisa Login");
		window.history.back();</script>';
	}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Admin</title>
	<link rel="icon" href="../icon.png">

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
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form action="login.php" method="post" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-32">
						Admin Login
					</span>

					<span class="txt1 p-b-11">
						Username
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="user" >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" >
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
