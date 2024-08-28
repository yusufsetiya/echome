<?php 
session_start();
include 'koneksi.php';
if (isset($_POST['login'])) {
  @$email=$_POST['email'];
  @$password=$_POST['password'];
  $pengacak="p3ng4c4k";
  $password_acak=md5 ($pengacak.md5($password).$pengacak);
  $ambil=$koneksi->query("SELECT * FROM tb_user
    WHERE email='$email' AND password='$password_acak'");

      $akunyangcocok=$ambil->num_rows;

  if ($akunyangcocok==1) {
    
    $akun=$ambil->fetch_assoc();

    if ($akun['level']=='admin') {
       $_SESSION['pelanggan']=$akun;
       $_SESSION['level']='admin';
     //echo "<script>alert('Anda Sukses Login');</script>";
     echo "<script>location='admin/index.php';</script>";
    }
    elseif ($akun['level']=='user') {
       $_SESSION['pelanggan']=$akun;
       $_SESSION['level']='user'; 
     //echo "<script>alert('Anda Sukses Login');</script>";
     echo "<script>location='user/index.php';</script>";
    }

   
   }
  else{
    echo "<script>alert('Anda Gagal Login');</script>";
    echo "<script>location='login/login.php';</script>";
  }
}
 ?>
