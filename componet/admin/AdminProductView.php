<?php
	header('Content-Type: text/html; charset=utf-8');
	if($_SESSION['loggedin'] != true){
		header("Location: ../");
	}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<meta name="robots" content="noindex, nofollow">
	<meta charset="utf-8">
	<style>
		
		table{
			margin-top:2%;
			margin-left: auto;
			margin-right: auto;
			width: 800px;
			
		}
		h1{
			text-align: center;
		}
		td{
			border: 1px solid black;
			vertical-align:top;
			
		}
	</style>
</head>
<body>
	<div class="container">
		<header>
		<a href="../">
			<img src="../images/ComponetLogoX120.png" alt="componet">
		</a>
	</header>
	<nav class="menu">
	<ul>
		<li class="dropdown">
			<a href="#" class="dropbtn">=</a>
				<div class="dropdown-content">
						<a href="../">Hem</a>
						<a href="../index1.php/?Controller/getProducts">Butik</a>
						<a href="../omoss/">Om Oss</a>
						<a href="../kontakt/">Kontakt</a>
						<a href="../nyhetsbrev/">Nyhetsbrev</a>
				</div>
		</li>
		<li><a class="button" href="../">Hem</a></li>
		<li><a class="button" href="../index1.php/?Controller/getProducts">Butik</a></li>
		<li><a class="button" href="../omoss/">Om Oss</a></li>
		<li><a class="button" href="../kontakt/">Kontakt</a></li>
		<li><a class="button" href="../nyhetsbrev/">Nyhetsbrev</a></li>
	</ul>
	</nav>
	<nav class="breadcrums">
		<ul>
			<li><a href="../">Start</a></li>
			<li>></li>
			<li>Admin</li>
		</ul>
	</nav>
	<h1>Administration av VÃ¥ra Produkter</h1>
		<div class="admininfo"> 
		
		
		<button class="hemadmin", onclick="window.location.href='?AdminController/getProductsAdminView'"><h3>Start Admin</h3></button>
		<button class="add", onclick="window.location.href='?AdminController/addProductView/'"> <h3>LÃ¤gg till Produkt</h3></button>
		<button class="logout", onclick="window.location.href='?AdminController/logout'"> <h3>Logga ut</h3></button>
		</div>
		<table>
			<tr>
				<th>ID</th>
				<th>Bild</th>
				<th>Namn</th>
				<th>Kategori</th>
				<th>Tillverkare</th>
				<th>Pris</th>
				<th>Lagerantal</th>
				<th>Uppdatera</th>
				<th>Ta Bort</th>
			</tr>
			<?php
				foreach ($products as $product) {
					echo '
					<tr>
					<td>'.$product['ID'].'</td>
					<td><img src="'.$product['BildURL'].'" alt="'.$product['Namn'].'" width="100%" height="auto"></td>
					<td>'.$product['Namn'].'</td>
					<td><a href="?AdminController/getProductsbyCategory/'.$product['KategoriID'].'">'.$product['Kategori'].'</a></td>
					<td><a href="?AdminController/getProductsbyManufacturer/'.$product['Tillverkare'].'">'.$product['Tillverkare'].'</a></td>
					<td>'.$product['Pris'].'</td>
					<td>'.$product['LagerAntal'].'</td>
					<td><a href="?AdminController/updateProductView/'.$product['ID'].'">Uppdatera</a></td>
					<td><a href="?AdminController/deleteProduct/'.$product['ID'].'">Ta Bort</a></td>
					</tr>';
				}
			?>
		</table>
		<footer>
			<div class="footerpicture_div">
			<img src="../images/live-support-girl.png" alt="Customer service" class="happygirl_picture">
			</div>
			<div class="footer_information">
				<h3 class="hej">KundtjÃ¤nst</h3>
				<ul>						
					<li><a href="">Kundservice</a></li>
					<li><a href="">Support</a></li>
					<li><a href="index1.php/?Controller/showAdminView">Logga in</a></li>
					<li><a href="mailto:webmaster@componet.com">Webmaster</a></li>
				</ul>
			</div>
			<div class="footer_logotypes">
				<img src="../images/leverantor.png" alt="leverantor" class="logo_leverantor">
			</div>	
		</footer>
		</div>
	</body>
	</html>