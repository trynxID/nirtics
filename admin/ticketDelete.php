<?php
session_start();
$id = $_SESSION['id'];
if (!empty($_SESSION['status'])) {
    include "../lib/koneksi.php";
    $id_event = $_GET['id_event'];
    $id_tiket = $_GET['id_tiket'];
    $sql = "DELETE FROM tiket WHERE id_tiket = '$id_tiket'";
    $result = mysqli_query($link, $sql);
    if ($result) {
        header('Location: ticket.php?id_event=' . $id_event);
        exit();
    } else {
        echo "Failed to delete event.";
    }
} else {
    header('Location: ../login.php');
}
