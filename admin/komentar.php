<?php 
include "koneksi.php"
 ?>
<h2>Komentar</h2>
<hr><br>

<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>ID Produk</th>
				<th>Username</th>
				<th>Email</th>
				<th>Komentar</th>
				<th>Tanggal</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $nomor=1; ?>
			<?php $ambil=$koneksi->query("SELECT * FROM tb_komentar"); ?>
			<?php while($pecah=$ambil->fetch_assoc()){ ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['id_produk']; ?></td>
				<td><?php echo $pecah['nama']; ?></td>
				<td><?php echo $pecah['email']; ?></td>
				<td><?php echo $pecah['komentar']; ?></td>
				<td><?php echo $pecah['tanggal']; ?></td>
				<td>
					<a href="index.php?halaman=hapuskomen&id=<?php echo $pecah['id_komentar'];?>" class="btn-danger btn" onclick="return confirm('apakah anda yakin ?')"><i class="fa fa-trash"></i> Hapus</a>
				</td>
			</tr>
			<?php $nomor++; ?>
			<?php } ?>
		</tbody>
	</table>
</div>