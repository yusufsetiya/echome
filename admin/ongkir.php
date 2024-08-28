<?php 
include "koneksi.php";
 ?>
<h2>Manage Ongkir</h2>
<hr>

<a href="index.php?halaman=tambahongkir" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Tujuan Provinsi</a><br><br>
<table class="table table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Tujuan Ongkir</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM tb_ongkir ORDER BY nama_prov DESC  "); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_prov']; ?></td>
			<td>
				<a href="index.php?halaman=tambahkota&id=<?php echo $pecah['id_prov'];?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah kota</a>
				<a href="index.php?halaman=detailkota&id=<?php echo $pecah['id_prov'];?>" class="btn btn-info"> Detail</a>
				<a href="index.php?halaman=hapusongkir&id=<?php echo $pecah['id_prov'];?>" class="btn-danger btn" onclick="return confirm('apakah anda yakin ?')"><i class="fa fa-trash"></i> Hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
