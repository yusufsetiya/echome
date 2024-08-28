<?php 
include "koneksi.php";
 ?>
<h2>Manage Kategori</h2>
<hr>

<a href="index.php?halaman=tambahkategori" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kategori</a><br><br>
<table class="table table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Kategori</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM tb_kategori"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['kategori']; ?></td>
			<td>
				<a href="index.php?halaman=ubahkategori&id=<?php echo $pecah['id_kategori'];?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
				<a href="index.php?halaman=hapuskategori&id=<?php echo $pecah['id_kategori'];?>" class="btn-danger btn" onclick="return confirm('apakah anda yakin ?')"><i class="fa fa-trash"></i> Hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
