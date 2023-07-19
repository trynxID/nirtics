<?php
session_start();
$id = $_SESSION['id'];
if (!empty($_SESSION['status'])) {
    include "../lib/koneksi.php";
    $id_user = $_GET['id_user'];
    $sql = "DELETE FROM user WHERE id_user = '$id_user'";
    $result = mysqli_query($link, $sql);
    if ($result) {
        header('Location: user.php');
        exit();
    } else {
        echo "Failed to delete user.";
    }
} else {
    header('Location: ../login.php');
}
