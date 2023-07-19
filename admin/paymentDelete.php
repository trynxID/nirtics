<?php
session_start();
$id = $_SESSION['id'];
if (!empty($_SESSION['status'])) {
    include "../lib/koneksi.php";
    $id_metode = $_GET['id_metode'];
    $sql = "DELETE FROM metode_pembayaran WHERE id_metode = '$id_metode'";
    $result = mysqli_query($link, $sql);
    if ($result) {
        header('Location: payment.php');
        exit();
    } else {
        echo "Failed to delete payment.";
    }
} else {
    header('Location: ../login.php');
}
