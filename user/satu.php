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
<title>EC Home Categories</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/categories_styles.css">
<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
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

								<!-- Currency / Language / My Account -->
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
							<a href="#">EC<span>_Home</span></a>
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
									<input type="text" class="form-control" style="width: 150px;" name="keyword" placeholder="Cari" autocomplete="off">
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
				<li class="menu_item"><a href="index.php">home</a></li>
				<li class="menu_item"><a href="categories.php">shop</a></li>
				<li class="menu_item"><a href="contact.php">contact</a></li>
				<li class="menu_item"><a href="riwayat.php">Riwayat Belanja</a></li>
			</ul>
		</div>
	</div>

	<div class="container product_section_container">
		<div class="row">
			<div class="col product_section clearfix"><br>

				<!-- Sidebar -->

				<div class="sidebar">
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Kategori Produk</h5>
						</div>
						<ul class="sidebar_categories">
							<?php 
							$ambil= $koneksi->query("SELECT * FROM tb_kategori");  
                    		 while($kategori = $ambil->fetch_assoc()){
                    		 ?>
							<li><a href="satu.php?kategori=<?php echo $kategori['kategori']?>"><?php echo $kategori['kategori']; ?></a></li>
						<?php } ?>
							
						</ul>
					</div>

				</div>


				<!-- Main Content -->

				<div class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">

								<!-- Product Sorting -->

								<div class="product_sorting_container product_sorting_container_top">
									<ul class="product_sorting">
										<li>
											<span class="type_sorting_text">Filter</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_type">
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Nama Produk</span></li>
											</ul>
										</li>
									</ul>
									<!--<div class="pages d-flex flex-row align-items-center">
										<div class="page_current">
											<span>1</span>
											<ul class="page_selection">
												<li><a href="categories.php">1</a></li>
												<li><a href="categories.php">2</a></li>
												<li><a href="categories.php">3</a></li>
											</ul>
										</div>
										<div class="page_total"><span>of</span> 3</div>
										<div id="next_page" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
									</div>

								</div>-->


								<!-- Product Grid -->

								<div class="product-grid">

									<!-- Product 1 -->
								<?php $kategori=$_GET['kategori']; ?>
									<?php $ambil=$koneksi->query("SELECT * FROM tb_barang WHERE kategori='$kategori' AND stok >=1"); ?>
								<?php while($perproduk = $ambil->fetch_assoc()){ ?>
								<div class="product-item men">
									<div class="product product_filter"><a href="single.php?id=<?php echo $perproduk['id_produk']; ?>">
										<div class="product_image">
											<img src="../foto_produk/<?= $perproduk['foto'];?>" width="100">
										</div>
								<div class="product_info">
									<h6 class="product_name"><a href="single.php?id=<?php echo $perproduk['id_produk']; ?>"><?php echo $perproduk['nama_produk']; ?></a></h6>
									<div class="product_price">Rp.<?php echo number_format($perproduk['harga_produk']); ?></div>
								</div>
							</div></a>
							<div class="red_button add_to_cart_button"><a href="beli.php?id=<?php echo $perproduk['id_produk']?>">add to cart</a></div>
								</div>
								<?php } ?>
								</div>

								<!-- Product Sorting -->

								<!--<div class="product_sorting_container product_sorting_container_bottom clearfix">
									<span class="showing_results">Showing 1–3 of 12 results</span>
									<div class="pages d-flex flex-row align-items-center">
										<div class="page_current">
											<span>1</span>
											<ul class="page_selection">
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
											</ul>
										</div>
										<div class="page_total"><span>of</span> 3</div>
										<div id="next_page_1" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
									</div>

								</div>-->

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Benefit -->

	<div class="benefit">
		<div class="container">
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
				<div class="col-lg-6">
					<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="footer_nav_container">
						<div class="cr">©2019 All Rights Reserverd. Made by <a href="#">yusuf_setiya</a></div>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/categories_custom.js"></script>
</body>

</html>
<?php } ?>