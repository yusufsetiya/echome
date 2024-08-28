<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" autocomplete="off" required>
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga" min="1" required>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto" required>
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" class="form-control" name="stok" min="1" required>
	</div>
	<div class="form-group">
		 <select class="form-control" name="kategori" required>
            <option value="">Pilih Kategori</option>
                 <?php 
                    $ambil= $koneksi->query("SELECT * FROM tb_kategori");  
                     while($kategori = $ambil->fetch_assoc()){
                 ?>
                 <option value="<?php echo $kategori['kategori'] ?>">
               		 <?php echo $kategori['kategori'] ?>
                 </option>
                 <?php } ?>
        </select>
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10" required></textarea>
	</div>
	<button class="btn btn-primary" name="save"><i class="fa fa-save"></i> Simpan</button>
</form>
<?php 
if(isset($_POST['save'])){
	$ekstensi_diperbolehkan	= array('png','jpg');
	$nama = $_FILES['foto']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['foto']['size'];
	$file_tmp = $_FILES['foto']['tmp_name'];	
 
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran < 1044070){			
				move_uploaded_file($file_tmp, "../foto_produk/".$nama);
				$query=$koneksi->query("INSERT INTO tb_barang 
		(nama_produk,harga_produk,foto,stok,kategori,deskripsi) 
		VALUES('$_POST[nama]','$_POST[harga]','$nama','$_POST[stok]','$_POST[kategori]','$_POST[deskripsi]')");
				if($query){
					echo "<div class='alert alert-info'>Data Tersimpan</div>";
					echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
				}else{
					echo "<script>alert('GAGAL MENGUPLOAD GAMBAR');</script>";
				}
			}else{
				echo "<script>alert('UKURAN GAMBAR TERLALU BESAR');</script>";
			}
		}else{
			echo "<script>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN');</script>";
		}
	}


// if (isset($_POST['save'])) {
// 	$nama=$_FILES['foto']['name'];
// 	$lokasi=$_FILES['foto']['tmp_name'];
// 	move_uploaded_file($lokasi, "../foto_produk/".$nama);
	
// 	$koneksi->query("INSERT INTO tb_barang 
// 		(nama_produk,harga_produk,foto,stok,kategori,deskripsi) 
// 		VALUES('$_POST[nama]','$_POST[harga]','$nama','$_POST[stok]','$_POST[kategori]','$_POST[deskripsi]')");
// 	echo "<div class='alert alert-info'>Data Tersimpan</div>";
// 	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
// }
 ?>
