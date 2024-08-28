<?php 
$ambil=$koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM pembelian WHERE id_pembelian='$_GET[id]'");
$koneksi->query("DELETE FROM pembelian_produk WHERE id_pembelian='$_GET[id]'");
$koneksi->query("DELETE FROM tb_pembayaran WHERE id_pembelian='$_GET[id]'");

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>