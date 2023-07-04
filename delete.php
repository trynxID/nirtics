<?php 
	// Koneksi
	include "koneksi.php";
	// Get ID
	$id = $_GET['id'];
	// Query delete
	$sql = "DELETE from mahasiswa WHERE id='$id'";
	if(mysqli_query($link,$sql)){
		header("Location: tampil_data.php");
	}
 ?>