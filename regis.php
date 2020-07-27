<?php 
include 'koneksi.php';

if(isset($_POST["register"])){
	if (registrasi($_POST)  > 0) {
		echo "<script>
			alert('user berhasil ditambahkan');
		</script>";
	}else{
		echo mysqli_error($conn);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>halaman registrasi</title>

	<link rel="stylesheet" type="text/css" href="styles/stylegalery.css">

<body>
	<br><br><br>
	<center>
		<h1>halaman registrasi</h1>
	</center>
	
	<div class="bg">
	
		<form action="" method="post">
			<ul>
			<li>
				<label for="username">username : </label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">password : </label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<label for="password2">konfirmasi password : </label>
				<input type="password" name="password2" id="password2">
			</li>
			<li>
				<br><br>
				<button type="submit" name="register">register</button>
			</li>
			<li>
				<li><a href="login.php">Login</a></li>
			</li>
			</ul>
		</form>
		
	
	</div>
</body>
</html>