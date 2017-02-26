<?php
	header('Content-Type: text/html; charset=ISO-8859-1');
?>
<!DOCTYPE html>
<html lang="sv-se">
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<meta name="robots" content="noindex, nofollow">
	<meta charset="utf-8">
	<style>
		body{
			background: #FFFFFF;
		}
		table{
			margin-top: 100px;
			margin-left: auto;
			margin-right: auto;
			width: 800px;
		}
		h1{
			text-align: center;
		}
		td{
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<h1>Administration av Våra Produkter</h1>
	<br>
	<h2><a href="?AdminController/getProductsAdminView">Start Administrationsverktyg</a></h2>
	<br>
	<a href="?AdminController/addProductView/">Lägg till Produkter</a>
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
</body>
</html>