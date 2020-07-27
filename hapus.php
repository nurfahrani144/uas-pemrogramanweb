<?php
session_start();
if (!isset($_SESSION ["login"])) {
	header("location: login.php");
	exit;
}
	include 'koneksi.php';
	$id =$_GET['id'];
	$delete = mysqli_query($conn, "DELETE FROM galery WHERE id_foto = '$id'");
	if($delete) {
		header('location:index.php');

	}else{
		echo "gagal hapus";
	}
 ?> 