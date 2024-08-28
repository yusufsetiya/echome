<?php include "koneksi.php";?>

<?php 
$id_komentar=$_GET['id'];
$ambil=$koneksi->query("SELECT * FROM tb_komentar WHERE id_komentar='$id_komentar'"); 
$pecah=$ambil->fetch_assoc();
?>

<h2>Komentar : <?php echo $pecah['nama']; ?></h2>
<hr>
<div class="text-center">
 	<img src="../foto_user/<?php echo $pecah['foto']; ?>" class="rounded-circle" height="250" width="250">
 </div><br>
<table class="table table-striped table-bordered">
	<tr>
		<td>Nama</td>
		<td><?php echo $pecah['nama']; ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo $pecah['email']; ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
	<td><?php echo $pecah['komentar']; ?></td>
	</tr>
</table>
	
