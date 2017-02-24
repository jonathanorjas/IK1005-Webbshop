<?php
	header('Content-Type: text/html; charset=ISO-8859-1');
?>
<!DOCTYPE html>
<html lang="sv-se">
<head>
	<title></title>
	<meta name="robots" content="noindex, nofollow">
	<meta charset="utf-8"></meta>
	<style>

	</style>
</head>
<body>
<h2><a href="?AdminController/getProductsAdminView">Start Administrationsverktyg</a></h2>
	<form action="./?AdminController/updateProduct" method="post">
		<h3>Produkt-ID</h3>
		<?php
			foreach ($products as $product) {
			echo '<input type="text" name="id" readonly value="'.$product['ID'].'">';
			echo '<input type="text" name="namn" value="'.$product['Namn'].'">';
			echo '<input type="text" name="tillverkare" value="'.$product['Tillverkare'].'">';
			echo '<input type="text" name="bildURL" value="'.$product['BildURL'].'">';
			echo '<select name="kategori">';
			foreach ($categories as $categori) {
				if($categori['ID'] == $product['KategoriID']){
				echo '<option value="'.$categori['ID'].'" selected>'.$categori['Kategori'].'</option>';
				}
				else{
					echo '<option value="'.$categori['ID'].'">'.$categori['Kategori'].'</option>';
				}
			}
			echo '</select>';
			echo '<input type="text" name="pris" value="'.$product['Pris'].'">';
			echo '<textarea name="beskrivning">'.$product['Beskrivning'].'</textarea>';
			echo '<input type="text" name="lagerantal" value="'.$product['LagerAntal'].'">';
		}
		?>
		<br>
		<input type="submit" value="Spara">
	</form>
</body>
</html>