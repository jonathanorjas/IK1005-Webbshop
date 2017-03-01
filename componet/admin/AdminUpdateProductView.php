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
		<?php
			foreach ($products as $product) {
			echo '<h3>Produkt-ID:</h3>';
			echo '<br>';
			echo '<input type="text" name="id" readonly value="'.$product['ID'].'">';
			echo '<br>';
			echo '<h3>Produktnamn:</h3>';
			echo '<br>';
			echo '<input type="text" name="namn" value="'.$product['Namn'].'">';
			echo '<br>';
			echo '<h3>Tillverkare:</h3>';
			echo '<br>';
			echo '<input type="text" name="tillverkare" value="'.$product['Tillverkare'].'">';
			echo '<br>';
			echo '<h3>Bildlänk:</h3>';
			echo '<br>';
			echo '<input type="text" name="bildURL" value="'.$product['BildURL'].'">';
			echo '<br>';
			echo '<h3>Kategori:</h3>';
			echo '<br>';
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
			echo '<br>';
			echo '<h3>Pris:</h3>';
			echo '<br>';
			echo '<input type="text" name="pris" value="'.$product['Pris'].'">';
			echo '<br>';
			echo '<h3>Beskrivning:</h3>';
			echo '<br>';
			echo '<textarea name="beskrivning">'.$product['Beskrivning'].'</textarea>';
			echo '<h3>LagerAntal:</h3>';
			echo '<input type="text" name="lagerantal" value="'.$product['LagerAntal'].'">';
		}
		?>
		<br>
		<input type="submit" value="Spara">
	</form>
</body>
</html>