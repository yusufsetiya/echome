<?php 
session_start();
include "koneksi.php";

$code=$_SESSION ['unix'];
$metode = $_SESSION['metode'];


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
<html>
<head>
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

    <div class="row" style="padding: 40px; justify-content: center;">
            <div class="col-md-9">
                
                    <div class="map_container" style="border-radius: 20px;">
                        <div class="">
                            <div class="text-center" style="padding: 30px;">
                               <?php if ($metode=='Indomaret'): ?>
                                   <img class="img-fluid" src="indomaret.webp" width="300">
                                <?php endif; ?>
                                <?php if($metode == 'Alfamart'): ?>
                                    <img class="img-fluid" src="alfamart.png" width="300">
                               <?php endif ?>
                                 
                                <br><br>
                                <h3 style="color:red;">Kode Bayar :</h3><br> 
                                <h3 style="color:red;"><?php echo $code;?></h3>
                            </div>
                            <?php 
                                $id=$_GET['id'];
                                $ambil=$koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$id'");
                                $pecah=$ambil->fetch_assoc();
                             ?>
                            <div class="">
                                <table class="table table-striped">
                                    <tr>
                                        <th colspan="4"><h2 align="center"><u>Cara Bayar</u></h2></th>
                                    </tr>
                                     <tr>
                                        <td><i class="fa fa-check-square"></i></td>
                                        <td>
                                         Copy kode pembayaran di atas dan datang ke gerai Alfamart atau Indomert Terdekat, Atau anda bisa langsung membayar dengan klik tombol verify di bawah.
                                        </td>
                                    </tr>
                                     <tr>
                                        <td><i class="fa fa-check-square"></i>&nbsp</td>
                                        <td>
                                         Tunjukan kode pembayaran ke Indomaret atau Alfamaret terdekat
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-check-square"></i>&nbsp</td>
                                        <td>
                                        Kasir akan mengkonfirmasi transaksi dengan menanyakan jumlah pembayaran dan nama merchant
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-check-square"></i>&nbsp</td>
                                        <td>
                                        Konfirmasikan pembayaran anda ke kasir
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-check-square"></i>&nbsp</td>
                                        <td>
                                        Transaksi anda berhasil
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-check-square"></i>&nbsp</td>
                                        <td>
                                        <form method="POST" action="verification.php?id=<?php echo $pecah['id_pembelian']; ?>">
                                            Pembayaran Langsung <input type="submit" class="btn btn-danger" name="verification" value="verify">
                                        </form>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<?php }?>