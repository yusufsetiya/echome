<?php
session_start();
include 'koneksi.php';

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
										<li><a href="login/login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>
										<li><a href="login/register.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
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
							</ul>
							<ul class="navbar_user">
								<li>
								<form action="pencarian.php" method="get">
									<input type="text" class="form-control" style="width: 150px;" name="keyword" placeholder="Cari" autocomplete="off">
								</form>
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
						<li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>
						<li><a href="login.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
					</ul>
				</li>
				<li class="menu_item"><a href="index.php">home</a></li>
				<li class="menu_item"><a href="categories.php">shop</a></li>
				<li class="menu_item"><a href="contact.php">contact</a></li>
			</ul>
		</div>
	</div>

	<!-- Slider -->

	<div class="main_slider" style="background-image:url(j.jpg)">
		<div class="container fill_height">
			<div class="row align-items-center fill_height">
				<div class="col">
					<div class="main_slider_content">
						<h6>Electronic Center House</h6>
						<h1>EC Home</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Banner -->
<!--
	<div class="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(k.jpg)">
						<div class="banner_category">
							<a href="laptop.php">Laptop</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(komputer.jpg)">
						<div class="banner_category">
							<a href="komputer.php">Computer</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(hp.jpg)">
						<div class="banner_category">
							<a href="smartphone.php">Smartphone</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>-->

	<!-- New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>New Product</h2>
					</div>
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

						<!-- Product 3 -->
						<?php $ambil = $koneksi->query("SELECT * FROM tb_barang WHERE stok!=0"); ?>
						<?php while($perproduk = $ambil->fetch_assoc()){ ?>
						<div class="product-item men">
							<div class="product product_filter"><a href="single.php?id=<?php echo $perproduk['id_produk']; ?>">
								<div class="product_image">
									<img src="foto_produk/<?= $perproduk['foto'];?>" width="100">
								</div>
							
								<div class="product_info">
									<h6 class="product_name"><a href="single.php?id=<?php echo $perproduk['id_produk']; ?>"><?php echo $perproduk['nama_produk']; ?></a></h6>
									<div class="product_price">Rp.<?php echo number_format($perproduk['harga_produk']); ?></div>
								</div>
							</div></a>
							<div class="red_button add_to_cart_button"><a href="login/login.php">add to cart</a></div>
						</div>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- promo -->

	<div class="deal_ofthe_week">
		<div class="row ">
			<div class="col-md-7">
				<div class="bd-example">
				  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
				    <ol class="carousel-indicators">
				      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
				      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
				      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
				    </ol>
				    <div class="carousel-inner">
				      <div class="carousel-item active">
				        <img src="slide1.jpg" class="d-block w-100" alt="..." height="500" width="1000">
				        <div class="carousel-caption d-none d-md-block">
				          <h4 style="color: white;">Harga Murah</h4>
				          <h5 style="color: grey;">Dengan Harga Barang Yang Lebih Murah Dari Yang Lain</h5>
				        </div>
				      </div>
				      <div class="carousel-item">
				        <img src="slide2.jpg" class="d-block w-100" alt="..."  height="500" width="1000">
				        <div class="carousel-caption d-none d-md-block">
				          <h4 style="color:white;">Banyak Pilihan</h4>
				          <h5 style="color: grey;">Banyak Pilihan Barang Barang Yang Menarik</h5>
				        </div>
				      </div>
				      <div class="carousel-item">
				        <img src="slide3.jpg" class="d-block w-100" alt="..."  height="500" width="1000">
				        <div class="carousel-caption d-none d-md-block">
				          <h4 style="color: white;">Kualitas Terjamin</h4>
				          <h5 style="color: grey;">Kualitas Barang Yang Terjamin ORI</h5>
				        </div>
				      </div>
				    </div>
				    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
				      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				      <span class="sr-only">Previous</span>
				    </a>
				    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
				      <span class="carousel-control-next-icon" aria-hidden="true"></span>
				      <span class="sr-only">Next</span>
				    </a>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<br><br><br><br><h1 class="text-center">Lets Shopping Now !!!</h1>
			</div>
		</div>
	</div>
 
	<!-- Best Sellers -->

	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Best Sellers</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product_slider_container">
						<div class="owl-carousel owl-theme product_slider">

							<!-- Slide 1 -->

						<?php $ambil = $koneksi->query("SELECT * FROM tb_barang WHERE stok!=0 AND harga_produk<='3000000'"); ?>
						<?php while($perproduk = $ambil->fetch_assoc()){ ?>

							<div class="owl-item product_slider_item">
								<div class="product-item">
									<div class="product discount">
										<div class="product_image">
											<img src="foto_produk/<?= $perproduk['foto'];?>" width="100">
										</div>
										<div class="product_info">
											<h6 class="product_name"><a href="single.php?id=<?php echo $perproduk['id_produk']; ?>"><?php echo $perproduk['nama_produk']; ?></a></h6>
											<div class="product_price">Rp.<?php echo number_format($perproduk['harga_produk']); ?></div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>

							<!-- Slide  -->

						</div>

						<!-- Slider Navigation -->

						<div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-left" aria-hidden="true"></i>
						</div>
						<div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
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
						<div class="cr">©2019 All Rights Reserverd. This website made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a >yusuf_setiya</a></div>
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
<script src="js/custom.js"></script>
</body>

</html>
