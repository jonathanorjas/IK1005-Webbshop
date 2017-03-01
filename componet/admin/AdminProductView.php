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
		
		.container{
			background-color: #ffffff;
		}
		table{
			min-width: 1000px;
		}	
		}
		h1{
			text-align: center;
		}
		td{
			border: 1px solid black;
			vertical-align:top;
			text-align: center;
			
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
	<h1>Administration av Våra Produkter</h1>
		<div class="admininfo"> 
		<button class="hemadmin", onclick="window.location.href='../index1.php/?AdminController/getProductsAdminView'"><h3>Start Admin</h3></button>
		<button class="add", onclick="window.location.href='../index1.php/?AdminController/addProductView/'"><h3>Lägg till Produkt</h3></button>
		<button class="logout", onclick="window.location.href='../index1.php/?AdminController/logout'"><h3>Logga ut</h3></button>
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
					<td><img src="'.$product['BildURL'].'" alt="'.$product['Namn'].'" width="150px" height="auto"></td>
					<td>'.$product['Namn'].'</td>
					<td><button onclick=window.location.href="../index1.php/?AdminController/getProductsbyCategory/'.$product['KategoriID'].'">'.$product['Kategori'].'</button></td>
					<td><button onclick=window.location.href="../index1.php/?AdminController/getProductsbyManufacturer/'.$product['Tillverkare'].'">'.$product['Tillverkare'].'</button></td>
					<td>'.$product['Pris'].' SEK</td>
					<td>'.$product['LagerAntal'].' st</td>
					<td><button onclick=window.location.href="../index1.php/?AdminController/updateProductView/'.$product['ID'].'">Uppdatera</button></td>
					<td><button onclick=window.location.href="../index1.php/?AdminController/deleteProduct/'.$product['ID'].'">Ta Bort</button></td>
					</tr>';
				}
			?>
		</table>
		<br>
		<br>
		<br>
		<br>
		<footer>
		</footer>
		</div>
	</body>
	</html>