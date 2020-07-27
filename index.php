<?php  
session_start();
if (!isset($_SESSION ["login"])) {
	header("location: login.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>beranda</title>
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

	<?php 
	include 'koneksi.php';
	$galery= mysqli_query($conn, "SELECT * FROM galery");
	while ($hasil = mysqli_fetch_array($galery)) {		
	?>
	<div class="kotak">
		
		<?php echo $hasil['nama_foto'] ; ?>
		<?php echo "<br><br>";  ?>
		<img src="foto/<?php echo $hasil['foto']; ?> ">
		
		<?php echo "<br>";  ?>
		<?php echo $hasil['keterangan'] ; ?>
		<br>
		
		<a href="edit.php?id=<?php echo$hasil['id_foto'] ?>">edit</a>
		<a href="hapus.php?id=<?php echo$hasil['id_foto'] ?>">hapus</a>
		
	</div>

	<?php } ?>

</body>
</html>