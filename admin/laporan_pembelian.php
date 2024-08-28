<?php 
$semuadata=array();
$tgl_mulai="-";
$tgl_selesai="-";
if (isset($_POST['kirim']))
 {
	$tgl_mulai=$_POST['tglm'];
	$tgl_selesai=$_POST['tgls'];
	$ambil=$koneksi->query("SELECT * FROM pembelian pm LEFT JOIN tb_user pl
		ON pm.id_pelanggan=pl.id_pelanggan WHERE tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
	
	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}
}

 ?>

<h2>Laporan Pembelian <?php echo $tgl_mulai ?> Hingga <?php echo $tgl_selesai ?></h2>
<hr>

<form method="post">
	<div class="row">
		<div class="col-md-5">
			<label>Tanggal Mulai</label>
			<input type="date" class="form-control" name="tglm">
		</div>
		<div class="col-md-5">
			<label>Tanggal Selesai</label>
			<input type="date" class="form-control" name="tgls">
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label><br>
			<button class="btn btn-primary" name="kirim">Lihat</button>
		</div>
	</div>
</form>

<div class="table-responsive">
<table class="table table-bordered table-striped"><br>
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Tujuan Pengiriman</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0; ?>
		<?php foreach ($semuadata as $key => $value): ?>
		<?php $total+=$value['total'] ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['username']; ?></td>
			<td><?php echo $value['tanggal']; ?></td>
			<td>Rp. <?php echo number_format($value['total']); ?></td>
			<td><?php echo $value['provinsi']; ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th>Rp. <?php echo number_format($total) ?></th>
			<th></th>
		</tr>
	</tfoot>
</table>
</div>