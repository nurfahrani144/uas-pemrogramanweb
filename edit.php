<?php
session_start();
if (!isset($_SESSION ["login"])) {
	header("location: login.php");
	exit;
} 
include 'koneksi.php';
/*menampilkan data sesuai id yg dikirimkan*/
$id_foto = $_GET ["id"];
$data = mysqli_query($conn, "SELECT * FROM galery WHERE id_foto = '$id_foto'");
/*memanggil setiap array da;am adtabase*/
$ra = mysqli_fetch_array($data);
$nama_foto = $ra['nama_foto'];
$file = $ra['foto'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>halaman edit data</title>
	<link rel="stylesheet" type="text/css" href="styles/stylegalery.css">

</head>
<body>
	<header>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="halamaninput.php">Tambah Foto</a></li>
			
		</ul>
	</header>
	<form action="" method="post" enctype="multipart/form-data">
		Masukan Nama Foto : <br>
		<input type="text" name="nama" placeholder="nama" value="<?php echo $nama_foto ?>"><br><br>
		Tambahkan File Foto : <br>
		<input type="file" name="foto"><br><br>
		<input type="hidden" name="img" value="<?php echo $file ?>">
		<img src="foto/<?php echo $file ?>" width="100px" height="100px"><br>
		Masukan Keterangan Foto : <br>
		<input type="text" name="keterangan" placeholder="keterangan"><br><br>
		<input type="submit" name="kirim" value="update"><br>
	</form>
	<?php 
	/* if jika isset simpan/tombol simpan di tekan maka lakukan insertdata*/
	if (isset($_POST['simpan'])) { 
		/*script pindah file akn ke folder foto*/
		$folder = './foto/';
		
		$name_f = $_FILES['foto']['name'];
		$rename = date('Hs').$name_f;
		$sumber_f = $_FILES['foto']['tmp_name'];
		/*script update file*/
		 
		if ($name != ''){
			move_uploaded_file($sumber_f, $folder.$rename );
			$update = mysqli_query($conn, "UPDATE galery SET nama_foto = '".$name."',
				foto = '".$name_f."',
				keterangan = '".$name_f."'
				WHERE id_foto = '$id_foto'
			 ");
			if($update){
				echo "berhasil";
			}else {
				echo "gagal";
			}
		}else{
			$update = mysqli_query($conn, "UPDATE galery SET nama_foto = '".$name."'
				WHERE id_foto = '$id_foto'
			 ");
			if($update){
				echo"<script>
					alert ('Data Berhasil Diubah');
				</script>";
			}else {
				echo"<script>
					alert ('Data Gagal Diubah');
				</script>";
			}
		}


	}
	?>


</body>
</html>