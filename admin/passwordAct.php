<?php
session_start();
$id = $_SESSION['id'];
include "../lib/koneksi.php";
$oldpass = $_POST['oldpass'];
$newpass = $_POST['newpass'];
$renewpass = $_POST['renewpass'];
if ($newpass === $renewpass) {
} else {
    $message = "New Password and Re-type New Password doesn't match!";
    echo "
    <script type='text/javascript'>
    alert('$message')
    window.location.replace('password.php')
    </script>";
}
