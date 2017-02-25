<?php
	header('Content-Type: text/html; charset=ISO-8859-1');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Logga in - Componet</title>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<meta name="robots" content="noindex, nofollow">
</head>

<body>
	<div class="container">
	<header>
		<a href="../">
			<img src="../images/ComponetLogoX120.png" alt="componet">
		</a>
	</header>
	<nav class="menu">
	<ul>
		<li class="dropdown">
			<a href="#" class="dropbtn">=</a>
				<div class="dropdown-content">
						<a href="../">Hem</a>
						<a href="../index1.php/?Controller/getProducts">Butik</a>
						<a href="../omoss/">Om Oss</a>
						<a href="../kontakt/">Kontakt</a>
						<a href="../nyhetsbrev/">Nyhetsbrev</a>
				</div>
		</li>
		<li><a class="button" href="../">Hem</a></li>
		<li><a class="button" href="../index1.php/?Controller/getProducts">Butik</a></li>
		<li><a class="button" href="../omoss/">Om Oss</a></li>
		<li><a class="button" href="../kontakt/">Kontakt</a></li>
		<li><a class="button" href="../nyhetsbrev/">Nyhetsbrev</a></li>
	</ul>
	</nav>
	<nav class="breadcrums">
		<ul>
			<li><a href="../">Start</a></li>
			<li>></li>
			<li>Login</li>
		</ul>
	</nav>
	<main style="display:flex;flex-wrap:wrap;justify-content:center;">
		<div class="news">
			<div class="message-header">
				<h1>Logga in</h1>
			</div>
			<form style="margin-left: 25px" action="../index1.php/?AdminController/login/" method="POST" class="">
				<fieldset>
				
					<legend>Logga in för att komma åt administrations verktyg</legend><br><br>
					<span style="color:red;float:left;">{{felmeddelande}}</span>
					<br><br>
					
					<div style="float:left;">
						<label>Username:</label>
						<input type="text" name="username" value="">
					</div>
					<br><br><br>
					
					<div style="float:left;">
						<label>Password: </label>
						<input type="text" name="password" value="">
					</div>
					<br><br><br><br>
								  
					<button type="submit" class="compo-knapp">Logga in</button>
				
				</fieldset>
			</form>
		</div>
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
