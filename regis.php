<?php
session_start();
include "koneksi.php";
if (isset($_POST['regis'])) {
	$username = $_POST["username"];
	$email = $_POST["emailuser"];
	$foto = "baru.jpg";
	$password = $_POST['password'];
	$ulang_password = $_POST['ulang_password'];
	$level = "user";
	//acak
	$pengacak = "p3ng4c4k";
	$password_acak = md5($pengacak . md5($password) . $pengacak);

	$ambil = $koneksi->query("SELECT * FROM tb_user WHERE email='$email'");
	$yangcocok = $ambil->num_rows;
	if ($password == $ulang_password) {
		if ($yangcocok >= 1) {
			echo "<script>alert('pendaftaran gagal, email sudah digunakan');</script>";
			echo "<script>location='login/register.php';</script>";
		} else {
			$hasil = $koneksi->query("INSERT INTO tb_user (email,password,username,level,foto) VALUES ('$email','$password_acak','$username','$level','$foto')");
			if ($hasil) {
				echo "<script>alert('Pendaftaran sukses');</script>";
				echo "<script>location='login/login.php';</script>";
			} else {
				echo "Error: " . $koneksi->error;
			}
		}
	} else {
		echo "<script>alert('Password tidak sama');</script>";
		echo "<script>location='login/register.php';</script>";
	}
}
