<?php
include "../lib/koneksi.php";
session_start();
$transaksi = $_SESSION['transaksi'];
$id_metode = $_POST['id_metode'];
$total = $_POST['total'] + $_POST['biayaadmin'];
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("Y-m-d H:i:s", time());
$status = 'SUKSES';
$pushUpdateData = "UPDATE transaksi SET id_metode='$id_metode',tanggal='$tanggal',total='$total',status='$status' where id_transaksi='$transaksi'";
if (mysqli_query($link, $pushUpdateData)) {
    $sql = "select";
    header("location: mytiket.php");
} else {
    header("location: index.php");
}
