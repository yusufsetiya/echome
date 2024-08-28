<?php 
include "koneksi.php";
	//proses logout
session_start();

session_destroy();

echo "<script>alert('Anda Telah logout');</script>";
echo "<script>location='../login/login.php';</script>";
 ?>