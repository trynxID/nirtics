<?php
include "../lib/koneksi.php";
$id_event = $_POST['id'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$lokasi = $_POST['lokasi'];
$status = $_POST['status'];
$provinsi = $_POST['provinsi'];
$id_kategori = $_POST['kategori'];

$gambar = $_FILES['gambar']['name'];
$target_dir = "../assets/";
$target_file = $target_dir . basename($gambar);
$uploadOk = 1;
if ($uploadOk == 1) {
	move_uploaded_file($_FILES['gambar']['tmp_name'], $target_dir . $gambar);
}
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if (isset($_POST["submit"])) {
	$check = getimagesize($_FILES["gambar"]["tmp_name"]);
	if ($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}
}
if (
	$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif"
) {
	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
}

// Qury update data
$sql = "UPDATE event SET id_kategori='$id_kategori', nama='$nama', deskripsi='$deskripsi', tanggal='$tanggal', jam='$jam', lokasi='$lokasi', status='$status', provinsi='$provinsi', gambar='$gambar' where id_event='$id_event'";
if (mysqli_query($link, $sql)) {
	header("location:event.php");
}
