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

$tiketId = $post['tiketId'];
$data = [];
$no = 0;
foreach ($tiketId as $key => $value) {
    $sql = mysqli_query($link, "SELECT * FROM tiket where id_tiket=$value");
    $getData = mysqli_fetch_assoc($sql);
    if ($post['qty'][$no] > 0) {
        $data[] = [
            'tiketId' => $value,
            'tiket' => $getData['nama'],
            'harga' => $getData['harga'],
            'qty' => $post['qty'][$no],
        ];
    }
    $no++;
}
$response = [
    'code' => 200,
    'tiket' => $data,
    'message' => "Success",
];
echo json_encode($response);
