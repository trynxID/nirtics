<?php
include "../lib/koneksi.php";
$post = $_POST;
if (empty($post)) {
    header("Location: desc.php");
}
session_start();
$ses_id = $_SESSION['id'];
$sqlCreateTransaksi = mysqli_query($link, "INSERT INTO transaksi (id_user,status) values ($ses_id,'MENUNGGU')");
$sqlReqID = mysqli_query($link, "SELECT MAX(id_transaksi) as id_transaksi from transaksi");
$ReqID = mysqli_fetch_assoc($sqlReqID);
$id_transaksi = $ReqID['id_transaksi'];
$id_tikets = $_POST['tiketId'];
$qtys = $_POST['qty'];
$totals = $_POST['total'];
foreach ($id_tikets as $key => $id_tiket) {
    $qty = $qtys[$key];
    $total = $totals[$key];
    $sql = "INSERT INTO detail_transaksi (id_tiket,id_transaksi,qty,subtotal) VALUES ('$id_tiket','$id_transaksi','$qty','$total')";
    if (mysqli_query($link, $sql)) {
        $_SESSION['transaksi'] = $id_transaksi;
        header("location:detail.php");
    } else {
        header("location:index.php");
    }
}
