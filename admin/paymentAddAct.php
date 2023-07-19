<?php
include "../lib/koneksi.php";
$nama = $_POST['nama'];
$biaya = $_POST['biaya'];

$sql = "INSERT INTO metode_pembayaran (nama,biaya)
VALUES ('$nama','$biaya')";
if (mysqli_query($link, $sql)) {
    header("location:payment.php");
}
