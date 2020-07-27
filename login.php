<?php
session_start();
if(isset($_SESSION["login"])){
	header("location: index.php");
	exit;
}
include 'koneksi.php';
if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	
	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
	//cek username
	if(mysqli_num_rows($result) === 1){
		//cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"]) ){
			//set session
			$_SESSION["login"] = true;
			header("location: index.php");
			exit;
		}
	}

	$error = true;
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>halaman login</title>
	<link rel="stylesheet" type="text/css" href="styles/stylegalery.css">
</head>
<body>
<center><h1>halaman login</h1></center>
<?php  if(isset($error) ): ?>
	<p style="color: red; font-style: italic;">anda belum punyaakun(belum registrasi)</p>
<?php endif; ?>
<div class="bg">
	<form action="" method="post">
		<ul>
			<li>
				<label for="username">Username</label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">Password</label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<br><br>
				<button type="submit" name="login">Login</button>
			</li>
			<li>
				andan belum registrasi(belum punya akun)?
				<li><a href="regis.php">Registrasi</a></li>
			</li>
		</ul>
	</form>
</div>
</body>
</html>