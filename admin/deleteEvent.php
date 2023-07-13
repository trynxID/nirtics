<?php
session_start();
$id = $_SESSION['id'];
if (!empty($_SESSION['status'])) {
    include "../lib/koneksi.php";
    $id_event = $_GET['id_event'];
    $sql = "DELETE FROM event WHERE id_event = '$id_event'";
    $result = mysqli_query($link, $sql);
    if ($result) {
        header('Location: event.php');
        exit();
    } else {
        echo "Failed to delete event.";
    }
} else {
    header('Location: ../login.php');
}
