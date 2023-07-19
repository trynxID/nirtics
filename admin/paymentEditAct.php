<?php
include "../lib/koneksi.php";
$id_metode = $_POST['id'];
$nama = $_POST['nama'];
$biaya = $_POST['biaya'];

$sql = "UPDATE metode_pembayaran SET nama='$nama', biaya='$biaya' where id_metode='$id_metode'";
if (mysqli_query($link, $sql)) {
	header("location:payment.php");
}
