<?php 
include 'koneksi.php';
$ambil=$koneksi->query("SELECT * FROM kota WHERE id_kota='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM kota WHERE id_kota='$_GET[id]'");

header('Location: ' . $_SERVER['HTTP_REFERER']);
 ?>