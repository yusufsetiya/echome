<?php include "koneksi.php";?>
<?php 	
$id=$_GET['id'];
$jokok=$koneksi->query("SELECT * FROM tb_ongkir WHERE id_prov='$id' ");
$deleh=$jokok->fetch_assoc()
 ?>


<h2>Provinsi : <?php echo $deleh['nama_prov']; ?></h2>
<hr>
 	
<table class="table table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Kota</th>
			<th>Tarif</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php 
		$id=$_GET['id'];
		$ambil=$koneksi->query("SELECT * FROM kota WHERE id_prov='$id'");
		while ($pecah=$ambil->fetch_assoc()) {
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nm_kota']; ?></td>
			<td>Rp. <?php echo number_format($pecah['tarif']); ?></td>
			<td>
				<a href="index.php?halaman=ubahongkir&id=<?php echo $pecah['id_kota'];?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a> 
				<a href="index.php?halaman=hapuskota&id=<?php echo $pecah['id_kota'];?>" class="btn-danger btn" onclick="return confirm('apakah anda yakin ?')"><i class="fa fa-trash"></i> Hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>

