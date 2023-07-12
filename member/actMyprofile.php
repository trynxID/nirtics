<?php
include "../lib/koneksi.php";
// Get data form
session_start();
$id = $_SESSION['id'];
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$foto = $_FILES['foto']['name'];
$sql = "UPDATE user SET fullname='$fullname', username='$username', no_hp='$no_hp', email='$email', foto='$foto' where id_user='$id'";
if (mysqli_query($link, $sql)) {
	header("location: index.php");
}
