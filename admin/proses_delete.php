<?php 
include "koneksi.php";
$username=$_GET['username'];
$query="DELETE FROM tb_user where username='$username'";
$hasil=mysqli_query($koneksi,$query);
if ($hasil) {
?>	
<script language="javascript">document.location.href="tampilan_buku.php";</script>
<?php
}	else{
	echo "Gagal Hapus Data";
} 

?>