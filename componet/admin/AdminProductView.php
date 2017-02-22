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
			width: 600px;
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
	<a href="./index1.php?Controller/addProductView/">Lägg till Produkter</a>
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
				<td>'.$product['Kategori'].'</td>
				<td>'.$product['Tillverkare'].'</td>
				<td>'.$product['Pris'].'</td>
				<td>'.$product['LagerAntal'].'</td>
				<td><a href="./index1.php?Controller/updateProductView/">Uppdatera</a></td>
				<td><a href="./index1.php?Controller/deleteProduct/'.$product['ID'].'">Ta Bort</a></td>
				</tr>';
			}
		?>
	</table>
</body>
</html>