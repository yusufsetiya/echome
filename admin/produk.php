<?php 
include "koneksi.php";
 ?>
<h2>Produk</h2>
<hr><br>

<a href="index.php?halaman=tambahproduk" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Produk</a><br><br>
<div style="margin-bottom: 13px" align="right">
	<form method="get" action="pencarian.php">
	<input type="text" style="width: 260px; padding: 4px" placeholder="Cari produk disini..." autocomplete="off" id="search" class="form-control">
</form>
</div>
<section class="konten">
	<div class="table-responsive">
<table class="table table-striped" width="100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Foto</th>
			<th>Deskripsi</th>
			<th>Stok</th>
			<th>Kategori</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody id="tampil">
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM tb_barang ORDER BY id_produk DESC"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
			<td>
				<img src="../foto_produk/<?php echo $pecah['foto']; ?>" width="100">
			</td>
			<td><?php echo nl2br($pecah['deskripsi']); ?></td>
			<td><?php echo $pecah['stok']; ?></td>
			<td><?php echo $pecah['kategori'] ?></td>
			<td>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-warning">Ubah</a>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'];?>" class="btn-danger btn" onclick="return confirm('apakah anda yakin ?')">Hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
</section>
</div>
<script type="text/javascript">
    $(document).ready( function() {
      $('#search').on('keyup', function() {
        $.ajax({
          type: 'POST',
          url: 'pencarian.php',
          data: {
            search: $(this).val()
          },
          cache: false,
          success: function(data) {
            $('#tampil').html(data);
          }
        });
      });
    });
  </script>