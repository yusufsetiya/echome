<?php 
session_start();
include "koneksi.php";

$uniq=strtoupper(uniqid()); 
$code=substr($uniq, 5);
$_SESSION['unix']= $code;

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
<title>Checkout</title>
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
<script src="js/jquery-1.11.3.min.js"></script>

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

    <div class="container contact_container">

    <!-- ISI -->
        <section class="konten">
            <div class="container">
                <h1>Checkout</h1>
                <hr>
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor=1; ?>
                        <?php $totalbelanja=0 ?>
                        <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>

                        <?php 
                        $ambil = $koneksi->query("SELECT * FROM tb_barang
                            WHERE id_produk='$id_produk'");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah['harga_produk']*$jumlah;
                         ?>

                         <tr>
                             <td><?php echo $nomor; ?></td>
                             <td><?php echo $pecah['nama_produk']; ?></td>
                             <td><?php echo number_format($pecah['harga_produk']); ?></td>
                              <td><?php echo $jumlah; ?></td>
                               <td>Rp. <?php echo number_format($subharga);?></td>
                         </tr>
                         <?php $nomor++ ?>
                         <?php $totalbelanja+=$subharga ?>
                     <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">Total Belanja</th>
                            <th>Rp. <?php echo number_format($totalbelanja) ?></th>
                        </tr>
                    </tfoot>
                </table>
                </div>

                 <form method="post" action="" >
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['username']; ?>" class="form-control bg-white">
                             </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                 <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['email']; ?>" class="form-control bg-white">
                             </div>
                        </div>
                        <div class="col-md-4">
                            <label>Pilih Pembayaran</label>
                            <select class="form-control" required name="metode">
                                <option value="">Pilih </option>
                                <option name="Indomaret">Indomaret</option>
                                <option name="Alfamart" >Alfamart</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Provinsi Tujuan</label>
                            <select class="form-control" name="id_prov" id="provinsi" required>
                                <option value="">Pilih Tujuan</option>
                                <?php 
                                    $ambil= $koneksi->query("SELECT * FROM tb_ongkir");  
                                    while($perongkir = $ambil->fetch_assoc()){
                                ?>
                                <option value="<?php echo $perongkir['id_prov'] ?>">
                                    <?php echo $perongkir['nama_prov'] ?>
                                    <?php //echo number_format($perongkir['tarif']) ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Kota Tujuan</label>
                            <select class="form-control" name="id_kota" id="kota" required>
                                <option value="">Pilih Tujuan</option>
                                
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Kode Pos</label>
                            <input type="text" name="kodepos" class="form-control" placeholder="ex : 38992" autocomplete="off" required><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat Lengkap Pengiriman</label>
                        <textarea class="form-control" name="alamat_pengiriman" placeholder="Masukan Alamat Lengkap Pengiriman" required></textarea>
                    </div>
                    <button class="btn btn-primary" name="checkout">Checkout</button>
                </form>

                <?php 
                    if (isset($_POST['checkout'])) 
                    {
                        $id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
                        $id_ongkir=$_POST["id_prov"];
                        $id_kota = $_POST["id_kota"];
                        $tanggal_pembelian=date("Y-m-d");
                        $alamat=$_POST['alamat_pengiriman'];
                        $metode=$_POST['metode'];
                        $status="pending";
                        $kodepos=$_POST['kodepos'];

                        $_SESSION['metode'] = $metode;

                        $ambil=$koneksi->query("SELECT * FROM tb_ongkir WHERE id_prov='$id_ongkir'");
                        $arrayongkir= $ambil->fetch_assoc();
                        $jopok=$koneksi->query("SELECT * FROM kota WHERE id_prov='$id_kota'");
                        $deleh= $jopok->fetch_assoc();
                        $kota=$deleh["nm_kota"];
                        $tarif=$deleh["tarif"];
                        $provinsi=$arrayongkir['nama_prov'];
                       

                        $total_pembelian=$totalbelanja + $tarif;

                        // $cek=$koneksi->query("SELECT id_pembelian FROM pembelian WHERE id_pelanggan = '$id_pelanggan' ORDER BY id_pembelian DESC ");
                        // $jopok= $cek->fetch_assoc();
                        // $aidi = $jopok['id_pembelian'];


                        $koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal,total,provinsi,tarif,alamat_pengiriman,kodepos,kota)
                            VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$provinsi','$tarif','$alamat','$kodepos','$kota')");
                       

                        $id_pembelian_baru=$koneksi->insert_id;

                         $koneksi->query("INSERT INTO tb_pembayaran (id_pelanggan,id_pembelian,code,metode,status_pembelian,total,tanggal) 
                            VALUES ('$id_pelanggan','$id_pembelian_baru','$code','$metode','$status','$total_pembelian','$tanggal_pembelian')");


                        foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) 
                        {
                            $ambil=$koneksi->query("SELECT * FROM tb_barang WHERE id_produk='$id_produk'");
                            $perproduk=$ambil->fetch_assoc();

                            $nama= $perproduk['nama_produk'];
                            $harga= $perproduk['harga_produk'];

                            $subtotal=$perproduk['harga_produk']*$jumlah;
                            $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah,nama,harga,subtotal)
                                VALUES ('$id_pembelian_baru','$id_produk','$jumlah','$nama','$harga','$subtotal')");

                            $koneksi->query("UPDATE tb_barang SET stok=stok -$jumlah WHERE id_produk='$id_produk'");
                        }
                        //kosongkan keranjang
                        unset($_SESSION['keranjang']);

                        echo "<script>alert('Pembelian Sukses');</script>";
                        echo "<script>location='pembayaran.php?id=$id_pembelian_baru';</script>";
                    }
                 ?>
            </div>
        </section>
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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/contact_custom.js"></script>
</body>

</html>
<!-- JavaScript -->
		<script type="text/javascript" src="jquery-3.2.1.min.js"></script>

		<script>
		    $("#provinsi").change(function(){
        		// variabel dari nilai combo box Fakultas
       			var id_prov = $("#provinsi").val();
        		// mengirim dan mengambil data
        		$.ajax({
            		type: "POST",
            		dataType: "html",
            		url: "kota.php",
            		data: "prov="+id_prov,
            		success: function(msg){
                		// jika tidak ada data
                		if(msg == ''){
                		    alert('Tidak ada Kota');
                		}
                		// jika dapat mengambil data,, tampilkan di combo box jurusan
                		else{
                    		$("#kota").html(msg);
                		}
            		}
        		});
    		});
		</script>
<?php } ?>