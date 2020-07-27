<?php 
$conn = mysqli_connect('localhost', 'root', '', 'galeryphoto');
function registrasi($data){
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data ["password"]);
	$password2 = mysqli_real_escape_string($conn, $data ["password2"]);

	//username sudah ada atau blm
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if(mysqli_fetch_assoc($result)) {
		echo "<script>
			alert('username sudah terdaftar');
		</script>";
		return false;
	}

	if ($password !== $password2) {
		echo "<script>
			alert('passwornya beda');
		</script>";
		return false;
	}

	//enskripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	
	//tambah userbaru
	mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");

	return mysqli_affected_rows($conn);
	
}
?>