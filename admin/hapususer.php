
<?php 
include 'koneksi.php';
$ambil=$koneksi->query("SELECT * FROM tb_user WHERE id_pelanggan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
$fotouser= $pecah['foto'];
if (file_exists("../foto_user/$fotouser"))
{

	unlink("../foto_user/$fotouser");
}

$koneksi->query("DELETE FROM tb_user WHERE id_pelanggan='$_GET[id]'");
$koneksi->query("DELETE FROM tb_komentar WHERE id_pelanggan='$_GET[id]'");

echo "<script>location='index.php?halaman=pelanggan';</script>";
 ?>