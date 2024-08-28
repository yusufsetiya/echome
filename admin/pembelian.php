<?php include "koneksi.php" ?>
<h2>Pembelian</h2>
<hr><br>

<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pelanggan</th>
				<th>Tanggal</th>
				<th>Total</th>
				<th>Aksi</th>
				
			</tr>
		</thead>
		<tbody>
			<?php $nomor=1; ?>
			<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN tb_user ON pembelian.id_pelanggan=tb_user.id_pelanggan ORDER BY id_pembelian DESC"); ?>
			<?php while($pecah=$ambil->fetch_assoc()){ ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['username'] ?></td>
				<td><?php echo $pecah['tanggal'] ?></td>
				<td>Rp. <?php echo number_format($pecah['total']) ?></td>
				<td>
					<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">Detail</a>
					<a href="index.php?halaman=hapusbeli&id=<?php echo $pecah['id_pembelian'];?>" class="btn-danger btn" onclick="return confirm('apakah anda yakin ?')">Hapus</a>
				</td>
			</tr>
			<?php $nomor++; ?>
			<?php } ?>
		</tbody>
	</table>
</div>