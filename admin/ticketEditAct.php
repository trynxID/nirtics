<?php
include "../lib/koneksi.php";
$id_event = $_POST['id_event'];
$id_tiket = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$sql = "UPDATE tiket SET nama='$nama', harga='$harga', stok='$stok' where id_tiket='$id_tiket'";
if (mysqli_query($link, $sql)) {
	header("location:ticket.php?id_event=" . $id_event);
}
