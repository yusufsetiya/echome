<?php 
//koneksi
$host="localhost";
$user="root";
$password="";
$db="echome";
$koneksi=mysqli_connect($host,$user,$password);
$db_koneksi=mysqli_select_db($koneksi,$db);
?>

