<?php 
session_start();
include "koneksi.php";

if (!isset($_SESSION['pelanggan']) and !isset($_SESSION['pelanggan'])) {
    echo "<script>alert('ANDA BELUM LOGIN !!!');</script>";
    echo "<script>location='../login/login.php';</script>";
    exit;
 }else if ($_SESSION['level']!="admin") {
   echo "<script>alert('ANDA TIDAK BERHAK MENGAKSES!');</script>";
  echo "<script>location='../user/index.php';</script>";
  }else{

 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN EC_HOME</title>
  <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
   <script src="assets/js/jquery-3.3.1.min.js"></script>

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">EC_Home</a> 
            </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
        <li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
          </li>
        
          
                     <li><a  href="index.php?halaman=produk"><i class="fa fa-cube "></i> Manage Produk</a></li>
                     <li><a  href="index.php?halaman=kategori"><i class="fa fa-list-alt"></i> Manage Kategori</a></li>
                      <li><a  href="index.php?halaman=pembelian"><i class="fa fa-shopping-cart"></i> Pembelian</a></li>
                      <li><a  href="index.php?halaman=laporan_pembelian"><i class="fa fa-file"></i> Laporan Pembelian</a></li>
                       <li><a  href="index.php?halaman=pelanggan"><i class="fa fa-user"></i> Manage User</a></li>
                        <li><a  href="index.php?halaman=komentar"><i class="fa fa-comment"></i> Manage Komentar</a></li>
                        <li><a  href="index.php?halaman=ongkir"><i class="fa fa-car"></i> Manage Tujuan Ongkir</a></li>
                        <li><a  href="index.php?halaman=logout"><i class="fa fa-sign-out"></i> Logout</a></li>

                      
                    
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php 
                    if (isset($_GET['halaman'])) {
                        if ($_GET['halaman']=="produk") {
                          include 'produk.php';
                        }
                        elseif ($_GET['halaman']=="pembelian") {
                          include 'pembelian.php';
                        }
                        elseif ($_GET['halaman']=="hapusbeli") {
                          include 'hapusbeli.php';
                        }
                         elseif ($_GET['halaman']=="pelanggan") {
                          include 'pelanggan.php';
                        }
                        elseif ($_GET['halaman']=="komentar") {
                          include 'komentar.php';
                        }
                        elseif ($_GET['halaman']=="detail") {
                          include 'detail.php';
                        }
                        elseif ($_GET['halaman']=="tambahproduk") {
                          include "tambahproduk.php";
                        }
                        elseif ($_GET['halaman']=="hapusproduk") {
                          include "hapusproduk.php";
                        }
                        elseif ($_GET['halaman']=="ubahproduk") {
                          include "ubahproduk.php";
                        }
                        elseif ($_GET['halaman']=="hapususer") {
                          include "hapususer.php";
                        }
                        elseif ($_GET['halaman']=="hapuskomen") {
                          include "hapuskomen.php";
                        }
                        elseif ($_GET['halaman']=="detailkomen") {
                          include "detailkomen.php";
                        }
                        elseif ($_GET['halaman']=="detail_user") {
                          include "detail_user.php";
                        }
                        elseif ($_GET['halaman']=="laporan_pembelian") {
                          include "laporan_pembelian.php";
                        }
                        elseif ($_GET['halaman']=="kategori") {
                          include "kategori.php";
                        }
                        elseif ($_GET['halaman']=="ongkir") {
                          include "ongkir.php";
                        }
                         elseif ($_GET['halaman']=="tambahongkir") {
                          include "tambahongkir.php";
                        }
                         elseif ($_GET['halaman']=="ubahongkir") {
                          include "ubahongkir.php";
                        }
                         elseif ($_GET['halaman']=="hapusongkir") {
                          include "hapusongkir.php";
                        }
                        elseif ($_GET['halaman']=="hapuskategori") {
                          include "hapuskategori.php";
                        }
                        elseif ($_GET['halaman']=="tambahkategori") {
                          include "tambahkategori.php";
                        }
                        elseif ($_GET['halaman']=="ubahkategori") {
                          include "ubahkategori.php";
                        }
                        elseif ($_GET['halaman']=="tambahkota") {
                          include "tambahkota.php";
                        }
                        elseif ($_GET['halaman']=="detailkota") {
                          include "detailkota.php";
                        }
                         elseif ($_GET['halaman']=="hapuskota") {
                          include "hapuskota.php";
                        }
                        elseif ($_GET['halaman']=="logout") {
                          include "logout.php";
                        }
                    }
                    else{
                        include 'home.php';
                    }

                 ?>
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
<?php } ?>