<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) {
	echo "<script>alert('ANDA BELUM LOGIN !!!');</script>";
	echo "<script>location='../login/login.php';</script>";
	exit;
}else if ($_SESSION['level']!="user") {
  echo "<script>alert('ANDA TIDAK BERHAK MENGAKSES!');</script>";
  echo "<script>location='../admin/index.php';</script>";
}else{

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>EC Home</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<!--<div class="top_nav" style="">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">Verification</div>
					</div>
				</div>
			</div>
		</div>-->

		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="logo_container">
							<a>Verification</a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="index.php"><img src="back.png" width="50"></a></li>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>

	<div class="fs_menu_overlay"></div>
	<div class="hamburger_menu">
		<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="hamburger_menu_content text-right">
			<ul class="menu_top_nav">
				<li class="menu_item has-children">
					<a href="#">
						My Account
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="proses_logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
					</ul>
				</li>
				<li class="menu_item"><a href="index.php">home</a></li>
			</ul>
		</div>
	</div>
	<div style="bottom: -180px;">
	<section class="riwayat">
		<div class="container">
			<form method="POST" action="">
				<input type="text" name="kode" class="form-control mb-2" style="width: 200px;" autocomplete="off">
				<button class="btn btn-primary mb-2" name="submit">Verify</button>
			</form><br>
			<?php 
			$id=$_SESSION['pelanggan']['id_pelanggan'];
			if (isset($_POST['submit'])) {
				$code=$_POST['kode'];
			$query =mysqli_query($koneksi, "SELECT * FROM tb_pembayaran WHERE code = '$code' AND status_pembelian=0");
 			$pecah = mysqli_fetch_array($query);
 			$jumlah = mysqli_num_rows($query);

 			if ($jumlah == 1) {
 			 	$update = mysqli_query($koneksi , "UPDATE tb_pembayaran SET status_pembelian = 'Sukses' WHERE code = '$code'");
 			 	header("Location: verification.php?pesan=berhasil");
 			 } 
 			 elseif ($jumlah == 0) {
 			 	header("Location: verification.php?pesan=already");
 			 }
 			 else{
 			 	header("Location: verification.php?pesan=gagal");
 			 }
			}

			 ?>
			 
			 <?php 
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan']=="berhasil") {
                          echo "<div class='alert alert-success' align='center'><strong>Verifikasi Berhasil</strong></div>";
                        }
                        elseif ($_GET['pesan']=="already") {
                           echo "<div class='alert alert-info' align='center'><strong>Cek Kembali Kode Anda</strong></div>";
                        }
                        elseif ($_GET['pesan']=="gagal") {
                           echo "<div class='alert alert-danger' align='center'><strong>Gagal</strong></div>";
                        }
                    }
             ?>

		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Total</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$nomor=1;
						//mendapatkan id_pelanggan yg login dari session
					$id_pelanggan=$_SESSION['pelanggan']['id_pelanggan'];

					$ambil=$koneksi->query("SELECT * FROM tb_pembayaran ORDER BY id_bayar DESC");
					while($pecah=$ambil->fetch_assoc()){
					 ?>
					<tr>
						<td><?php echo $nomor ?></td>
						<td><?php echo $pecah['tanggal'] ?></td>
						<td>Rp. <?php echo number_format($pecah['total']) ?></td>
						<td><?php echo $pecah['status_pembelian'] ?></td>
					</tr>
					<?php $nomor++ ?>
					<?php } ?>
				</tbody>
			</table>
			</div>
		</div>
	</section>
	<pre><?php// print_r($_SESSION); ?></pre>

	<!-- Benefit -->


	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
						<ul class="footer_nav">
							<li><a href="#">Blog</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="contact.php">Contact us</a></li>
						</ul>
					</div>
				</div>
				
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="footer_nav_container">
						<div class="cr">©2019 All Rights Reserverd. This website made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a >yusuf_setiya</a></div>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
</body>

</html>
<?php } ?>

			