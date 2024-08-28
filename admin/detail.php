<h2>Detail Pembelian</h2>
<hr><br>
<?php 
$ambil=$koneksi->query("SELECT * FROM pembelian JOIN tb_user ON  pembelian.id_pelanggan=tb_user.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail=$ambil->fetch_assoc(); 
$cek=$koneksi->query("SELECT status_pembelian FROM tb_pembayaran WHERE id_pembelian='$_GET[id]'");
$array=$cek->fetch_assoc();
?>


<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<p>
			Tanggal : <?php echo $detail['tanggal']; ?><br>
			Total : Rp. <?php echo number_format($detail['total']); ?><br>
			Status : <?php echo $array['status_pembelian']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong>Nama Pelanggan : <?php echo $detail['username']; ?></strong><br>
		<p>
			Telepon :<?php echo $detail['telepon']; ?><br>
			Alamat Email : <?php echo $detail['email']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<strong><?php echo $detail['provinsi'] ?></strong><br>
		<p>
			Kota  : <?php echo 	$detail['kota']; ?><br>	
			Tarif : Rp.<?php echo number_format($detail['tarif']); ?><br>
			Alamat : <?php echo $detail['alamat_pengiriman']; ?><br>
			Kode Pos : <?php echo $detail['kodepos']; ?>
		</p>
	</div>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>NO</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>SubTotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td>
				Rp. <?php echo number_format($pecah['harga']*$pecah['jumlah']); ?>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>