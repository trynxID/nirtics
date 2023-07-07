<?php
include "../lib/koneksi.php";
session_start();
$qty = $_POST['qty'];
$event = $_SESSION['event'];
$harga = $_SESSION['harga'];
$total = $harga * $qty;
if ($qty == 0) {
    $_SESSION['event'] = $event;
    header('location: desc.php');
} else {
    $sql = "INSERT INTO detail_transaksi (id_event,qty,total) VALUES ('$event','$qty','$total')";
    if (mysqli_query($link, $sql)) {
        $result = mysqli_query($link, "SELECT id_detail as id FROM detail_transaksi order by id_detail desc limit 1");
        $detail = mysqli_fetch_assoc($result);
        $_SESSION['detail'] = $detail['id'];
        header("location:detail.php");
    } else {
        header("location:index.php");
    }
}
