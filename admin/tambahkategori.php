<h2>Tambah Produk</h2>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Kategori</label>
		<input type="text" class="form-control" name="kategori" autocomplete="off">
	</div>
	<button class="btn btn-primary" name="save"><i class="fa fa-save"></i> Simpan</button>
</form>

<?php 
if (isset($_POST['save'])) {
	
	$koneksi->query("INSERT INTO tb_kategori (kategori)
		VALUES ('$_POST[kategori]')");

	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kategori'>";
}

 ?>