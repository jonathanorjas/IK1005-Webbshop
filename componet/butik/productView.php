<?php
	header('Content-Type: text/html; charset=ISO-8859-1');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $product[0]['Namn']?> - Componet</title>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<meta name="robots" content="noindex, nofollow">
</head>

<body>
	<div class="container">
		<header>
			<a href="../">
				<img src="../images/ComponetLogoX120.png" alt="componet">
			</a>
			<form class="search_bar">
				<input type="text" name="searchquery">
				<input type="submit" value="Submit" name="Sök">
			</form>
				<a href="?Controller/showCart">
					<img class="cart" src="../images/shoppingcart-icon.png" alt="cart">
				</a>
				<?php
					echo '<div class="itemcounter"><span>'.Controller::showCartItems().'</span></div>';
				?>
		</header>
		<nav class="menu">
		<ul>
			<li><a class="button" href="../">Hem</a></li>
			<li><a class="button" href="?Controller/getProducts">Butik</a></li>
			<li><a class="button" href="../omoss/">Om Oss</a></li>
			<li><a class="button" href="../kontakt/">Kontakt</a></li>
			<li><a class="button" href="../nyhetsbrev/">Nyhetsbrev</a></li>
		</ul>
		</nav>
		<nav class="breadcrums">
			<ul>
				<li><a href="../">Start</a></li>
				<li>></li>
				<li><a href="./?Controller/getProducts">Butik</a></li>
				<li>></li>
				<li><?php echo '<a href="./?Controller/getProductsbyCategory/'.$product[0] ['KategoriID'].'">'.$product[0] ['Kategori'].'</a>'?></li>
				<li>></li>
				<li><?php echo $product[0] ['Namn'];?></li>
			</ul>			
		</nav>
		<main>
			<article class="produkt_area">
			<?php 
				echo '<div class="produkt_area_header">
					</div>
					<div class="produkt_area_img">
						<img src="'.$product[0] ['BildURL'].'" alt="'.$product[0] ['Namn'].'" width="100%" height="auto">
					</div>
					<div class="produkt_area_info">
						<ul>
							<li>
								<h1>'.$product[0] ['Namn'].'</h1>
							</li>
							<li>
								<p>'.$product[0] ['Beskrivning'].'</p>
							</li>
							<li>
								<h2>'.$product[0] ['Pris'].':-</h2>
							</li>
							<li>
								<a class="add_produkt" href=./?Controller/addToCart/'.$product[0] ['ID'].'>Lägg till i kundvagn</a>
								
							</li>
						</ul>
					</div>';
					?>
				<!--<div class="produkt_area_information">
						<h2>Teknisk Specifikation</h2>
						<table cellspacing="0">
							<tr>
								<td class="spec_header" colspan="2">Specifikationer</td>
							</tr>
							<tr class="table_row_odd">
								<td>Anslutning</td><td>PCIe</td>
							</tr>
							<tr class="table_row_even">
								<td>Minne</td><td>1 GB GDDR3</td>
							</tr>	
							<tr class="table_row_odd">
								<td>GPU/Minne</td><td>589/1200 MHz</td>
							</tr>
							<tr class="table_row_even">
								<td>Stöd för SLI</td><td>Nej</td>
							</tr>
							<tr class="table_row_odd">
								<td>Directx</td><td>11</td>
							</tr>
							<tr class="table_row_even">
								<td class="spec_header" colspan="2">Utgångar</td>
							</tr>
							<tr class="table_row_odd">
								<td>VGA</td><td>Ja, 1 st</td>
							</tr>
							<tr class="table_row_even">
								<td>DVI</td><td>Ja, 1 st</td>
							</tr>	
							<tr class="table_row_odd">
								<td>HDMI</td><td>Ja, 1 st</td>
							</tr>
						</table>
					</div>-->
			</article>			
		</main>
		<footer>
			<div class="footer_logotypes">
				<img src="../images/trygg_e-handel.png" alt="Trygg ehandel" class="logo_trygg_ehandel">
				<ul style="margin-left: 10px;">
					<li><img src="../images/visa-icon.png" alt="Visa"></li>
					<li><img src="../images/mastercard-icon.png" alt="Mastercard"></li>
				</ul>
				<ul>
					<li><img src="../images/paypal-icon.png" alt="Paypal"></li>
					<li style="margin-left: 6px; margin-top: 15px;"><img src="../images/klarna_logo.png" alt="Klarna"></li>
				</ul>
				<ul>
					<li style="margin-top:10px;"><img src="../images/dhl-shipping-box-icon.png" alt="DHL"></li>
					<li style="margin-top:20px;"><img src="../images/posten_logo.png" alt="Posten"></li>
				</ul>
				
			</div>
			<div class="footer_information">
				<h3>Kundtjänst</h3>
				<ul>					
					<li><a href="">Kundservice</a></li>
					<li><a href="">Support</a></li>
					<li><a href="">Returer</a></li>
					<li><a href="mailto:webmaster@componet.com">Webmaster</a></li>
				</ul>
			</div>	
		</footer>	
	</div>
</body>
</html>
