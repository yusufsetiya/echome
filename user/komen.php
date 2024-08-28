<?php
session_start();
include "koneksi.php";
$id=$_GET['id'];
$tanggal=date("Y-m-d");
$id_pelanggan=$_SESSION['pelanggan']['id_pelanggan'];
$ambil=$koneksi->query("SELECT * FROM tb_user WHERE id_pelanggan='$id_pelanggan' ");
$pecah=$ambil->fetch_assoc();
$foto=$pecah['foto'];
$id_pelanggan=$pecah['id_pelanggan'];

if (isset($_POST['submit']))
{ 
	
	$koneksi->query("INSERT INTO tb_komentar (id_komentar,id_produk,nama,email,komentar,tanggal,foto,id_pelanggan) 
		VALUES ('','$id','$_POST[nama]','$_POST[email]','$_POST[komentar]','$tanggal','$foto','$id_pelanggan')");

	//$id_komen=$koneksi->insert_id;

	//$koneksi->query("INSERT INTO tb_user (id_komentar) VALUES ('$id_komen')");

	echo "<script>location='single.php?id=$id#komentar'; </script>";
}

 ?>