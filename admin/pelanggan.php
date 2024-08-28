<?php 
include "koneksi.php"
 ?>
<h2>Pelanggan</h2>
<hr><br>

<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Level</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $nomor=1; ?>
			<?php $ambil=$koneksi->query("SELECT * FROM tb_user WHERE level!='admin'"); ?>
			<?php while($pecah=$ambil->fetch_assoc()){ ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['username']; ?></td>
				<td><?php echo $pecah['email']; ?></td>
				<td><?php echo $pecah['level']; ?></td>
				<td>
					<a href="index.php?halaman=detail_user&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn btn-info">Detail</a>
					<a href="index.php?halaman=hapususer&id=<?php echo $pecah['id_pelanggan'];?>" class="btn-danger btn" onclick="return confirm('apakah anda yakin ?')">Hapus</a>
				</td>
			</tr>
			<?php $nomor++; ?>
			<?php } ?>
		</tbody>
	</table>
</div>