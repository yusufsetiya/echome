<?php 
include 'koneksi.php';

$ambil=$koneksi->query("SELECT * FROM tb_kategori WHERE id_kategori='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
$kategori=$pecah['kategori'];

$koneksi->query("DELETE FROM tb_kategori WHERE id_kategori='$_GET[id]'");
$koneksi->query("DELETE FROM tb_barang WHERE kategori='$kategori'");

header('Location: ' . $_SERVER['HTTP_REFERER']);
 ?>