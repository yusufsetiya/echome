<h2>Tambah Kota </h2>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kota</label>
		<input type="text" class="form-control" name="kota" autocomplete="off">
	</div>
	<div class="form-group">
		<label>Tarif Ongkir</label>
		<input type="text" class="form-control" name="tarif" autocomplete="off">
	</div>
	<button type="submit" class="btn btn-primary" name="save"><i class="fa fa-save"></i> Simpan</button>
</form>

<?php 
if (isset($_POST['save'])) {

	
	$id=$_GET['id'];
	$kota = $_POST['kota'];
	$tarif = $_POST['tarif'];

	mysqli_query($koneksi , "INSERT INTO kota (nm_kota,tarif,id_prov)
		VALUES ('$kota','$tarif','$id')" );


	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=ongkir'>";
}

 ?>