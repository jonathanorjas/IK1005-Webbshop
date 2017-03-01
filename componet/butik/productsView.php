<?php
	header('Content-Type: text/html; charset=utf8');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Butik - Componet</title>
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
				<li><a href="../butik/?Controller/getProducts">Butik</a></li>
			</ul>
		</nav>
		<nav class="sidebar">
			<div class="message-header">
					<h2>Kategorier</h2>
				</div>
			<ul class="sidebar-list">
				<?php	
					foreach ($categories as $category) {
						echo '<li><a href="?Controller/getProductsbyCategory/'.$category['ID'].'">'.$category['Kategori'].'</a></li>';
					}
				?>
			</ul>	
		</nav>
		<main class="mainkategori">
			<ul>
			<?php
			foreach ($products as $product) {
				echo '
				<li>
					<article class="kategori_produkter">
						<a href="?Controller/getProductsbyID/'.$product['ID'].'">
							<div class="produkt_img_box">
								<img src="'.$product['BildURL'].'" alt="'.$product['Namn'].'" width="50%" height="auto">
							</div>
							<div class="produkt_info">
								<h2 class="produkt_name">'.$product['Namn'].'</h2>
								<ul>
									<li><span class="short_info">'.$product['Beskrivning'].'</span></li>	
								</ul>		
							</div>
							<div class="produkt_pris">
								<span class="price_small">'.$product['Pris'].':-</span>
							</div>
						</a>
					</article>
				</li>
				';
			}
			?>
			</ul>
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
