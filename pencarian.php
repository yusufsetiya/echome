<?php include "koneksi.php"; ?>
<?php
 $keyword=$_GET['keyword'];

 $semuadata=array();
 $ambil=$koneksi->query("SELECT * FROM tb_barang WHERE nama_produk LIKE '%$keyword%'
 	OR deskripsi LIKE '%$keyword%'");

 while($pecah=$ambil->fetch_assoc())
 {
 	$semuadata[]=$pecah;
 }


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
                            <a>EC<span>_Home</span></a>
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
                    <ul class="account_selection">
                        <li><a href="login/login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>
                         <li><a href="login/register.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>  
                    </ul>
                </li>
                <li class="menu_item"><a href="index.php">home</a></li>
                <li class="menu_item"><a href="categories.php">shop</a></li>
                <li class="menu_item"><a href="contact.php">contact</a></li>
            </ul>
        </div>
    </div>

    <div class="container contact_container">

    <!-- ISI -->
  <div  style="bottom: -180px;">
    <h3>Hasil Pencarian : "<?php echo $keyword; ?>"</h3>
    <?php if (empty($semuadata)): ?>
		<div class="alert alert-danger">Produk "<strong><?php echo $keyword ?></strong>" Tidak Ditemukan</div>
	<?php endif ?>
    <div class="row" style="top: -40px;">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

						<?php foreach ($semuadata as $key => $value): ?>	

						<div class="product-item men">
							<div class="product product_filter"><a href="single.php?id=<?php echo $value['id_produk']; ?>">
								<div class="product_image">
									<img src="foto_produk/<?= $value['foto'];?>" width="100">
								</div>
								<div class="product_info">
									<h6 class="product_name"><a href="single.php?id=<?php echo $value['id_produk']; ?>"><?php echo $value['nama_produk']; ?></a></h6>
									<div class="product_price">Rp.<?php echo number_format($value['harga_produk']); ?></div>
								</div>
							</div></a>
							<div class="red_button add_to_cart_button"><a href="login/login.php">add to cart</a></div>
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>



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

</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/contact_custom.js"></script>
</body>

</html>
