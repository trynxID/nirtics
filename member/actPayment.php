<?php
include "../lib/koneksi.php";
$post = $_POST;
if (empty($post)) {
    $response = [
        'code' => 400,
        'message' => "Error",
    ];
    echo json_encode($response);
    return;
}

$sql = mysqli_query($link, "SELECT * FROM metode_pembayaran where id_metode=" . $post['id']);
$getData = mysqli_fetch_assoc($sql);
$response = [
    'code' => 200,
    'id_metode' => $getData['id_metode'],
    'metode' => $getData['nama'],
    'biaya' => $getData['biaya'],
    'total' => $post['subtotal'],
    'biaya_currency' => number_format($getData['biaya'], 0, ',', '.'),
    'total_currency' => number_format($post['subtotal'] + $getData['biaya'], 0, ',', '.'),
    'message' => "Success",
];
echo json_encode($response);
