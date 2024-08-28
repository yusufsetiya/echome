<?php include "koneksi.php";?>

<?php 
$id_pelanggan=$_GET['id'];
$ambil=$koneksi->query("SELECT * FROM tb_user WHERE id_pelanggan='$id_pelanggan' "); 
$pecah=$ambil->fetch_assoc();
?>

<h2>Detail : <?php echo $pecah['username']; ?></h2>
<hr>
<div class="text-center">
 	<img src="../foto_user/<?php echo $pecah['foto']; ?>" class="rounded-circle" height="250" width="250">
 </div><br>
<table class="table table-striped table-bordered">
	<tr>
		<td>Nama</td>
		<td><?php echo $pecah['username']; ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo $pecah['email']; ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
	<td><?php echo $pecah['alamat']; ?></td>
	</tr>
	<tr>
		<td>Telepon</td>
		<td><?php echo $pecah['telepon']; ?></td>
	</tr>
</table>
	
