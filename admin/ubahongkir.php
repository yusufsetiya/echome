<h2>Edit Ongkir</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM kota WHERE id_kota='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
 ?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kota</label>
		<input type="text" class="form-control" name="kota" value="<?php echo $pecah['nm_kota'];?>" autocomplete="off">
	</div>
	<div class="form-group">
		<label>Tarif Ongkir</label>
		<input type="text" class="form-control" name="tarif" value="<?php echo $pecah['tarif'];?>" autocomplete=>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
if (isset($_POST['ubah'])) {
	
	$koneksi->query("UPDATE kota SET nm_kota='$_POST[kota]',tarif='$_POST[tarif]' WHERE id_kota='$_GET[id]'
		");

	header('Location: ' . $_SERVER['HTTP_REFERER']);
}

 ?>