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
        <?php 
        $id=$_GET['id'];
        $ambil = $koneksi->query("SELECT * FROM tb_user WHERE id_pelanggan='$id'");
        $user = $ambil->fetch_assoc();
        ?>
        <form method="post" enctype="multipart/form-data" action="">
            <div class="form-group text-center">
                 <img src="../foto_user/<?php echo $user['foto']; ?>" class="rounded-circle" height="250" width="250"><br>
                 <input type="file" name="foto">
            </div>
            <div class="form-group">
                <label style="font-family: Baskerville Old Face; font-size: 20px;">Nama :</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $user['username']; ?>" required placeholder="Nama" autocomplete="off" >
            </div>
            <div class="form-group">
                <label style="font-family: Baskerville Old Face; font-size: 20px;">Email :</label>
                <input type="text" class="form-control" name="email" value="<?php echo $user['email']; ?>" required placeholder="Email" readonly>
            </div>
            <div class="form-group">
                <label style="font-family: Baskerville Old Face; font-size: 20px;">Telepon :</label>
                <input type="text" class="form-control" name="telepon" value="<?php echo $user['telepon']; ?>" required placeholder="Telepon" autocomplete="off" maxlength="12" >
            </div>
            <div class="form-group">
                <label style="font-family: Baskerville Old Face; font-size: 20px;">Alamat :</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $user['alamat']; ?>" required placeholder="Alamat" autocomplete="off">
            </div>
            <button class="btn btn-primary" type="submit" name="edit"><i class="fa fa-edit"></i> Edit</button>   
        </form>
        <?php 
        if(isset($_POST['edit'])){
            $ekstensi_diperbolehkan = array('png','jpg');
            $namafoto = $_FILES['foto']['name'];
            $x = explode('.', $namafoto);
            $ekstensi = strtolower(end($x));
            $ukuran = $_FILES['foto']['size'];
            $file_tmp = $_FILES['foto']['tmp_name'];   
            $nama=$_POST['nama'];
            $telepon=$_POST['telepon'];
            $alamat=$_POST['alamat']; 
 
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){          
                move_uploaded_file($file_tmp, "../foto_user/".$namafoto);
                $query= $koneksi->query("UPDATE  tb_user SET foto='$namafoto',username='$_POST[nama]',telepon='$_POST[telepon]',alamat='$_POST[alamat]' WHERE id_pelanggan='$_GET[id]';");

                if($query){
                    echo "<script>alert('Data Profil Telah Diubah');</script>";
                    echo "<script>location='profil.php';</script>";
                }else{
                    echo "<script>alert('GAGAL MENGUPLOAD GAMBAR');</script>";
                }
            }else{
                echo "<script>alert('UKURAN GAMBAR TERLALU BESAR');</script>";
            }
        }else{
            echo "<script>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN');</script>";
        }
    }

            // if (isset($_POST['edit'])) 
            // {
            //     $nama=$_POST['nama'];
            //     $telepon=$_POST['telepon'];
            //     $alamat=$_POST['alamat'];
            //     $namafoto=$_FILES['foto']['name'];
            //     $lokasifoto=$_FILES['foto']['tmp_name'];
            //     if (!empty ($lokasifoto)) 
            //     {
            //         move_uploaded_file($lokasifoto, "../foto_user/$namafoto");

            //         $koneksi->query("UPDATE  tb_user SET foto='$namafoto',username='$_POST[nama]',telepon='$_POST[telepon]',alamat='$_POST[alamat]' WHERE id_pelanggan='$_GET[id]';");

            //     }
            //     else{
            //         $akun=$koneksi->query("UPDATE  tb_user SET username='$_POST[nama]',email='$_POST[email]',telepon='$_POST[telepon]',alamat='$_POST[alamat]' WHERE id_pelanggan='$_GET[id]';"); 

            //     }
            //     echo "<script>alert('Profil Telah Diubah');</script>";
            //     echo "<script>location='profil.php';</script>";
                
            // }
            //echo "<pre>";
            //print_r($_SESSION);
            //echo "</pre>";
        ?>

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