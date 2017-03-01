<?php
	header('Content-Type: text/html; charset=utf8');
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
				<?php
					echo '<div class="itemcounter"><span>'.Controller::showCartItems().'</span></div>';
				?>
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
				<li><a href="../index1.php/?Controller/getProducts">Butik</a></li>
				<li>></li>
				<li><?php echo '<a href="../index1.php/?Controller/getProductsbyCategory/'.$product[0] ['KategoriID'].'">'.$product[0] ['Kategori'].'</a>'?></li>
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
