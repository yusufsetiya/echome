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

$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
$ambil = $koneksi->query("SELECT * FROM tb_user WHERE id_pelanggan='$id_pelanggan'");
$user = $ambil->fetch_assoc();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Profil <?php echo $_SESSION['pelanggan']['username']; ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
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
                            <a>EC<span>_Home</span></a>
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
                                <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
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

<div style="bottom: -200px;">    
    <div class="container" >
            <div class="form-group text-center">
                 <img src="../foto_user/<?php echo $user['foto']; ?>" class="rounded-circle" height="250" width="250" name="foto">
            </div>
            <div class="form-group">
                <label style="font-family: Baskerville Old Face; font-size: 20px;">Nama :</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $user['username']; ?>" readonly width="100">
            </div>
            <div class="form-group">
                <label style="font-family: Baskerville Old Face; font-size: 20px;">Email :</label>
                <input type="text" class="form-control" name="email" value="<?php echo $user['email']; ?>" readonly>
            </div>
            <div class="form-group">
                <label style="font-family: Baskerville Old Face; font-size: 20px;">Telepon :</label>
                <input type="text" class="form-control" name="telepon" value="<?php echo $user['telepon']; ?>" readonly placeholder="Telepon" >
            </div>
            <div class="form-group">
                <label style="font-family: Baskerville Old Face; font-size: 20px;">Alamat :</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $user['alamat']; ?>" readonly placeholder="Alamat">
            </div>
            <a href="editprofil.php?id=<?php echo $user['id_pelanggan']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Profile</a>   

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
<?php } ?>