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
<h2><a href="./index1.php?Controller/getProducts">Start Administrationsverktyg</a></h2>
	<form action="./index1.php?Controller/updateProduct" method="post">
		<h3>Produkt-ID</h3>
		<?php
		foreach ($products as $product) {
		echo '<input type="text" name="id">';
		}
		?>
		<h3>Produktnamn:</h3>
		<?php
		foreach ($products as $product) {
		echo '<input type="text" name="namn">';
		}
		?>
		<h3>Tillverkare:</h3>
		<?php
		foreach ($products as $product) {
		echo '<input type="text" name="tillverkare">';
		}
		?>
		<h3>BildLänk:</h3>
		<?php
		foreach ($products as $product) {
		echo '<input type="text" name="bildURL">';
		}
		?>
		<h3>Kategori</h3>
		<select name="kategori">
		<?php
		foreach ($products as $product) {
			foreach ($categories as $categori) {
				if ($product['KategoriID'] == $categori['ID']) {
					echo '<option value="'.$categori['ID'].'" selected>'.$categori['Kategori'].'</option>';
				}
				else{
					echo '<option value="'.$categori['ID'].'">'.$categori['Kategori'].'</option>';
				}
			}
		}
		?>
		</select>
		<h3>Pris:</h3>
		<?php
		foreach ($products as $product) {
		echo '<input type="text" name="pris">';
		}
		?>
		<h3>Beskrivning:</h3>
		<?php
		foreach ($products as $product) {
		echo '<textarea name="beskrivning"></textarea>';
		}
		?>
		<h3>Lagerantal</h3>
		<?php
		foreach ($products as $product) {
		echo '<input type="text" name="lagerantal">';
		}
		?>
		<br>
		<input type="submit" value="Spara">
	</form>
</body>
</html>