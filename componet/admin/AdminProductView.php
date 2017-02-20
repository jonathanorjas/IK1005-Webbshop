<?php
	header('Content-Type: text/html; charset=ISO-8859-1');
?>
<!DOCTYPE html>
<html charset="UTF-8">
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<meta name="robots" content="noindex, nofollow">
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
		td{
			border: 1px solid black;
		}
	</style>
</head>
<body>
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
					<td><a href="#">Uppdatera</a></td>
					<td><a href="./index1.php?Controller/deleteProduct/'.$product['ID'].'">Ta Bort</a></td>
					</tr>';
				}
			?>
		</table>
</body>
</html>