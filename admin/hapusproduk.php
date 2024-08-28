<?php 
$ambil=$koneksi->query("SELECT * FROM tb_barang WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
$fotoproduk= $pecah['foto'];
if (file_exists("../foto_produk/$fotoproduk"))
{

	unlink("../foto_produk/$fotoproduk");
}

$koneksi->query("DELETE FROM tb_barang WHERE id_produk='$_GET[id]'");
$koneksi->query("DELETE FROM tb_komentar WHERE id_produk='$_GET[id]'");

echo "<script>location='index.php?halaman=produk';</script>";
?>