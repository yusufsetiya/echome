<?php 
session_start();
include "koneksi.php";

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
<title>Keranjang</title>
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

		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">The Best Electro Shop</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

								
								<li class="account">
									<a href="#">
										My Account
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
										<li><a href="proses_logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							<a>EC_<span>Home</span></a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="index.php">home</a></li>
								<li><a href="categories.php">shop</a></li>
								<li><a href="contact.php">contact</a></li>
								<li><a href="riwayat.php">Riwayat Belanja</a></li>
							</ul>
							<ul class="navbar_user">
								<li>
								<form action="pencarian.php" method="get">
									<input type="text" class="form-control" style="width: 150px;" name="keyword" placeholder="Cari">
								</form>
								</li>
								<li><a href="profil.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
								<li class="checkout">
									<a href="keranjang.php">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
									</a>
								</li>
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

	<!-- Hamburger Menu -->

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
				<li class="menu_item"><a href="index.html">home</a></li>
				<li class="menu_item"><a href="categories.html">shop</a></li>
				<li class="menu_item"><a href="contact.php">contact</a></li>
				<li class="menu_item"><a href="riwayat.php">Riwayat Belanja</a></li>
			</ul>
		</div>
	</div>
<!------ Include the above in your HEAD tag ---------->
<div class="container" style="bottom: -180px;">
	<div class="row">
		<div class="col-md-12">
			<h2>Nota Pembelian</h2><br>
<?php 
$ambil=$koneksi->query("SELECT * FROM pembelian JOIN tb_user ON  pembelian.id_pelanggan=tb_user.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail=$ambil->fetch_assoc(); 

?>

<!--jika pelanggan yg beli tdk sama yg login tidak boleh-->
<?php 
//mendapatkan id pelanggan yg beli
$idpelangganbeli=$detail['id_pelanggan'];

//mendapatkan id_peanggan yg lain
$idpelangganlogin=$_SESSION['pelanggan']['id_pelanggan'];

if ($idpelangganbeli !== $idpelangganlogin) {
	echo "<script>alert('JANGAN NAKAL !!!');</script>";
	echo "<script>location='riwayat.php';</script>";

}

 ?>

 <?php 	
$jopok=$koneksi->query("SELECT status_pembelian FROM tb_pembayaran WHERE id_pembelian='$_GET[id]' ");
$jokok=$jopok->fetch_assoc();

  ?>

<div class="row">
	<div class="col-md-4">
		<h3><u>Pembelian</u></h3>
		<strong>No. Pembelian : <?php echo $detail['id_pembelian'] ?></strong><br>
		Tanggal : <?php echo $detail['tanggal']; ?><br>
		Total : Rp. <?php echo number_format($detail['total']); ?><br>	
		Status : <?php echo $jokok['status_pembelian']; 
		?>
	</div>
	<div class="col-md-4">
		<h3><u>Pelanggan</u></h3>
		<strong>Nama Pelanggan : <?php echo $detail['username']; ?></strong><br>
			Alamat Email :<?php echo $detail['email']; ?>
	</div>
	<div class="col-md-4">
		<h3><u>Pengiriman</u></h3>
		<strong><?php echo $detail['provinsi'] ?></strong><br>
		Kota : <?php 	echo $detail['kota']; ?><br>	
		Ongkos Kirim : Rp. <?php echo number_format($detail['tarif']); ?><br>
		Alamat : <?php echo $detail['alamat_pengiriman']; ?><br>
		Kode Pos : <?php echo $detail['kodepos']; ?>
	</div>
</div><br>

<div class="table-responsive">
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>NO</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>SubTotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td>
				Rp. <?php echo number_format($pecah['subtotal']); ?>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>
</div>
		</div>
	</div>
</div>

	<!-- Benefit -->
<div style="top: 90px;">
	<div class="benefit">
		<div class="container" style="top: 50px;">
			<div class="row benefit_row">
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>fast delivery</h6>
							<p>Quickly Arrived At Your Home</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>cach on delivery</h6>
							<p>The Internet Tend To Repeat</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>45 days return</h6>
							<p>Making it Look Like Readable</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>opening all week</h6>
							<p>8AM - 09PM</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->

	<footer class="footer">
		<div class="container" style="top: 40px;">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
						<ul class="footer_nav">
							<li><a href="#">Blog</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="contact.html">Contact us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="footer_nav_container">
						<div class="cr">©2019 All Rights Reserverd. Made By <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">yusuf_setiya</a></div>
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
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/single_custom.js"></script>
</body>

</html>
<?php } ?>






