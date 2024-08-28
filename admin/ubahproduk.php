<h2>Ubah Produk</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM tb_barang WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
 ?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_produk'];?>">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga_produk'];?>">
	</div>
	<div class="form-group">
		<img src="../foto_produk/<?php echo $pecah['foto']?>" width="200">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control" value="../foto_produk/<?php echo $pecah['foto']?>">
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" class="form-control" name="stok" value="<?php echo $pecah['stok'];?>" min="1">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"><?php echo $pecah['deskripsi'];?></textarea>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
if (isset($_POST['ubah'])) 
{
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto=$_FILES['foto']['tmp_name'];
	if (!empty ($lokasifoto)) 
	{
		move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

		$koneksi->query("UPDATE  tb_barang SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',foto='$namafoto',deskripsi='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
	}
	else{
		$koneksi->query("UPDATE  tb_barang SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',deskripsi='$_POST[deskripsi]',stok='$_POST[stok]' WHERE id_produk='$_GET[id]'");	
	}
	echo "<script>alert('Data Produk Telah Diubah');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
}
 ?>