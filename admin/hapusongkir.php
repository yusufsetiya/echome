<?php 
include 'koneksi.php';
$ambil=$koneksi->query("SELECT * FROM tb_ongkir WHERE id_prov='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM tb_ongkir WHERE id_prov='$_GET[id]'");
$koneksi->query("DELETE FROM kota WHERE id_prov='$_GET[id]'");

header('Location: ' . $_SERVER['HTTP_REFERER']);
 ?>