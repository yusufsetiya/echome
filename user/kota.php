<?php
    include "koneksi.php";

    $id_prov=$_POST["prov"];
    $ambil=$koneksi->query("SELECT * FROM kota WHERE id_prov='$id_prov'");
    while($pecah=$ambil->fetch_assoc()){
    ?>
        <option value="<?php echo $pecah["id_prov"] ?>">
        	<?php echo $pecah["nm_kota"]; ?>
        	Rp. <?php echo 	number_format($pecah['tarif']); ?>
        	</option><br>
    <?php
    }
    ?>