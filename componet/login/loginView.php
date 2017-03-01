<?php
	header('Content-Type: text/html; charset=utf8');
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
			<div class="logodiv">
			<a href="../" >
				<img src="../images/ComponetLogoX120.png" alt="componet">
			</a>
			</div>
			<div class="headerdiv">
			<img src="../images/trygg_e-handel.png" alt="Trygg ehandel" class="logo_trygg_ehandel">
			
			<form class="search_bar" >
				<input type="text" name="searchquery">
				<input type="submit" value="Submit" name="Sök">
			</form>
				<a href="../index1.php/?Controller/showCart">
					<img class="cart" src="../images/shoppingcart-icon.png" alt="cart">
				</a>
				<div class="itemcounter"><span>0</span></div>
			</div>
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
					<?php
						echo '<span style="color:red;float:left;">'.$loginMessage.'</span>';
					?>
					<br><br>
					
					<div style="float:left;">
						<label>Username:</label>
						<input type="text" name="username" value="">
					</div>
					<br><br><br>
					
					<div style="float:left;">
						<label>Password: </label>
						<input type="password" name="password" value="">
					</div>
					<br><br><br><br>
								  
					<button type="submit" class="compo-knapp">Logga in</button>
				
				</fieldset>
			</form>
		</div>
	</main>
	<footer>
			<div class="footerpicture_div">
			<img src="../images/live-support-girl.png" alt="Customer service" class="happygirl_picture">
			</div>
			<div class="footer_information">
				<h3 class="hej">Kundtjänst</h3>
				<ul>						
					<li><a href="">Kundservice</a></li>
					<li><a href="">Support</a></li>
					<li><a href="../index1.php/?Controller/showAdminView">Logga in</a></li>
					<li><a href="mailto:webmaster@componet.com">Webmaster</a></li>
				</ul>
			</div>
			<div class="footer_logotypes">
				<img src="../images/leverantor.png" alt="leverantor" class="logo_leverantor">
			</div>	
		</footer>	
	</div>
</body>
</html>
