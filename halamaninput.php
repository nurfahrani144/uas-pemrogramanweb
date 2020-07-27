<?php 
session_start();
if (!isset($_SESSION ["login"])) {
	header("location: login.php");
	exit;
}
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>halaman input</title>
	<link rel="stylesheet" type="text/css" href="styles/stylegalery.css">

</head>
<body>

	<header>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="halamaninput.php">Tambah Foto</a></li>
			<li><a href="logout.php">logout</a></li>
		</ul>
	</header>

	<form action="" method="post" enctype="multipart/form-data">
		Masukan Nama Foto : <br>
		<input type="text" name="nama" placeholder="nama"><br><br>
		Tambahkan File Foto : <br>
		<input type="file" name="foto"><br><br>
		Masukan Keterangan Foto : <br>
		<input type="text" name="keterangan" placeholder="keterangan"><br><br>
		<input type="submit" name="simpan" value="tambahkan foto"><br>
	</form>
	<?php 
	/* if jika isset simpan/tombol simpan di tekan maka lakukan insertdata*/
	if (isset($_POST['simpan'])) { 
		/*script pindah file akn ke folder foto*/
		$folder = './foto/';
		$name_f = $_FILES['foto']['name'];
		$rename = date('Hs').$name_f;
		$sumber_f = $_FILES['foto']['tmp_name'];
		/*script pindah file*/
		move_uploaded_file($sumber_f, $folder.$rename);
		$insert = mysqli_query($conn, "INSERT INTO galery VALUES (NULL, '".$_POST['nama']."', '".$rename."', '".$_POST['keterangan']."', NULL) ");

		if($insert){
			echo"<script>
					alert ('Data Berhasil Disimpan');
				</script>";
		}else{
			echo"<script>
					alert ('Data Gagal Disimpan');
				</script>";
		}
	}
	?>


</body>
</html>