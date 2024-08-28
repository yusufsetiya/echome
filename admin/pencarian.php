<?php
if (isset($_POST['search'])) {
  require_once 'koneksi.php';
  $keyword=$_POST["search"];
  $nomor = 1;
  $ambil=$koneksi->query("SELECT * FROM tb_barang WHERE nama_produk LIKE '%$keyword%'"); 
  while($pecah=$ambil->fetch_assoc()){
 ?>
<tr>
  <td><?php echo $nomor; ?></td>
      <td><?php echo $pecah['nama_produk']; ?></td>
      <td><?php echo $pecah['harga_produk']; ?></td>
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
<?php $nomor++ ?>
<?php }
}?>