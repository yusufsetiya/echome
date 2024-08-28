<?php 
session_start();
include "koneksi.php";
		if (isset($_GET['pesan'])) {
			if ($_GET['pesan']=="gagal") {
				echo "TIDAK SESUAI !!!!!";
			}
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Register</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<form method="post" action="proses_login.php" name="input">
				<div class="group"><br>
					<label for="email" class="label">Email</label><br>
					<input type="text" class="input" name="email">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label><br>
					<input type="password" class="input" data-type="password" name="password">
				</div><br>
				<div class="group">
					<input type="submit" class="button" value="Login" name="login"><br>
				</div>
			</form>
				
				<div class="hr"></div>
			</div>
			
			<div class="sign-up-htm">
				<div class="group"><br>
					
					<form method="post" action="regis.php" name="input">
					<label for="user" class="label">Username</label><br>
					<input name="username" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label><br>
					<input name="email" type="text" class="input">
				</div>
				<div class="group">
					<label for="Alamat" class="label">Alamat</label><br>
					<textarea class="input" name="alamat"></textarea>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label><br>
					<input name="password" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label><br>
					<input name="ulang_password" type="password" class="input" data-type="password">
				</div>
				<div class="group"><br>
					<input type="submit" name="regis" class="button" value="Register">
				</div>
				<div class="hr"></div>
			</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>