
<?php 
include 'koneksi.php';
$ambil=$koneksi->query("SELECT * FROM tb_komentar WHERE id_komentar='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM tb_komentar WHERE id_komentar='$_GET[id]'");

header('Location: ' . $_SERVER['HTTP_REFERER']);
 ?>