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
<h2><a href="./index1.php?AdminController/getProductsAdminView">Start Administrationsverktyg</a></h2>
	<form action="./index1.php?AdminController/addProduct" method="post">
		<h3>Produktnamn:</h3>
		<input type="text" name="namn">
		<h3>Tillverkare:</h3>
		<input type="text" name="tillverkare">
		<h3>BildLänk:</h3>
		<input type="text" name="bildURL">
		<h3>Kategori</h3>
		<select name="kategori">
		<?php
		foreach ($categories as $categori) {
		echo '<option value="'.$categori['ID'].'">'.$categori['Kategori'].'</option>';
		}
		?>
		</select>
		<h3>Pris:</h3>
		<input type="text" name="pris">
		<h3>Beskrivning:</h3>
		<textarea name="beskrivning"></textarea>
		<h3>Lagerantal</h3>
		<input type="text" name="lagerantal">
		<br>
		<input type="submit" value="Spara">
	</form>
</body>
</html>