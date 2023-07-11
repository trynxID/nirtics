<?php
include "../lib/koneksi.php";
$kategori = $_GET['name'];
if (isset($kategori)) {
    $sql = "SELECT id_event,gambar,event.nama as nama,tanggal, harga, kategori.nama as kat FROM event LEFT JOIN tiket USING (id_tiket) LEFT JOIN kategori USING(id_kategori) where status='ready' and kategori='$kategori' order by nama asc limit 12 ;";
} else {
    $sql = "SELECT id_event,gambar,event.nama as nama,tanggal, harga, kategori.nama as kat FROM event LEFT JOIN tiket USING (id_tiket) LEFT JOIN kategori USING(id_kategori) where status='ready' order by nama asc limit 12 ;";
}
header('Location: index.php');
