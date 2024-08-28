<h2>Tambah Tujuan Ongkir</h2>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Provinsi</label>
		<input type="text" class="form-control" name="provinsi" autocomplete="off">
	</div>
	<button type="submit" class="btn btn-primary" name="save"><i class="fa fa-save"></i> Simpan</button>
</form>

<?php 
if (isset($_POST['save'])) {
	
	$prov=$_POST['provinsi'];
	mysqli_query($koneksi , "INSERT INTO tb_ongkir (nama_prov)
		VALUES ('$prov')");

	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=ongkir'>";
}

 ?>