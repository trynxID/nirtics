<?php
include "../lib/koneksi.php";
$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$sql = "INSERT INTO tiket (id_event, nama, harga, stok)
VALUES ('$id', '$nama', '$harga', '$stok')";
if (mysqli_query($link, $sql)) {
    header("location:ticket.php?id_event=" . $id);
}
