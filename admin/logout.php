<?php 
include "koneksi.php";
	//proses logout

session_destroy();

echo "<script>location='../login/login.php';</script>";
 ?>