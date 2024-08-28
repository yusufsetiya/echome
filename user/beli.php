<?php 
session_start();
include "koneksi.php";
//mendapatkan id produk url
$id_produk=$_GET['id'];
$ambil=$koneksi->query("SELECT * FROM tb_barang WHERE id_produk='$id_produk'");
$pecah=$ambil->fetch_assoc();
$stok=$pecah['stok'];

//jk sdh ad di cart ,maka jumlah +1
if (empty($stok)) {
		echo "<script>alert('produk habis');</script>";
		echo "<script>location='index.php';</script>";
	}
	else{
		if (isset($_SESSION['keranjang'][$id_produk]))
{
	$_SESSION['keranjang'][$id_produk]+=1;
}
//selain itu produk dibeli 1
else
{
	$_SESSION['keranjang'][$id_produk]=1; 
}

echo "<script>alert('Produk Telah Masuk Cart');</script>";
echo "<script>location='keranjang.php';</script>";
	}

?>
