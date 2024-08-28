<h2>Edit Kategori</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM tb_kategori WHERE id_kategori='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
 ?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Kategori</label>
		<input type="text" class="form-control" name="kategori" value="<?php echo $pecah['kategori'];?>" autocomplete="off">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
if (isset($_POST['ubah'])) {
	$ambil=$koneksi->query("SELECT * FROM tb_kategori WHERE id_kategori='$_GET[id]'");
	$pecah=$ambil->fetch_assoc();
	$kategori=$pecah['kategori'];
	
	$koneksi->query("UPDATE tb_kategori SET kategori='$_POST[kategori]' WHERE id_kategori='$_GET[id]'
		");
	$koneksi->query("UPDATE tb_barang SET kategori='$_POST[kategori]' WHERE kategori='$kategori'
		");

	echo "<script>location='index.php?halaman=kategori';</script>";
}

 ?>