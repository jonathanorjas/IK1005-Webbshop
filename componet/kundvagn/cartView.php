<?php
	header('Content-Type: text/html; charset=utf8');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Kundvagn - Componet</title>
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
				<img class="cart" src="../images/shoppingcart-icon.png" alt="cart">
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
				<li>Din kundvagn</li>
			</ul>
		</nav>
		<main class="cart-main">
			<nav class="sidebar">
				<div class="message-header">
					<h2>Sortera</h2>
				</div>
				<ul class="sidebar-list">
					<li><a href="">Namn</a></li>
					<li><a href="">Kategori</a></li>
					<li><a href="">Pris</a></li>
					<li><a href="">Tillverkare</a></li>
				</ul>	
			</nav>
			<article class="cart-menu">
				<div class="message-header"><h1>Kundvagn</h1></div>
				<div class="cart-contents">
					<div class="cart-view">
						<?php
							if($cartProductArray != NULL) {
								foreach($cartProductArray as $cartProduct) {
									echo '<div class="cart-product">
										<div class="cart-product-info">
											<a href=""><img class="cart-product-img" src="'.$cartProduct[0]['BildURL'].'" alt="'.$cartProduct[0]['Namn'].'"></a>
											<ul>
												<li class="cart-product-header">'.$cartProduct[0]['Namn'].'</li>
												<li>'.$cartProduct[0]['Kategori'].'</li>
												<li style="font-weight: bold;">'.$cartProduct[0]['Pris'].':-</li>
											</ul>
										</div>
										<div class="cart-product-manage">
											<h1 class="cart-product-header">Ta bort</h1><br>
											<a class="compo-rund-knapp" style="display: block; margin: 0 auto; float: left;" href="?Controller/deleteAllFromCart/'.$cartProduct[0]['ID'].'">X</a>
										</div>
										<div class="cart-product-manage">
											<h1 class="cart-product-header">Totalt</h1><br>
											<div style="font-weight: bold;text-align: center;">'.number_format($cartProduct[1]*$cartProduct[0]['Pris'],2).':-</div>
										</div>
										<div class="cart-product-manage">
											<h1 class="cart-product-header">Antal</h1><br>
											<a class="compo-rund-knapp" href="?Controller/deleteFromCart/'.$cartProduct[0]['ID'].'">-</a>
											<span class="cart-product-amount">'.$cartProduct[1].'</span>
											<a class="compo-rund-knapp" href="?Controller/addToCart/'.$cartProduct[0]['ID'].'">+</a>
										</div>
									</div>';
								}
							}
							else {
								echo '<h1>Din kundvagn är tom. Besök vår butiksida för att fylla den med godsaker!</h1>';
							}
						?>
					</div>
					<div class="cart-tab">
						<?php
						if($cartProductArray != NULL) {
							$totalt = 0;
							foreach($cartProductArray as $cartProduct)
								$totalt += $cartProduct[1]*$cartProduct[0]['Pris'];
							
							echo '<span class="cart-product-header" style="text-align: none">Summa totalt: '.number_format($totalt,2).' KR</span>';
						}
						else
							echo '<span class="cart-product-header" style="text-align: none">Summa totalt: 0.00 KR</span>';
						?>
						<a class="compo-knapp" style="font-size:1.3em;float:right;" href="">Fortsätt till kassan</a>
					</div>
				</div>
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
